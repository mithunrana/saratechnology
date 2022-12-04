<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;

    protected $guarded = [];



    public function parentCategory(){
        return $this->belongsTo(ProductCategory::class,'parent_id');
    }

    public function subCategory(){
        return $this->hasMany(ProductCategory::class,'parent_id');
    }

    public function childItems(){
        return $this->hasMany(ProductCategory::class,'parent_id')->with('subCategory');
    }

    public function products(){
        return $this->belongsToMany(Products::class,'product_with_category');
    }

}
