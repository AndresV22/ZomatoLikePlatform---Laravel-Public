<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Comment::class, function (Faker $faker) {
    $places_id = DB::table('places')->select('id')->get();
    $users_id = DB::table('users')->select('id')->get();
    return [
      'places_id' => $places_id->random()->id,
      'users_id' => $users_id->random()->id,
      'content' => $faker->realText($maxNbChars = 64, $indexSize = 2),
      'value' => $faker->numberBetween($min = 0, $max = 5)
    ];
});
