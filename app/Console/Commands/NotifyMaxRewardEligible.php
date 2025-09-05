<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Customer;
use App\Models\Reward;
use App\Jobs\SendMaxRewardEligibleEmailJob;

class NotifyMaxRewardEligible extends Command
{
    protected $signature = 'loyalty:notify-max-reward-eligible';
    protected $description = 'Send email to customers eligible for the maximum reward';

    public function handle()
    {
        $maxReward = Reward::orderByDesc('points')->first();

        if (!$maxReward) {
            $this->warn('No rewards registered');
            return;
        }

        $customers = Customer::where('points_balance', '>=', $maxReward->points)->get();

        if ($customers->isEmpty()) {
            $this->info('No customers are eligible today');
            return;
        }

        foreach ($customers as $customer) {
            SendMaxRewardEligibleEmailJob::dispatch($customer, $maxReward)
                ->onQueue('emails');
        }

        $this->info("Queued {$customers->count()} emails.");
    }
}

