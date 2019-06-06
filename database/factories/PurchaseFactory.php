<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Purchase::class, function (Faker $faker) {
	$users_id = App\User::pluck('users_id')->toArray();
	$payment_vouchers_id = App\PaymentVoucher::pluck('payment_vouchers_id')->toArray();
	$status = array('paid', 'cancelled', 'waiting of payment');

    return [
        'users_id' => $faker->randomElement($users_id),
        'payment_vouchers_id' => $faker->randomElement($payment_vouchers_id),
        'status' => $faker->randomElement($status),
    ];
});
