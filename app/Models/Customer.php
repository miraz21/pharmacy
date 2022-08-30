<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'age',
    ];

    public function returnmedicine()
    {
     return $this->hasOne(ReturnMedicine::class,'id');
    }

    public function order()
    {
     return $this->hasOne(Order::class,'id');
    }

}
