<?php

namespace Sindria\Repositories;

use App\Contracts\RepositoryInterface;
use Sindria\Models\User;

class UserRepository implements RepositoryInterface
{
    public function all()
    {
        return User::all();
    }

    public function show($id)
    {
        return User::findOrFail($id);
    }
}