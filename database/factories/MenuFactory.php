<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Menu::class, function (Faker $faker) {
	$places_id = DB::table('places')->select('id')->get();
	$purchases_id = DB::table('purchases')->select('id')->get();

    return [
        'places_id' => $places_id->random()->id,
        'purchases_id' => $purchases_id->random()->id,
        'price' => $faker->numberBetween($min = 3000, $max = 15000),
        'discount' => $faker->numberBetween($min = 1000, $max = 5000),
        'category' => $faker->foodCategory(),
    ];
});
