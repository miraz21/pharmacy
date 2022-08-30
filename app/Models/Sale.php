<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $fillable=[
        'customer_id',
        // 'saleperson_id',
        'medicine_id',
        'quantity',
        'amount',
        'subtotal',
        'discount',
        ];

        public function customer()
        {
            return $this->belongsTo(Customer::class,);
        }

        public function medicine()
        {
            return $this->belongsTo(Medicine::class,);
        }
}
