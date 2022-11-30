<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    public function Product(){ 
        return $this->belongsTo(Products::class,'product_id');
    }
}
