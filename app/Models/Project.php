<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'music'
        ];
    
    //リレーション    
    public function users(){
        return $this->belongsToMany(User::class);
    }
    
    public function scenes()
    {
        return $this->hasMany(Scene::class);
    }
    
    public function members()
    {
        return $this->hasMany(Member::class);
    }
}
