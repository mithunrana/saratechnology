<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BlogPost;
use App\Models\BlogCategory;
use App\Models\BlogTag;
class BlogController extends Controller
{
    public function index(){
        $data['BlogPost'] = BlogPost::where('status','published')->orderBy('order','DESC')->paginate(15);
        $data['RecentBlog'] = BlogPost::where('status','published')->orderBy('order','DESC')->skip(0)->take(4)->get();
        $data['BlogCategories']  = BlogCategory::where('status','published')->where('is_featured',1)->orderBy('id','DESC')->get();
        $data['BlogTags'] = BlogTag::where('status','published')->orderBy('id','DESC')->get();
        return view('frontend.blog.blog-masonry-right-sidebar',$data);
    }

    
    public function categoryWiseBlogs($permalink){
        $data['CategoryData'] = BlogCategory::where('permalink',$permalink)->where('status','published')->first();
        $data['RecentBlog'] = BlogPost::where('status','published')->orderBy('order','DESC')->skip(0)->take(4)->get();
        $data['BlogCategories']  = BlogCategory::where('status','published')->where('is_featured',1)->orderBy('id','DESC')->get();
        $data['BlogTags'] = BlogTag::where('status','published')->orderBy('id','DESC')->get();
        return view('frontend.blog.category-wise-blog',$data);
    }


    public function tagWiseBlogs($permalink){
        $data['TagData'] = BlogTag::where('permalink',$permalink)->where('status','published')->first();
        $data['RecentBlog']  = BlogPost::where('status','published')->orderBy('order','DESC')->skip(0)->take(4)->get();
        $data['BlogCategories']  = BlogCategory::where('status','published')->where('is_featured',1)->orderBy('id','DESC')->get();
        $data['BlogTags'] = BlogTag::where('status','published')->orderBy('id','DESC')->get();
        return view('frontend.blog.tag-wise-blog',$data);
    }


    public function singleBlog($permalink){
        $data['BlogData'] = BlogPost::where('permalink',$permalink)->where('status','published')->first();
        $data['RecentBlog']  = BlogPost::where('status','published')->orderBy('order','DESC')->skip(0)->take(4)->get();
        $data['BlogCategories']  = BlogCategory::where('status','published')->where('is_featured',1)->orderBy('id','DESC')->get();
        $data['BlogTags'] = BlogTag::where('status','published')->orderBy('id','DESC')->get();
        return view('frontend.blog.blog-single-right-side-bar',$data);
    }
}
