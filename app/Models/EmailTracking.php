<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Enums\EmailStatus;

class EmailTracking extends Model
{
    protected $fillable = [
        'customer_id',
        'email',
        'type',
        'status',
        'meta',
        'sent_at',
    ];

    protected $casts = [
        'meta' => 'array',
        'sent_at' => 'datetime',
        'status' => EmailStatus::class,
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
