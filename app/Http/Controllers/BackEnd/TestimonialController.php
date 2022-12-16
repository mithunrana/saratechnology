<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Testimonial;
class TestimonialController extends Controller
{
    public function index(){
        $Testimonials = Testimonial::orderBy('id','DESC')->get();
        return view('backend.testimonial.testimonials',compact('Testimonials'));
    }

    public function create(){
        return view('backend.testimonial.add');
    }

    public function store(Request $request){

        $TestimonialObj = new Testimonial();
        $TestimonialObj->name =  $request->name;
        $TestimonialObj->content =  $request->content;
        $TestimonialObj->image =  $request->imageurl;
        $TestimonialObj->company =  $request->company;
        $TestimonialObj->status =  $request->status;
        $TestimonialObj->save();

        return redirect()->route('dashboard.testimonials')->with('message','Testimonial Successfully Added');
    }

    public function edit(Request $request,$id){
        $TestimonialData = Testimonial::where('id', $id)->first();
        return view('backend.testimonial.edit', compact('TestimonialData'));
    }


    public function update(Request $request,$id){

        $TestimonialObj = Testimonial::where('id', $id)->first();
        $TestimonialObj->name =  $request->name;
        $TestimonialObj->content =  $request->content;
        $TestimonialObj->image =  $request->imageurl;
        $TestimonialObj->company =  $request->company;
        $TestimonialObj->status =  $request->status;
        $TestimonialObj->save();

        return redirect()->route('dashboard.testimonials')->with('message','Testimonial Information Successfully Updated');
    }


    public function delete($id){
        $TestimonialObj = Testimonial::find($id);
        $TestimonialObj->delete();
        return redirect()->route('dashboard.testimonials')->with('message','Testimonial Successfully Deleted');
    }



}
