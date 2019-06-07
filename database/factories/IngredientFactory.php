<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Ingredient::class, function (Faker $faker) {

	$faker->addProvider(new \FakerRestaurant\Provider\en_US\Restaurant($faker));
	$categories = array('Oils', 'Meat', 'Fruit', 'Sauce', 'Spice', 'Legume', 'pasta', 'Seaweed', 'Bread');
	$types = array('Animal', 'Vegetable');
	$dishes_id = DB::table('dishes')->select('id')->get();

	$choice = $faker->numberBetween($min = 0, $max = 3);

	if($choice == 0){
		$ingredient = $faker->vegetableName();;
		$type = 'Vegetable';
	}
	else if($choice == 1){
		$ingredient = $faker->fruitName();;
		$type = 'Fruit';
	}
	else if($choice == 2){
		$ingredient = $faker->meatName();;
		$type = 'Meat';
	}
	else{
		$ingredient = $faker->sauceName();;
		$type = 'Sauce';
	}

    return [
				'dishes_id' => $dishes_id->random()->id,
        'name' => $ingredient,
        'type' => $faker->randomElement($types),
        'category' => $faker->randomElement($categories),
    ];
});
