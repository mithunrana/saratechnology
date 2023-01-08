<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogComment extends Model
{
    use HasFactory;

    public function blog(){
        return $this->belongsTo(BlogPost::class,'blog_post_id');
    }

    public function customer(){
        return $this->belongsTo(Customer::class,'customer_id');
    }

    public function replies(){
        return $this->hasMany(BlogComment::class,'blog_comment_id');
    }
}
