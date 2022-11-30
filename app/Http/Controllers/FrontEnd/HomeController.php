<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductBrand;
use App\Models\ProductCategory;
use App\Models\Products;
use App\Models\ProductLabel;
use App\Models\ProductCollection;
use App\Models\ProductTax;
use App\Models\ProductTag;
use App\Models\ProductAttributeSet;
use App\Models\ProductAttribute;
use App\Models\ProductVariation;
use App\Models\Currency;
use App\Models\ShippingRule;
use App\Models\Reviews;
use App\Models\OrderProduct;
use App\Models\Order;
use App\Models\SliderItem;
use App\Models\Slider;
use Session;

class HomeController extends Controller
{
    public function index(){

        $data['Brands'] = ProductBrand::where('status','Published')->orderBy('order','ASC')->get();
        $data['LatestProducts'] = Products::where('status','Published')->orderBy('id','DESC')->skip(0)->take(10)->get();

        $data['FeaturedProducts'] =  Products::where('is_featured',1)->orderBy('id','DESC')->skip(0)->take(3)->get();
        $data['FeaturedProducts2'] =  Products::where('is_featured',1)->orderBy('id','DESC')->skip(3)->take(6)->get();

        $data['TopRatedProducts'] = Reviews::where('status','Published')->orderBy('star','DESC')->skip(0)->take(3)->get()->unique('product_id');
        $data['TopRatedProducts2'] = Reviews::where('status','Published')->orderBy('star','DESC')->skip(3)->take(3)->get()->unique('product_id');

        $data['OrderProducts'] = OrderProduct::orderBy('id','DESC')->skip(0)->take(3)->get()->unique('product_id');
        $data['OrderProducts2'] = OrderProduct::orderBy('id','DESC')->skip(3)->take(3)->get()->unique('product_id');

        $SlideObj = Slider::where('key','home-slider')->first();
        $data['SlideItems'] =  SliderItem::where('slider_id',$SlideObj->id)->orderBy('order','DESC')->get();

        
        return view('frontend.index',$data);
    }
}
