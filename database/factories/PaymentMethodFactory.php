<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;
use Faker\Provider\de_DE\Payment;

$factory->define(App\PaymentMethod::class, function (Faker $faker) {
    $users_id = DB::table('users')->select('id')->get();
	$methods = array('Cash', 'Debit Card', 'Credit Card');

    return [
        'users_id' => $users_id->random()->id,
        'type' => $faker->randomElement($methods),
        'bank' => $faker->company(),
    ];
});
