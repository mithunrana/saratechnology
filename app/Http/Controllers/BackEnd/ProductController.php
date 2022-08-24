<?php

namespace App\Http\Controllers\BackEnd;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductBrand;
use App\Models\ProductCategory;
use App\Models\ProductLabel;
use App\Models\ProductCollection;
use App\Models\ProductTax;
use App\Models\ProductTag;
use App\Models\Products;
use App\Models\ProductAttributeSet;
use App\Models\ProductAttribute;
class ProductController extends Controller
{



    public function productsManage(){
        //$GetAllProduct = Products::orderBy('id', 'DESC')->get();
        //return view('product.product',compact('GetAllProduct'));
        $GetProduct = Products::find(1);
        return $GetProduct->tag;
    }

    public function productsAdd(){
        $GetAllTags = ProductTag::get();
        return view('backend.product.add',compact('GetAllTags'));
    }


    public function productStore(Request $request){
        $this->validate($request,[
            'name' => 'required',
            'color' => "required",
            'tags' => 'required',
        ]);

        $ProductObj = new Products();
        $ProductObj->name = '55';
        $ProductObj->content = '55';
        $ProductObj->status = '55';
        $ProductObj->order = '55';
        $ProductObj->allow_checkout_when_out_of_stock = '55';
        $ProductObj->with_storehouse_management = '55';
        $ProductObj->is_featured = '55';
        $ProductObj->options = '55';
        $ProductObj->category_id = '55';
        $ProductObj->brand_id = '55';
        $ProductObj->is_variation = '55';
        $ProductObj->is_searchable = '55';
        $ProductObj->is_show_on_list = '55';
        $ProductObj->sale_type = '55';
        $ProductObj->price = '55';
        $ProductObj->sale_price = '55';
        $ProductObj->start_date = NULL;
        $ProductObj->length = '55';
        $ProductObj->wide = '55';
        $ProductObj->height = '55';
        $ProductObj->barcode = '55';

        $ProductObj->length_unit = '55';
        $ProductObj->wide_unit = '55';
        $ProductObj->height_unit = '55';
        $ProductObj->weight_unit = '55';
        $ProductObj->tax_id = '55';
        $ProductObj->views = '55';
        $ProductObj->stock_status = '55';
        $ProductObj ->save();
        


        //$ProductObj->shift()->detach();
        $ProductObj->tag()->attach($request->tags);
    }

    public function productsEdit(){

    }

    public function productUpdate(){

    }





    public function productsBrandManage(){
        $GetAllProductBrand = ProductBrand::orderBy('id', 'DESC')->get();
        return view('backend.brand.product-brand-manage',compact('GetAllProductBrand'));
    }



    public function productsBrandAdd(){
        return view('backend.brand.product-brand-add');
    }


    public function productBrandStore(Request $request){

        $this->validate($request,[
            'name' => 'required',
            'permalink' => "required|unique:product_brands,permalink",
            'status' => 'required',
        ]);

        $IsFeatured = 0;
        if($request->is_featured=='on'){
            $IsFeatured = 1;
        }else{
            $IsFeatured = 0;
        }
        $ProductBrandObj = new ProductBrand();
        $ProductBrandObj->name = $request->name;
        $ProductBrandObj->permalink = $request->permalink;
        $ProductBrandObj->description = $request->description;
        $ProductBrandObj->website = $request->website;
        $ProductBrandObj->logo = $request->imageurl;
        $ProductBrandObj->order = $request->order;
        $ProductBrandObj->seotitle = $request->seotitle;
        $ProductBrandObj->seodescription = $request->seodescription;
        $ProductBrandObj->status = $request->status;
        $ProductBrandObj->is_featured = $IsFeatured;
        $ProductBrandObj->save();

        return redirect('admin/product-brand')->with('message','Brand Successfully Added');
    }

    public function productsBrandEdit($id){
        $GetBrandData = ProductBrand::where('id',$id)->first();
        return view('backend.brand.product-brand-edit',compact('GetBrandData'));
    }

