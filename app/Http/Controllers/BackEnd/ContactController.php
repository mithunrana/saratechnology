<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\ContactReply;
use App\Mail\ContactReplyMail;
use Mail;

class ContactController extends Controller
{
    public function index(){
        $ContactList = Contact::orderBy('id', 'DESC')->get();
        return view('backend.contact.contact',compact('ContactList'));
    }

    public function contactEdit(Request $request,$id){
        $ContactData = Contact::where('id',$id)->first();
        return view('backend.contact.contact-edit',compact('ContactData'));
    }


    public function contactUpdate(Request $request,$id){
        $ContactObj = Contact::where('id',$id)->first();
        $ContactObj->status = $request->status;
        $ContactObj->save();
        return redirect()->route('dashboard.contact')->with('message','Contact Information Updated');
    }

    public function contactDelete($id){
        $ContactObj = Contact::where('id',$id)->first();
        $ContactObj->delete();
        return redirect()->route('dashboard.contact')->with('message','Contact Information Deleted');
    }

    public function contactReply(Request $request,$id){

        $ContactObj = Contact::where('id',$id)->first();
        $ContactReplyObj = new ContactReply();
        $ContactReplyObj->contact_id = $ContactObj->id;
        $ContactReplyObj->message = $request->message;
        $ContactReplyObj->save();

        Mail::to($ContactObj->email)->send(new ContactReplyMail($ContactObj->subject,$request->message));
        return redirect()->back()->with('message','Reply Message Successfully sent');
    }

}
