<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Faker\Generator as Faker;

$factory->define(User::class, function (Faker $faker) {

	$role_id = DB::table('roles')->select('id')->get();

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        //'email_verified_at' => $faker->dateTime($max = 'now', $timezone = null),
        'password' => Hash::make($faker->unique()->password),
        'phone_number' => $faker->phoneNumber,
        'address' => $faker->address,
        'role_id' => $role_id->random()->id,
    ];
});
