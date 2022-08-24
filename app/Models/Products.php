<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    public function tag(){
        return $this->belongsToMany(ProductTags::class,'products_product_tags');
    }
}
