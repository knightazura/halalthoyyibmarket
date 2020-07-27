<?php

namespace Sindria\Models\Zero;

use Sindria\Models\Base\Zero;

class ProductDetail extends Zero
{
    public function product()
    {
        return $this->belongsTo('Sindria\Models\Zero\Product');
    }

    public function stock()
    {
        return $this->hasOne('Sindria\Models\Zero\ProductStock');
    }

    public function returned()
    {
        return $this->hasMany('Sindria\Models\Zero\ProductReturn');
    }

    public function storage()
    {
        return $this->belongsTo('Sindria\Models\Zero\Storage');
    }

    public function supplier()
    {
        return $this->belongsTo('Sindria\Models\Zero\Supplier');
    }
}
