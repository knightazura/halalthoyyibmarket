<?php

use Illuminate\Database\Seeder;
use Sindria\Models\Zero\Address;
use Sindria\Models\Zero\Storage;
use Sindria\Models\Zero\Supplier;

class AddressTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Address::class, 5)->create()->each(function ($address) {
            // Storages
            $address->storage()->save(factory(Storage::class)->make());
            // Suppliers
            $address->supplier()->save(factory(Supplier::class)->make());
        });
    }
}
