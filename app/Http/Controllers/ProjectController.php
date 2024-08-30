<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\History;
use App\Models\Scene;
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
        $scenes = $project->scenes()->orderBy('time', 'asc')->get();
        return view('/projects.show')->with([
            'project' => $project,
            'scenes' => $scenes,
            ]);
    }
    
    public function edit(Project $project)
    {
        $scenes = $project->scenes()->orderBy('time', 'asc')->get();
        return view('/projects.edit')->with([
            'project' => $project,
            'scenes' => $scenes,
            ]);
    }
    
    public function scene_create(Request $request, Project $project)
    {
        $project = Project::find($request['project_id']);
        $audio_time = $request['time'];
        return view('/scenes.create')->with(['audio_time' => $audio_time, 'project' => $project,]);
    }
}
