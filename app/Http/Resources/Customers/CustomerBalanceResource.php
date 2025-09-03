<?php

namespace App\Http\Resources\Customers;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CustomerBalanceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'customer_id'    => $this->id,
            'points_balance' => $this->points_balance,
            'redemptions'    => RedemptionResource::collection($this->whenLoaded('redemptions')),
        ];
    }
}
