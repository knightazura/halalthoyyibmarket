<?php

namespace Sindria\Models\Marketplace;

use Illuminate\Support\Str;
use Sindria\Models\Base\Marketplace;
use Sindria\Models\Zero\Package;

class Customer extends Marketplace
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

    protected $guarded = [];

    /**
     * ************************************
     * !!    Relationships start here    !!
     * ************************************
     */

    /**
     * The user only bind to one customer
     */
    public function user()
    {
        return $this->belongsTo('Sindria\Models\Marketplace\UserAccount');
    }

    /**
     * Customer's shopping cart
     */
    public function shoppingCart()
    {
        return $this->hasOne('Sindria\Models\Marketplace\ShoppingCart');
    }

    public function addToShoppingCart(Package $package)
    {
        $this->shoppingCart()->create([
            'id' => Str::uuid(),
            'protect_code' => Str::uuid(),
            'package_id' => $package->id,
            'quantity' => 1,
            'quote_code' => Str::uuid()
        ]);
    }
}
