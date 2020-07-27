<?php

namespace Sindria\Models\Zero;

use Sindria\Models\Base\Zero;

class Product extends Zero
{
    /**
     * The attribute that mark primary ID isn't an integer value.
     * 
     * @var boolean
     */
    public $incrementing = false;

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'string',
    ];

/*
|--------------------------------------------------------------------------
| RELATIONSHIPS
|--------------------------------------------------------------------------
*/

    /**
     * Categories of product
     * One-to-Many
     */
    public function categories()
    {
        return $this->hasMany('Sindria\Models\Zero\ProductCategory', 'product_category_pivots');
    }

    /**
     * Package that contain this product
     * One-to-Many
     */
    public function onPackages()
    {
        return $this->hasMany('Sindria\Models\Zero\Package', 'product_packages');
    }

    /**
     * Product's detail
     * One-to-One
     */
    public function detail()
    {
        return $this->hasMany('Sindria\Models\Zero\ProductDetail');
    }

    /**
     * Price history of product
     * One-to-Many
     */
    public function priceHistory()
    {
        return $this->hasMany('Sindria\Models\Zero\HistoryProductPrice');
    }
}
