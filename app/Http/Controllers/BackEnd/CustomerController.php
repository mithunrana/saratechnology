<?php

namespace App\Http\Controllers\backend;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function index(){
        $GetCustomer = Customer::get();
        return view('backend.customer.customer',compact('GetCustomer'));
    }

    public function add(){
        return view('backend.customer.add');
    }

    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|unique:customers,email',
            'password' => 'min:6|required_with:retype_password|same:retype_password',
            'retype_password' => 'min:6',
        ]);

        $CustomerObj = new Customer();
        $CustomerObj->name = $request->name;
        $CustomerObj->email = $request->email;
        $CustomerObj->password = Hash::make($request->password);
        $CustomerObj->save();

        return redirect('admin/customer')->with('message', 'Customer Information Successfully Added');
    }

    public function edit(Request $request,$id){
        $CustomerObj = Customer::where('id',$id)->first();
        return view('backend.customer.edit',compact('CustomerObj'));
    }

    public function update(Request $request,$id){

        $ChangePassword = 0;
        if ($request->change_password == 'on') {
            $ChangePassword = 1;
        }
        
        if($ChangePassword==0){
            $this->validate($request, [
                'name' => 'required',
                "email' => 'required|unique:customers,email,$id",
            ]);
        }else{
            $this->validate($request, [
                'name' => 'required',
                'email' => "required|unique:customers,email,$id",
                'password' => 'min:6|required_with:retype_password|same:retype_password',
                'retype_password' => 'min:6',
            ]);
        }


        $CustomerObj = Customer::where('id',$id)->first();
        $CustomerObj->name = $request->name;
        $CustomerObj->email = $request->email;
        if($ChangePassword==1){
            $CustomerObj->password = Hash::make($request->password);
        }
        $CustomerObj->save();

        return redirect('admin/customer')->with('message', 'Customer Information Successfully Updated');

    }
}
