<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Subscription extends Model
{
    use HasFactory;

    protected $fillable= [
        'user_id',
        'customer_id',
        'amount',
        'subscription_id',
        'plan_id',
        'start_at',
        'total_count',
        'status',
        'paid_count',
        'charge_at',
        'short_url'
    ];

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

}
