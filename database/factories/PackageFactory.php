<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Illuminate\Support\Str;
use Sindria\Models\Zero\Package;
use Faker\Generator as Faker;

$factory->define(Package::class, function (Faker $faker) {
    $prices = [
        100000,
        125000,
        150000,
        175000,
        200000,
        225000,
        250000,
        275000,
        300000,
    ];

    $stock_price = $prices[$faker->numberBetween(0, count($prices))];

    return [
        'id' => Str::uuid(),
        'name' => $faker->colorName,
        'price' => $stock_price,
        'total_stock_price' => $prices[$faker->numberBetween(0, count($prices))] * $faker->numberBetween(50, 70),
        'sell_price' => $stock_price * 1.25,
        'base_shipping_fee' => $stock_price * 0.1,
        'stock' => $faker->numberBetween(15, 30),
    ];
});
