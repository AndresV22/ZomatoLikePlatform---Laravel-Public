<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\City::class, function (Faker $faker) {
    return [
      'countries_id' => $faker->numberBetween($min = 1, $max = 100),
      'name' => $faker->unique()->city,
      'code' => $faker->cityPrefix,
    ];
});
