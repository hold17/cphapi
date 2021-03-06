<?php

namespace App\Http\Controllers;

use App\Weapon;
use App\Http\Resources\WeaponGr16 as WeaponResource16;
use App\Http\Resources\WeaponGr17 as WeaponResource17;
use App\Http\Resources\WeaponCollection;

use Illuminate\Http\Request;

class WeaponController extends Controller
{
    public function index($grp) {
        $weapons = Weapon::all();
        
        if ($grp == "16") return new WeaponCollection(WeaponResource16::collection($weapons));
        if ($grp == "17") return new WeaponCollection(WeaponResource17::collection($weapons));
        else return $weapons;
    }

    public function show($grp, $id) {
        $weapon = Weapon::findOrFail($id);

        if ($grp == "16") return new WeaponResource16($weapon);
        elseif ($grp == "17") return new WeaponResource17($weapon);
        else return $weapon;
    }

    public function store(Request $request) {
        // dd($request->mac);
        $weapon = Weapon::get()->where("mac", $request->mac)->first();
        if ($weapon == null) {
            return Weapon::create($request->all());
        } else {
            // dd("don't make a new one :(");
            return $weapon;
        }
        // return new WeaponResource(Weapon::firstOrCreate($request->all()));
    }

    public function update(Request $request, $id) {
        $weapon = Weapon::findOrFail($id);
        $weapon->update($request->all());

        $client = new \GuzzleHttp\Client();
        $res = $client->request('GET', $request->ip . "/shootmode" + "/" + $request->firemode);

        return $weapon;
    }

    public function delete(Request $request, $id) {
        Weapon::findOrFail($id)->delete();

        return 204;
    }
}
