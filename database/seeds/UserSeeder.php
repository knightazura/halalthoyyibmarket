<?php

use Illuminate\Database\Seeder;
use Sindria\Models\Customer;
use Sindria\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 10)->create()->each(function ($user) {
            $user->customer()->save(factory(Customer::class)->make());
        });
    }
}
