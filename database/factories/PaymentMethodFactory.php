<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;
use Faker\Provider\de_DE\Payment;

$factory->define(App\PaymentMethod::class, function (Faker $faker) {
	$methods = array('Cash', 'Debit Card', 'Credit Card');

    return [
        'type' => $faker->randomElement($methods),
        'bank' => $faker->bank(),
    ];
});
