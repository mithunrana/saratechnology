<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Newsletter;
class NewsletterController extends Controller
{
    public function subsCribe(Request $request){
        if(Newsletter::where('email',$request->email)->exists()){
            return redirect()->back()->with('message','Already you subscribe!');
        }else{
            $NewsletterObj = new Newsletter();
            $NewsletterObj->email = $request->email;
            $NewsletterObj->save();
            return redirect()->back()->with('message','Thanks for your subscribe!');
        }
    }
}
