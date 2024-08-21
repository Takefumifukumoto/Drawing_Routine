<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'music_url'
        ];
    
    //リレーション    
    public function users(){
        return $this->belongsToMany(User::class)->withPivot('role');
    }
    
    public function scenes()
    {
        return $this->hasMany(Scene::class);
    }
    
    public function members()
    {
        return $this->hasMany(Member::class);
    }
    
    public function histories()
    {
        return $this->hasMany(History::class);
    }
}
