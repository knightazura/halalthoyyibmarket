<?php

namespace App\Contracts;

interface RepositoryInterface
{
    public function all();

    public function show($id);
}