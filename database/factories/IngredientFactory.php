<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Ingredient::class, function (Faker $faker) {
	$vegetable = $faker->vegetableName();
	$fruit = $faker->fruitName();
	$meat = $faker->meatName();
	$sauce = $faker->sauceName();
	$choice = $faker->numberBetween($min = 0, $max = 3);

	if($choice == 0){
		$ingredient = $vegetable;
		$type = 'vegetable';
		$category = 'vegan/vegetarian';
	}
	else if($choice == 1){
		$ingredient = $fruit;
		$type = 'fruit';
		$category = 'vegan/vegetarian';
	}
	else if($choice == 2){
		$ingredient = $meat;
		$type = 'meat';
		$category = 'meat';
	}
	else{
		$ingredient = $sauce;
		$type = 'sauce';
		$category = 'vegetarian';
	}



    return [
        'name' => $ingredient,
        'type' => $type,
        'category' => $category,
    ];
});
