<?php

namespace Sindria\Services\Marketplace;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Sindria\Repositories\ShoppingCartRepository;

class ShoppingCartService
{
    private $customer;

    private $shopping_cart;

    public function __construct()
    {
        if (Auth::user()) {
            $this->customer = Auth::user()->customer;
        }

        $this->shopping_cart = new ShoppingCartRepository();
    }

    public function add($package)
    {
        if (is_null($this->customer)) {
            $this->guestAdd($package);
        } else {
            $this->customerAdd($package);
        }
    }

    protected function customerAdd($package)
    {
        $payload = [
            'id' => Str::uuid(),
            'customer_id' => $this->customer->id,
            'protect_code' => Str::uuid(),
            'package_id' => $package->id,
            'quantity' => 1,
            'quote_code' => Str::uuid()
        ];

        $this->shopping_cart->store($payload);
    }

    protected function guestAdd($package)
    {
        //
    }
}