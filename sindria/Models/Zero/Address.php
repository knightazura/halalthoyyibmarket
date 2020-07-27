<?php

namespace Sindria\Models\Zero;

use Sindria\Models\Base\Zero;

class Address extends Zero
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

    public function supplier()
    {
        return $this->hasOne('Sindria\Models\Zero\Supplier');
    }
    
    public function storage()
    {
        return $this->hasOne('Sindria\Models\Zero\Storage');
    }

    public function supplier()
    {
        return $this->belongsToMany('Sindria\Models\Zero\Supplier', 'supplier_addresses');
    }
}
