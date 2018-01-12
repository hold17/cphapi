<?php

use Illuminate\Http\Request;

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

Route::prefix('/weapons')->group(function() {
    Route::get('/', 'WeaponController@index');
    Route::get('/{grp}/{id}', 'WeaponController@show');
    Route::get('/{id}', 'WeaponController@show');
    Route::post('/', 'WeaponController@store');
    Route::put('/{id}', 'WeaponController@update');
    Route::delete('/{id}', 'WeaponController@delete');
});