<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class WeaponGr17 extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $warnings = array();
        if ($this->connectionStrength == 0) array_push($warnings, "No connection");
        if ($this->connectionStrength == 1 || $this->updated_at->diffInMinutes() > 1) array_push($warnings, "Disconnected");
        if ($this->batteryLevel < 15) array_push($warnings, "Low on battery");


        return [
            'id' => $this->id,
            'name' => $this->name,
            'ip' => $this->ip,
            'mac' => $this->mac,
            'fireMode' => $this->firemode,
            'connectionStrength' => $this->connectionStrength,
            'batteryLevel' => $this->batteryLevel,
            'warnings' => $warnings
        ];
    }

    // public function with($request) {
    //     return [
    //         'version' => 'v2.0.0',
    //         'repository' => 'https://github.com/hold17/cphapi',
    //         'licence' => 'MIT'
    //     ];
    // }
}
