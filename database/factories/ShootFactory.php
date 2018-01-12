<?php

use Faker\Generator as Faker;

$factory->define(App\Shoot::class, function (Faker $faker) {
    return [
        'name' => $faker->word . ' ' . $faker->word,
    ];
});
