<?php

use Faker\Generator as Faker;
use App\Weapon;

$factory->define(App\Weapon::class, function (Faker $faker) {
    return [
        'name' => $faker->firstName,
        'ip' => $faker->localIpv4,
        'mac' => $faker->macAddress,
        'model' => 'AK-47',
        'propaneTime' => $faker->numberBetween($min = 0, $max = 30),
        'oxygenTime' => $faker->numberBetween($min = 0, $max = 30),
        'firemode' => 'safe',
        'connectionStrength' => $faker->numberBetween($min = 0, $max = 4),
        'batteryLevel' => $faker->numberBetween($min = 0, $max = 30),
        'oxygenLevel' => $faker->numberBetween($min = 0, $max = 30),
        'propaneLevel' => $faker->numberBetween($min = 0, $max = 30),
        'itemType' => $faker->boolean
    ];
});
