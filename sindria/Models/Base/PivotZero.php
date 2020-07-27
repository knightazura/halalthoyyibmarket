<?php

namespace Sindria\Models\Base;

use Illuminate\Database\Eloquent\Relations\Pivot;

class PivotZero extends Pivot
{
    /**
     * The connection name for the model.
     *
     * @var string|null
     */
    protected $connection = 'zero';
}