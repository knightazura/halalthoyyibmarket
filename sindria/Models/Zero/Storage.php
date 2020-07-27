<?php

namespace Sindria\Models\Zero;

use Sindria\Models\Base\Zero;

class Storage extends Zero
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

    public function address()
    {
        return $this->belongsTo('Sindria\Models\Zero\Address');
    }

    public function productDetail()
    {
        return $this->hasMany('Sindria\Models\Zero\ProductDetail');
    }

    public function productStocks()
    {
        return $this->hasMany('Sindria\Models\Zero\ProductStock');
    }
}
