<?php

use Illuminate\Database\Seeder;
use App\Weapon;

class WeaponsTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Weapon::truncate();
        $weapons = factory(App\Weapon::class, 2)->create();
    }
}
