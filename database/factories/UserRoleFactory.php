<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\UserRole::class, function (Faker $faker) {
	$roles_id = DB::table('roles')->select('id')->get();
	$users_id = DB::table('users')->select('id')->get();

    return [
        'roles_id' => $roles_id->random()->id,
        'users_id' => $users_id->random()->id,
    ];
});
