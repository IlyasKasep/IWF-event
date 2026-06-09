<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'order_code',
        'name',
        'email',
        'phone',
        'quantity',
        'ticket_price',
        'total_amount',
        'payment_status',
        'snap_token',
        'ticket_code',
        'checked_in_at',
    ];

    protected $casts = [
        'checked_in_at' => 'datetime',
    ];
}