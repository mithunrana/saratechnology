<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\Currency;
use App\Models\ShippingRule;
use App\Models\Slider;
use App\Models\SliderItem;
class SetupMasterController extends Controller
{
    function country(){
        $CountryList = Country::get();
        return view('backend.country.country',compact('CountryList'));
    }

    function countryAdd(){
        return view('backend.country.add');
    }

    public function countryStore(Request $request){
        $this->validate($request, [
            'name' => 'required|unique:countries,name',
            'countrycode' => "required",
            'shortname' => 'required',
        ]);

        $CountryObj = new Country();
        $CountryObj->name = $request->name;
        $CountryObj->countrycode = $request->countrycode;
        $CountryObj->shortname = $request->shortname;
        $CountryObj->save();

        return redirect('admin/country')->with('message', 'Country Name Successfully Added');
    }

    function countryEdit(Request $request,$id){
        $CountryObj = Country::where('id',$id)->first();
        return view('backend.country.edit',compact('CountryObj'));
    }


    function countryUpdate(Request $request,$id){
        $this->validate($request, [
            "name" => "required|unique:countries,name,$id",
            "countrycode" => "required",
            "shortname" => 'required',
        ]);

        $CountryObj = Country::where('id',$id)->first();
        $CountryObj->name = $request->name;
        $CountryObj->countrycode = $request->countrycode;
        $CountryObj->shortname = $request->shortname;
        $CountryObj->save();

        return redirect('admin/country')->with('message', 'Country Name Successfully Updated');
    }



    #Currency Manager================================================================================


    function currency(){
        $CurrencyList = Currency::get();
        return view('backend.currency.currency',compact('CurrencyList'));
    }

    function currencyAdd(){
        return view('backend.currency.add');
    }

    public function currencyStore(Request $request){
        $this->validate($request, [
            'title' => 'required|unique:currencies,title',
            'symbol' => "required",
            'is_prefix_symbol' => 'required',
            'decimals' => 'required',
            'order' => 'required',
            'exchange_rate' => 'required',
        ]);

        $CurrencyObj = new Currency();
        $CurrencyObj->title = $request->title;
        $CurrencyObj->symbol = $request->symbol;
        $CurrencyObj->is_prefix_symbol = $request->is_prefix_symbol;
        $CurrencyObj->decimals = $request->decimals;
        $CurrencyObj->order = $request->order;
        $CurrencyObj->exchange_rate = $request->exchange_rate;
        $CurrencyObj->save();

        return redirect('admin/currency')->with('message', 'Currency Successfully Added');
    }

    function currencyEdit(Request $request,$id){
        $CurrencyObj = Currency::where('id',$id)->first();
        return view('backend.currency.edit',compact('CurrencyObj'));
    }


    function currencyUpdate(Request $request,$id){
        $this->validate($request, [
            'title' => "required|unique:currencies,title,$id",
            'symbol' => "required",
            'is_prefix_symbol' => 'required',
            'decimals' => 'required',
            'order' => 'required',
            'exchange_rate' => 'required',
        ]);

        $CurrencyObj = Currency::where('id',$id)->first();
        $CurrencyObj->title = $request->title;
        $CurrencyObj->symbol = $request->symbol;
        $CurrencyObj->is_prefix_symbol = $request->is_prefix_symbol;
        $CurrencyObj->decimals = $request->decimals;
        $CurrencyObj->order = $request->order;
        $CurrencyObj->exchange_rate = $request->exchange_rate;
        $CurrencyObj->save();

        return redirect('admin/currency')->with('message', 'Currency Successfully Updated');
    }






    #Shipping Manager ===============================================================================

    function shippingMethod(){
        $ShippingMethods = ShippingRule::get();
        return view('backend.shipping.shipping',compact('ShippingMethods'));
    }

    function shippingMethodAdd(){
        return view('backend.shipping.add');
    }

    public function shippingMethodStore(Request $request){
        $this->validate($request, [
            'name' => 'required|unique:shipping_rules,name',
            'price' => "required|numeric|min:0|max:99999999",
        ]);

        $ShippingObj = new ShippingRule();
        $ShippingObj->name = $request->name;
        $ShippingObj->price = $request->price;
        $ShippingObj->isdefault = $request->is_default ? 1 : 0;
        $ShippingObj->save();

        return redirect('admin/shipping-method')->with('message', 'Shipping Method Successfully Added');
    }

