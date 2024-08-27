<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Scene;
use Cloudinary;

class SceneController extends Controller
{
    public function store(Request $request, Scene $scene)
    {
        $input = $request['scene'];
        if($request->file('image')){
            $image_url = Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath();
            $input += ['image_url' => $image_url];
        }
        $scene->fill($input)->save();
        return redirect('/projects/' . $input['project_id'] .'/edit');
    }
    
    public function prepare(Request $request, Project $project)
    {
        $project = Project::find($request['project_id']);
        $audio_time = $request['time'];
        return view('/scenes.create')->with(['audio_time' => $audio_time, 'project' => $project,]);
    }
}
