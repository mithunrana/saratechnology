<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuLocation extends Model
{
    use HasFactory;

    protected $attributes = [
        'menu_id' => '1',
    ];

    public function menu(){
        return $this->belongsTo(Menu::class,'menu_id');
    }

}
