<?php

namespace App\Http\Controllers;
use App\Weapon;
use App\Http\Resources\WeaponGr16 as UserResource16;
use App\Http\Resources\WeaponGr17 as UserResource17;

use Illuminate\Http\Request;

class WeaponController extends Controller
{
    public function index() {
        return Weapon::all();
    }

    public function show($grp, $id) {
        $weapon = Weapon::findOrFail($id);
        // dd($grp);

        if ($grp == "16") return new UserResource16($weapon);
        elseif ($grp == "17") return new UserResource17($weapon);
        else return $weapon;
    }

    public function store(Request $request) {
        return Weapon::firstOrCreate($request->all());
    }

    public function update(Request $request, $id) {
        $weapon = Weapon::findOrFail($id);
        $weapon->update($request->all());

        return $weapon;
    }

    public function delete(Request $request, $id) {
        Weapon::findOrFail($id)->delete();

        return 204;
    }
}
