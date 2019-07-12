<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\UserRole::class, function (Faker $faker) {
	$role_id = DB::table('roles')->select('id')->get();
	$user_id = DB::table('users')->select('id')->get();

    return [
        'role_id' => $role_id->random()->id,
        'user_id' => $user_id->random()->id,
    ];
});
