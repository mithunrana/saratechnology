<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function productsBrandManage(){
        return view('backend.product-brand-manage');
    }

    public function productsBrandAdd(){
        return view('backend.product-brand-add');
    }

    public function productStore(Request $request){
        return $request->all();
    }
}
