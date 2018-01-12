<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WeaponController extends Controller
{
    public function index() {
        return Weapon::all();
    }

    public function show($id) {
        return Weapon::findOrFail($id);
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
