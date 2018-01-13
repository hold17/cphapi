<?php

namespace App\Http\Controllers;

use App\Scene;
use App\Shoot;
use Illuminate\Http\Request;

use App\Http\Resources\Scene as SceneResource;
use App\Http\Resources\SceneCollection;
use App\Http\Resources\Shoot as ShootResource;
use App\Http\Resources\ShootCollection;

class SceneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new SceneCollection(SceneResource::collection(Scene::all()));
    }

    public function showShoots($id) 
    {
        return new ShootCollection(ShootResource::collection((Scene::findOrFail($id)->shoots)));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return Scene::firstOrCreate($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $sceneId
     * @return \Illuminate\Http\Response
     */
    public function show($sceneId)
    {
        return new SceneResource(Scene::findOrFail($sceneId));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $sceneId
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update($sceneId, Request $request)
    {
        $scene = Scene::findOrFail($sceneId);

        $scene->update($request->all());

        return $scene;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $sceneId
     * @return \Illuminate\Http\Response
     */
    public function destroy($sceneId)
    {
        Scene::findOrFail($sceneId)->delete();

        return 204;
    }
}
