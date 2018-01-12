<?php

use Faker\Generator as Faker;

$factory->define(App\Scene::class, function (Faker $faker) {
    return [
        'name' => $faker->word . ' ' . $faker->word,
    ];
});
