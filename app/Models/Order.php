<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    //public $timestamps = false;

    public function setAddressAttribute($value)
    {
        return $this->attributes['address'] = $value." 425107";
    }

    
}
