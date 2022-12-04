<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
class ServiceController extends Controller
{
    public function index(){
        $ServiceList = Service::where('status','published')->orderBy('order', 'ASC')->get();
        return view('frontend.service',compact('ServiceList'));
    }

}
