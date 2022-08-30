<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReturnMedicineItem extends Model
{
    use HasFactory;

    protected $fillable=[
        'return_medicine_id',
        'medicine_id',
        'price',
        'quantity',
        'total',
    ];

    public function returnmedicine()
    {
    return $this->belongsTo(ReturnMedicine::class);
    }

    public function medicine()
    {
    return $this->belongsTo(Medicine::class);
    }

}
