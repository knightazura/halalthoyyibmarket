<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            // AddressTableSeeder::class,
            // ProductCategoryTableSeeder::class,
            // SupplierTableSeeder::class,
            // ProductTableSeeder::class,
        ]);
    }
}
