<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Cart;
use App\Models\Products;
use App\Models\ShippingRule;
use App\Models\Order;
use App\Models\Payment;
use App\Models\OrderAddress;
use App\Models\OrderProduct;
use Session;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function order(Request $request){

        $ShipDifferenceAddress = 0;
        if($request->differentaddress=='on'){
            $ShipDifferenceAddress = 1;
        }

        if($ShipDifferenceAddress==1){
            $this->validate($request,[
                'name' => 'required',
                'mobile' => 'required',
                'address' => 'required',
                'zipcode' => 'required',
                'city' => 'required',
                'country' => 'required',
                'email' => 'required',
                'payment_method' => 'required',
                'shipping_method' => 'required',
                'agree' => 'required',

                'shiping_name' => 'required',
                'shiping_mobile' => 'required',
                'shiping_country' => 'required',
                'shiping_city' => 'required',
                'shiping_address' => 'required',
                'shiping_zipcode' => 'required',
            ]);
        }
        else{
            $this->validate($request,[
                'name' => 'required',
                'mobile' => 'required',
                'zipcode' => 'required',
                'address' => 'required',
                'country' => 'required',
                'city' => 'required',
                'email' => 'required',
                'payment_method' => 'required',
                'shipping_method' => 'required',
                'agree' => 'required',
            ]);
        }

        $name = $request->name;
        $mobile = $request->mobile;
        $country = $request->country;
        $city = $request->city;
        $address = $request->address;
        $zipcode = $request->zipcode;
        $email = $request->email;


        $shiping_name = $request->shiping_name;
        $shiping_mobile = $request->shiping_mobile;
        $shiping_country = $request->shiping_country;
        $shiping_city = $request->shiping_city;
        $shiping_address = $request->shiping_address;
        $shiping_zipcode = $request->shiping_zipcode;
        $shiping_email = $request->shiping_email;
        $shipping_method = $request->shipping_method;
        $description = $request->description;
        $payment_method = $request->payment_method;

        $CartTotal = Session::get('shippingcharge') + str_replace(',', '', Cart::total());
        $CartSubTotal = str_replace(',', '', Cart::subtotal());
        $CartTax = str_replace(',', '', Cart::tax());

        $order = new Order();
        $payment = new Payment();
        $orderaddress = new OrderAddress;
        

        if(Auth::guard('customer')->check()) {
            return $order->customer_id = Auth::guard('customer')->user()->id;
        }
        $order->shipping_method  =  $shipping_method;
        // Currency Set From App Service Provider and Currny Controller For switch
        $order->currency_id = Session::get('Currency')->id;
        $order->tax_amount = $CartTax;
        $order->shipping_amount = Session::get('shippingcharge');
        $order->description = $description;
        $order->discount_amount = 0;
        $order->sub_total = $CartSubTotal;
        $order->save();


        $payment->currency = Session::get('Currency')->id;
        $payment->payment_channel = $payment_method;
        $payment->amount = $CartTotal;
        $payment->order_id = $order->id;
        $payment->status = "pending";
        $payment->save();

        if($ShipDifferenceAddress==1){
            $orderaddress->name  = $shiping_name;
            $orderaddress->phone  = $shiping_mobile;
            $orderaddress->email  = $shiping_email;
            $orderaddress->country  = $shiping_country;
            $orderaddress->city  = $shiping_city;
            $orderaddress->address  = $shiping_address;
            $orderaddress->save();
        }else{
            $orderaddress->name  = $name;
            $orderaddress->phone  = $mobile;
            $orderaddress->email  = $email;
            $orderaddress->country  = $country;
            $orderaddress->city  = $city;
            $orderaddress->zipcode = $zipcode;
            $orderaddress->address  = $address;
            $orderaddress->save();
        }

        foreach(Cart::content() as $row){
            $orderproduct = new OrderProduct;
            $ProductObj = Products::where('id',$row->id)->first();

            $orderproduct->order_id = $order->id;
            $orderproduct->product_id = $row->id;
            $orderproduct->product_name = $ProductObj->name;
            $orderproduct->qty = $row->qty;
            $orderproduct->price = $row->price;
            $orderproduct->weight = 0;
            $orderproduct->save();
        }
        
        Cart::destroy();
       return redirect("sucess")->with('order-sucess-message','Order Successfully Submitted, Order ID: THI000'.$order->id);
    }


    public function sucessOrder(){
        return view('frontend.cart.success');
    }

    public function orderView($id){
        $Order = Order::where('id',$id)->first();
        return view('Admin.order-view',compact('Order'));
    }


    public function orderEdit($id){
        $Order = Order::where('id',$id)->first();
        $Districts = District::all();
        return view('Admin.order-edit',compact('Order','Districts'));
    }


    public function orderUpdate(Request $request,$id){
        $this->validate($request,[
            'Name' => 'required',
            'Mobile' => 'required',
            'Address' => 'required',
        ]);
        
        
        $Selected = Order::where('id',$id)->first();
        $Selected->Status = request('Status');
        $Selected->Comment = request('Comment');
        $Selected->save();
        
        
        $OrderAddress = OrderAddress::where('OrderID',$id)->first();
        $OrderAddress->Name =  request('Name');
        $OrderAddress->Mobile =  request('Mobile');
        $OrderAddress->Email =  request('Email');
        $OrderAddress->Address =  request('Address');
        $OrderAddress->City =  request('City');
        $OrderAddress->save();
        
        return redirect()->to('admin/order-manage')->with('message','Order Update Sucessfully ...');
    }


    public function orderDelete($id){
        $Order = Order::find($id);
        $Address = OrderAddress::where('OrderID',$id)->first();
        
        OrderDetails::where('OrderID',$id)->delete();
        $Address->delete();
        $Order->delete();
        return redirect()->to('admin/order-manage')->with('message','Order Delete Successfully ...');
    }

}
