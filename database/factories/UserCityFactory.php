<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\UserCity::class, function (Faker $faker) {
	$cities_id = DB::table('cities')->select('id')->get();
	$users_id = DB::table('users')->select('id')->get();

    return [
        'cities_id' => $cities_id->random()->id,
        'users_id'=> $users_id->random()->id,
    ];
});
