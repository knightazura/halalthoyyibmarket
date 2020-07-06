<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Sindria\Models\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(User::class, function (Faker $faker) {
    return [
        'id' => Str::uuid(),
        'active' => true,
        'username' => $faker->userName,
        'email' => $faker->unique()->safeEmail,
        'phonenumber' => $faker->phoneNumber,
        'email_verified_at' => now(),
        'password' => 'rahasia', // password
        'remember_token' => Str::random(10),
    ];
});
