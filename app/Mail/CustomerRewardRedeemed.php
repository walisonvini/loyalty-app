<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CustomerRewardRedeemed extends Mailable
{
    use Queueable, SerializesModels;

    public $customerName;
    public $rewardName;

    public function __construct(string $customerName, string $rewardName)
    {
        $this->customerName = $customerName;
        $this->rewardName = $rewardName;
    }

    public function build()
    {
        return $this->subject('Você resgatou um prêmio!')
                    ->view('emails.customer_reward_redeemed');
    }
}
