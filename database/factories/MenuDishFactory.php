<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\MenuDish::class, function (Faker $faker) {
	$menus_id = DB::table('menus')->select('id')->get();
	$dishes_id = DB::table('dishes')->select('id')->get();	

    return [
        'menus_id' => $menus_id->random()->id,
        'dishes_id' => $dishes_id->random()->id,
    ];
});
