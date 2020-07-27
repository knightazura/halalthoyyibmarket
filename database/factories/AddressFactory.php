<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use Sindria\Models\Zero\Address;
use Illuminate\Support\Str;

$factory->define(Address::class, function (Faker $faker) {
    return [
        'id' => Str::uuid(),
        'street_name' => $faker->streetAddress,
        'subdistrict' => $faker->country,
        'city' => $faker->city,
        'province' => $faker->state,
        'zipcode' => $faker->postcode,
        'country_code' => $faker->countryCode,
        // 'map_location' => $faker->latitude . "," . $faker->longitude,
    ];
});
