<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Sindria\Models\Zero\Address;

class StorageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $storage_names = [
            'Jakarta Utara',
            'Jakarta Timur',
            'Jakarta Barat',
            'Jakarta Pusat',
            'Jakarta Selatan',
            'Tangerang'
        ];

        factory(Address::class, count($storage_names))->create()->each(function ($address, $key) use ($storage_names) {
            DB::connection('zero')->table('storages')->insert([
                'id' => Str::uuid(),
                'address_id' => $address->id,
                'name' => 'Gudang ' . $storage_names[$key]
            ]);
        });
    }
}
