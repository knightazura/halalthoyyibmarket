<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use Sindria\Models\Zero\ProductCategory;

$factory->define(ProductCategory::class, function (Faker $faker) {
    return [
        'name' => $faker->colorName
    ];
});
