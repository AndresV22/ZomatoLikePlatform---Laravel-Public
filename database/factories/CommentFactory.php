<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Comment::class, function (Faker $faker) {
    $place_id = DB::table('places')->select('id')->get();
    $user_id = DB::table('users')->select('id')->get();
    return [
      'place_id' => $place_id->random()->id,
      'user_id' => $user_id->random()->id,
      'content' => $faker->realText($maxNbChars = 64, $indexSize = 2),
      'value' => $faker->numberBetween($min = 0, $max = 5)
    ];
});
