<?php

namespace App\Http\Resources\Customers;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RedemptionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'reward_id'    => $this->reward_id,
            'name'         => $this->reward->name,
            'points_spent' => $this->reward->points,
            'redeemed_at'  => $this->created_at->toISOString(),
        ];
    }
}
