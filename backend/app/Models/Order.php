<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'session_id',
        'payment_id',
        'amount',
        'currency',
        'payment_status',
        'items',
    ];
}
