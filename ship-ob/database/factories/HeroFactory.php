<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

use App\Hero;

$factory->define(Hero::class, function (Faker $faker) {
    return [
        // 'name' => 'あああ',
        'world_id' => 1,
        'x' => $faker->numberBetween(0, 1000),
        'y' => $faker->numberBetween(0, 1000),
    ];
});
