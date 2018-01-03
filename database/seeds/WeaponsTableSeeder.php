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

        Weapon::create([
            "name" => "Bob's Gun",
            "ip" => "127.0.0.1",
            "mac" => "aa:bb:cc:00:11:22",
            "model" => "AK-47",
            "propaneTime" => 20,
            "oxygenTime" => 30
        ]);

        Weapon::create([
            "name" => "Marley's Gun",
            "ip" => "127.0.0.2",
            "mac" => "aa:bb:cc:00:11:23",
            "model" => "M416",
            "propaneTime" => 30,
            "oxygenTime" => 45
        ]);
    }
}
