<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\PermissionRole::class, function (Faker $faker) {
	$permissions_id = DB::table('permissions')->select('id')->get();
	$roles_id = DB::table('roles')->select('id')->get();

    return [
        'permissions_id' => $permissions_id->random()->id,
        'roles_id' => $roles_id->random()->id,
    ];
});
