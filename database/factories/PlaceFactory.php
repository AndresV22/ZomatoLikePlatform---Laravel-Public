<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Place::class, function (Faker $faker) {

    $user_id = DB::table('users')->select('id')->get();

    return [
        'address' => $faker->address,
        'name' => $faker->company,
        'user_id' => $user_id->random()->id,
        'opening_time' => $faker->time($format = 'H:i:s', $max = 'now'),
        'closing_time' => $faker->time($format = 'H:i:s', $max = 'now'),
        'average_value' => $faker->randomFloat($nbMaxDecimals = 1, $min = 0, $max = 5),
        'avatar' => 'https://placeimg.com/1000/1000/arch'
    ];
});
