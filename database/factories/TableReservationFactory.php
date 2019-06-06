<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\TableReservation::class, function (Faker $faker) {
	$reservation_id = DB::table('reservations')->select('id')->get();
	$table_id = DB::table('tables')->select('id')->get();

    return [
        'reservations_id' => $reservation_id->random()->id,
        'tables_id' => $table_id->random()->id,
    ];
});
