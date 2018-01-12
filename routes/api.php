<?php

use Illuminate\Http\Request;
use App\Weapon;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get('weapons', 'WeaponController@index');
// Route::get('weapons', 'WeaponController@index');
Route::get('weapons', function() {
    return Weapon::all();
});

Route::get('weapons/{id}', function($id) {
    return Weapon::findOrFail($id);
});

Route::post('weapons', function(Request $request) {
    return Weapon::firstOrCreate($request->all());
});

Route::put('weapons/{id}', function(Request $request, $id) {
    $weapon = Weapon::findOrFail($id);
    $weapon->update($request->all());

    return $weapon;
});

Route::delete('weapons/{id}', function($id) {
    Weapon::findOrFail($id)->delete();

    return 204;
});