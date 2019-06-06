<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\UserRegister::class, function (Faker $faker) {
	$users_id = DB::table('users')->select('id')->get();

    return [
        'users_id' => $users_id->random()->id,
        'actions' => $faker->realText($maxNbChars = 64, $indexSize = 2),
    ];
});