<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalePerson extends Model
{
    use HasFactory;

    protected $fillable=[
    'name',
    ];

    public function sale()
    {
     return $this->hasOne(Sale::class,'id');
    }

    public function returnmedicine()
    {
     return $this->hasOne(ReturnMedicine::class,'id');
    }
}
