<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Menu_Node;
use App\Models\MenuLocation;
class MenubarController extends Controller
{
    public function index(){
        $Menus = Menu::orderBy('id','DESC')->get();
        $HomeMenu = MenuLocation::where('location','main-menu')->first();
        return view('backend.menubar.menubar',compact('Menus','HomeMenu'));
    }


    public function add(){
        return view('backend.menubar.add');
    }


    public function store(Request $request){
        $this->validate($request, [
            'name' => "required|unique:menus,name",
            'status' => 'required',
        ]);
        $Menuobj  = new Menu();
        $Menuobj->name = $request->name;
        $Menuobj->status = $request->status;
        $Menuobj->save();
        return redirect('admin/menubar')->with('message','Menubar Successfully Added');
    }


    public function edit(Request $request,$id){
        $MenuObj  = Menu::where('id',$id)->first();
        $MenuItemsAll = Menu_Node::where('menu_id',$id)->get();
        $MenuItems = Menu_Node::where('menu_id',$id)->where('parent_id',0)->with('childItems')->get();
        $Locations = MenuLocation::where('menu_id',$id)->pluck('location')->toArray();
        return view('backend.menubar.edit',compact('MenuObj','MenuItems','MenuItemsAll','Locations'));
    }



    public function update(Request $request,$id){
        $this->validate($request, [
            'name' => "required|unique:menus,name,$id",
            'status' => 'required',
        ]);

        $MenuObj  = Menu::where('id',$id)->first();
        $MenuObj->name = $request->name;
        $MenuObj->status = $request->status;
        $MenuObj->save();

        $MenuObj->menuLocation()->detach();
        $MenuObj->menuLocation()->attach($request->locations);

        return redirect('admin/menubar')->with('message','Menubar Successfully Updated');
    }


    public function delete($id){
        $MenuObj = Menu::find($id);
        $MenuObj->delete();
        return redirect()->back()->with('message','Menubar Successfully Deleted');
    }

    

    public function menuItemStore(Request $request){
        $this->validate($request, [
            'menu_id' => "required",
            'title' => "required",
            'url' => 'required',
            'order' => 'required|numeric',
        ]);

        $Menu_NodeObj = new Menu_Node();
        $Menu_NodeObj->menu_id  = $request->menu_id;
        $Menu_NodeObj->title  = $request->title;
        $Menu_NodeObj->url  = $request->url;
        $Menu_NodeObj->icon_font  = $request->icon_font;
        $Menu_NodeObj->css_class  = $request->css_class;
        $Menu_NodeObj->dropdownmega  = $request->dropdownmega;
        $Menu_NodeObj->target  = $request->target;
        $Menu_NodeObj->parent_id  = $request->parent_id;
        $Menu_NodeObj->order  = $request->order;
        $Menu_NodeObj->save();
        return redirect()->back()->with('message','Custom Menu Successfully Added');
    }


    public function menuItemUpdate(Request $request,$id){
        $this->validate($request, [
            'menu_id' => "required",
            'title' => "required",
            'url' => 'required',
            'order' => 'required|numeric',
        ]);

        $Menu_NodeObj  = Menu_Node::where('id',$id)->first();
        $Menu_NodeObj->menu_id  = $request->menu_id;
        $Menu_NodeObj->title  = $request->title;
        $Menu_NodeObj->url  = $request->url;
        $Menu_NodeObj->icon_font  = $request->icon_font;
        $Menu_NodeObj->css_class  = $request->css_class;
        $Menu_NodeObj->dropdownmega  = $request->dropdownmega;
        $Menu_NodeObj->target  = $request->target;
        $Menu_NodeObj->parent_id  = $request->parent_id;
        $Menu_NodeObj->order  = $request->order;
        $Menu_NodeObj->save();
        return redirect()->back()->with('message','Menu Node Successfully Updated');
    }


    public function menuItemDelete($id){
        $Menu_NodeObj = Menu_Node::find($id);
        Menu_Node::where('parent_id',$Menu_NodeObj->id)->delete();
        $Menu_NodeObj->delete();
        return redirect()->back()->with('message','Menu Item Successfully Deleted');
    }

}
