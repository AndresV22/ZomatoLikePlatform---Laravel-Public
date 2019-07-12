<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Purchase::class, function (Faker $faker) {
	$user_id = DB::table('users')->select('id')->get();
    $payment_voucher_id = DB::table('payment_vouchers')->select('id')->get();

    return [
        'user_id' => $user_id->random()->id,
        'payment_voucher_id' => $payment_voucher_id->random()->id,
        'status' => $faker->numberBetween($min=0, $max=2),
    ];
});