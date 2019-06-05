<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Dish::class, function (Faker $faker) {
    $faker->addProvider(new \FakerRestaurant\Provider\en_US\Restaurant($faker));
    return [
        'name' => $faker->foodName,
        'description' => $faker->realText($maxNbChars = 64, $indexSize = 2),
        'price' => $faker->numberBetween($min = 1000, $max = 9000),
        'category' => $faker->foodCategory(),
        'discount' => $faker->numberBetween($min = 1, $max = 99)
    ];
});
