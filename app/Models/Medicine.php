<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    use HasFactory;

    protected $fillable=[
    'name',
    'price',
    'quantity',
    ];

    public function buymedicine()
    {
        return $this->belongsTo(BuyMedicine::class, 'medicine_id');
    }


    public function returnmedicine()
    {
     return $this->hasOne(ReturnMedicine::class,'id');
    }

    public function orderitem()
    {
     return $this->hasOne(OrderItem::class,'id');
    }

    
    public function returnmedicineitem()
    {
     return $this->hasOne(ReturnMedicineItem::class,'id');
    }
}
