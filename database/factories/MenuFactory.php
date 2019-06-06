<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Menu::class, function (Faker $faker) {
	$places_id = App\Place::pluck('places_id')->toArray();
	$purchases_id = App\Purchase::pluck('purchases_id')->toArray();

    return [
        'places_id' => $faker->randomElement($places_id),
        'purchases_id' => $faker->randomElement($purchases_id),
        'price' => $faker->numberBetween($min = 3000, $max = 15000),
        'discount' => $faker->numberBetween($min = 1000, $max = 5000),
        'category' => $$faker->foodCategory(),
    ];
});
