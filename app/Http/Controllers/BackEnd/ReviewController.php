<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reviews;
class ReviewController extends Controller
{
    public function index(){
        $GetAllReview = Reviews::orderBy('id', 'DESC')->get();
        return view('backend.review.review', compact('GetAllReview'));
    }

    public function edit(Request $request,$id){
        $ReviewDetails =  Reviews::where('id', $id)->first();
        return view('backend.review.edit', compact('ReviewDetails'));
    }

    public function update(Request $request,$id){
        $this->validate($request, [
            'star' => 'required',
            'comment' => "required",
        ]);

        $ReviewObj = Reviews::findOrFail($id);
        $ReviewObj->star = $request->star;
        $ReviewObj->comment = $request->comment;
        $ReviewObj->save();
        return redirect('admin/reviews')->with('message', 'Review Successfully Updated');
    }

    public function delete($id){
        $ReviewObj = Reviews::find($id);
        $ReviewObj->delete();
        return redirect()->to('admin/reviews')->with('message','Review Successfully Deleted');
    }
}
