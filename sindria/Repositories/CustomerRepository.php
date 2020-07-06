<?php

namespace Sindria\Repositories;

use App\Contracts\RepositoryInterface;
use Illuminate\Support\Str;
use Sindria\Models\Customer;

class CustomerRepository implements RepositoryInterface
{
    protected $fillable = [
        'user_id',
        'nama_depan',
        'nama_belakang'
    ];

    public function all()
    {
        return Customer::all();
    }

    public function show($id)
    {
        return Customer::findOrFail($id);
    }
    
    public function store($payload)
    {
        $new_customer = new Customer();

        // Populate data
        $new_customer->id = Str::uuid();
        foreach ($this->fillable as $column_name) {
            if (isset($payload[$column_name]))
                $new_customer->$column_name = $payload[$column_name];
        }

        $new_customer->save();

        return $new_customer;
    }
}