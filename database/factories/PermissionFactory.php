<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Permission::class, function (Faker $faker) {
	$name = array('remove place', 'create place', 'modify place', 'none', 'remove user', 'create user', 'modify user');
    return [
        'name' => $faker->randomElement($name),
    ];
});
