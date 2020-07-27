<?php

namespace Sindria\Models\Marketplace

use Sindria\Models\Base\Marketplace;

class CustomerOrganization extends Marketplace
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
}
