<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FlashSale;
use App\Models\Products;
use App\Models\FlashSaleItem;
class FlashSaleController extends Controller
{
    public function index(){
        $FlashSales = FlashSale::orderBy('id','DESC')->get();
        return view('backend.flashsale.flashsale',compact('FlashSales'));
    }

    public function create(){
        return view('backend.flashsale.add');
    }

    public function store(Request $request){
        $validated = $request->validate([
            'name' => "required:|min:5|max:250|unique:flash_sales,name",
            'end_date' => 'required',
            'status' => 'required',
        ]);

        $FlashSaleObj = new FlashSale();
        $FlashSaleObj->name = $request->name;
        $FlashSaleObj->end_date = $request->end_date;
        $FlashSaleObj->status = $request->status;
        $FlashSaleObj->save();
        return redirect()->route('dashboard.flash.sale')->with('message','Flash Sale Successfully Created');
    }

    public function edit(Request $request,$id){
        $FlashSaleData = FlashSale::where('id',$id)->first();
        $Products = Products::orderBy('id','DESC')->get();
        return view('backend.flashsale.edit',compact('FlashSaleData','Products'));
    }


    public function update(Request $request,$id){

        $validated = $request->validate([
            'name' => "required|min:5|max:250|unique:flash_sales,name,$id",
            'end_date' => 'required',
            'status' => 'required',
        ]);

        $FlashSaleObj = FlashSale::where('id',$id)->first();
        $FlashSaleObj->name = $request->name;
        $FlashSaleObj->end_date = $request->end_date;
        $FlashSaleObj->status = $request->status;
        $FlashSaleObj->save();
        return redirect()->route('dashboard.flash.sale')->with('message','Flash Sale Successfully Updated');
    }



    public function flashSaleItemStore(Request $request){

        $validated = $request->validate([
            'flash_sale_id' => 'required',
            'products_id' => 'required',
            'price' => 'required',
            'quantity' => 'required',
        ]);

        $FlashSaleItemObj = new FlashSaleItem();
        $FlashSaleItemObj->flash_sale_id = $request->flash_sale_id;
        $FlashSaleItemObj->products_id = $request->products_id;
        $FlashSaleItemObj->price = $request->price;
        $FlashSaleItemObj->quantity = $request->quantity;
        $FlashSaleItemObj->save();
        return redirect()->back()->with('message','Flash Sale Item Successfully Added');
    }

    public function flashSaleItemUpdate(Request $request,$id){

        $validated = $request->validate([
            'flash_sale_id' => 'required',
            'products_id' => 'required',
            'price' => 'required',
            'quantity' => 'required',
        ]);

        $FlashSaleItemObj = FlashSaleItem::find($id);
        $FlashSaleItemObj->flash_sale_id = $request->flash_sale_id;
        $FlashSaleItemObj->products_id = $request->products_id;
        $FlashSaleItemObj->price = $request->price;
        $FlashSaleItemObj->quantity = $request->quantity;
        $FlashSaleItemObj->save();
        return redirect()->back()->with('message','Flash Sale Item Successfully Updated');
    }


    public function flashSaleItemRemove($id){
        $FlashSaleItemObj = FlashSaleItem::find($id);
        $FlashSaleItemObj->delete();
        return redirect()->back()->with('message','Flash Sale Item Successfully Removed');
    }




    public function delete($id){
        $FlashSaleObj = FlashSale::find($id);
        $FlashSaleObj->delete();
        return redirect()->route('dashboard.flash.sale')->with('message','Flashsale Successfully Deleted ');
    }
}