    function shippingMethodEdit(Request $request,$id){
        $ShippingObj = ShippingRule::where('id',$id)->first();
        return view('backend.shipping.edit',compact('ShippingObj'));
    }


    function shippingMethodUpdate(Request $request,$id){
        $this->validate($request, [
            'name' => "required|unique:shipping_rules,name,$id",
            'price' => "required|numeric|min:0|max:99999999",
        ]);

        $ShippingObj = ShippingRule::where('id',$id)->first();
        $ShippingObj->name = $request->name;
        $ShippingObj->price = $request->price;
        $ShippingObj->isdefault = $request->is_default ? 1 : 0;
        $ShippingObj->save();

        return redirect('admin/shipping-method')->with('message', 'Shipping Method Successfully Updated');
    }




    #Slider Manager ===============================================================================

    public function slider(){
        $SliderList  = Slider::get();
        return view('backend.slider.slider',compact('SliderList'));
    }

    public function sliderAdd(){
        return view('backend.slider.add');
    }

    public function sliderStore(Request $request){
        $this->validate($request, [
            'name' => "required|unique:sliders,name",
            'key' => "required|unique:sliders,key",
            'description' => 'required',
            'status' => 'required',
        ]);
        $slider  = new Slider();
        $slider->name = $request->name;
        $slider->key = $request->key;
        $slider->description = $request->description;
        $slider->status = $request->status;
        $slider->save();

        return redirect('admin/slider')->with('message','Slider Successfully Added');
    }

    public function sliderEdit(Request $request,$id){
        $SliderObj  = Slider::where('id',$id)->first();
        $SliderItems = SliderItem::where('slider_id',$id)->get();
        return view('backend.slider.edit',compact('SliderObj','SliderItems'));
    }

    public function sliderUpdate(Request $request,$id){
        $this->validate($request, [
            'name' => "required|unique:sliders,name,$id",
            'key' => "required|unique:sliders,key,$id",
            'description' => 'required',
            'status' => 'required',
        ]);
        $SliderObj  = Slider::where('id',$id)->first();
        $SliderObj->name = $request->name;
        $SliderObj->key = $request->key;
        $SliderObj->description = $request->description;
        $SliderObj->status = $request->status;
        $SliderObj->save();
        return redirect('admin/slider')->with('message','Slider Successfully Updated');
    }


    public function sliderDelete($id){
        $SliderObj  = Slider::find($id);
        $SliderObj->delete();
        return redirect()->back()->with('message','Slider Successfully Delete');
    }


    



    public function sliderItemStore(Request $request){
        $this->validate($request, [
            'slider_id' => "required",
            'title' => "required",
            'imageurl' => 'required',
            'order' => 'required',
        ]);
        $SliderItemObj = new SliderItem();
        $SliderItemObj->slider_id = $request->slider_id;
        $SliderItemObj->title = $request->title;
        $SliderItemObj->button_text = $request->button_text;
        $SliderItemObj->image = $request->imageurl;
        $SliderItemObj->link = $request->link;
        $SliderItemObj->description = $request->description;
        $SliderItemObj->order = $request->order;
        $SliderItemObj->save();
        return redirect()->back()->with('message','Slider Item Successfully Added');
    }


    public function sliderItemUpdate(Request $request,$id){
        $this->validate($request, [
            'slider_id' => "required",
            'title' => "required",
            'imageurl' => 'required',
            'order' => 'required',
        ]);
        $SliderItemObj = SliderItem::where('id',$id)->first();
        $SliderItemObj->slider_id = $request->slider_id;
        $SliderItemObj->title = $request->title;
        $SliderItemObj->button_text = $request->button_text;
        $SliderItemObj->image = $request->imageurl;
        $SliderItemObj->link = $request->link;
        $SliderItemObj->description = $request->description;
        $SliderItemObj->order = $request->order;
        $SliderItemObj->save();
        return redirect()->back()->with('message','Slider Item Successfully Update');
    }

    public function sliderItemDelete($id){
        $SliderItemObj = SliderItem::find($id);
        $SliderItemObj->delete();
        return redirect()->back()->with('message','Slider Item Successfully Deleted');
    }

}
