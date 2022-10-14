<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\Models\Currency;
class CurrencyController extends Controller
{
    public function swithCurrency(Request $request,$id){
        if(Currency::where('id',$id)->exists()){
            Session::forget('Currency');
            $CurrencyObj = Currency::where('id',1)->first();
            Session::put('Currency', $CurrencyObj);
            return redirect()->back();
        }else{
            return redirect()->back();
        }
    }
}
