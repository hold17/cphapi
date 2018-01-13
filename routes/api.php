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
    Route::get('/{grp}', 'WeaponController@index');
    Route::get('/{grp}/{id}', 'WeaponController@show');

    Route::post('/', 'WeaponController@store');
    Route::put('/{id}', 'WeaponController@update');
    Route::delete('/{id}', 'WeaponController@delete');
});

Route::prefix('/scenes')->group(function() {
    Route::get('/', 'SceneController@index');
    Route::get('/{id}', 'SceneController@show');
    Route::get('{id}/shoots', 'SceneController@showShoots');

    Route::post('/', 'SceneController@store');
    Route::put('/{id}', 'SceneController@update');
    Route::delete('/{id}', 'SceneController@destroy');
});

Route::prefix('/shoots')->group(function() {
    Route::get('/', 'ShootController@index');
    Route::get('/{id}', 'ShootController@show');
    Route::get('{id}/scene', 'ShootController@showScene');
    Route::get('{id}/weapons/{grp}', 'ShootController@showWeapons');

    Route::post('/', 'ShootController@store');
    Route::put('/{id}', 'ShootController@update');
    Route::delete('/{id}', 'ShootController@destroy');
});