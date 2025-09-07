<?php
namespace App\Jobs;

use App\Mail\MaxRewardEligibleMail;
use App\Models\Customer;
use App\Models\Reward;
use App\Services\EmailTrackingService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Enums\EmailStatus;

class SendMaxRewardEligibleEmailJob implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels, Dispatchable;

    public Customer $customer;
    public Reward $reward;

    public function __construct(Customer $customer, Reward $reward)
    {
        $this->customer = $customer;
        $this->reward   = $reward;
    }

    public function handle(EmailTrackingService $tracking)
    {
        if ($tracking->alreadySentToday($this->customer, 'max_reward_eligible')) {
            return;
        }

        try {
            Mail::to($this->customer->email)
                ->send(new MaxRewardEligibleMail($this->customer->name, $this->reward->name));

            $tracking->log($this->customer, 'max_reward_eligible', EmailStatus::Sent, [
                'reward' => $this->reward->name,
            ]);
        } catch (\Exception $e) {
            $tracking->log($this->customer, 'max_reward_eligible', EmailStatus::Failed, [
                'error' => $e->getMessage(),
            ]);
        }
    }
}

