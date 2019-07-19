<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Faker\Generator as Faker;

$factory->define(User::class, function (Faker $faker) {

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$3vr4OQi4SA323QMZaPJxm.Xy6eXz4zVbLIvix4S6lGknzU8.HAe96',
        'phone_number' => $faker->phoneNumber,
        'address' => $faker->address,
        'role_id' => $faker->numberBetween($min = 1, $max = 3),
        'avatar' => 'https://placeimg.com/1000/1000/people'
    ];
});
