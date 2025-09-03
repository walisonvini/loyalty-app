<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;

use Illuminate\Contracts\Queue\ShouldQueue;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

use Illuminate\Support\Facades\Mail;

use App\Mail\CustomerPointsEarned;

use Illuminate\Foundation\Bus\Dispatchable;

class SendCustomerPointsEmailJob implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels, Dispatchable;

    public $customerName;
    public $customerEmail;
    public $points;

    public function __construct(string $customerName, string $customerEmail, int $points)
    {
        $this->customerName = $customerName;
        $this->customerEmail = $customerEmail;
        $this->points = $points;
    }

    public function handle()
    {
        Mail::to($this->customerEmail)
            ->send(new CustomerPointsEarned($this->customerName, $this->points));
    }
}
