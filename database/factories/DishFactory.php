<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Dish::class, function (Faker $faker) {
    $categories = array('Vegan', 'Light', 'Chinese', 'Dessert', 'Thai', 'Chilean', 'Peruvian', 'Japanese');
    $faker->addProvider(new \FakerRestaurant\Provider\en_US\Restaurant($faker));
    $menu_id = DB::table('menus')->select('id')->get();
    $purchase_id = DB::table('purchases')->select('id')->get();
    $place_id = DB::table('places')->select('id')->get();
    return [
        'purchase_id' => $purchase_id->random()->id,
        'menu_id' => $menu_id->random()->id,
        'place_id' => $place_id->random()->id,
        'name' => $faker->foodName,
        'price' => $faker->numberBetween($min = 1000, $max = 9000),
        'description' => $faker->realText($maxNbChars = 64, $indexSize = 2),
        'discount' => $faker->numberBetween($min = 1, $max = 99),
        'category' => $faker->randomElement($categories),
    ];
});
