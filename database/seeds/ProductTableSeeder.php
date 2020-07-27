<?php

use Illuminate\Database\Seeder;
use Sindria\Models\Zero\Product;
use Sindria\Models\Zero\ProductDetail;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Product::class, 10)->create()->each(function ($product) {
            $product->detail()->save(factory(ProductDetail::class)->make());
        });
    }
}
