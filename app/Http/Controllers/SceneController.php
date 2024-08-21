<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Scene;

class SceneController extends Controller
{
    public function create()
    {
        return view('/scenes.create')->with(['input', $input]); 
    }    
    
    public function prepare(Request $request)
    {
        
        $input['project_id'] = $request['project_id'];
        $input['audio_time'] = $request['time'];
        return view('/scenes.create')->with('input', $input);
    }
}
