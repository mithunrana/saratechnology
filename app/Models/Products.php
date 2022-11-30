<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    public function tag(){
        return $this->belongsToMany(ProductTag::class,'product_with_tags');
    }

    public function categories(){
        return $this->belongsToMany(ProductCategory::class,'product_with_category');
    }

    public function attributeSet(){
        return $this->belongsToMany(ProductAttributeSet::class,'product_with_attribute_set')->orderBy('id', 'ASC');
    }

    public function productLabel(){
        return $this->belongsToMany(ProductLabel::class,'product_with_label');
    }

    public function productCollection(){
        return $this->belongsToMany(ProductCollection::class,'product_with_collection');
    }

    public function relatedProduct(){
        return $this->belongsToMany(Products::class,'product_with_related_product','products_id','relation_with_product_id');
    }

    public function crossSellingProduct(){
        return $this->belongsToMany(Products::class,'product_with_cross_selling_product','products_id','cross_with_product_id');
    }

    public function productImages(){
        return $this->belongsToMany(MediaFile::class,'product_with_image');
    }

    public static function productFirstImageNormalSize($id){
        $ImageObject = DB::table('product_with_image')->select('product_with_image.media_file_id','media_files.urlwithoutextension','media_files.extension')->leftjoin('media_files', 'product_with_image.media_file_id', '=', 'media_files.id')->where('products_id',$id)->first();
        return $ImageObject->urlwithoutextension.'-500x500.'.$ImageObject->extension;
    }

    public static function productFirstImageLongHeightSize($id){
        $ImageObject = DB::table('product_with_image')->select('product_with_image.media_file_id','media_files.urlwithoutextension','media_files.extension')->leftjoin('media_files', 'product_with_image.media_file_id', '=', 'media_files.id')->where('products_id',$id)->first();
        return $ImageObject->urlwithoutextension.'-540x600.'.$ImageObject->extension;
    }


    public static function productFirstImageSmallSize($id){
        $ImageObject = DB::table('product_with_image')->select('product_with_image.media_file_id','media_files.urlwithoutextension','media_files.extension')->leftjoin('media_files', 'product_with_image.media_file_id', '=', 'media_files.id')->where('products_id',$id)->first();
        return $ImageObject->urlwithoutextension.'-150x150.'.$ImageObject->extension;
    }

    public static function productLastImage($ProductID){
        return 1;
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

    public static function variationByAttribute($variationid){
        return ProductVariation::where('id',$variationid)->get();
        //return $Variation->attribute->pluck('id')->toArray();
    }


    public static function productAttributeSetWithUniqueAttribute($ProductID,$AttributeSetID){
        return  DB::table('variation_with_attribute as vwa')->select('vwa.id','vwa.product_variation_id','vwa.product_attribute_id','vwa.product_attribute_set_id','vwa.products_id','Attr.title','Attr.slug','Attr.color')->leftjoin('product_attributes as Attr', 'vwa.product_attribute_id', '=', 'Attr.id')->where('products_id',$ProductID)->where('product_attribute_set_id',$AttributeSetID)->get();
    }


}
