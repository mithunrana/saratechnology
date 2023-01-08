<?php

namespace App\Http\Controllers\FrontEnd;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\Mail\ContactUserIncomingMail;
use App\Mail\ContactUserOutGoingMail;
use App\Mail\CustomerEmailVerification;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Models\CustomerVerify;
use Illuminate\Support\Str;
use Mail; 

class CustomerController extends Controller
{

    public function create()
    {
        return view('frontend.customer.registration');
    }








    public function login(){
        return view('frontend.customer.login');
    }

    public function index(){
        return view('frontend.customer.dashboard');
    }

    public function register(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|unique:customers,email',
            'password' => 'min:6|required_with:retype_password|same:retype_password',
            'retype_password' => 'min:6',
        ]);

        $CustomerObj = new Customer();
        $CustomerObj->name = $request->name;
        $CustomerObj->email = $request->email;
        $CustomerObj->password = Hash::make($request->password);
        $CustomerObj->save();

        $token = Str::random(64);
        CustomerVerify::create([
            'customer_id' => $CustomerObj->id, 
            'token' => $token
        ]);

        Mail::send('Mail.emailVerificationEmail', ['token' => $token], function($message) use($request){
            $message->to($request->email);
            $message->subject('Email Verification Mail');
        });
        return redirect()->route('customer.login')->with('message', 'Great! You have Successfully Registered');
    }


    public function resendMailVerification(){
        return view('frontend.customer.resend-mail-verification');
    }


    public function resendMailVerificationSend(Request $request){
        $VerifyCustomer = CustomerVerify::where('customer_id', Auth::guard('customer')->user()->id)->first();
        Mail::to($VerifyCustomer->customer->email)->send(new CustomerEmailVerification($VerifyCustomer->customer->email,$VerifyCustomer->token));
        return redirect()->back()->with('message', 'A new verification link has been sent to the email address you provided during registration.');
    }


    public function verifyAccount($token)
    {
        $verifyCustomer = CustomerVerify::where('token', $token)->first();
        $message = 'Sorry your email cannot be identified.';
  
        if(!is_null($verifyCustomer) ){
            $user = $verifyCustomer->customer;
            if(!$user->is_email_verified) {
                $verifyCustomer->customer->is_email_verified = 1;
                $verifyCustomer->customer->save();
                $message = "Your e-mail is verified. You can now login.";
            } else {
                $message = "Your e-mail is already verified. You can now login.";
            }
        }
  
        return redirect()->route('customer.login')->with('message', $message);
    }

}