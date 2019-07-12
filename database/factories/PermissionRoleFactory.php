<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\PermissionRole::class, function (Faker $faker) {
	$permission_id = DB::table('permissions')->select('id')->get();
	$role_id = DB::table('roles')->select('id')->get();

    return [
        'permission_id' => $permission_id->random()->id,
        'role_id' => $role_id->random()->id,
    ];
});
