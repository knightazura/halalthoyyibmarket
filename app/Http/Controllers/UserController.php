<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Base\ResourcesController;
use Illuminate\Http\Request;

class UserController extends ResourcesController
{
    public function index()
    {
        $users = $this->repository->all();

        return response()->json($users->first());
    }
}
