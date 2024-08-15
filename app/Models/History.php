<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;
    
    public function projects()
    {
        return $this->belongsTo(Project::class);
    }
    
    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
