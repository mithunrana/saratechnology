<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BlogPost;
use App\Models\BlogCategory;
use App\Models\BlogTag;
use App\Models\BlogComment;
use Auth;
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
        $CategoryData = BlogCategory::where('permalink',$permalink)->where('status','published')->first();
        $data['CategoryData'] =  $CategoryData;
        $data['BlogPost'] = $CategoryData->blogs;
        $data['RecentBlog'] = BlogPost::where('status','published')->orderBy('order','DESC')->skip(0)->take(4)->get();
        $data['BlogCategories']  = BlogCategory::where('status','published')->where('is_featured',1)->orderBy('id','DESC')->get();
        $data['BlogTags'] = BlogTag::where('status','published')->orderBy('id','DESC')->get();
        return view('frontend.blog.blog-masonry-right-sidebar',$data);
    }


    public function tagWiseBlogs($permalink){
        $TagData = BlogTag::where('permalink',$permalink)->where('status','published')->first();
        $data['TagData'] = $TagData;
        $data['BlogPost'] = $TagData->blogs;
        $data['RecentBlog']  = BlogPost::where('status','published')->orderBy('order','DESC')->skip(0)->take(4)->get();
        $data['BlogCategories']  = BlogCategory::where('status','published')->where('is_featured',1)->orderBy('id','DESC')->get();
        $data['BlogTags'] = BlogTag::where('status','published')->orderBy('id','DESC')->get();
        return view('frontend.blog.blog-masonry-right-sidebar',$data);
    }


    public function singleBlog($permalink){
        $data['BlogData'] = BlogPost::where('permalink',$permalink)->where('status','published')->first();
        $data['RecentBlog']  = BlogPost::where('status','published')->orderBy('order','DESC')->skip(0)->take(4)->get();
        $data['BlogCategories']  = BlogCategory::where('status','published')->where('is_featured',1)->orderBy('id','DESC')->get();
        $data['BlogTags'] = BlogTag::where('status','published')->orderBy('id','DESC')->get();
        return view('frontend.blog.blog-single-right-side-bar',$data);
    }


    public function blogCommentStore(Request $request){
        $login = 0;
        if(Auth::guard('customer')->check()){
            $login = 1;
        }
       
        $this->validate($request, [
            'name' => 'required_if:login,==,0',
            'email' => "required_if:login,==,0",
            'comment' => "required|min:10|max:1000",
            'blog_post_id' => "required|numeric",
        ]);

        $BlogCommentObj = new BlogComment();
        if($login==0){
            $BlogCommentObj->name = $request->name;
            $BlogCommentObj->email = $request->email;
        }else{
            $BlogCommentObj->customer_id = Auth::guard('customer')->user()->id;
        }
        $BlogCommentObj->website = $request->website;
        $BlogCommentObj->comment = $request->comment;
        $BlogCommentObj->blog_post_id = $request->blog_post_id;
        $BlogCommentObj->blog_comment_id = $request->blog_comment_id;
        $BlogCommentObj->save();
        return redirect()->back()->with('message',"Comment Successfully Submited");
    }
}
