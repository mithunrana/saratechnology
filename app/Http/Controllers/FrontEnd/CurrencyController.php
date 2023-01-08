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
            $CurrencyObj = Currency::where('id',$id)->first();
            Session::put('Currency', $CurrencyObj);
            $response = ['message' => 'Currency Successfully Changed'];
            return response()->json($response, 200);
        }else{
            $response = ['message' => 'Something Error'];
            return response()->json($response, 200);
        }
    }
}
