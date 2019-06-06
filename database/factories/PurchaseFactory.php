<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Purchase::class, function (Faker $faker) {
	$users_id = DB::table('users')->select('id')->get();
    $payment_vouchers_id = DB::table('payment_vouchers')->select('id')->get();

    return [
        'users_id' => $users_id->random()->id,
        'payment_vouchers_id' => $payment_vouchers_id->random()->id,
        'status' => $faker->numberBetween($min=0, $max=2),
    ];
});