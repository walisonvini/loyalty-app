<?php

namespace App\Services;

use App\Models\Customer;

class CustomerService
{
    public function create(array $data): Customer
    {
        return Customer::create($data);
    }
}
