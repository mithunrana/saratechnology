<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reviews extends Model
{
    use HasFactory;

    public function Customer(){ 
        return $this->belongsTo(Customer::class,'customer_id');
    }

    public static function reviewPercent($value){
       return (($value/5)*100);
    }

    public function Product(){ 
        return $this->belongsTo(Products::class,'product_id');
    }



}
