<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVariation extends Model
{
    use HasFactory;

    public function attribute(){
        return $this->belongsToMany(ProductAttribute::class,'variation_with_attribute')->orderBy('id', 'ASC');
    }

    

}
