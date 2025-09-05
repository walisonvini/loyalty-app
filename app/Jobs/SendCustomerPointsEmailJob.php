<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;

use Illuminate\Contracts\Queue\ShouldQueue;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

use Illuminate\Support\Facades\Mail;

use App\Mail\CustomerPointsEarned;

use Illuminate\Foundation\Bus\Dispatchable;

use App\Services\EmailTrackingService;

use App\Models\Customer;

class SendCustomerPointsEmailJob implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels, Dispatchable;

    public $customer;
    public $points;

    public function __construct(Customer $customer, int $points)
    {
        $this->customer = $customer;
        $this->points = $points;
    }

    public function handle(EmailTrackingService $tracking)
    {
        try {
            Mail::to($this->customer->email)
            ->send(new CustomerPointsEarned($this->customer->name, $this->points));

            $tracking->log($this->customer, 'points_earned', 'sent', [
                'points' => $this->points
            ]);
        } catch (\Exception $e) {
            $tracking->log($this->customer, 'points_earned', 'failed', [
                'error' => $e->getMessage(),
            ]);
        }
    }
}
