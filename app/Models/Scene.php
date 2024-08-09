<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scene extends Model
{
    use HasFactory;
    
    //リレーション
    public function project()
    {
        return $this->belongsTo(Project::class);
    }
    
    public function members()
    {
        return $this->hasMany(Member::class);
    }
}
