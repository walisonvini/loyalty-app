<?php

namespace App\Services;

use App\Models\Customer;
use App\Models\Reward;
use App\Models\RewardRedemption;

use Illuminate\Support\Collection;

use App\Jobs\SendCustomerPointsEmailJob;
use App\Jobs\SendCustomerRewardEmailJob;

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
        
        if (!$customer) {
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

        $customer->increment('points_balance', $points);

        SendCustomerPointsEmailJob::dispatch($customer->name, $customer->email, $points)
            ->onQueue('emails');

        return $points;
    }

    public function redeemReward(Customer $customer, Reward $reward): RewardRedemption
    {
        if ($customer->points_balance < $reward->points) {
            throw new Exception('Insufficient balance to redeem reward');
        }
    
        $redemption = $customer->redemptions()->create([
            'reward_id' => $reward->id,
        ]);
    
        $customer->decrement('points_balance', $reward->points);

        SendCustomerRewardEmailJob::dispatch($customer->name, $customer->email, $reward->name)
            ->onQueue('emails');
    
        return $redemption;
    }    
}
