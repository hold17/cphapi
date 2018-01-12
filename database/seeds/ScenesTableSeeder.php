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

        $scenes = factory(Scene::class, 3)
            ->create()
            ->each(function ($scene) {
                $scene->shoots()->save(factory(Shoot::class)->create());
            });
    }
}
