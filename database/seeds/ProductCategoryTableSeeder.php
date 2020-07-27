<?php

use Illuminate\Database\Seeder;
use Sindria\Models\Zero\ProductCategory;

class ProductCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(ProductCategory::class, 10)->create();
    }
}
