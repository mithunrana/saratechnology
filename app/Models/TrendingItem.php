<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrendingItem extends Model
{
    use HasFactory;

    public function product(){
            return $this->belongsTo(Products::class,'products_id');
    } 
}
