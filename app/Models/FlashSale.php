<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FlashSale extends Model
{
    use HasFactory;

    public function item(){
        return $this->hasMany(FlashSaleItem::class,'flash_sale_id');
    }

}
