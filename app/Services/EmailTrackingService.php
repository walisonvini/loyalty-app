<?php

namespace App\Services;

use App\Models\Customer;
use App\Models\EmailTracking;

use Illuminate\Support\Carbon;

class EmailTrackingService
{
    public function log(Customer $customer, string $type, string $status, array $meta = []): EmailTracking
    {
        return EmailTracking::create([
            'customer_id' => $customer->id,
            'email'       => $customer->email,
            'type'        => $type,
            'status'      => $status,
            'meta'        => $meta,
            'sent_at'     => $status === 'sent' ? now() : null,
        ]);
    }

    public function alreadySentToday(Customer $customer, string $type): bool
    {
        return EmailTracking::where('customer_id', $customer->id)
            ->where('type', $type)
            ->whereDate('sent_at', Carbon::today())
            ->where('status', 'sent')
            ->exists();
    }
}
