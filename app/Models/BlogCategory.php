<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function parentCategory(){
        return $this->belongsTo(BlogCategory::class,'parent_id');
    }

    public function subCategory(){
        return $this->hasMany(BlogCategory::class,'parent_id');
    }

    public function childItems(){
        return $this->hasMany(BlogCategory::class,'parent_id')->with('subCategory')->where('status','=', 'Published');
    }

    public function blogs(){
        return $this->belongsToMany(BlogPost::class,'blog_with_category');
    }
}