    public function productBrandUpdate(Request $request,$id){
        $this->validate($request,[
            'name' => 'required',
            'permalink' => "required|unique:product_brands,permalink,$id",
            'status' => 'required',
        ]);

        $IsFeatured = 0;
        if($request->is_featured=='on'){
            $IsFeatured = 1;
        }else{
            $IsFeatured = 0;
        }

        $ProductBrandObj = ProductBrand::findOrFail($id);
        $ProductBrandObj->name = $request->name;
        $ProductBrandObj->permalink = $request->permalink;
        $ProductBrandObj->description = $request->description;
        $ProductBrandObj->website = $request->website;
        $ProductBrandObj->logo = $request->imageurl;
        $ProductBrandObj->order = $request->order;
        $ProductBrandObj->seotitle = $request->seotitle;
        $ProductBrandObj->seodescription = $request->seodescription;
        $ProductBrandObj->status = $request->status;
        $ProductBrandObj->is_featured = $IsFeatured;
        $ProductBrandObj->save();
        return redirect('admin/product-brand')->with('message','Brand Successfully Updated.');
    }




    #================================== PRODUCTS CATEGORY ====================================





    public function productsCategoryManage(){
        $GetAllProductCategory = ProductCategory::orderBy('id', 'DESC')->get();
        return view('backend.category.category',compact('GetAllProductCategory'));
    }

    public function productsCategoryAdd (){
        return view('backend.category.add');
    }


    public function productCategoryStore(Request $request){

        $this->validate($request,[
            'name' => 'required',
            'permalink' => "required|unique:product_categories,permalink",
            'status' => 'required',
        ]);

        $IsFeatured = 0;
        if($request->is_featured=='on'){
            $IsFeatured = 1;
        }else{
            $IsFeatured = 0;
        }
        $ProductBrandObj = new ProductCategory();
        $ProductBrandObj->name = $request->name;
        $ProductBrandObj->permalink = $request->permalink;
        $ProductBrandObj->description = $request->description;
        $ProductBrandObj->order = $request->order;
        $ProductBrandObj->image = $request->imageurl;
        $ProductBrandObj->parent_id = $request->parent_id;
        $ProductBrandObj->seotitle = $request->seotitle;
        $ProductBrandObj->seodescription = $request->seodescription;
        $ProductBrandObj->status = $request->status;
        $ProductBrandObj->is_featured = $IsFeatured;
        $ProductBrandObj->save();

        return redirect('admin/product-category')->with('message','Category Successfully Added');
    }


    public function productsCategoryEdit($id){
        $GetCategoryData = ProductCategory::where('id',$id)->first();
        return view('backend.category.edit',compact('GetCategoryData'));
    }


    public function productCategoryUpdate(Request $request,$id){

        $this->validate($request,[
            'name' => 'required',
            'permalink' => "required|unique:product_categories,permalink,$id",
            'status' => 'required',
        ]);

        $IsFeatured = 0;
        if($request->is_featured=='on'){
            $IsFeatured = 1;
        }else{
            $IsFeatured = 0;
        }

        $ProductBrandObj = ProductCategory::findOrFail($id);
        $ProductBrandObj->name = $request->name;
        $ProductBrandObj->permalink = $request->permalink;
        $ProductBrandObj->description = $request->description;
        $ProductBrandObj->order = $request->order;
        $ProductBrandObj->image = $request->imageurl;
        $ProductBrandObj->parent_id = $request->parent_id;
        $ProductBrandObj->seotitle = $request->seotitle;
        $ProductBrandObj->seodescription = $request->seodescription;
        $ProductBrandObj->status = $request->status;
        $ProductBrandObj->is_featured = $IsFeatured;
        $ProductBrandObj->save();

        return redirect('admin/product-category')->with('message','Category Successfully Updated');
    }


    #================================== PRODUCTS Label ====================================


    public function productsLabelManage(){
        $GetAllProductLabel = ProductLabel::orderBy('id', 'DESC')->get();
        return view('backend.label.label',compact('GetAllProductLabel'));
    }

    public function productsLabelAdd (){
        return view('backend.label.add');
    }


    public function productLabelstore(Request $request){

        $this->validate($request,[
            'name' => 'required',
            'color' => "required",
            'status' => 'required',
        ]);

        $IsFeatured = 0;
        if($request->is_featured=='on'){
            $IsFeatured = 1;
        }else{
            $IsFeatured = 0;
        }

        $ProductLableObj = new ProductLabel();
        $ProductLableObj->name = $request->name;
        $ProductLableObj->color = $request->color;
        $ProductLableObj->status = $request->status;
        $ProductLableObj->save();

        return redirect('admin/product-label')->with('message','Label Successfully Added');
    }


