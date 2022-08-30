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
        $GetAllProduct = Products::orderBy('id', 'DESC')->get();
        //return view('product.product',compact('GetAllProduct'));
        //$GetProduct = Products::find(1);
        //return $GetProduct->tag;
        //return 1;
        return view('backend.product.products',compact('GetAllProduct'));
    }

    public function productsAdd(){
        $GetAllActiveProduct = Products::get();
        $GetAllTags = ProductTag::get();
        $Categories = ProductCategory::whereNull('parent_id')->with('childItems')->get();
        $GetAllProductCollection = ProductCollection::get();
        $GetAllProductLabel = ProductLabel::get();
        $Brands  = ProductBrand::get();
        $GetAllProductTaxes = ProductTax::get();
        $GetAllProductAttributeSet = ProductAttributeSet::get();
        return view('backend.product.add',compact('GetAllTags','Categories','GetAllProductCollection','GetAllProductLabel','Brands','GetAllProductTaxes','GetAllActiveProduct','GetAllProductAttributeSet'));
    }


    public function productStore(Request $request){
        $this->validate($request,[
            'name' => 'required',
            'permalink' => 'required',
            'tax_id' => 'required',
        ]);

        $is_featured = 0;
        if($request->is_featured=='on'){
            $is_featured = 1;
        }

        $allow_checkout_when_out_of_stock = 0;
        if($request->allow_checkout_when_out_of_stock=='on'){
            $allow_checkout_when_out_of_stock = 1;
        }

        $with_storehouse_management = 0;
        if($request->with_storehouse_management=='on'){
            $with_storehouse_management = 1;
        }

        $images = array();
        if($request->images){
            $images = '["'.implode('","',$request->images).'"]';
        }else{
            $images = '[]';
        }
       
        $ProductObj  = new Products();
        $ProductObj->name = $request->name;
        $ProductObj->permalink = $request->permalink;
        $ProductObj->description = $request->description;
        $ProductObj->content = $request->content;
        $ProductObj->status = $request->status;
        $ProductObj->images = $images;
        $ProductObj->is_featured = $is_featured;
        $ProductObj->sku = $request->sku;
        $ProductObj->quantity = $request->quantity;
        
        $ProductObj->allow_checkout_when_out_of_stock = $allow_checkout_when_out_of_stock;
        $ProductObj->with_storehouse_management = $with_storehouse_management;
        $ProductObj->price = $request->price;
        $ProductObj->sale_price = $request->sale_price;
        $ProductObj->length = $request->length;
        $ProductObj->wide = $request->wide;
        $ProductObj->height = $request->height;
        $ProductObj->weight = $request->weight;
        $ProductObj->discount_start_date = $request->discount_start_date;
        $ProductObj->discount_end_date = $request->discount_end_date;

        $ProductObj->brand_id = $request->brand_id;
        $ProductObj->is_variation = 0;
        $ProductObj->is_searchable = 0;
        $ProductObj->is_show_on_list = 0;
        $ProductObj->tax_id = $request->tax_id;

        $ProductObj->stock_status = $request->stock_status;
        $ProductObj->imagealttext = $request->imagealttext;
        $ProductObj->imagetitletext = $request->imagetitletext;
        $ProductObj->title = $request->title;
        $ProductObj->metakeyword = $request->metakeyword;
        $ProductObj->metadescription = $request->metadescription;

        $ProductObj->save();
        
        //$ProductObj->shift()->detach();
        $ProductObj->tag()->attach($request->tags);
        $ProductObj->categories()->attach($request->categories);

        return redirect('admin/product')->with('message','Product Successfully Added');
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
            //return $GetAllProductAttribute;
        }

        public function productsAttributeAdd (){
            return view('backend.attribute.add');
        }
    
        public function productAttributestore(Request $request){
    
            $this->validate($request,[
                'title' => 'required',
                'slug' => "required",
                'status' => 'required',
                'order' => 'required',
                'display_layout' => 'required',
            ]);

            $Is_comparable = 0;
            $Is_searchable = 0;
            $Is_use_in_product_listing = 0;

            if($request->Is_comparable=='on'){
                $is_comparable = 0;
            }

            if($request->is_searchable=='on'){
                $Is_searchable = 1;
            }

            if($request->is_use_in_product_listing=='on'){
                $Is_use_in_product_listing = 1;
            }

            $ProductAttributeSetObj = new ProductAttributeSet();

            $ProductAttributeSetObj->title = $request->title;
            $ProductAttributeSetObj->slug = $request->slug;
            $ProductAttributeSetObj->display_layout = $request->display_layout;
            $ProductAttributeSetObj->is_searchable = $Is_searchable;
            $ProductAttributeSetObj->is_comparable = $Is_comparable;
            $ProductAttributeSetObj->status = $request->status;
            $ProductAttributeSetObj->order = $request->order;
            $ProductAttributeSetObj->is_use_in_product_listing = $Is_use_in_product_listing;
            $ProductAttributeSetObj->save();

            $IsDeafultHidden = $request->is_defaulthidden;
            $AttributeTitleArray = $request->attributetitle;
            $AttributeSlugArray = $request->attributeslug;
            $AttributeColorArray = $request->attributecolor;
            $AttributeIsdefaultArray = $request->fordefaultselect;

            if($request->attributetitle){
                foreach($AttributeTitleArray as $key => $val){
                    if($AttributeTitleArray[$key] !='' && $AttributeSlugArray[$key] !='' && $AttributeColorArray[$key] !=''){
                        $ProductAttributeObj = new ProductAttribute();
                        $ProductAttributeObj->attribute_set_id = $ProductAttributeSetObj->id;
                        $ProductAttributeObj->title = $AttributeTitleArray[$key];
                        $ProductAttributeObj->slug = $AttributeSlugArray[$key];
                        $ProductAttributeObj->color = $AttributeColorArray[$key];
                        if($IsDeafultHidden==$AttributeIsdefaultArray[$key]){
                            $ProductAttributeObj->is_default = 1;
                        }else{
                            $ProductAttributeObj->is_default = 0;
                        }
                        $ProductAttributeObj->status = $request->status;
                        $ProductAttributeObj->save();
                    }
                }  
            }
            return redirect('admin/product-attribute')->with('message','Attribute Created Successfully');
        }
    
    
        public function productsAttributeEdit($id){
            $GetAttributeSetData = ProductAttributeSet::where('id',$id)->first();
            $GetProductAttribute = ProductAttribute::where('attribute_set_id',$GetAttributeSetData->id)->get();
            $ProductAttributeCount = count($GetProductAttribute);
            return view('backend.attribute.edit',compact('GetAttributeSetData','GetProductAttribute','ProductAttributeCount'));
        }
    
    
        public function productAttributeUpdate(Request $request,$id){

            $this->validate($request,[
                'title' => 'required',
                'slug' => "required",
                'status' => 'required',
                'order' => 'required',
                'display_layout' => 'required',
            ]);

            $Is_comparable = 0;
            $Is_searchable = 0;
            $Is_use_in_product_listing = 0;

            if($request->Is_comparable=='on'){
                $is_comparable = 0;
            }

            if($request->is_searchable=='on'){
                $Is_searchable = 1;
            }

            if($request->is_use_in_product_listing=='on'){
                $Is_use_in_product_listing = 1;
            }

            $ProductAttributeSetObj =  ProductAttributeSet::findOrFail($id);

            $ProductAttributeSetObj->title = $request->title;
            $ProductAttributeSetObj->slug = $request->slug;
            $ProductAttributeSetObj->display_layout = $request->display_layout;
            $ProductAttributeSetObj->is_searchable = $Is_searchable;
            $ProductAttributeSetObj->is_comparable = $Is_comparable;
            $ProductAttributeSetObj->status = $request->status;
            $ProductAttributeSetObj->order = $request->order;
            $ProductAttributeSetObj->is_use_in_product_listing = $Is_use_in_product_listing;
            $ProductAttributeSetObj->save();

            $IsDeafultHidden = $request->is_defaulthidden;
            $AttributeTitleArray = $request->attributetitle;
            $AttributeSlugArray = $request->attributeslug;
            $AttributeColorArray = $request->attributecolor;
            $AttributeIsdefaultArray = $request->fordefaultselect;
            ProductAttribute::where('attribute_set_id', $id)->delete();

            if($request->attributetitle){
                foreach($AttributeTitleArray as $key => $val){
                    if($AttributeTitleArray[$key] !='' && $AttributeSlugArray[$key] !='' && $AttributeColorArray[$key] !=''){
                        $ProductAttributeObj = new ProductAttribute();
                        $ProductAttributeObj->attribute_set_id = $ProductAttributeSetObj->id;
                        $ProductAttributeObj->title = $AttributeTitleArray[$key];
                        $ProductAttributeObj->slug = $AttributeSlugArray[$key];
                        $ProductAttributeObj->color = $AttributeColorArray[$key];
                        if($IsDeafultHidden==$AttributeIsdefaultArray[$key]){
                            $ProductAttributeObj->is_default = 1;
                        }else{
                            $ProductAttributeObj->is_default = 0;
                        }
                        $ProductAttributeObj->status = $request->status;
                        $ProductAttributeObj->save();
                    }
                }  
            }

            
            return redirect('admin/product-attribute')->with('message','Attribute Successfully Updated');
        }

}

