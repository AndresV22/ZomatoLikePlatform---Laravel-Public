<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\UserRegister::class, function (Faker $faker) {
	$user_id = DB::table('users')->select('id')->get();

    return [
        'user_id' => $user_id->random()->id,
        'actions' => $faker->realText($maxNbChars = 64, $indexSize = 2),
    ];
});