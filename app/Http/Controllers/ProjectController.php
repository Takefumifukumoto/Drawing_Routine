<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    public function store(Request $request, Project $project)
    {
        $input = $request['project'];
        $project->fill($input)->save();
        //return redirect('/posts/' . $post->id);
    }
}
