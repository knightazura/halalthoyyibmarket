<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use Sindria\Models\Zero\Supplier;
use Illuminate\Support\Str;

$factory->define(Supplier::class, function (Faker $faker) {
    return [
        'id' => Str::uuid(),
        'name' => $faker->company
    ];
});
