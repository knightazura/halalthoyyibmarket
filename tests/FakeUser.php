<?php


namespace Tests;


use Sindria\Models\Marketplace\Customer;
use Sindria\Models\Marketplace\UserAccount;

trait FakeUser
{
    protected $user;

    protected $customer;

    protected function fakeUser()
    {
        $this->user = factory(UserAccount::class)->make();

        return $this->user;
    }

    protected function fakeCustomer()
    {
        if(is_null($this->user)) {
            $this->fakeUser();
        }

        $this->customer = $this->user->customer()->save(factory(Customer::class)->make());

        return $this->customer;
    }
}