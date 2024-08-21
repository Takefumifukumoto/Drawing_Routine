<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    public function dashboard()
    {
        return view('dashboard')->with(
            ['created_projects' => \Auth::user()->projects()->wherePivot('role', 0)->get()]
        ); 
    }  
}
