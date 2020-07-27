<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Sindria\Models\Marketplace\UserAccount;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(UserAccount::class, function (Faker $faker) {
    return [
        'id' => Str::uuid(),
        'user_type_id' => 1,
        'username' => $faker->userName,
        'email_address' => $faker->unique()->safeEmail,
        'password' => 'rahasia', // password
        'phone_number' => $faker->phoneNumber,
        'remember_token' => Str::random(10),
    ];
});
