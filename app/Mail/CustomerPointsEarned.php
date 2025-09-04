<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CustomerPointsEarned extends Mailable
{
    use Queueable, SerializesModels;

    public int $points;
    public string $customerName;

    public function __construct(string $customerName, int $points)
    {
        $this->customerName = $customerName;
        $this->points = $points;
    }

    public function build()
    {
        return $this->subject('Você ganhou pontos!')
                    ->view('emails.points_earned');
    }

}
