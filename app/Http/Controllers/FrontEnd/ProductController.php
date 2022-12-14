<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductBrand;
use App\Models\ProductCategory;
use App\Models\ProductLabel;
use App\Models\ProductCollection;
use App\Models\ProductTax;
use App\Models\ProductTag;
use App\Models\Products;
use App\Models\ProductAttributeSet;
use App\Models\ProductAttribute;
use App\Models\ProductVariation;
use App\Models\Reviews;
use Auth;
class ProductController extends Controller
{
    public function index(){
        $Products  = Products::where('status','published')->orderBy('id','DESC')->paginate(20);
        return view('frontend.product.products',compact('Products'));
    }


    public function productQuickView($id){
        $Product = Products::where('id',$id)->first();
        return view('frontend.product.product-quick-view',compact('Product'));
    }


    public function productView($url){
        $Product = Products::where('permalink',$url)->first();
        $ProductVariation = 0;
        $ProductVariationObj = NULL;
        $DefaultProductVariation = ProductVariation::where('products_id',$Product->id)->where('is_default',1)->first();
        if($DefaultProductVariation){
            $ProductVariation = 1;
            $ProductVariationObj = $DefaultProductVariation;
        }
        $TotalReview  = Reviews::where('product_id',$Product->id)->count();
        $ProductReviews = Reviews::where('product_id',$Product->id)->get();
        return view('frontend.product.product-view',compact('Product','ProductVariation','ProductVariationObj','TotalReview','ProductReviews'));
    }



    public function ratingSubmit(Request $request){
        $this->validate($request,[
            'star' => 'required',
            'product_id' => 'required',
            'message' => 'required',
        ]);

        if(Auth::guard('customer')->check()) {
            $ReviewsObj = new Reviews();
            $ReviewsObj->customer_id = Auth::guard('customer')->user()->id;
            $ReviewsObj->product_id = $request->product_id;
            $ReviewsObj->star = $request->star;
            $ReviewsObj->comment = $request->message;
            $ReviewsObj->save();
            return redirect()->back()->with('message', 'Product Review Successfully Submited');
        }else{
            return redirect()->back()->with('message', 'Login Must Be Required');
        }
    }


    public function categoryWiseProducts($permalink){
        $CategoryObj = ProductCategory::where('permalink',$permalink)->first();
        $Products =  $CategoryObj->products()->paginate(20);
        return view('frontend.product.products',compact('Products'));
    }


    public function tagWiseProducts($slug){
        $TagObj = ProductTag::where('slug',$slug)->first();
        $Products =  $TagObj->products->paginate(20);
        return view('frontend.product.products',compact('Products'));
    }

    public function brandWiseProducts($permalink){
        $BrandObj = ProductBrand::where('permalink',$permalink)->first();
        $Products =  $BrandObj->products->paginate(20);
        return view('frontend.product.products',compact('Products'));
    }
    
}
