<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Reservation::class, function (Faker $faker) {
	$users_id = DB::table('users')->select('id')->get();  

    return [
       	'date' => $faker->dateTime($min = 'now'),
       	'time' => $faker->time(),
		'allow' => $faker->boolean(),
		'users_id' => $users_id->random()->id,
    ];
});
