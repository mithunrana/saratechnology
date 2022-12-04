<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Widget;
use App\Models\WidgetBar;
use App\Models\Menu;
use App\Models\WidgetSetWithWidgetBar;
class WidgetCotroller extends Controller
{
    public function index(){
        $WidgetSets =  WidgetSetWithWidgetBar::get();
        return view('backend.widget.widget',compact('WidgetSets'));
    }


    public function widgetStore(Request $request){
        $this->validate($request, [
            'type' => "required",
            'name' => 'required|unique:widgets,name',
            'model' => "required_if:type,model",
        ]);

        $WidgetObj = new Widget();
        $WidgetObj->type = $request->type;
        $WidgetObj->name = $request->name;
        $WidgetObj->model = $request->model;
        $WidgetObj->save();
        return redirect()->back()->with('message','Widget Successfully Added');
    }


    public function widgetBarStore(Request $request){
        $this->validate($request, [
            'key' => 'required|unique:widgets,name',
            'name' => "required",
        ]);

        $WidgetBarObj = new WidgetBar();
        $WidgetBarObj->key = $request->key;
        $WidgetBarObj->name = $request->name;
        $WidgetBarObj->save();
        return redirect()->back()->with('message','Widget Bar Successfully Added');
    }

    public function widgetSetStore(Request $request){
        $this->validate($request, [
            'widget_id' => "required",
            'widget_bar_id' => "required",
            'widgetshowname' => "required",
        ]);

        $WidgetSetWithWidgetBarObj =  new WidgetSetWithWidgetBar();
        $WidgetSetWithWidgetBarObj->widget_id = $request->widget_id;
        $WidgetSetWithWidgetBarObj->widget_bar_id = $request->widget_bar_id;
        $WidgetSetWithWidgetBarObj->widgetshowname = $request->widgetshowname;
        $WidgetSetWithWidgetBarObj->widgetshowname = $request->widgetshowname;
        $WidgetSetWithWidgetBarObj->menu_id = $request->menu_id;
        $WidgetSetWithWidgetBarObj->number_placement = $request->number_placement;
        $WidgetSetWithWidgetBarObj->content = $request->content;
        $WidgetSetWithWidgetBarObj->order = $request->order;
        $WidgetSetWithWidgetBarObj->save();
        return redirect()->back()->with('message','Widget Successfully Set Widget Bar');
    }


    public function widgetSetUpdate(Request $request,$id){
        $WidgetSetWithWidgetBarObj =  WidgetSetWithWidgetBar::where('id',$id)->first();
        $WidgetSetWithWidgetBarObj->widget_id = $request->widget_id;
        $WidgetSetWithWidgetBarObj->widget_bar_id = $request->widget_bar_id;
        $WidgetSetWithWidgetBarObj->widgetshowname = $request->widgetshowname;
        $WidgetSetWithWidgetBarObj->widgetshowname = $request->widgetshowname;
        $WidgetSetWithWidgetBarObj->menu_id = $request->menu_id;
        $WidgetSetWithWidgetBarObj->number_placement = $request->number_placement;
        $WidgetSetWithWidgetBarObj->content = $request->content;
        $WidgetSetWithWidgetBarObj->order = $request->order;
        $WidgetSetWithWidgetBarObj->save();
        return redirect()->back()->with('message','Widget Bar Widget Successfully Updated');
    }


    public function widgetSetDelete(Request $request,$id){
        $WidgetSetObj = WidgetSetWithWidgetBar::find($id);
        $WidgetSetObj->delete();
        return redirect()->back()->with('message','Widget Successfully Deleted From Widget Bar');
    }
}
