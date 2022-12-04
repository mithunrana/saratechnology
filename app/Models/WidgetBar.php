<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WidgetBar extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function widgetset(){
        return $this->hasMany(WidgetSetWithWidgetBar::class,'widget_bar_id');
    }

    

}
