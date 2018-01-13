<?php

namespace App\Http\Controllers;

use App\Scene;
use App\Shoot;
use App\Weapon;

use App\Http\Resources\Shoot as ShootResource;
use App\Http\Resources\ShootCollection;
use App\Http\Resources\Scene as SceneResource;
use App\Http\Resources\WeaponGr16 as WeaponResource16;
use App\Http\Resources\WeaponGr17 as WeaponResource17;
use App\Http\Resources\WeaponCollection;

use Illuminate\Http\Request;

class ShootController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new ShootCollection(ShootResource::collection(Shoot::all()));
    }
    
    public function showScene($shootId) 
    {
        return new SceneResource(Shoot::findOrFail($shootId)->scene);
    }

    public function showWeapons($sceneId, $grp) 
    {
        $weapons = Weapon::all();

        // // return new WeaponCollection(WeaponResource17::collection($weapons));
        $weapons = Shoot::findOrFail($sceneId)->weapons;
        // // dd($weapons);

        if ($grp == "16") return new WeaponCollection(WeaponResource16::collection($weapons));
        if ($grp == "17") return new WeaponCollection(WeaponResource17::collection($weapons));
        else return $weapons;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return Shoot::firstOrCreate($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $shootId
     * @return \Illuminate\Http\Response
     */
    public function show($shootId)
    {
        return new ShootResource(Shoot::findOrFail($shootId));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $shootId
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update($shootId, Request $request)
    {
        $shoot = Shoot::findOrFail($shootId);

        $shoot->update($request->all());

        return $shoot;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int  $shootId
     * @return \Illuminate\Http\Response
     */
    public function destroy($shootId)
    {
        Shoot::findOrFail($shootId)->delete();
    }
}
