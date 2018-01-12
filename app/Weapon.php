<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Weapon extends Model
{
   protected $fillable = [
       'name', 'ip', 'mac', 'model', 
       'propaneTime', 'oxygenTime', 'connectionStrength',
       'firemode', 'batteryLevel', 
       'propaneLevel', 'oxygenLevel', 'itemType'
    ];

    protected $dates = ['created_at', 'updated_at'];

    public function shoot() {
        return $this->belongsToMany('App\Shoot');
    }

    public function warnings() {
        return [];
    }
}
