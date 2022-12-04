<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu_Node extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function subMenu(){
        return $this->hasMany(Menu_Node::class,'parent_id');
    }

    public function childItems(){
        return $this->hasMany(Menu_Node::class,'parent_id')->with('subMenu');
    }
}
