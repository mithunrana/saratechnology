@extends('backend.master')

@section('sidebar')
	@include('backend.sidebar')
@endsection()

@section('maincontent')

    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-12">
            <ol class="breadcrumb float-sm-left">
            <li class="breadcrumb-item">
                <a href="#"><i class="fa fa-home"></i> Home</a>
            </li>
            <li class="breadcrumb-item">Products</li>
            <li class="breadcrumb-item">
                <a style="color: #212529;" href="{{route('dashboard.product.label')}}" >Label</a>
            </li>
            <li class="breadcrumb-item active">Label add</li>
            </ol>
        </div>
        </div>
    </div>
    </div>
  
    <section id="vueapp" class="content">
        <div class="container-fluid">
            <form action="{{route('dashboard.product.store')}}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-sm-9">
                        <div class="card card-primary">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control {{$errors->has('name') ? ' is-invalid' : ''}}" id="name" name="name" value="{{$Product->name}}" placeholder="Name">
                                    @if ($errors->has('name'))
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="name">Permalink</label>
                                    <input type="text" class="form-control {{$errors->has('permalink') ? ' is-invalid' : ''}}" id="permalink" name="permalink" value="{{$Product->permalink}}" placeholder="permalink">
                                    @if ($errors->has('permalink'))
                                        <span class="text-danger">{{ $errors->first('permalink') }}</span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="name">Short Description</label>
                                    <textarea class="form-control summernote-editor {{$errors->has('description') ? ' is-invalid' : ''}}" id="" name="description" rows="4"  placeholder="Enter ...">{{$Product->description}}</textarea>
                                    @if ($errors->has('description'))
                                        <span class="text-danger">{{ $errors->first('description') }}</span>
                                    @endif
                                </div>
                                
                                <div class="form-group">
                                    <label for="name">Content</label>
                                    <textarea class="form-control summernote-editor {{$errors->has('content') ? ' is-invalid' : ''}}" id="content" name="content" rows="4"  placeholder="Enter ...">{{$Product->content}}</textarea>
                                    @if ($errors->has('content'))
                                        <span class="text-danger">{{ $errors->first('content') }}</span>
                                    @endif
                                </div>



                                <multiple-image-input></multiple-image-input>


                                @if(count($Product->productVariation) == 0)
                                    <div class="card card-default">
                                        <div class="card-header">
                                            <h3 class="card-title" style="color:#1f64a0!important;font-weight:bold">Overview</h3>
                                            <span class="float-sm-right" style="color:#1f64a0!important;font-weight:bold"></span>
                                        </div>

                                        <div class="card-body">
                                            <div class="row">
                                                <div class="form-group col-sm-4">
                                                    <label for="sku">SKU</label>
                                                    <input type="text" class="form-control {{$errors->has('sku') ? ' is-invalid' : ''}}" id="sku" name="sku" value="{{$Product->sku}}" placeholder="SKU">
                                                </div>

                                                <div class="form-group col-sm-4">
                                                    <label for="price">Price</label>
                                                    <input type="text" class="form-control {{$errors->has('price') ? ' is-invalid' : ''}}" id="price" name="price" value="{{$Product->price}}" placeholder="price">
                                                </div>

                                                <div class="form-group col-sm-4">
                                                    <label for="sale_price">Sale Price</label>
                                                    <input type="text" class="form-control {{$errors->has('sale_price') ? ' is-invalid' : ''}}" id="sale_price" name="sale_price" value="{{$Product->sale_price}}" placeholder="Price sale">
                                                </div>

                                                <div class="form-group col-sm-6">
                                                    <label for="discount_start_date">Start Date</label>
                                                    <input type="text" class="form-control {{$errors->has('discount_start_date') ? ' is-invalid' : ''}}" id="discount_start_date" name="discount_start_date" value="{{$Product->discount_start_date}}" placeholder="">
                                                </div>

                                                <div class="form-group col-sm-6">
                                                    <label for="discount_end_date">End Date</label>
                                                    <input type="text" class="form-control {{$errors->has('discount_end_date') ? ' is-invalid' : ''}}" id="discount_end_date" name="discount_end_date" value="{{$Product->discount_end_date}}" placeholder="">
                                                </div>
                                            </div>

                                            <hr>

                                            <div class="row">
                                                <div class="form-group col-sm-6">
                                                    <div class="form-check-inline">
                                                        <label class="form-check-label">
                                                            <input type="checkbox" name="with_storehouse_management" class="form-check-input" @if($Product->with_storehouse_management == 1) checked @endif> With storehouse management
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="form-group col-sm-6">
                                                    <label for="quantity">Quantity</label>
                                                    <input type="text" class="form-control {{$errors->has('quantity') ? ' is-invalid' : ''}}" id="quantity" name="quantity" value="{{$Product->quantity}}" placeholder="Quantity">
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="form-group col-sm-6">
                                                    <div class="form-check-inline">
                                                        <label class="form-check-label">
                                                            <input type="checkbox" name="allow_checkout_when_out_of_stock" id="allow_checkout_when_out_of_stock" class="form-check-input" @if($Product->allow_checkout_when_out_of_stock == 1) checked @endif>  Allow customer checkout when this product out of stock
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="form-check-label">Stock Status</label>
                                                <select class="form-control {{$errors->has('stock_status') ? ' is-invalid' : ''}}" name="stock_status" id="stock_status">
                                                    <option value="in_stock" @if($Product->stock_status == "in_stock") selected @endif >In stock</option>
                                                    <option value="out_of_stock" @if($Product->stock_status == "out_of_stock") selected @endif >Out of stock</option>
                                                    <option value="on_backorder" @if($Product->stock_status == "on_backorder") selected @endif >On backorder</option>
                                                </select>
                                            </div>

                                            <hr>

                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <p style="font-weight:bold;margin-bottom:0px;color:rgb(31, 100, 160) !important">Shipping Info</p>
                                                </div>

                                                <div class="form-group col-sm-6">
                                                    <label for="weight">Weight (g)</label>
                                                    <input type="text" class="form-control {{$errors->has('weight') ? ' is-invalid' : ''}}" id="weight" name="weight" value="{{$Product->weight}}" placeholder="weight">
                                                </div>

                                                <div class="form-group col-sm-6">
                                                    <label for="length">Length (cm)</label>
                                                    <input type="text" class="form-control {{$errors->has('length') ? ' is-invalid' : ''}}" id="length" name="length" value="{{$Product->length}}" placeholder="length">
                                                </div>

                                                <div class="form-group col-sm-6">
                                                    <label for="wide">Wide (cm)</label>
                                                    <input type="text" class="form-control {{$errors->has('wide') ? ' is-invalid' : ''}}" id="wide" name="wide" value="{{$Product->wide}}" placeholder="wide">
                                                </div>

                                                <div class="form-group col-sm-6">
                                                    <label for="height">Height (cm)</label>
                                                    <input type="text" class="form-control {{$errors->has('height') ? ' is-invalid' : ''}}" id="height" name="height" value="{{$Product->height}}" placeholder="height">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif




                                @if(count($Product->productVariation) > 0)
                                    <div class="card card-default">
                                        <div class="card-header">
                                            <h3 class="card-title" style="color:#1f64a0!important;font-weight:bold">Product has variations</h3>
                                            <span class="float-sm-right" style="color:#1f64a0!important;margin-left: 15px;"> Generate all variations</span>
                                            <span class="float-sm-right" style="color:#1f64a0!important;">Edit attribute</span>
                                        </div>

                                        <div class="card-body">
                                            <table class="table table-striped table-border">
                                                <thead>
                                                    <tr>
                                                        <th style="width: 10px;padding-left: 10px;">#</th>
                                                        <th style="padding-left: 10px;">IMAGES</th>
                                                        @foreach($Product->attributeSet as $AttributeSet)
                                                            <th style="padding-left: 10px;">{{$AttributeSet->title}}</th>
                                                        @endforeach
                                                        <th style="padding-left: 10px;">PRICE</th>
                                                        <th style="padding-left: 10px;">IS DEFAULT</th>
                                                        <th style="padding-left: 10px;">ACTION</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($Product->productVariation as $Variation)
                                                        <!--- Variation Modal Start --->
                                                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog modal-lg" role="document">
                                                                <div class="modal-content border-0">
                                                                    <div class="modal-header bg-info text-light border-none">
                                                                        <h5 class="modal-title" id="exampleModalLabel">Edit Attribute</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <form action="">
                                                                        <div class="modal-body bg-light">
                                                                            <div class="row">
                                                                                @foreach($Product->attributeSet as $AttributeSet)
                                                                                    <div class="col-md-4">
                                                                                        <div class="form-group">
                                                                                            <label for="">{{$AttributeSet->title}}</label>
                                                                                            <select name="{{$AttributeSet->title}}" class="custom-select">
                                                                                                @foreach($AttributeSet->attribute as $Attribute)
                                                                                                    <option value="{{$Attribute->id}}">{{$Attribute->title}}</option>
                                                                                                @endforeach
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>
                                                                                @endforeach
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-md-6">
                                                                                    <div class="form-group">
                                                                                        <label for="">To Date</label>
                                                                                        <input class="form-control" type="date" name="" id="" />
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <div class="form-group">
                                                                                        <label for="">Form Date</label>
                                                                                        <input class="form-control" type="date" name="" id="" />
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <hr />
                                                                            <div class="row">
                                                                                <div class="col">
                                                                                    <div class="custom-control custom-checkbox">
                                                                                        <input type="checkbox" class="custom-control-input" id="customCheck1" />
                                                                                        <label class="custom-control-label" for="customCheck1">With Storehouse Management</label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-md-6">
                                                                                    <div style="margin-bottom: 5px;" class="form-group">
                                                                                        <label for="quantity">Quantity</label>
                                                                                        <input type="text" class="form-control" type="date" name="quantity" id="quantity" />
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col">
                                                                                    <div class="custom-control custom-checkbox">
                                                                                        <input type="checkbox" class="custom-control-input" id="customCheck1" />
                                                                                        <label class="custom-control-label" for="customCheck1">Allow check out when Out of stock</label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <hr />
                                                                            <div class="row">
                                                                                <div class="col">
                                                                                    <div class="form-group">
                                                                                        <label for="">Stock Status</label>
                                                                                        <select name="" class="custom-select">
                                                                                            <option value="">In Stock</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <br>

                                                                            <h6>Shipping</h6>

                                                                            <div class="row">
                                                                                <div class="form-group col-sm-6">
                                                                                    <label for="weight">Weight (g)</label>
                                                                                    <input type="text" id="weight" name="weight" value="" placeholder="weight"
                                                                                        class="form-control" />
                                                                                </div>
                                                                                <div class="form-group col-sm-6">
                                                                                    <label for="length">Length (cm)</label>
                                                                                    <input type="text" id="length" name="length" value="" placeholder="length"
                                                                                        class="form-control" />
                                                                                </div>
                                                                                <div class="form-group col-sm-6">
                                                                                    <label for="wide">Wide (cm)</label>
                                                                                    <input type="text" id="wide" name="wide" value="" placeholder="wide"
                                                                                        class="form-control" />
                                                                                </div>
                                                                                <div class="form-group col-sm-6">
                                                                                    <label for="height">Height (cm)</label>
                                                                                    <input type="text" id="height" name="height" value="" placeholder="height"
                                                                                        class="form-control" />
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                                                Close
                                                                            </button>
                                                                            <button type="submit" class="btn btn-primary">
                                                                                Save changes
                                                                            </button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--- Variation Modal End --->

                                                        <tr id="removevariation{{$Variation->id}}">
                                                            <td><input type="checkbox" name="id[]"></td>
                                                            <td>
                                                                <img src="http://localhost:8085/uploads/bd6124943b176f3e6555d96fb2881f5d.jpg" width="50" alt="Image">
                                                            </td>
                                                            @foreach($Variation->attribute as $Attribute)
                                                                <td>{{$Attribute->title}}</td>
                                                            @endforeach
                                                            <td>200.00</td>
                                                            <td style="">
                                                                <input style="margin-left: 18px;height: 18px;width: 18px;" class="form-check-input defaultvalueradio" type="radio" radiobuttonvalue="1" name="is_default" checked="">
                                                            </td>
                                                            <td>
                                                                <a href="#" class="btn btn-info" data-toggle="modal" data-target="#exampleModal" title="Edit">
                                                                    <i class="fa fa-edit" style="font-size: 17px;"></i>
                                                                </a>
                                                                <a href="" onclick="return ConfirmDelete();" class="btn btn-danger" data-toggle="tooltip" title="Delete"><i aria-hidden="true" class="fa fa-trash"></i></a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                @else
                                    <div class="card card-default">
                                        <div class="card-header">
                                            <h3 class="card-title" style="color:#1f64a0!important;font-weight:bold">Attributes</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div style="padding-bottom:10px;" class="col-sm-12">
                                                    Adding new attributes helps the product to have many options, such as size or color.
                                                </div>
                                            </div>
                                            @foreach($GetAllProductAttributeSet as $AttributeSet)
                                                <div class="row">
                                                    <div class="form-group col-sm-4">
                                                        <label class="">Attribute Name </label>
                                                        <select class="form-control {{$errors->has('attributeset') ? ' is-invalid' : ''}}" name="attributeset[]" id="attributeset" readonly>
                                                            <option value="{{$AttributeSet->id}}">{{$AttributeSet->title}}</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-sm-4">
                                                        <label class="">Value</label>
                                                        <select class="form-control {{$errors->has('attribute') ? ' is-invalid' : ''}}" name="attribute[]" id="attribute">
                                                            <option value="">NO {{$AttributeSet->title}}</option>
                                                            @foreach($AttributeSet->attribute as $Attribute)
                                                                <option value="{{$Attribute->id}}">{{$Attribute->title}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif


                                <div class="card card-default">
                                    <div class="card-header">
                                        <h3 class="card-title" style="color:#1f64a0!important;font-weight:bold">Related products</h3>
                                    </div>

                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="relatedproduct">Related Products</label>
                                            <select class="form-control {{$errors->has('relatedproduct') ? ' is-invalid' : ''}}" name="relatedproduct" id="relatedproduct" multiple>
                                                @foreach($GetAllActiveProduct as $RelatedProduct)
                                                    <option value="{{$RelatedProduct->id}}" {{ in_array($RelatedProduct->id, $RelatedProducts) ? 'selected' : '' }} >{{$RelatedProduct->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="">Cross Selling Products</label>
                                            <select class="form-control {{$errors->has('crosssellingproduct') ? ' is-invalid' : ''}}" name="crosssellingproduct" id="crosssellingproduct" multiple>
                                                @foreach($GetAllActiveProduct as $CrossSellingProduct)
                                                    <option value="{{$CrossSellingProduct->id}}" {{ in_array($CrossSellingProduct->id, $CrossSellingProducts) ? 'selected' : '' }} >{{$CrossSellingProduct->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>


                                <div class="card card-default">
                                    <div class="card-header">
                                        <h3 class="card-title" style="color:#1f64a0!important;font-weight:bold">Search Engine Optimize</h3>
                                        <span class="float-sm-right" style="color:#1f64a0!important;font-weight:bold">Edit SEO meta</span>
                                    </div>

                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="title">Browser Title</label>
                                            <input type="text" class="form-control {{$errors->has('title') ? ' is-invalid' : ''}}" id="title" name="title" value="{{$Product->title}}" placeholder="Browser Title">
                                        </div>

                                        <div class="form-group">
                                            <label>Meta Keyword</label>
                                            <textarea class="form-control {{$errors->has('metakeyword') ? ' is-invalid' : ''}}" rows="3" id="metakeyword" name="metakeyword" value="{{$Product->metakeyword}}" placeholder="Meta Keyword">{{$Product->metakeyword}}</textarea>
                                        </div>

                                        <div class="form-group">
                                            <label>Meta Description</label>
                                            <textarea class="form-control {{$errors->has('metadescription') ? ' is-invalid' : ''}}" rows="3" id="metadescription" name="metadescription" value="{{$Product->metadescription}}" placeholder="Meta Description">{{$Product->metadescription}}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="card card-default">
                            <div class="card-header">
                                <h3 class="card-title" style="color:#1f64a0!important;font-weight:bold">Publish</h3>
                            </div>

                            <div class="card-body">
                                <button type="submit" value="save" class="btn btn-info"><i class="fa fa-save"></i> Save</button>
                                <button type="submit" value="apply" class="btn btn-success"><i class="fa fa-check-circle"></i> Save & Edit</button>
                            </div>
                        </div>


                        <div class="card card-default">
                            <div class="card-header">
                                <h3 class="card-title" style="color:#1f64a0!important;font-weight:bold">Status</h3>
                            </div>

                            <div class="card-body">
                                <div class="form-group">
                                    <select class="form-control {{$errors->has('status') ? ' is-invalid' : ''}}" name="status" id="status">
                                        <option value="Published" @if($Product->status == "Published") selected @endif >Published</option>
                                        <option value="Draft" @if($Product->status == "Draft") selected @endif >Draft</option>
                                        <option value="Pending" @if($Product->status == "Pending") selected @endif >Pending</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="card card-default">
                            <div class="card-header">
                                <h3 class="card-title" style="color:#1f64a0!important;font-weight:bold">Product Category</h3>
                            </div>

                            <div style="padding: 15px;max-height:350px;overflow:scroll;" class="card-body">
                                <ul class="list-group">
                                    @foreach($GetAllProductCategory as $Category)
                                        <li style="padding: 2px;border: none;" class="list-group-item">
                                            <label style="margin-bottom: 0px;font-weight: 500;">
                                                <input type="checkbox" value="{{$Category->id}}" name="categories[]" {{ in_array($Category->id, $ProductCategories) ? 'checked' : '' }}>&nbsp {{$Category->name}}
                                                    <ul style="padding-left: 18px;" class="list-group">
                                                        @if(count($Category->childItems))
                                                            @foreach ($Category->childItems as $childItems)
                                                                @include('backend.product.child_category_for_edit', ['sub_items' => $childItems])
                                                            @endforeach 
                                                        @endif
                                                    </ul>
                                            </label>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>


                        <div class="card card-default">
                            <div class="card-header">
                                <h3 class="card-title" style="color:#1f64a0!important;font-weight:bold">Brand</h3>
                            </div>

                            <div class="card-body">
                                <div class="form-group">
                                    <select class="form-control {{$errors->has('brand_id') ? ' is-invalid' : ''}}" name="brand_id" id="brand_id">
                                    <option value="">No Brand</option>
                                        @foreach($Brands as $Brand)
                                            <option value="{{$Brand->id}}" @if($Brand->id == $Product->brand_id) selected @endif >{{$Brand->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>


                        <div class="card card-default">
                            <div class="card-header">
                                <h3 class="card-title" style="color:#1f64a0!important;font-weight:bold">Is Featured</h3>
                            </div>

                            <div class="card-body">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="is_featured" @if($Product->is_featured == 1) checked @endif>Is Featured
                                    </label>
                                </div>
                            </div>
                        </div>


                        <div class="card card-default">
                            <div class="card-header">
                                <h3 class="card-title" style="color:#1f64a0!important;font-weight:bold">Product collections</h3>
                            </div>

                            <div class="card-body">
                                @foreach($GetAllProductCollection as $Collection)
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="collection[]" value="{{$Collection->id }}" {{ in_array($Collection->id, $ProductCollections) ? 'checked' : '' }}>{{$Collection->name}}
                                    </label>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="card card-default">
                            <div class="card-header">
                                <h3 class="card-title" style="color:#1f64a0!important;font-weight:bold">Labels</h3>
                            </div>

                            <div class="card-body">
                                @foreach($GetAllProductLabel as $Label)
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" name="label[]" value="{{$Label->id }}" {{ in_array($Label->id, $ProductLabels) ? 'checked' : '' }}>{{$Label->name}}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>


                        
                        <div class="card card-default">
                            <div class="card-header">
                                <h3 class="card-title" style="color:#1f64a0!important;font-weight:bold">Tax</h3>
                            </div>

                            <div class="card-body">
                                <div class="form-group">
                                    <select class="form-control {{$errors->has('tax_id') ? ' is-invalid' : ''}}" name="tax_id" id="tax_id">
                                        @foreach($GetAllProductTaxes as $Tax)
                                            <option value="{{$Tax->id}}" @if($Tax->id == $Product->tax_id) selected @endif >{{$Tax->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="card card-default">
                            <div class="card-header">
                                <h3 class="card-title" style="color:#1f64a0!important;font-weight:bold">Tags</h3>
                            </div>

                            <div class="card-body">
                                <div class="form-group">
                                    <select class="form-control {{$errors->has('tags') ? ' is-invalid' : ''}}" name="tags[]" id="tags" multiple>
                                        @foreach($GetAllTags as $Tag)
                                        <option value="{{$Tag->id}}" {{ in_array($Tag->id, $ProductTags) ? 'selected' : '' }}>{{$Tag->name}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('tags'))
                                        <span class="text-danger">{{ $errors->first('tags') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection()



@section('footer')
	@include('backend.footer')
@endsection()

@section('customjs')
<script>
    $(document).ready(function() {

        $('#description').summernote({
            height: 150,
        });
        $('#content').summernote({
            height: 150,
        });

        $('#tags').select2({
            placeholder: 'select tags'
        });

        $('#crosssellingproduct').selectator();
        $('#relatedproduct').selectator();

        $('#discount_start_date').datetimepicker({
            format: 'YYYY-MM-DD HH:mm'
        });
        $('#discount_end_date').datetimepicker({
            format: 'YYYY-MM-DD HH:mm'
        });
    });
</script>
@endsection()