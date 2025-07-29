<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// app/Models/Order.php
class Order extends Model
{
    protected $fillable = ['user_id', 'name', 'address', 'phone', 'payment_method', 'total'];

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}
