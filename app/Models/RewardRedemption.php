<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RewardRedemption extends Model
{
    protected $fillable = [
        'customer_id',
        'reward_id',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function reward()
    {
        return $this->belongsTo(Reward::class);
    }
}
