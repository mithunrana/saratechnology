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

    public static function getImage($GetData){
        /*$Images = array();
        $Images = $GetData;
        foreach($Images as $Image){
            return 1;
        } */
        return 0;
    }
}
