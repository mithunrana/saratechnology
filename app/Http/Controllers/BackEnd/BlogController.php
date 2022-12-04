<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BlogCategory;
use App\Models\BlogPost;
use App\Models\BlogTag;
class BlogController extends Controller
{
    public function blogManage(){
        $BlogPosts = BlogPost::all();
        return view('backend.blog.blog',compact('BlogPosts'));
    }

    public function blogAdd(){
        $BlogCategories = BlogCategory::where('status','Published')->whereNull('parent_id')->get();
        $BlogTags = BlogTag::where('status','Published')->get();
        return view('backend.blog.add',compact('BlogCategories','BlogTags'));
    }

    public function blogStore(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'permalink' => 'required|unique:blog_tags,permalink',
            'status' => 'required',
        ]);

        $BlogObj = new  BlogPost();
        $BlogObj->name =  $request->name;
        $BlogObj->content =  $request->content;
        $BlogObj->status =  $request->status;
        $BlogObj->is_featured = $request->is_featured ? 1 : 0;
        $BlogObj->image =  $request->imageurl;
        $BlogObj->permalink =  $request->permalink;
        $BlogObj->seotitle =  $request->seotitle;
        $BlogObj->metadescription =  $request->metadescription;
        $BlogObj->save();

        $BlogObj->tags()->attach($request->tags);
        $BlogObj->categories()->attach($request->categories);

        return redirect()->route('dashboard.blog')->with('message', 'Blog Successfully Added');
    }


    public function blogEdit(Request $request,$id){
        $BlogObj = BlogPost::where('id', $id)->first();
        $data['BlogData'] = $BlogObj;
        $data['BlogCategories'] = BlogCategory::where('status','Published')->whereNull('parent_id')->get();
        $data['BlogTags'] = BlogTag::where('status','Published')->get();
        $data['BlogCategoryArray'] = $BlogObj->categories->pluck('id')->toArray();
        $data['BlogTagsArray'] = $BlogObj->tags->pluck('id')->toArray();
        return view('backend.blog.blog-edit', $data);        
    }


    public function blogUpdate(Request $request,$id){
        $BlogObj = BlogPost::where('id', $id)->first();
        $BlogObj->name =  $request->name;
        $BlogObj->content =  $request->content;
        $BlogObj->status =  $request->status;
        $BlogObj->is_featured = $request->is_featured ? 1 : 0;
        $BlogObj->image =  $request->imageurl;
        $BlogObj->permalink =  $request->permalink;
        $BlogObj->seotitle =  $request->seotitle;
        $BlogObj->metadescription =  $request->metadescription;
        $BlogObj->save();

        $BlogObj->tags()->detach();
        $BlogObj->categories()->detach();
        $BlogObj->tags()->attach($request->tags);
        $BlogObj->categories()->attach($request->categories);

        return redirect()->route('dashboard.blog')->with('message', 'Blog Successfully Updated');
    }

    public function blogCategory(){
        return view('backend.blog.category');
    }

    public function blogCategoryAdd(){
        return view('backend.blog.category-add');
    }

    public function blogCategoryStore(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'permalink' => 'required|unique:blog_categories,permalink',
            'status' => 'required',
            'order' => 'required',
        ]);

        $BlogCategoryObj = new BlogCategory();
        $BlogCategoryObj->name = $request->name;
        $BlogCategoryObj->permalink = $request->permalink;
        $BlogCategoryObj->order = $request->order;
        $BlogCategoryObj->icon = $request->icon;
        $BlogCategoryObj->seotitle = $request->seotitle;
        $BlogCategoryObj->metadescription = $request->metadescription;
        $BlogCategoryObj->is_featured = $request->is_featured ? 1 : 0;
        $BlogCategoryObj->parent_id = $request->parent_id;
        $BlogCategoryObj->status = $request->status;
        $BlogCategoryObj->save();

        return redirect()->route('dashboard.blog.category')->with('message', 'Blog Category Successfully Added');
    }

    public function blogCategoryEdit(Request $request,$id){
        $CategoryData = BlogCategory::where('id', $id)->first();
        return view('backend.blog.category-edit', compact('CategoryData'));
    }


    public function blogCategoryUpdate(Request $request,$id){
        $this->validate($request, [
            'name' => 'required',
            'permalink' => "required|unique:blog_categories,permalink,$id",
            'status' => 'required',
            'order' => 'required',
        ]);

        $BlogCategoryObj = BlogCategory::where('id',$id)->first();
        $BlogCategoryObj->name = $request->name;
        $BlogCategoryObj->permalink = $request->permalink;
        $BlogCategoryObj->order = $request->order;
        $BlogCategoryObj->icon = $request->icon;
        $BlogCategoryObj->seotitle = $request->seotitle;
        $BlogCategoryObj->metadescription = $request->metadescription;
        $BlogCategoryObj->is_featured = $request->is_featured ? 1 : 0;
        $BlogCategoryObj->parent_id = $request->parent_id;
        $BlogCategoryObj->status = $request->status;
        $BlogCategoryObj->save();

        return redirect()->route('dashboard.blog.category')->with('message', 'Blog Category Successfully Updated');
    }

    public function blogCategoryDelete($id){
        $BlogCategoryObj = BlogCategory::find($id);
        $BlogCategoryObj->delete();
        return redirect()->route('dashboard.blog.category')->with('message','Blog Category Successfully Deleted');
    }





    public function blogTag(){
        return view('backend.blog.tag');
    }

    public function blogTagAdd(){
        return view('backend.blog.tag-add');
    }


    public function blogTagStore(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'permalink' => 'required|unique:blog_tags,permalink',
            'status' => 'required',
        ]);

        $BlogTagObj = new BlogTag();
        $BlogTagObj->name = $request->name;
        $BlogTagObj->permalink = $request->permalink;
        $BlogTagObj->seotitle = $request->seotitle;
        $BlogTagObj->metadescription = $request->metadescription;
        $BlogTagObj->status = $request->status;
        $BlogTagObj->save();

        return redirect()->route('dashboard.blog.tag')->with('message', 'Blog Tag Successfully Added');
    }

    public function blogTagEdit(Request $request,$id){
        $TagData = BlogTag::where('id', $id)->first();
        return view('backend.blog.tag-edit', compact('TagData'));
    }


    public function blogTagUpdate(Request $request,$id){
        $this->validate($request, [
            'name' => 'required',
            'permalink' => "required|unique:blog_tags,permalink,$id",
            'status' => 'required',
        ]);

        $BlogTagObj = BlogTag::where('id',$id)->first();
        $BlogTagObj->name = $request->name;
        $BlogTagObj->permalink = $request->permalink;
        $BlogTagObj->seotitle = $request->seotitle;
        $BlogTagObj->metadescription = $request->metadescription;
        $BlogTagObj->status = $request->status;
        $BlogTagObj->save();

        return redirect()->route('dashboard.blog.tag')->with('message', 'Blog Tag Successfully Updated');
    }

    public function blogTagDelete($id){
        $BlogTagObj = BlogTag::find($id);
        $BlogTagObj->delete();
        return redirect()->route('dashboard.blog.tag')->with('message','Blog Tag Successfully Deleted');
    }



}
