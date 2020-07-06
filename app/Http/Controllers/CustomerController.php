<?php

namespace App\Http\Controllers;

use App\Contracts\RepositoryInterface;
use App\Http\Controllers\Base\ResourcesController;

class CustomerController extends ResourcesController
{
    protected $returnedView = [
        'store' => 'pages.Customer.custom-index',
        // 'show' => 'pages.Customer.custom-show'
    ];

    public function __construct(RepositoryInterface $repository)
    {
        $this->repository = $repository;
    }
}
