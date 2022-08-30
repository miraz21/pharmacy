<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable=[
        'order_id',
        'medicine_id',
        'price',
        'quantity',
        'total',
        ];

        public function medicine()
        {
        return $this->belongsTo(Medicine::class);
        }

        public function order()
        {
        return $this->belongsTo(Order::class);
        }
}
