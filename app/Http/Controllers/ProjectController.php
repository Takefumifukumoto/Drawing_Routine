<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\History;
use Illuminate\Support\Facades\Auth;
use Cloudinary;

class ProjectController extends Controller
{
    
    public function create()
    {
        return view('/projects.create');  //create.blade.phpを表示
    }    
    
    public function store(Request $request, Project $project)
    {
        $input = $request['project'];
        if($request->file('music')){
            $music_url = Cloudinary::uploadVideo($request->file('music')->getRealPath())->getSecurePath();
            $input += ['music_url' => $music_url];
        }
        $user_id = Auth::id(); //ログイン中のユーザーのidを取得
        $project->fill($input)->save();
        $project->users()->attach($user_id, ['role' => 0]); //プロジェクト制作者情報を中間テーブルに登録
        
        
        return redirect('/projects/' . $project->id);
    }
    
    public function show(Project $project, History $history)
    {

        return view('/projects.show')->with(['project' => $project]);
    }
    
    public function edit(Project $project)
    {
        return view('/projects.edit')->with(['project' => $project]);
    }
}
