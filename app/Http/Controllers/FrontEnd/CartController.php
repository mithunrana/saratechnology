<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Cart;
use App\Models\Products;
use App\Models\ShippingRule;
use Session;
class CartController extends Controller
{


    public function index(){
        return view('frontend.cart.cart');
    }

    
    public function checkout(){
        $ShippingMethods = ShippingRule::get();
        $CartTotal = str_replace(',', '', Cart::total());
        $NetTotalAmount = $CartTotal + session()->get('shippingcharge');
        return view('frontend.cart.checkout',compact('ShippingMethods','NetTotalAmount'));
    }


    public function store(Request $request, $id)
    {
        //Cart::destroy();
        $ImageSize =  config('ImageSize');

        $product = Products::find($id);
        $ProductImage = "";
        foreach($product->productImages as $Image){
            $ProductImage = $Image->urlwithoutextension.$ImageSize[150].'.'.$Image->extension;
        }
        $data['id'] = $id;
        $data['name'] = $product->name;
        $data['qty'] = 1;
        $data['price'] = $product->sale_price;
        $data['weight'] = 0;
        $data['options']['image'] = $ProductImage;
        
        Cart::add($data);
        return response()->json(['success' => 'পণ্যটি কার্টে যুক্ত হয়েছে !']);
    }


    public function qtyInc($rowId){
        $data = Cart::get($rowId);
        Cart::update($rowId, $data->qty + 1);
        return response()->json($data);
    }


    public function qtyDec($rowId){
       /* $selectedProduct = Cart::get($rowId);
        return $selectedProduct->count();
        
        if($selectedProduct == 1){
            
        }else{
        $data = Cart::get($rowId);
        Cart::update($rowId, $data->qty - 1);
        return response()->json($data);
        }*/
        
        $data = Cart::get($rowId);
        Cart::update($rowId, $data->qty - 1);
        return response()->json($data);
    }


    public function cartdelete($id) { 
        $data = Cart::remove($id);
        return redirect()->back()->with('message', 'You have modified your shopping cart!');
     }

    public function shippingMethodChange(){
        return view('backend.shipping.shipping-change');
    }

    public function switchShippingMethod($id){
        if(ShippingRule::where('id',$id)->exists()){
            $ShippingObj = ShippingRule::where('id',$id)->first();
            Session::put('shippingcharge', $ShippingObj->price);
        }
    }
    

}
