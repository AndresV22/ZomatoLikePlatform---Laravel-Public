<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Place::class, function (Faker $faker) {

    $user_id = DB::table('users')->select('id')->get();
    $city_id = DB::table('cities')->select('id')->get();

    return [
        'address' => $faker->address,
        'name' => $faker->company,
        'user_id' => $user_id->random()->id,
        'city_id' => $city_id->random()->id,
        'opening_time' => $faker->time($format = 'H:i:s', $max = 'now'),
        'closing_time' => $faker->time($format = 'H:i:s', $max = 'now'),
        'average_value' => 0,
        'avatar' => 'https://placeimg.com/1000/1000/arch',
        'is_operative' => $faker->boolean(),
    ];
});
