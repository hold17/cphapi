<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Scene extends Model
{
    protected $fillable = [
        'name'
    ];

    public function shoots() {
        return $this->hasMany("App\Shoot", 'scene_id');
    }
}
