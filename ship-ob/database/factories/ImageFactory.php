<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */


use App\Image;
use Faker\Generator as Faker;

$factory->define(Image::class, function (Faker $faker) {

    $filename = $faker->image(\Storage::disk('public')->path('img/'), 128, 128, null, false, true);
    // $f = $faker->image('.', 128, 128, null, false);
    // $f2 = ;
    // dd($f);
    return [
        'file' => 'img/'.$filename,
        'hash' => $filename,
        'disk' => 'pubilc',
    ];
});
