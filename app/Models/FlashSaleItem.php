<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FlashSaleItem extends Model
{
    use HasFactory;

    public function products(){
        return $this->belongsTo(Products::class,'products_id');
    }



    public static function availablePercent($TotalQuantity,$SoldQuantity){
        $EachProductPercent = 100/$TotalQuantity;
        return 100 - $EachProductPercent*$SoldQuantity;
    }


    public static function availableQuantity($TotalQuantity,$SoldQuantity){
        return $AvailableQuantity = $TotalQuantity - $SoldQuantity;
    }

}
