<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BuyMedicine extends Model
{
    use HasFactory;

    protected $fillable=[
    'medicine_id',
    'quantity',
    'amount',
    ];
      
    public function medicine()
    {
        return $this->belongsTo(Medicine::class);
    }

}
