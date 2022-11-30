<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCollection extends Model
{
    use HasFactory;

    public function products(){
        return $this->belongsToMany(Products::class,'product_with_collection');
    }

}
