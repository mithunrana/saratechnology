<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Cart;
use App\Models\Products;
class CartController extends Controller
{


    public function index(){
        return view('frontend.cart.cart');
    }

    
    public function checkout(){
        return view('frontend.cart.checkout');
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
    

}
