<?php

namespace Sindria\Models\Zero;

use Sindria\Models\Base\Zero;

class HistoryProductPrice extends Zero
{
    public function product()
    {
        return $this->belongsTo('Sindria\Models\Zero\Product');
    }
}
