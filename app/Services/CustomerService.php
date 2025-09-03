<?php

namespace App\Services;

use App\Models\Customer;

use Illuminate\Support\Collection;

use InvalidArgumentException;

class CustomerService
{
    public function create(array $data): Customer
    {
        return Customer::create($data);
    }

    public function find(string $id): Customer
    {
        $customer = Customer::find($id);

        if(!$customer)
        {
            throw new InvalidArgumentException('Customer not found');
        }

        return $customer;
    }

    public function search(string | int $query): Collection
    {
        $customer = Customer::where(function($q) use ($query) {
            if (is_numeric($query)) {
                $q->where('id', $query)
                  ->orWhere('cpf', $query);
            } else {
                $q->where('email', $query)
                  ->orWhere('cpf', $query);
            }
        })->get();

        if($customer->isEmpty())
        {
            throw new InvalidArgumentException('Customer not found with the provided criteria');
        }

        return $customer;
    }

    public function addPoints(Customer $customer, float $amount): int
    {
        if ($amount < 5) {
            throw new InvalidArgumentException('Insufficient amount to generate points');
        }

        $points = intdiv(floor($amount), 5);

        $customer->points_balance += $points;
        $customer->save();

        return $points;
    }
}
