<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\City::class, function (Faker $faker) {
  $countries_id = DB::table('countries')->select('id')->get();
    return [
      'countries_id' => $countries_id->random()->id,
      'name' => $faker->unique()->city,
      'code' => $faker->cityPrefix,
    ];
});
