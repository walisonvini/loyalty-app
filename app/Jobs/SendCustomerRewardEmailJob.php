<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use App\Mail\CustomerRewardRedeemed;
use App\Models\Customer;
use App\Services\EmailTrackingService;

class SendCustomerRewardEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $customer;
    public $rewardName;

    public function __construct(Customer $customer, string $rewardName)
    {
        $this->customer = $customer;
        $this->rewardName = $rewardName;
    }

    public function handle(EmailTrackingService $tracking)
    {
        try {
            Mail::to($this->customer->email)
            ->send(new CustomerRewardRedeemed($this->customer->name, $this->rewardName));

            $tracking->log($this->customer, 'reward_redeemed', 'sent', [
                'reward_name' => $this->rewardName
            ]);
        } catch (\Exception $e) {
            $tracking->log($this->customer, 'reward_redeemed', 'failed', [
                'error' => $e->getMessage(),
            ]);
        }
    }
}
