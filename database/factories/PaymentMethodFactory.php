<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;
use Faker\Provider\de_DE\Payment;

$factory->define(App\PaymentMethod::class, function (Faker $faker) {
    $users_id = DB::table('users')->select('id')->get();
	$methods = $faker->randomElement(array('Cash', 'Debit Card', 'Credit Card'));
	$bank = $faker->company();

	if($methods == 'Cash'){
		$bank = 'None';
	}

    return [
        'users_id' => $users_id->random()->id,
        'type' => $methods,
        'bank' => $bank,
    ];
});
