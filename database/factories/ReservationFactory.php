<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Reservation::class, function (Faker $faker) {
    return [
       	'date' => $faker->dateTime($min = 'now'),
       	'time' => $faker->time(),
       	'allow' => $faker->boolean(),
    ];
});
