<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class WeaponGr16 extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'id' => $this->id,
            'ip' => $this->ip,
            'mac' => $this->mac,
            'type' => $this->model,
            'name' => $this->name,
            'armed' => $this->firemode == "safe",
            'shootingMode' => $this->firemode,
            'propaneLevel' => $this->propaneLevel,
            'oxygenLevel' => $this->oxygenLevel,
            'propaneTime' => $this->propaneTime,
            'oxygenTime' => $this->oxygenTime
        ];
    }
}
