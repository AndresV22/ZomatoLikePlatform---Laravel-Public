<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Table::class, function (Faker $faker) {
	$place_id = DB::table('places')->select('id')->get();
    return [
    	'place_id' => $place_id->random()->id,
        'capacity' => $faker->numberBetween($min = 1, $max = 12),
        'code' => $faker->unique()->numberBetween($min = 1, $max = 100),
        'taken' => $faker->boolean(),
    ];
});
