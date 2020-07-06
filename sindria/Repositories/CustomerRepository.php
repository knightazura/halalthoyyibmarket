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
        return $this->getCustomer($id);
    }
    
    public function store($payload)
    {
        $new_customer = new Customer();

        // Populate data and store
        $this->populateData($new_customer, $payload);
        $new_customer->id = Str::uuid();
        $new_customer->save();

        return $new_customer;
    }

    public function update($id, $payload)
    {
        $customer = $this->getCustomer($id);
        
        // Populate new data and update
        $this->populateData($customer, $payload);
        $customer->save();

        return $customer;
    }

    public function delete($id)
    {
        # code...
    }

    public function getCustomer($id)
    {
        return Customer::findOrFail($id);
    }

    private function populateData($customer, $payload)
    {
        foreach ($this->fillable as $column_name) {
            if (isset($payload[$column_name]))
                $customer->$column_name = $payload[$column_name];
        }
    }
}