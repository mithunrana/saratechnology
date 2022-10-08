<?php

namespace App\Http\Controllers\FrontEnd;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(){
        return view('frontend.customer.dashboard');
    }

}
