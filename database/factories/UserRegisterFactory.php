<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\UserRegister::class, function (Faker $faker) {
	$users_id = App\Destino::pluck('users_id')->toArray();

    return [
        'users_id' => $faker->randomElement($users_id),
        'actions' => $faker->realText($maxNbChars = 64, $indexSize = 2),
    ];
});
