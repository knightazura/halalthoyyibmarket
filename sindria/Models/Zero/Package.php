<?php

namespace Sindria\Models\Zero;

use Sindria\Models\Base\Zero;

class Package extends Zero
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

    public function products()
    {
        return $this->hasMany('Sindria\Models\Zero\Product', 'product_packages');
    }
}
