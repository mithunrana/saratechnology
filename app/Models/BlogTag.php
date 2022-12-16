<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogTag extends Model
{
    use HasFactory;

    public function blogs(){
        return $this->belongsToMany(BlogPost::class,'blog_with_tag','blog_id','blog_tag_id');
    }

}
