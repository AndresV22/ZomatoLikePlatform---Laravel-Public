<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\MenuDish::class, function (Faker $faker) {
	$menu_id = DB::table('menus')->select('id')->get();
	$dish_id = DB::table('dishes')->select('id')->get();	

    return [
        'menu_id' => $menu_id->random()->id,
        'dish_id' => $dish_id->random()->id,
    ];
});
