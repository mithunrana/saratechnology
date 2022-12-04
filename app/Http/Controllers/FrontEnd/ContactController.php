<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use Mail;
use App\Models\Contact;
use App\Mail\ContactUserIncomingMail;
USE App\Mail\ContactUserOutGoingMail;
class ContactController extends Controller
{
    public function index(){
        return view('frontend.contact');
    }


    public function sendMail(Request $request){
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]);

        $name = $request->name;
        $email = $request->email;
        $phone = $request->phone;
        $subject = $request->subject;
        $message = $request->message;
        $incomeMailAddress = "mithunrana139@gmail.com";

        Mail::to($email)->send(new ContactUserOutGoingMail($name));
        Mail::to($incomeMailAddress)->send(new ContactUserIncomingMail($name,$email,$phone,$subject,$message));
    
        $ContactObj = new Contact();
        $ContactObj->name = $request->name;
        $ContactObj->email = $request->email;
        $ContactObj->phone = $request->phone;
        $ContactObj->address = $request->address;
        $ContactObj->subject = $request->subject;
        $ContactObj->content = $request->message;
        $ContactObj->status = "unread";
        $ContactObj->save();

        Session::flash("success");
        return redirect()->to('contact');
    }
}
