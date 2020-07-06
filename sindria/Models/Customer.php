<?php

namespace Sindria\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
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
        return $this->belongsTo('Sindria\Models\User');
    }
}
