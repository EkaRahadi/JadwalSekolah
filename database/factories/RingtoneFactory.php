<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Ringtone::class, function (Faker $faker) {
    return [
        'nama_ringtone' => $faker->name,
        'path' =>$faker->imageUrl
    ];
});
