<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Comment::class, function (Faker $faker) {
    return [
      'content' => $faker->realText($maxNbChars = 200, $indexSize = 2),
      'Value' => $faker->numberBetween($min = 0, $max = 5),
    ];
});