    public function productsLabelEdit($id){
        $GetLabelData = ProductLabel::where('id',$id)->first();
        return view('backend.label.edit',compact('GetLabelData'));
    }


    public function productLabelUpdate(Request $request,$id){

        $this->validate($request,[
            'name' => 'required',
            'color' => "required",
            'status' => 'required',
        ]);

        $IsFeatured = 0;
        if($request->is_featured=='on'){
            $IsFeatured = 1;
        }else{
            $IsFeatured = 0;
        }

        $ProductLableObj = ProductLabel::findOrFail($id);
        $ProductLableObj->name = $request->name;
        $ProductLableObj->color = $request->color;
        $ProductLableObj->status = $request->status;
        $ProductLableObj->save();

        return redirect('admin/product-label')->with('message','Label Successfully Updated');
    }



    

    #================================== PRODUCTS Collection ====================================



    public function productCollectionManage(){
        $GetAllProductCollection = ProductCollection::orderBy('id', 'DESC')->get();
        return view('backend.collection.collection',compact('GetAllProductCollection'));
    }

    public function productsCollectionAdd (){
        return view('backend.collection.add');
    }


    public function productCollectionstore(Request $request){

        $this->validate($request,[
            'name' => 'required',
            'slug' => "required",
            'status' => 'required',
        ]);

        $IsFeatured = 0;
        if($request->is_featured=='on'){
            $IsFeatured = 1;
        }else{
            $IsFeatured = 0;
        }

        $ProductCollectionObj = new ProductCollection();
        $ProductCollectionObj->name = $request->name;
        $ProductCollectionObj->slug = $request->slug;
        $ProductCollectionObj->description = $request->description;
        $ProductCollectionObj->image = $request->imageurl;
        $ProductCollectionObj->status = $request->status;
        $ProductCollectionObj->save();

        return redirect('admin/product-collection')->with('message','Collection Successfully Added');
    }


    public function productsCollectionEdit($id){
        $GetCollectionData = ProductCollection::where('id',$id)->first();
        return view('backend.collection.edit',compact('GetCollectionData'));
    }


    public function productCollectionUpdate(Request $request,$id){

        $this->validate($request,[
            'name' => 'required',
            'slug' => "required",
            'status' => 'required',
        ]);

        $IsFeatured = 0;
        if($request->is_featured=='on'){
            $IsFeatured = 1;
        }else{
            $IsFeatured = 0;
        }

        $ProductCollectionObj = ProductCollection::findOrFail($id);
        $ProductCollectionObj->name = $request->name;
        $ProductCollectionObj->slug = $request->slug;
        $ProductCollectionObj->description = $request->description;
        $ProductCollectionObj->image = $request->imageurl;
        $ProductCollectionObj->status = $request->status;
        $ProductCollectionObj->save();

        return redirect('admin/product-collection')->with('message','Collection Successfully Updated');
    }







    #================================== PRODUCTS TAGS ====================================


    
    public function productTagsManage(){
        $GetAllProducTags = ProductTag::orderBy('id', 'DESC')->get();
        return view('backend.tags.tags',compact('GetAllProducTags'));
    }


    public function productsTagsAdd (){
        return view('backend.tags.add');
    }


    public function productTagsstore(Request $request){

        $this->validate($request,[
            'name' => 'required',
            'slug' => "required|unique:product_tags,slug",
            'status' => 'required',
        ]);

        $ProductTaxesObj = new ProductTag();
        $ProductTaxesObj->name = $request->name;
        $ProductTaxesObj->description = $request->description;
        $ProductTaxesObj->slug = $request->slug;
        $ProductTaxesObj->seotitle = $request->seotitle;
        $ProductTaxesObj->seodescription = $request->seodescription;
        $ProductTaxesObj->status = $request->status;
        $ProductTaxesObj->save();

        return redirect('admin/product-tags')->with('message','Tag Created Successfully');
    }


    public function productsTagsEdit($id){
        $GetTagData = ProductTag::where('id',$id)->first();
        return view('backend.tags.edit',compact('GetTagData'));
    }


