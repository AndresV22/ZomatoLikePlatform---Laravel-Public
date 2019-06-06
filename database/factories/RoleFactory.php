<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Role::class, function (Faker $faker) {
	$name = array('admin', 'user', 'unregistered user', 'place');

    return [
        'name' => $faker->randomElement($name),
        'desciption' => $faker->text($maxNbChars = 30),
    ];
});
