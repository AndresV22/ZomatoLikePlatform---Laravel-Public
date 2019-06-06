<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Dish::class, function (Faker $faker) {
    $categories = array('Vegan', 'Light', 'Chinese', 'Dessert', 'Thai', 'Chilean', 'Peruvian', 'Japanese');
    $faker->addProvider(new \FakerRestaurant\Provider\en_US\Restaurant($faker));

    $purchases_id = DB::table('purchases')->select('id')->get();
    return [
        'purchases_id' => $purchases_id->random()->id,
        'name' => $faker->foodName,
        'price' => $faker->numberBetween($min = 1000, $max = 9000),
        'description' => $faker->realText($maxNbChars = 64, $indexSize = 2),
        'discount' => $faker->numberBetween($min = 1, $max = 99),
        'category' => $faker->randomElement($categories),
    ];
});
