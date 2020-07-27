<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use Illuminate\Support\Str;
use Sindria\Models\Marketplace\Customer;

$factory->define(Customer::class, function (Faker $faker) {
    $gender = ["Laki-laki", "Perempuan"];
    return [
        'id' => Str::uuid(),
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'birthdate' => $faker->date(),
        'gender' => $gender[mt_rand(0, 1)],
        'organization_id' => mt_rand(1, 12)
    ];
});
