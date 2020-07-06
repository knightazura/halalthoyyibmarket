<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use Sindria\Models\Customer;
use Illuminate\Support\Str;

$factory->define(Customer::class, function (Faker $faker) {
    return [
        'id' => Str::uuid(),
        'nama_depan' => $faker->firstName,
        'nama_belakang' => $faker->lastName
    ];
});
