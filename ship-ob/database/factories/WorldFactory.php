<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\World;
use Faker\Generator as Faker;

$factory->define(World::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'desc' => $faker->realText(100),

    ];
});
