<?php

use Illuminate\Database\Seeder;
use App\Scene;
use App\Shoot;

class ScenesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Scene::truncate();

        // $scenes = factory(Scene::class, 4)
        //     ->create()
        //     ->each(function ($scene) {
        //         $scene->shoots()->saveMany(factory(Shoot::class, 3)->make());
        //     });



        $scenes = factory(Scene::class, 4)
            ->create()
            ->each(function ($scene) {
                $scene->shoots()->saveMany(factory(Shoot::class, 3)
                    // ->make());
                    ->each(function ($shoot) {
                        $shoot->weapons()->saveMany(factory(Weapon::class, 5)->make());
                    })->make());
            });
    }
}
