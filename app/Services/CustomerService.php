<?php

namespace App\Services;

use App\Models\Customer;
use App\Models\Reward;

use Illuminate\Support\Collection;

use Exception;

class CustomerService
{
    public function create(array $data): Customer
    {
        return Customer::create($data);
    }

    public function all(): Collection
    {
        return Customer::all();
    }

    public function find(string $id): Customer
    {
        $customer = Customer::find($id);

        if(!$customer)
        {
            throw new Exception('Customer not found');
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
            throw new Exception('Customer not found with the provided criteria');
        }

        return $customer;
    }

    public function addPoints(Customer $customer, float $amount): int
    {
        if ($amount < 5) {
            throw new Exception('Insufficient amount to generate points');
        }

        $points = intdiv(floor($amount), 5);

        $customer->points_balance += $points;
        $customer->save();

        return $points;
    }

    public function redeemReward(Customer $customer, int $rewardId)
    {
        $reward = Reward::findOrFail($rewardId);
    
        if ($customer->points_balance < $reward->points) {
            throw new Exception('Insufficient balance to redeem reward');
        }
    
        $redemption = $customer->redemptions()->create([
            'reward_id' => $reward->id,
        ]);
    
        $customer->decrement('points_balance', $reward->points);
    
        return $redemption;
    }    
}
