<?php
// app/Models/Order.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'product',
        'quantity',
        'order_code',
        'items' 
    ];

    protected $casts = [
        'items' => 'array'
    ];
}