<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Newsletter;
class NewsletterController extends Controller
{
    public function index(){
        $Newsletters = Newsletter::orderBy('id','desc')->get();
        return view('backend.newsletter.newsletter',compact('Newsletters'));
    }


    public function newsletterEdit(Request $request,$id){
        $NewsletterData = Newsletter::where('id',$id)->first();
        return view('backend.newsletter.newsletter-edit',compact('NewsletterData'));
    }

    public function newsletterUpdate(Request $request,$id){
        $NewsletterObj = Newsletter::where('id',$id)->first();
        $NewsletterObj->status = $request->status;
        $NewsletterObj->save();
        return redirect()->route('dashboard.newsletter')->with('message','Newsletter Information Successfully Updated');
    }


    public function newsletterDelete($id){
        $NewsletterObj = Newsletter::where('id',$id)->first();
        $NewsletterObj->delete();
        return redirect()->route('dashboard.newsletter')->with('message','Newsletter Information Successfully Deleted');
    }
}
