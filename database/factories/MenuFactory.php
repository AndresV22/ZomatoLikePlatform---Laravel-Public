<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Menu::class, function (Faker $faker) {
	$categories = array('Vegan', 'Light', 'Chinese', 'Dessert', 'Thai', 'Chilean', 'Peruvian', 'Japanese');
	$faker->addProvider(new \FakerRestaurant\Provider\en_US\Restaurant($faker));
	$place_id = DB::table('places')->select('id')->get();
	$purchase_id = DB::table('purchases')->select('id')->get();

    return [
        'place_id' => $place_id->random()->id,
        'purchase_id' => $purchase_id->random()->id,
				'name' => $faker->foodName,
        'price' => $faker->numberBetween($min = 3000, $max = 15000),
        'discount' => $faker->numberBetween($min = 0, $max = 100),
        'category' => $faker->randomElement($categories),
    ];
});
