<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
    
    //リレーション
    public function project()
    {
        return $this->belongsTo(project::class);
    }
    
    public function scene()
    {
        return $this->belongsTo(Category::class);
    }
}
