<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shoot extends Model
{
    protected $fillable = [
        'name', 'scene_id'
    ];

    public function scene()
    {
        return $this->belongsTo('App\Scene', 'scene_id');
    }

    public function weapons() 
    {
        return $this->hasMany('App\Weapon');
    }
}
