<?php

namespace App\Contracts;

interface RequestValidatorInterface
{
    public function authorize();
  
    public function rules();
}