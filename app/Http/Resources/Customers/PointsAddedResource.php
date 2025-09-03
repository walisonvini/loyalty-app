<?php

namespace App\Http\Resources\Customers;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PointsAddedResource extends JsonResource
{
    private int $pointsAdded;

    public function __construct($resource, int $pointsAdded = 0)
    {
        parent::__construct($resource);
        $this->pointsAdded = $pointsAdded;
    }

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'customer_id' => $this->id,
            'points_added' => $this->pointsAdded,
            'total_points' => $this->points_balance,
        ];
    }
}
