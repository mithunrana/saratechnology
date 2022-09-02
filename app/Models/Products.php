<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    public function tag(){
        return $this->belongsToMany(ProductTags::class,'product_with_tags');
    }

    public function categories(){
        return $this->belongsToMany(ProductCategory::class,'product_with_category');
    }

    public function attribute(){
        return $this->belongsToMany(ProductAttribute::class,'product_with_attribute');
    }

    public function attributeSet(){
        return $this->belongsToMany(ProductAttributeSet::class,'product_with_attribute_set');
    }

    public function relatedProduct(){
        return $this->belongsToMany(Products::class,'product_with_related_product','products_id','relation_with_product_id');
    }

    public function crossSellingProduct(){
        return $this->belongsToMany(Products::class,'product_with_cross_selling_product','products_id','cross_with_product_id');
    }

    public static function getImage($GetData){
        $Images = array();
        $Images = explode('"',$GetData);
        foreach($Images as $Key => $Val){
            return $Val;
        }
    }

    public static function getImages($GetData){
        $Images = array();
        $Images = explode('"',$GetData);
        return $Images;
    }

    public function productVariation(){
        return $this->hasMany(ProductVariation::class,'products_id');                                            
    }


}
