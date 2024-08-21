<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\History;
use Illuminate\Support\Facades\Auth;

class HistoryController extends Controller
{
    public function record(History $history){
        $history->user_id = Auth::id();
        $history->project_id = $project->id;
        $history->save();
        return;
    }
}
