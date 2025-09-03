<?php

namespace App\Http\Resources\Customers;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RewardRedemptionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'reward' => [
                'id' => $this->reward->id,
                'name' => $this->reward->name,
                'points' => $this->reward->points,
            ],
            'points_balance' => $this->customer->points_balance,
        ];
    }
}
