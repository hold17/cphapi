<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Weapon extends Model
{
   protected $fillable = [
       'name', 'ip', 'mac', 'model', 
       'propaneTime', 'oxygenTime', 'connectionStrength',
       'firemode', 'connection', 'batteryLevel', 
       'propaneLevel', 'oxygenLevel', 'itemType'
    ];

    public function shoot() {
        return $this->belongsToMany('App\Shoot');
    }
}
