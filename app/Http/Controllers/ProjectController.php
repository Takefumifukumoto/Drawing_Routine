<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
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
        $project->fill($input)->save();
        return redirect('/projects/' . $project->id);
    }
    
    public function show(Project $project)
    {
        return view('/projects.show')->with(['project' => $project]);
    }    
}
