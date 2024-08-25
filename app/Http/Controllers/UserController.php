<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Project;
use App\Models\User;

class UserController extends Controller
{
    public function history(Project $project)
    {
        //$history->user_id = Auth::id();
        //$history->project_id = $project->id;
        //$history->save();
        \Auth::user()->watchedprojects()->syncWithoutDetaching([$project->id =>['updated_at' => now()]]);
        
        return redirect('/projects/' . $project->id);
    }  
    
    public function dashboard()
    {
        return view('dashboard')->with([
            'created_projects' => \Auth::user()->projects()->wherePivot('role', 0)->get(),
            'watched_projects' => \Auth::user()->watchedprojects()->orderByPivot('updated_at', 'desc')->take(10)->get()
        ]); 
    }  
}
