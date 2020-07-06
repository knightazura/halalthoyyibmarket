<?php

namespace App\Http\Controllers;

use App\Contracts\RepositoryInterface;
use App\Http\Controllers\Base\ResourcesController;

class CustomerController extends ResourcesController
{
    public function __construct(RepositoryInterface $repository)
    {
        $this->repository = $repository;

        $this->setReturnView('index', 'pages.Customer.custom-index');
    }
}
