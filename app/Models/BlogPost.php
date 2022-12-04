<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    use HasFactory;

    public function categories(){
        return $this->belongsToMany(BlogCategory::class,'blog_with_category','blog_id','blog_category_id');
    }
    
    public function tags(){
        return $this->belongsToMany(BlogTag::class,'blog_with_tag','blog_id','blog_tag_id');
    }
}
