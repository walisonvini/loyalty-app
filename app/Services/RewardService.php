<?php

namespace App\Services;

use App\Models\Reward;

use Exception;

class RewardService
{
    public function find(string $id): Reward
    {
        $reward = Reward::find($id);

        if(!$reward)
        {
            throw new Exception('Reward not found');
        }

        return $reward;
    }
}
