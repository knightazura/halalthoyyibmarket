<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use Sindria\Models\Zero\Product;
use Sindria\Models\Zero\ProductCategory;
use Illuminate\Support\Str;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'id' => Str::uuid(),
        'name' => $faker->lastName,
        'category_id' => mt_rand(1, 10),
        'sell_price' => mt_rand(10000, 100000),
        'stock' => 0
    ];
});
