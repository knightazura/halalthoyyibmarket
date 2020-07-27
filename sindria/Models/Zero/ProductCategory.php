<?php

namespace Sindria\Models\Zero;

use Sindria\Models\Base\Zero;

class ProductCategory extends Zero
{
    public function products()
    {
        return $this->belongsToMany('Sindria\Models\Zero\Product', 'product_category_pivots');
    }
}
