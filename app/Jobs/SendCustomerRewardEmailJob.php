<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use App\Mail\CustomerRewardRedeemed;

class SendCustomerRewardEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $customerName;
    public $customerEmail;
    public $rewardName;

    public function __construct(string $customerName, string $customerEmail, string $rewardName)
    {
        $this->customerName = $customerName;
        $this->customerEmail = $customerEmail;
        $this->rewardName = $rewardName;
    }

    public function handle()
    {
        Mail::to($this->customerEmail)
            ->send(new CustomerRewardRedeemed($this->customerName, $this->rewardName));
    }
}
