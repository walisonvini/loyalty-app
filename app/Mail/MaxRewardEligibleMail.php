<?php

namespace App\Mail;

use App\Models\Customer;
use App\Models\Reward;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MaxRewardEligibleMail extends Mailable
{
    use Queueable, SerializesModels;

    public $customerName;
    public $rewardName;

    public function __construct(string $customerName, string $rewardName)
    {
        $this->customerName = $customerName;
        $this->rewardName   = $rewardName;
    }

    public function build()
    {
        return $this->subject('🎁 Você já pode resgatar o prêmio máximo!')
            ->view('emails.max_reward_eligible');
    }
}

