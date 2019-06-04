<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Place::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'address' => $faker->name,
        'opening_time' => $faker->time($format = 'H:i:s', $max = 'now'),
        'closing_time' => $faker->time($format = 'H:i:s', $max = 'now'),
        'average_value' => $faker->numberBetween($min = 1000, $max = 50000),
    ];
});