    public function productTagsUpdate(Request $request,$id){

        $this->validate($request,[
            'name' => 'required',
            'slug' => "required|unique:product_tags,slug,$id",
            'status' => 'required',
        ]);


        $ProductTaxesObj = ProductTag::findOrFail($id);
        $ProductTaxesObj->name = $request->name;
        $ProductTaxesObj->description = $request->description;
        $ProductTaxesObj->slug = $request->slug;
        $ProductTaxesObj->seotitle = $request->seotitle;
        $ProductTaxesObj->seodescription = $request->seodescription;
        $ProductTaxesObj->status = $request->status;
        $ProductTaxesObj->save();

        return redirect('admin/product-tags')->with('message','Tag Updated Successfully');
    }







    #================================== PRODUCTS TAXES ====================================


    

    public function productTaxesManage(){
        $GetAllProductTaxes = ProductTax::orderBy('id', 'DESC')->get();
        return view('backend.taxes.taxes',compact('GetAllProductTaxes'));
    }

    public function productsTaxesAdd (){
        return view('backend.taxes.add');
    }


    public function productTaxesstore(Request $request){

        $this->validate($request,[
            'title' => 'required',
            'percentage' => "required|numeric",
            'status' => 'required',
            'priority' => 'numeric',
        ]);

        $ProductTaxesObj = new ProductTax();
        $ProductTaxesObj->title = $request->title;
        $ProductTaxesObj->percentage = $request->percentage;
        $ProductTaxesObj->priority = $request->priority;
        $ProductTaxesObj->status = $request->status;
        $ProductTaxesObj->save();

        return redirect('admin/product-taxes')->with('message','Tax Created Successfully');
    }


    public function productsTaxesEdit($id){
        $GetTaxesData = ProductTax::where('id',$id)->first();
        return view('backend.taxes.edit',compact('GetTaxesData'));
    }


    public function productTaxesUpdate(Request $request,$id){

        $this->validate($request,[
            'title' => 'required',
            'percentage' => "required|numeric",
            'priority' => 'numeric',
            'status' => 'required',
        ]);


        $ProductTaxesObj = ProductTax::findOrFail($id);
        $ProductTaxesObj->title = $request->title;
        $ProductTaxesObj->percentage = $request->percentage;
        $ProductTaxesObj->priority = $request->priority;
        $ProductTaxesObj->status = $request->status;
        $ProductTaxesObj->save();

        return redirect('admin/product-taxes')->with('message','Tax Updated Successfully');
    }





    #================================== PRODUCTS ATTRIBUTE ====================================


    

        public function productAttributeManage(){
            $GetAllProductAttribute = ProductAttributeSet::orderBy('id', 'DESC')->get();
            return view('backend.attribute.attribute',compact('GetAllProductAttribute'));
        }
    

        public function productsAttributeAdd (){
            return view('backend.attribute.add');
        }
    
        public function productAttributestore(Request $request){
    
            $this->validate($request,[
                'title' => 'required',
                'slug' => "required",
                'status' => 'required',
                'display_layout' => 'required',
            ]);

            return $request->all();
    
            /*$ProductTaxesObj = new ProductTax();
            $ProductTaxesObj->title = $request->title;
            $ProductTaxesObj->percentage = $request->percentage;
            $ProductTaxesObj->priority = $request->priority;
            $ProductTaxesObj->status = $request->status;
            $ProductTaxesObj->save(); */
    
            //return redirect('admin/product-attribute')->with('message','Attribute Created Successfully');
        }
    
    
        public function productsAttributeEdit($id){
            $GetTaxesData = ProductTax::where('id',$id)->first();
            return view('backend.attribute.edit',compact('GetTaxesData'));
        }
    
    
        public function productAttributeUpdate(Request $request,$id){
    
            $this->validate($request,[
                'title' => 'required',
                'percentage' => "required|numeric",
                'priority' => 'numeric',
                'status' => 'required',
            ]);
    
    
            $ProductTaxesObj = ProductTax::findOrFail($id);
            $ProductTaxesObj->title = $request->title;
            $ProductTaxesObj->percentage = $request->percentage;
            $ProductTaxesObj->priority = $request->priority;
            $ProductTaxesObj->status = $request->status;
            $ProductTaxesObj->save();
    
            return redirect('admin/product-attribute')->with('message','Attribute Updated Successfully');
        }

}

