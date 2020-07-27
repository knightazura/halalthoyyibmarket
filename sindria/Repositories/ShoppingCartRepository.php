<?php

namespace Sindria\Repositories;

use Sindria\Models\Marketplace\ShoppingCart;

class ShoppingCartRepository
{
    public function store($payload)
    {
        ShoppingCart::create($payload);
    }
}