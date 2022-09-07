<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVariation extends Model
{
    use HasFactory;

    public function attribute(){
        return $this->belongsToMany(ProductAttribute::class,'variation_with_attribute')->orderBy('id', 'ASC');
    }

    public static function attributeValue($AttributeSet,$VariationID){
        $VariationWithAttributeObj = DB::table('variation_with_attribute')->where('product_variation_id',$VariationID)->where('product_attribute_set_id',$AttributeSet)->first();
        if($VariationWithAttributeObj){
            $AttributeObj = DB::table('product_attributes')->where('id',$VariationWithAttributeObj->product_attribute_id)->first();
            return $AttributeObj->title;
        }else{
            return "-";
        }
    }
    

}
