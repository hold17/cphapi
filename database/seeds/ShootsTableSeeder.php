<?php

use Illuminate\Database\Seeder;
use App\Scene;
use App\Shoot;

class ShootsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Shoot::truncate();
        // factory(Shoot::class, 10)->create();
        // $shoots = factory(Shoot::class, 5)->create();
    }
}
