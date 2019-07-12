<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Reservation::class, function (Faker $faker) {
	$user_id = DB::table('users')->select('id')->get();  

    return [
       	'date' => $faker->dateTime($min = 'now'),
       	'time' => $faker->time(),
		'allow' => $faker->boolean(),
		'user_id' => $user_id->random()->id,
    ];
});
