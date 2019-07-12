<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\UserCity::class, function (Faker $faker) {
	$city_id = DB::table('cities')->select('id')->get();
	$user_id = DB::table('users')->select('id')->get();

    return [
        'city_id' => $city_id->random()->id,
        'user_id'=> $user_id->random()->id,
    ];
});
