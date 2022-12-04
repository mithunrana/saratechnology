<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WidgetSetWithWidgetBar extends Model
{
    use HasFactory;


    public function widget(){
        return $this->belongsTo(Widget::class,'widget_id');
    }

    public function widgetbar(){
        return $this->belongsTo(WidgetBar::class,'widget_bar_id');
    }

    public function menu(){
        return $this->belongsTo(Menu::class,'menu_id');
    }


}
