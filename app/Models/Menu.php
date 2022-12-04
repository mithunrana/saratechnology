<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    public function menuLocation(){
        return $this->belongsToMany(Menu::class,'menu_locations','menu_id','location');
    }


    public function menuitems(){
        return $this->hasMany(Menu_Node::class,'menu_id');
    }

    public function menuitems2(){
        return $this->hasMany(Menu_Node::class,'menu_id');
    }

}
