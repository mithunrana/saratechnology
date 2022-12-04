<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

    public function slideitems(){
        return $this->hasMany(SliderItem::class,'slider_id');
    }

}
