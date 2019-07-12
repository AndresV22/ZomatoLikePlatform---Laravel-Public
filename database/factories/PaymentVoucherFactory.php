<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\PaymentVoucher::class, function (Faker $faker) {
	$payment_method_id = DB::table('payment_methods')->select('id')->get();

    return [
        'payment_method_id' => $payment_method_id->random()->id,
        'amount' => $faker->numberBetween($min = 1000, $max = 20000),
        'date' => $faker->dateTimeBetween($startDate = '2019-03-25', $endDate = 'now'),
        'detail' => $faker->text($maxNbChars = 35),
        'status' => $faker->numberBetween($min = 0, $max = 2),
        'delivery' => $faker->boolean(),
    ];
});
