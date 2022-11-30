<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
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
use App\Models\ProductVariation;

class ProductController extends Controller
{


    public function productsManage()
    {
        $GetAllProduct = Products::orderBy('id', 'DESC')->get();
        return view('backend.product.products', compact('GetAllProduct'));
    }

    public function productsAdd()
    {
        $GetAllActiveProduct = Products::get();
        $GetAllTags = ProductTag::get();
        $Categories = ProductCategory::whereNull('parent_id')->with('childItems')->get();
        $GetAllProductCollection = ProductCollection::get();
        $GetAllProductLabel = ProductLabel::get();
        $Brands  = ProductBrand::get();
        $GetAllProductTaxes = ProductTax::get();
        $GetAllProductAttributeSet = ProductAttributeSet::get();
        return view('backend.product.add', compact('GetAllTags', 'Categories', 'GetAllProductCollection', 'GetAllProductLabel', 'Brands', 'GetAllProductTaxes', 'GetAllActiveProduct', 'GetAllProductAttributeSet'));
    }


    public function productStore(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'permalink' => 'required',
            'tax_id' => 'required',
        ]);

        $images = array();
        if ($request->images) {
            //$images = '["'.implode('","',$request->images).'"]';
            $images = implode('"', $request->images);
        } else {
            $images = '';
        }

        $ProductObj  = new Products();
        $ProductObj->name = $request->name;
        $ProductObj->permalink = $request->permalink;
        $ProductObj->description = $request->description;
        $ProductObj->content = $request->content;
        $ProductObj->status = $request->status;
        $ProductObj->images = $images;
        $ProductObj->is_featured = $request->is_featured ? 1 : 0;
        $ProductObj->sku = $request->sku;
        $ProductObj->quantity = $request->quantity;

        $ProductObj->allow_checkout_when_out_of_stock = $request->allow_checkout_when_out_of_stock ? 1 : 0;
        $ProductObj->with_storehouse_management = $request->with_storehouse_management ? 1 : 0;
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

        $ProductObj->tag()->attach($request->tags);
        $ProductObj->categories()->attach($request->categories);
        $ProductObj->relatedProduct()->attach($request->relatedproduct);
        $ProductObj->crossSellingProduct()->attach($request->crosssellingproduct);
        $ProductObj->productLabel()->attach($request->label);
        $ProductObj->productCollection()->attach($request->collection);
        $ProductObj->productImages()->attach($request->imagesID);

        $AttributeSetArray = $request->attributeset;
        $AttributeArray = $request->attribute;
        $Variation = 0;

        if ($request->attribute) {
            foreach ($AttributeArray as $key => $val) {
                if ($AttributeArray[$key] != '') {
                    $ProductObj->attributeSet()->attach($AttributeSetArray[$key]);
                    $Variation++;
                }
            }

            if ($Variation != 0) {
                $ProductVariationObj = new ProductVariation();
                $ProductVariationObj->products_id  = $ProductObj->id;
                $ProductVariationObj->sku  = $ProductObj->sku;
                $ProductVariationObj->quantity  = $ProductObj->quantity;
                $ProductVariationObj->allow_checkout_when_out_of_stock  = $ProductObj->allow_checkout_when_out_of_stock;
                $ProductVariationObj->with_storehouse_management  = $ProductObj->with_storehouse_management;
                $ProductVariationObj->stock_status = $request->stock_status;
                $ProductVariationObj->price  = $ProductObj->price;
                $ProductVariationObj->sale_price  = $ProductObj->sale_price;
                $ProductVariationObj->length  = $ProductObj->length;
                $ProductVariationObj->wide  = $ProductObj->wide;
                $ProductVariationObj->height  = $ProductObj->height;
                $ProductVariationObj->weight  = $ProductObj->weight;
                $ProductVariationObj->discount_start_date  = $ProductObj->discount_start_date;
                $ProductVariationObj->discount_end_date  = $ProductObj->discount_end_date;

                $ProductVariationObj->barcode  = $ProductObj->barcode;
                $ProductVariationObj->length_unit  = $ProductObj->length_unit;
                $ProductVariationObj->wide_unit  = $ProductObj->wide_unit;
                $ProductVariationObj->height_unit  = $ProductObj->height_unit;
                $ProductVariationObj->is_default  = 1;
                $ProductVariationObj->save();

                foreach ($AttributeArray as $key => $val) {
                    if ($AttributeArray[$key] != '') {
                        $ProductVariationObj->attribute()->attach($val,['product_attribute_set_id' => $AttributeSetArray[$key],'products_id'=>$ProductObj->id]);
                    }
                }
            }
        }
        return redirect('admin/product')->with('message', 'Product Successfully Added');
    }



    
    public function productVariationStore(Request $request){

        $validated = $request->validate([
            'discount_start_date' => 'required',
            'discount_end_date' => 'required',
            'price' => 'required',
        ]);

        $ProductVariationObj = new ProductVariation();
        $ProductVariationObj->products_id = $request->products_id;
        $ProductVariationObj->quantity = $request->quantity;
        $ProductVariationObj->allow_checkout_when_out_of_stock = $request->allow_checkout_when_out_of_stock ? 1 : 0;
        $ProductVariationObj->with_storehouse_management = $request->with_storehouse_management ? 1 : 0;
        $ProductVariationObj->sku = $request->sku;
        $ProductVariationObj->price = $request->price;
        $ProductVariationObj->sale_price = $request->sale_price;
        $ProductVariationObj->length = $request->length;
        $ProductVariationObj->wide = $request->wide;
        $ProductVariationObj->height = $request->height;
        $ProductVariationObj->weight = $request->weight;
        $ProductVariationObj->discount_start_date = $request->discount_start_date;
        $ProductVariationObj->discount_end_date = $request->discount_end_date;
        $ProductVariationObj->save();

        $AttributeListArray = $request->attribute_list;
        $AttributeSetArray = $request->attributeset_list;

        foreach($AttributeListArray as $key => $Val){
            if($AttributeListArray[$key] != ''){
                $ProductVariationObj->attribute()->attach($AttributeListArray[$key],['product_attribute_set_id' => $AttributeSetArray[$key],'products_id'=>$request->products_id]);
            }
        }

        return response()->json($ProductVariationObj);
    }


    
    public function productVariationUpdate(Request $request)
    {

        $validated = $request->validate([
            'discount_start_date' => 'required',
            'discount_end_date' => 'required',
            'price' => 'required',
        ]);

        $ProductVariationObj = ProductVariation::where('id',$request->variationid)->first();
        $ProductVariationObj->quantity = $request->quantity;
        $ProductVariationObj->allow_checkout_when_out_of_stock = $request->allow_checkout_when_out_of_stock ? 1 : 0;
        $ProductVariationObj->with_storehouse_management = $request->with_storehouse_management ? 1 : 0;
        $ProductVariationObj->sku = $request->sku;
        $ProductVariationObj->price = $request->price;
        $ProductVariationObj->sale_price = $request->sale_price;
        $ProductVariationObj->length = $request->length;
        $ProductVariationObj->wide = $request->wide;
        $ProductVariationObj->height = $request->height;
        $ProductVariationObj->weight = $request->weight;
        $ProductVariationObj->discount_start_date = $request->discount_start_date;
        $ProductVariationObj->discount_end_date = $request->discount_end_date;
        $ProductVariationObj->save();

        $ProductVariationObj->attribute()->detach();

        $AttributeListArray = $request->attribute_list;
        $AttributeSetArray = $request->attributeset_list;

        foreach($AttributeListArray as $key => $Val){
            if($AttributeListArray[$key] != ''){
                $ProductVariationObj->attribute()->attach($AttributeListArray[$key],['product_attribute_set_id' => $AttributeSetArray[$key],'products_id'=>$ProductVariationObj->products_id]);
            }
        }

        return response()->json($ProductVariationObj);
    }



    public function productVariationDelete($id)
    {
        //$VariationID = $id;
        $VariationObj = ProductVariation::where('id',$id)->first();
        $ProductObj = Products::where('id',$VariationObj->products_id)->first();
        $VariationCount = ProductVariation::where('products_id',$ProductObj->id)->count();
        if($VariationCount==1){
            $ProductObj->quantity = $VariationObj->quantity;
            $ProductObj->sku = $VariationObj->sku;
            $ProductObj->allow_checkout_when_out_of_stock = $VariationObj->allow_checkout_when_out_of_stock ? 1 : 0;
            $ProductObj->with_storehouse_management = $VariationObj->with_storehouse_management ? 1 : 0;
            $ProductObj->stock_status = $VariationObj->stock_status;
            $ProductObj->price = $VariationObj->price;
            $ProductObj->sale_price = $VariationObj->sale_price;
            $ProductObj->length = $VariationObj->length;
            $ProductObj->wide = $VariationObj->wide;
            $ProductObj->height =$VariationObj->height;
            $ProductObj->weight = $VariationObj->weight;
            $ProductObj->discount_start_date = $VariationObj->discount_start_date;
            $ProductObj->discount_end_date = $VariationObj->discount_end_date;
            $ProductObj->save();
            $ProductObj->attributeSet()->detach();
            $VariationObj->attribute()->detach();
            $VariationObj->delete();
            return redirect()->back()->with('message','Variation Successfully Deleted');
        }else{
            $VariationObj->attribute()->detach();
            $VariationObj->delete();
            $SetDefaultObj = ProductVariation::where('products_id',$ProductObj->id)->first();
            $SetDefaultObj->is_default = 1;
            $SetDefaultObj->save();
            return redirect()->back()->with('message','Variation Successfully Deleted');
        }
    }


    public function productWithAttributeSetUpdate(Request $request){
        $validated = $request->validate([
            'products_id' => 'required',
        ]);
        
        $ProductObj = Products::where('id',$request->products_id)->first();
        $ProductObj->attributeSet()->detach();
        $ProductObj->attributeSet()->attach($request->attributesetlist);

        $CurrentVariation = $ProductObj->productVariation->pluck('id')->toArray();
        $CurrentAttributeSet = $ProductObj->attributeset->pluck('id')->toArray();
        $DeleteableAttributeList = DB::table('product_attributes')->select('id')->whereNotIn('attribute_set_id',$CurrentAttributeSet)->pluck('id')->toArray();
        DB::table('variation_with_attribute')->whereIn('product_variation_id', $CurrentVariation)->whereIn('product_attribute_id', $DeleteableAttributeList)->delete();

        $response = ['message' => 'Attribute Set Sucessfully Updated'];
        return response()->json($response,200);
    }


    public function productsEdit($id)
    {
        $Product = Products::where('id', $id)->first();
        $data['Product'] = $Product;
        $data['ProductCategories'] = $Product->categories->pluck('id')->toArray();
        $data['ProductLabels'] = $Product->productLabel->pluck('id')->toArray();
        $data['ProductCollection'] = $Product->productCollection->pluck('id')->toArray();
        $data['RelatedProducts'] = $Product->relatedProduct->pluck('id')->toArray();
        $data['CrossSellingProducts'] = $Product->crossSellingProduct->pluck('id')->toArray();
        $data['CurrentAttributeSet'] = $Product->attributeset->pluck('id')->toArray();
        $data['ProductTags'] = $Product->tag->pluck('id')->toArray();
        return view('backend.product.product-edit', $data);
    }


    public function productUpdate(Request $request,$id)
    {
        $ProductObj = Products::findOrFail($id);

        $this->validate($request, [
            'name' => 'required',
            'permalink' => "required|unique:products,permalink,$id",
            'tax_id' => 'required',
        ]);

        $VariationCount = ProductVariation::where('products_id',$id)->count();
        $images = array();
        if ($request->images) {
            //$images = '["'.implode('","',$request->images).'"]';
            $images = implode('"', $request->images);
        } else {
            $images = '';
        }

        $ProductObj->name = $request->name;
        $ProductObj->permalink = $request->permalink;
        $ProductObj->description = $request->description;
        $ProductObj->content = $request->content;
        $ProductObj->status = $request->status;
        $ProductObj->images = $images;
        $ProductObj->is_featured = $request->is_featured ? 1 : 0;

        
        if($VariationCount<1){
            $ProductObj->quantity = $request->quantity;
            $ProductObj->sku = $request->sku;
            $ProductObj->allow_checkout_when_out_of_stock = $request->allow_checkout_when_out_of_stock ? 1 : 0;
            $ProductObj->with_storehouse_management = $request->with_storehouse_management ? 1 : 0;
            $ProductObj->stock_status = $request->stock_status;
            $ProductObj->price = 60;
            $ProductObj->sale_price = 50;
            $ProductObj->length = $request->length;
            $ProductObj->wide = $request->wide;
            $ProductObj->height = $request->height;
            $ProductObj->weight = $request->weight;
            $ProductObj->discount_start_date = $request->discount_start_date;
            $ProductObj->discount_end_date = $request->discount_end_date;
        }

        
        $ProductObj->brand_id = $request->brand_id;
        $ProductObj->is_variation = 0;
        $ProductObj->is_searchable = 0;
        $ProductObj->is_show_on_list = 0;
        $ProductObj->tax_id = $request->tax_id;
        $ProductObj->imagealttext = $request->imagealttext;
        $ProductObj->imagetitletext = $request->imagetitletext;
        $ProductObj->title = $request->title;
        $ProductObj->metakeyword = $request->metakeyword;
        $ProductObj->metadescription = $request->metadescription;

        $ProductObj->save();

        $ProductObj->tag()->detach();
        $ProductObj->categories()->detach();
        $ProductObj->relatedProduct()->detach();
        $ProductObj->crossSellingProduct()->detach();
        $ProductObj->productLabel()->detach();
        $ProductObj->productCollection()->detach();
        $ProductObj->productImages()->detach();

        $ProductObj->tag()->attach($request->tags);
        $ProductObj->categories()->attach($request->categories);
        $ProductObj->relatedProduct()->attach($request->relatedproduct);
        $ProductObj->crossSellingProduct()->attach($request->crosssellingproduct);
        $ProductObj->productLabel()->attach($request->label);
        $ProductObj->productCollection()->attach($request->collection);
        $ProductObj->productImages()->attach($request->imagesID);

        $AttributeSetArray = $request->attributeset;
        $AttributeArray = $request->attribute;
        $Variation = 0;

        if($VariationCount<1){
            if ($request->attribute) {
                foreach ($AttributeArray as $key => $val) {
                    if ($AttributeArray[$key] != '') {
                        $ProductObj->attributeSet()->attach($AttributeSetArray[$key]);
                        $Variation++;
                    }
                }

                if ($Variation != 0) {
                    $ProductVariationObj = new ProductVariation();
                    $ProductVariationObj->products_id  = $ProductObj->id;
                    $ProductVariationObj->sku  = $ProductObj->sku;
                    $ProductVariationObj->quantity  = $ProductObj->quantity;
                    $ProductVariationObj->allow_checkout_when_out_of_stock  = $ProductObj->allow_checkout_when_out_of_stock;
                    $ProductVariationObj->with_storehouse_management  = $ProductObj->with_storehouse_management;
                    $ProductVariationObj->stock_status = $request->stock_status;
                    $ProductVariationObj->price  = $ProductObj->price;
                    $ProductVariationObj->sale_price  = $ProductObj->sale_price;
                    $ProductVariationObj->length  = $ProductObj->length;
                    $ProductVariationObj->wide  = $ProductObj->wide;
                    $ProductVariationObj->height  = $ProductObj->height;
                    $ProductVariationObj->weight  = $ProductObj->weight;
                    $ProductVariationObj->barcode  = $ProductObj->barcode;
                    $ProductVariationObj->discount_start_date  = $ProductObj->discount_start_date;
                    $ProductVariationObj->discount_end_date  = $ProductObj->discount_end_date;
                    $ProductVariationObj->length_unit  = $ProductObj->length_unit;
                    $ProductVariationObj->wide_unit  = $ProductObj->wide_unit;
                    $ProductVariationObj->height_unit  = $ProductObj->height_unit;
                    $ProductVariationObj->is_default  = 1;
                    $ProductVariationObj->save();

                    foreach ($AttributeArray as $key => $val) {
                        if ($AttributeArray[$key] != '') {
                            $ProductVariationObj->attribute()->attach($val,['product_attribute_set_id' => $AttributeSetArray[$key],'products_id'=>$ProductObj->id]);
                        }
                    }
                }
            }
        }else{
            ProductVariation::where('products_id',$ProductObj->id)->update(['is_default'=>0]);
            ProductVariation::where('id',$request->is_default)->update(['is_default'=>1]);
        }
        return redirect('admin/product')->with('message', 'Product Successfully Updated');
    }




    public function productDelete($id){
        $ProductsObj = Products::find($id);
        $ProductsObj->delete();
        return redirect()->to('admin/product')->with('message','Products Delete Successfully');
    }



    public function productsBrandManage()
    {
        $GetAllProductBrand = ProductBrand::orderBy('id', 'DESC')->get();
        return view('backend.brand.product-brand-manage', compact('GetAllProductBrand'));
    }



    public function productsBrandAdd()
    {
        return view('backend.brand.product-brand-add');
    }


    public function productBrandStore(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'permalink' => "required|unique:product_brands,permalink",
            'status' => 'required',
        ]);

        $IsFeatured = 0;
        if ($request->is_featured == 'on') {
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

        return redirect('admin/product-brand')->with('message', 'Brand Successfully Added');
    }

    public function productsBrandEdit($id)
    {
        $GetBrandData = ProductBrand::where('id', $id)->first();
        return view('backend.brand.product-brand-edit', compact('GetBrandData'));
    }

    public function productBrandUpdate(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'permalink' => "required|unique:product_brands,permalink,$id",
            'status' => 'required',
        ]);

        $IsFeatured = 0;
        if ($request->is_featured == 'on') {
            $IsFeatured = 1;
        } else {
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
        return redirect('admin/product-brand')->with('message', 'Brand Successfully Updated.');
    }




    #================================== PRODUCTS CATEGORY ====================================



    public function productsCategoryManage()
    {
        $GetAllProductCategory = ProductCategory::orderBy('id', 'DESC')->get();
        return view('backend.category.category', compact('GetAllProductCategory'));
    }

    public function productsCategoryAdd()
    {
        return view('backend.category.add');
    }


    public function productCategoryStore(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'permalink' => "required|unique:product_categories,permalink",
            'status' => 'required',
        ]);

        $IsFeatured = 0;
        if ($request->is_featured == 'on') {
            $IsFeatured = 1;
        } else {
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

        return redirect('admin/product-category')->with('message', 'Category Successfully Added');
    }


    public function productsCategoryEdit($id)
    {
        $GetCategoryData = ProductCategory::where('id', $id)->first();
        return view('backend.category.edit', compact('GetCategoryData'));
    }


    public function productCategoryUpdate(Request $request, $id)
    {

        $this->validate($request, [
            'name' => 'required',
            'permalink' => "required|unique:product_categories,permalink,$id",
            'status' => 'required',
        ]);

        $IsFeatured = 0;
        if ($request->is_featured == 'on') {
            $IsFeatured = 1;
        } else {
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

        return redirect('admin/product-category')->with('message', 'Category Successfully Updated');
    }


    #================================== PRODUCTS Label ====================================


    public function productsLabelManage()
    {
        $GetAllProductLabel = ProductLabel::orderBy('id', 'DESC')->get();
        return view('backend.label.label', compact('GetAllProductLabel'));
    }

    public function productsLabelAdd()
    {
        return view('backend.label.add');
    }


    public function productLabelstore(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'color' => "required",
            'status' => 'required',
        ]);

        $IsFeatured = 0;
        if ($request->is_featured == 'on') {
            $IsFeatured = 1;
        } else {
            $IsFeatured = 0;
        }

        $ProductLableObj = new ProductLabel();
        $ProductLableObj->name = $request->name;
        $ProductLableObj->color = $request->color;
        $ProductLableObj->status = $request->status;
        $ProductLableObj->save();

        return redirect('admin/product-label')->with('message', 'Label Successfully Added');
    }


    public function productsLabelEdit($id)
    {
        $GetLabelData = ProductLabel::where('id', $id)->first();
        return view('backend.label.edit', compact('GetLabelData'));
    }


    public function productLabelUpdate(Request $request, $id)
    {

        $this->validate($request, [
            'name' => 'required',
            'color' => "required",
            'status' => 'required',
        ]);

        $IsFeatured = 0;
        if ($request->is_featured == 'on') {
            $IsFeatured = 1;
        } else {
            $IsFeatured = 0;
        }

        $ProductLableObj = ProductLabel::findOrFail($id);
        $ProductLableObj->name = $request->name;
        $ProductLableObj->color = $request->color;
        $ProductLableObj->status = $request->status;
        $ProductLableObj->save();

        return redirect('admin/product-label')->with('message', 'Label Successfully Updated');
    }





    #================================== PRODUCTS Collection ====================================



    public function productCollectionManage()
    {
        $GetAllProductCollection = ProductCollection::orderBy('id', 'DESC')->get();
        return view('backend.collection.collection', compact('GetAllProductCollection'));
    }

    public function productsCollectionAdd()
    {
        return view('backend.collection.add');
    }


    public function productCollectionstore(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'slug' => "required",
            'status' => 'required',
        ]);

        $IsFeatured = 0;
        if ($request->is_featured == 'on') {
            $IsFeatured = 1;
        } else {
            $IsFeatured = 0;
        }

        $ProductCollectionObj = new ProductCollection();
        $ProductCollectionObj->name = $request->name;
        $ProductCollectionObj->slug = $request->slug;
        $ProductCollectionObj->description = $request->description;
        $ProductCollectionObj->image = $request->imageurl;
        $ProductCollectionObj->status = $request->status;
        $ProductCollectionObj->save();

        return redirect('admin/product-collection')->with('message', 'Collection Successfully Added');
    }


    public function productsCollectionEdit($id)
    {
        $GetCollectionData = ProductCollection::where('id', $id)->first();
        return view('backend.collection.edit', compact('GetCollectionData'));
    }


    public function productCollectionUpdate(Request $request, $id)
    {

        $this->validate($request, [
            'name' => 'required',
            'slug' => "required",
            'status' => 'required',
        ]);

        $IsFeatured = 0;
        if ($request->is_featured == 'on') {
            $IsFeatured = 1;
        } else {
            $IsFeatured = 0;
        }

        $ProductCollectionObj = ProductCollection::findOrFail($id);
        $ProductCollectionObj->name = $request->name;
        $ProductCollectionObj->slug = $request->slug;
        $ProductCollectionObj->description = $request->description;
        $ProductCollectionObj->image = $request->imageurl;
        $ProductCollectionObj->status = $request->status;
        $ProductCollectionObj->save();

        return redirect('admin/product-collection')->with('message', 'Collection Successfully Updated');
    }







    #================================== PRODUCTS TAGS ====================================



    public function productTagsManage()
    {
        $GetAllProducTags = ProductTag::orderBy('id', 'DESC')->get();
        return view('backend.tags.tags', compact('GetAllProducTags'));
    }


    public function productsTagsAdd()
    {
        return view('backend.tags.add');
    }


    public function productTagsstore(Request $request)
    {

        $this->validate($request, [
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

        return redirect('admin/product-tags')->with('message', 'Tag Created Successfully');
    }


    public function productsTagsEdit($id)
    {
        $GetTagData = ProductTag::where('id', $id)->first();
        return view('backend.tags.edit', compact('GetTagData'));
    }


    public function productTagsUpdate(Request $request, $id)
    {

        $this->validate($request, [
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

        return redirect('admin/product-tags')->with('message', 'Tag Updated Successfully');
    }







    #================================== PRODUCTS TAXES ====================================




    public function productTaxesManage()
    {
        $GetAllProductTaxes = ProductTax::orderBy('id', 'DESC')->get();
        return view('backend.taxes.taxes', compact('GetAllProductTaxes'));
    }

    public function productsTaxesAdd()
    {
        return view('backend.taxes.add');
    }


    public function productTaxesstore(Request $request)
    {

        $this->validate($request, [
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

        return redirect('admin/product-taxes')->with('message', 'Tax Created Successfully');
    }


    public function productsTaxesEdit($id)
    {
        $GetTaxesData = ProductTax::where('id', $id)->first();
        return view('backend.taxes.edit', compact('GetTaxesData'));
    }


    public function productTaxesUpdate(Request $request, $id)
    {

        $this->validate($request, [
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

        return redirect('admin/product-taxes')->with('message', 'Tax Updated Successfully');
    }




    #================================== PRODUCTS ATTRIBUTE ====================================


    public function productAttributeManage()
    {
        $GetAllProductAttribute = ProductAttributeSet::orderBy('id', 'DESC')->get();
        return view('backend.attribute.attribute', compact('GetAllProductAttribute'));
        //return $GetAllProductAttribute;
    }

    public function productsAttributeAdd()
    {
        return view('backend.attribute.add');
    }

    public function productAttributestore(Request $request)
    {

        $this->validate($request, [
            'title' => 'required',
            'slug' => "required",
            'status' => 'required',
            'order' => 'required',
            'display_layout' => 'required',
        ]);

        $Is_comparable = 0;
        $Is_searchable = 0;
        $Is_use_in_product_listing = 0;

        if ($request->Is_comparable == 'on') {
            $is_comparable = 0;
        }

        if ($request->is_searchable == 'on') {
            $Is_searchable = 1;
        }

        if ($request->is_use_in_product_listing == 'on') {
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

        if ($request->attributetitle) {
            foreach ($AttributeTitleArray as $key => $val) {
                if ($AttributeTitleArray[$key] != '' && $AttributeSlugArray[$key] != '' && $AttributeColorArray[$key] != '') {
                    $ProductAttributeObj = new ProductAttribute();
                    $ProductAttributeObj->attribute_set_id = $ProductAttributeSetObj->id;
                    $ProductAttributeObj->title = $AttributeTitleArray[$key];
                    $ProductAttributeObj->slug = $AttributeSlugArray[$key];
                    $ProductAttributeObj->color = $AttributeColorArray[$key];
                    if ($IsDeafultHidden == $AttributeIsdefaultArray[$key]) {
                        $ProductAttributeObj->is_default = 1;
                    } else {
                        $ProductAttributeObj->is_default = 0;
                    }
                    $ProductAttributeObj->status = $request->status;
                    $ProductAttributeObj->save();
                }
            }
        }
        return redirect('admin/product-attribute')->with('message', 'Attribute Created Successfully');
    }


    public function productsAttributeEdit($id)
    {
        $GetAttributeSetData = ProductAttributeSet::where('id', $id)->first();
        $GetProductAttribute = ProductAttribute::where('attribute_set_id', $GetAttributeSetData->id)->get();
        $ProductAttributeCount = count($GetProductAttribute);
        return view('backend.attribute.edit', compact('GetAttributeSetData', 'GetProductAttribute', 'ProductAttributeCount'));
    }




    public function productAttributeUpdate(Request $request, $id)
    {

        $this->validate($request, [
            'title' => 'required',
            'slug' => "required",
            'status' => 'required',
            'order' => 'required',
            'display_layout' => 'required',
        ]);

        $Is_comparable = 0;
        $Is_searchable = 0;
        $Is_use_in_product_listing = 0;

        if ($request->Is_comparable == 'on') {
            $is_comparable = 0;
        }

        if ($request->is_searchable == 'on') {
            $Is_searchable = 1;
        }

        if ($request->is_use_in_product_listing == 'on') {
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

        if ($request->attributetitle) {
            foreach ($AttributeTitleArray as $key => $val) {
                if ($AttributeTitleArray[$key] != '' && $AttributeSlugArray[$key] != '' && $AttributeColorArray[$key] != '') {
                    $ProductAttributeObj = new ProductAttribute();
                    $ProductAttributeObj->attribute_set_id = $ProductAttributeSetObj->id;
                    $ProductAttributeObj->title = $AttributeTitleArray[$key];
                    $ProductAttributeObj->slug = $AttributeSlugArray[$key];
                    $ProductAttributeObj->color = $AttributeColorArray[$key];
                    if ($IsDeafultHidden == $AttributeIsdefaultArray[$key]) {
                        $ProductAttributeObj->is_default = 1;
                    } else {
                        $ProductAttributeObj->is_default = 0;
                    }
                    $ProductAttributeObj->status = $request->status;
                    $ProductAttributeObj->save();
                }
            }
        }


        return redirect('admin/product-attribute')->with('message', 'Attribute Successfully Updated');
    }

}
