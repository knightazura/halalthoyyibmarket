<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use Illuminate\Support\Str;
use Sindria\Models\Zero\ProductDetail;
use Sindria\Models\Zero\Storage;
use Sindria\Models\Zero\Supplier;

$factory->define(ProductDetail::class, function (Faker $faker) {
    $suppliers = Supplier::all();
    $storages  = Storage::all();

    for($i = 10000; $i <= 25000; $i += 500) {
        $prices[] = $i;
    }

    $total_supplier = $suppliers->count() - 1;
    $total_storages = $storages->count() - 1;

    return [
        'supplier_id' => $suppliers[mt_rand(0, $total_supplier)]->id,
        'storage_id' => $storages[mt_rand(0, $total_storages)]->id,
        'obtain_price' => collect($prices)->random(),
        'obtained_quantity' => mt_rand(1, 100),
        'obtained_at' => Carbon\Carbon::now(),
        'expiration_approximate' => Carbon\Carbon::now(),
        // 'recipient_employee_id' => Str::uuid()
    ];
});
