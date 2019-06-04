<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Place::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
        'address' => $faker->address,
        'opening_time' => $faker->time($format = 'H:i:s', $max = 'now'),
        'closing_time' => $faker->time($format = 'H:i:s', $max = 'now'),
        'average_value' => $faker->randomFloat($nbMaxDecimals = 1, $min = 0, $max = 5),
    ];
});
