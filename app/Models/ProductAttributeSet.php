<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductAttributeSet extends Model
{
    use HasFactory;

    protected $guarded = [];

    function attribute(){
        return $this->hasMany(ProductAttribute::class,'attribute_set_id');
    }

}
