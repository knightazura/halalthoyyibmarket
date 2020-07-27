<?php

namespace Sindria\Models\Zero;

use Sindria\Models\Base\Zero;

class ProductStock extends Zero
{
    public function productDetail()
    {
        return $this->belongsTo('Sindria\Models\Zero\ProductDetail');
    }

    public function storage()
    {
        return $this->belongsTo('Sindria\Models\Zero\Storage');
    }
}
