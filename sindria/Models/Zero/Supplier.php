<?php

namespace Sindria\Models\Zero;

use Sindria\Models\Base\Zero;

class Supplier extends Zero
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

    public function addresses()
    {
        return $this->belongsToMany('Sindria\Models\Zero\Address', 'supplier_addresses');
    }

    public function products()
    {
        return $this->belongsTo('Sindria\Models\Zero\Product');
    }

    public function productDetail()
    {
        return $this->hasMany('Sindria\Models\Zero\ProductDetail');
    }

    public function returnedProducts()
    {
        return $this->hasMany('Sindria\Models\Zero\ProductReturn');
    }
}
