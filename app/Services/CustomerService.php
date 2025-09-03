<?php

namespace App\Services;

use App\Models\Customer;

use InvalidArgumentException;

class CustomerService
{
    public function create(array $data): Customer
    {
        return Customer::create($data);
    }

    public function addPoints(Customer $customer, float $amount): int
    {
        if ($amount < 5) {
            throw new InvalidArgumentException('Insufficient amount to generate points.');
        }

        $points = intdiv(floor($amount), 5);

        $customer->points_balance += $points;
        $customer->save();

        return $points;
    }
}
