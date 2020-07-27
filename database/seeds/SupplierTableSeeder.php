<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;
use Sindria\Models\Zero\Address;
use Sindria\Models\Zero\Supplier;

class SupplierTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        factory(Address::class, 12)->create()->each(function ($address) use ($faker) {
            $address->supplier()->save(factory(Supplier::class)->make());
        });
    }
}
