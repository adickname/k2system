<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    public function orderItems(): HasMany
    {

        return $this->hasMany(OrderItem::class);
    }
}
