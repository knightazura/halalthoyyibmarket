<?php

namespace Sindria\Models\Zero;

use Sindria\Models\Base\Zero;

class ProductReturn extends Zero
{
    public function supplier()
    {
        return $this->belongsTo('Sindria\Models\Zero\Supplier');
    }

    public function productDetail()
    {
        return $this->belongsTo('Sindria\Models\Zero\ProductDetail');
    }
}
