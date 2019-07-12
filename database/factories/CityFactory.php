<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\City::class, function (Faker $faker) {
  $country_id = DB::table('countries')->select('id')->get();
    return [
      'country_id' => $country_id->random()->id,
      'name' => $faker->unique()->city,
      'code' => $faker->cityPrefix,
    ];
});
