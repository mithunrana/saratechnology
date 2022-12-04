<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
class ServiceController extends Controller
{
    public function index(){
        $ServiceList = Service::orderBy('id', 'DESC')->get();
        return view('backend.service.service', compact('ServiceList'));
    }

    public function add(){
        return view('backend.service.add');
    }

    public function store(Request $request){

        $this->validate($request, [
            'name' => 'required',
            'permalink' => "required|unique:services,permalink",
            'status' => 'required',
            'order' => 'required',
        ]);

        $IsFeatured = 0;
        if ($request->is_featured == 'on') {
            $IsFeatured = 1;
        } else {
            $IsFeatured = 0;
        }

        $ServiceObj = new Service();
        $ServiceObj->name = $request->name;
        $ServiceObj->permalink = $request->permalink;
        $ServiceObj->description = $request->description;
        $ServiceObj->content = $request->content;
        $ServiceObj->status = $request->status;
        $ServiceObj->order = $request->order;
        $ServiceObj->is_featured = $IsFeatured;
        $ServiceObj->image = $request->imageurl;
        $ServiceObj->seotitle = $request->seotitle;
        $ServiceObj->seodescription = $request->seodescription;
        $ServiceObj->save();
        return redirect('admin/service')->with('message', 'Service Successfully Added');
    }



    public function edit(Request $request,$id){
        $ServiceData = Service::where('id', $id)->first();
        return view('backend.service.edit', compact('ServiceData'));
    }

    public function update(Request $request,$id){
        $this->validate($request, [
            'name' => 'required',
            'permalink' => "required|unique:services,permalink,$id",
            'status' => 'required',
            'order' => 'required',
        ]);

        $IsFeatured = 0;
        if ($request->is_featured == 'on') {
            $IsFeatured = 1;
        } else {
            $IsFeatured = 0;
        }

        $ServiceObj = Service::findOrFail($id);
        $ServiceObj->name = $request->name;
        $ServiceObj->permalink = $request->permalink;
        $ServiceObj->description = $request->description;
        $ServiceObj->content = $request->content;
        $ServiceObj->status = $request->status;
        $ServiceObj->order = $request->order;
        $ServiceObj->is_featured = $IsFeatured;
        $ServiceObj->image = $request->imageurl;
        $ServiceObj->seotitle = $request->seotitle;
        $ServiceObj->seodescription = $request->seodescription;
        $ServiceObj->save();
        return redirect('admin/service')->with('message', 'Service Successfully Updated');
    }

    public function delete($id){
        $ServiceObj = Service::find($id);
        $ServiceObj->delete();
        return redirect()->to('admin/service')->with('message','Servicse Successfully Deleted');
    }
}
