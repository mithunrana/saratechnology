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
                <a href="{{route('dashboard')}}"><i class="fa fa-home"></i> HOME</a>
                </li>
                <li class="breadcrumb-item active">Appearance</li>
                <li class="breadcrumb-item active">Home Page</li>
            </ol>
            </div>
        </div>
        </div>
    </div>
  
    <section id="vueapp" class="content">

        <div class="col-md-12">
            <single-image-input-without-preview>
        </div>

        <div class="container-fluid">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title" style="background-color: #f0ad4e;color: #fff!important;display: inline-block;font-weight: 700;padding: 0.2em 0.5em;"><i class="fas fa-edit"></i> Developer Mode Enable </h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-5 col-sm-3">
                            <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist" aria-orientation="vertical">
                                <a style="color:#7a777e;font-weight:bold;" class="nav-link active" id="vert-tabs-exclusive-tab" data-toggle="pill" href="#vert-tabs-exclusive" role="tab" aria-controls="vert-tabs-exclusive" aria-selected="true">
                                    <i class="fa fa-home"></i> SHOP INFO
                                </a>
                                <a style="color:#7a777e;font-weight:bold;" class="nav-link" id="vert-tabs-3column-bannder-first-tab" data-toggle="pill" href="#vert-tabs-3column-bannder-first" role="tab" aria-controls="vert-tabs-3column-bannder-first" aria-selected="false">
                                    <i class="fa fa-image"></i> 3 Column Banner First
                                </a>
                                <a style="color:#7a777e;font-weight:bold;" class="nav-link" id="vert-tabs-trending-products-tab" data-toggle="pill" href="#vert-tabs-trending-products" role="tab" aria-controls="vert-tabs-trending-products" aria-selected="false">
                                    <i class="fa fa-camera"></i> Trending Products
                                </a>
                            </div>
                        </div>

                        <div class="col-7 col-sm-9">
                            <div class="tab-content" id="vert-tabs-tabContent">
                                <div class="tab-pane text-left fade show active" id="vert-tabs-exclusive" role="tabpanel" aria-labelledby="vert-tabs-exclusive-tab">
                                    <div class="container">
                                        <div class="callout callout-danger">
                                            <form action="{{route('dashboard.setting.shopinfo.update')}}" method="post">
                                                @csrf
                                                <div class="form-group row">
                                                    <div class="col-sm-6">
                                                        <label for="ecommerce_store_name">Name:</label>
                                                        <input type="text" class="form-control {{$errors->has('ecommerce_store_name') ? ' is-invalid' : ''}}" id="ecommerce_store_name" placeholder="shop name" value="{{ $SettingKey['ecommerce_store_name'] }}" name="ecommerce_store_name">
                                                        @if ($errors->has('ecommerce_store_name'))
                                                            <span class="text-danger">{{ $errors->first('ecommerce_store_name') }}</span>
                                                        @endif
                                                    </div>

                                                    <div class="col-sm-6">
                                                        <label for="ecommerce_store_phone">Phone:</label>
                                                        <input type="text" class="form-control {{$errors->has('ecommerce_store_phone') ? ' is-invalid' : ''}}" id="ecommerce_store_phone" placeholder="ecommerce phone" value="{{ $SettingKey['ecommerce_store_phone'] }}" name="ecommerce_store_phone">
                                                        @if ($errors->has('ecommerce_store_phone'))
                                                            <span class="text-danger">{{ $errors->first('ecommerce_store_phone') }}</span>
                                                        @endif
                                                    </div>

                                                    <div class="col-sm-12">
                                                        <label for="ecommerce_store_address">Address:</label>
                                                        <input type="text" class="form-control {{$errors->has('ecommerce_store_address') ? ' is-invalid' : ''}}" id="ecommerce_store_address" placeholder="ecommerce address" value="{{ $SettingKey['ecommerce_store_address'] }}" name="ecommerce_store_address">
                                                        @if ($errors->has('ecommerce_store_address'))
                                                            <span class="text-danger">{{ $errors->first('ecommerce_store_address') }}</span>
                                                        @endif
                                                    </div>

                                                    <div class="col-sm-12">
                                                        <label for="ecommerce_store_state">State:</label>
                                                        <input type="text" class="form-control {{$errors->has('ecommerce_store_state') ? ' is-invalid' : ''}}" id="ecommerce_store_state" placeholder="state" value="{{ $SettingKey['ecommerce_store_state'] }}" name="ecommerce_store_state">
                                                        @if ($errors->has('ecommerce_store_state'))
                                                            <span class="text-danger">{{ $errors->first('ecommerce_store_state') }}</span>
                                                        @endif
                                                    </div>
                                                    
                                                    <div class="col-sm-6">
                                                        <label for="country">Country:</label>
                                                        <select class="form-control {{$errors->has('country') ? ' is-invalid' : ''}}" name="country" id="country">
                                                            @foreach($GetAllCountry as $Country)
                                                                <option value="{{$Country->id}}">{{$Country->name}}</option>
                                                            @endforeach()
                                                        </select>
                                                        @if ($errors->has('country'))
                                                            <span class="text-danger">{{ $errors->first('country') }}</span>
                                                        @endif
                                                    </div>

                                                    <div class="col-sm-6">
                                                        <label for="ecommerce_store_city">City:</label>
                                                        <select class="form-control {{$errors->has('ecommerce_store_city') ? ' is-invalid' : ''}}" name="ecommerce_store_city" id="ecommerce_store_city">
                                                            @foreach($GetAllCity as $GetAllCity)    
                                                                <option value="{{$GetAllCity->id}}">{{$GetAllCity->name}}</option>
                                                            @endforeach()
                                                        </select>
                                                        @if ($errors->has('ecommerce_store_city'))
                                                            <span class="text-danger">{{ $errors->first('ecommerce_store_city') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Save Changes</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>


                                <div class="tab-pane fade" id="vert-tabs-3column-bannder-first" role="tabpanel" aria-labelledby="vert-tabs-3column-bannder-first-tab">
                                    <div class="container">
                                        <div class="callout callout-info">
                                            <form action="{{route('dashboard.setting.home.threecolumnfirstbanner.update')}}" method="post">
                                                @csrf
                                                <div class="col-sm-12" style="max-height:250px;overflow:scroll;">
                                                <div class="form-group clearfix">
                                                    <div class="icheck-primary d-inline">
                                                            <label style="padding-left: 0px!important;" for="checkboxPrimary2">Available countries</label>
                                                        </div>
                                                    </div>
                                                    @foreach($GetAllCountry as $Country)
                                                        <div class="form-group clearfix">
                                                            <div class="icheck-primary d-inline">
                                                                <input type="checkbox" id="country{{$Country->id}}" >
                                                                <label for="country{{$Country->id}}">Bangladesh</label>
                                                            </div>
                                                        </div>
                                                    @endforeach()
                                                </div>

                                                <div class="col-sm-6">
                                                    <div class="row">
                                                        <div class="form-group clearfix">
                                                            <p style="margin-bottom:3px;">Enable Blog Comment?</p>
                                                            <div class="icheck-primary d-inline">
                                                                <input type="radio" id="enable_blog_comment_yes" name="enable_blog_comment" checked>
                                                                <label for="enable_blog_comment_yes">YES</label>
                                                            </div>
                                                            <div class="icheck-danger d-inline">
                                                                <input type="radio" id="enable_blog_comment_no" name="enable_blog_comment">
                                                                <label for="enable_blog_comment_no">NO</label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="form-group clearfix">
                                                            <p style="margin-bottom:3px;">Enable Shoping Cart?</p>
                                                            <div class="icheck-primary d-inline">
                                                                <input type="radio" id="enable_shoping_cart_yes" name="enable_shoping_cart" checked>
                                                                <label for="enable_shoping_cart_yes">YES</label>
                                                            </div>
                                                            <div class="icheck-danger d-inline">
                                                                <input type="radio" id="enable_shoping_cart_no" name="enable_shoping_cart">
                                                                <label for="enable_shoping_cart_no">NO</label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="form-group clearfix">
                                                            <p style="margin-bottom:3px;">Display product price including taxes?</p>
                                                            <div class="icheck-primary d-inline">
                                                                <input type="radio" id="display_product_price_including_tax_yes" name="display_product_price_including_tax" checked>
                                                                <label for="display_product_price_including_tax_yes">YES</label>
                                                            </div>
                                                            <div class="icheck-danger d-inline">
                                                                <input type="radio" id="display_product_price_including_tax_no" name="display_product_price_including_tax">
                                                                <label for="display_product_price_including_tax_no">NO</label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="form-group clearfix">
                                                            <p style="margin-bottom:3px;">Enable Product review?</p>
                                                            <div class="icheck-primary d-inline">
                                                                <input type="radio" id="enable_product_review_yes" name="enable_product_review" checked>
                                                                <label for="enable_product_review_yes">YES</label>
                                                            </div>
                                                            <div class="icheck-danger d-inline">
                                                                <input type="radio" id="enable_product_review_no" name="enable_product_review">
                                                                <label for="enable_product_review_no">NO</label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="form-group clearfix">
                                                            <p style="margin-bottom:3px;">Quick buy target page</p>
                                                            <div class="icheck-primary d-inline">
                                                                <input type="radio" id="cart_page" name="quick_buy_page" checked>
                                                                <label for="cart_page">Cart Page</label>
                                                            </div>
                                                            <div class="icheck-danger d-inline">
                                                                <input type="radio" id="checkout_page" name="quick_buy_page">
                                                                <label for="checkout_page">Checkout Page</label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="form-group clearfix">
                                                            <p style="margin-bottom:3px;">Enable quick buy button?</p>
                                                            <div class="icheck-primary d-inline">
                                                                <input type="radio" id="enable_quick_buy_button_yes" name="enable_quick_buy_button" checked>
                                                                <label for="enable_quick_buy_button_yes">YES</label>
                                                            </div>
                                                            <div class="icheck-danger d-inline">
                                                                <input type="radio" id="enable_quick_buy_button_no" name="enable_quick_buy_button">
                                                                <label for="enable_quick_buy_button_no">NO</label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="form-group clearfix">
                                                            <p style="margin-bottom:3px;">Enable zip Code?</p>
                                                            <div class="icheck-primary d-inline">
                                                                <input type="radio" id="enable_zip_code_yes" name="enable_zip_code" checked>
                                                                <label for="enable_zip_code_yes">YES</label>
                                                            </div>
                                                            <div class="icheck-danger d-inline">
                                                                <input type="radio" id="enable_zip_code_no" name="enable_zip_code">
                                                                <label for="enable_zip_code_no">NO</label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="form-group clearfix">
                                                            <p style="margin-bottom:3px;">Verify customer's email?</p>
                                                            <div class="icheck-primary d-inline">
                                                                <input type="radio" id="verify_customer_email_yes" name="verify_customer_email" checked>
                                                                <label for="verify_customer_email_yes">YES</label>
                                                            </div>
                                                            <div class="icheck-danger d-inline">
                                                                <input type="radio" id="verify_customer_email_no" name="verify_customer_email">
                                                                <label for="verify_customer_email_no">NO</label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="form-group clearfix">
                                                            <p style="margin-bottom:3px;">Enable guest checkout?</p>
                                                            <div class="icheck-primary d-inline">
                                                                <input type="radio" id="enable_guest_checkout_yes" name="enable_guest_checkout" checked>
                                                                <label for="enable_guest_checkout_yes">YES</label>
                                                            </div>
                                                            <div class="icheck-danger d-inline">
                                                                <input type="radio" id="enable_guest_checkout_no" name="enable_guest_checkout">
                                                                <label for="enable_guest_checkout_no">NO</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Save Changes</button>
                                            </form>
                                            <div class="card">
                                                <div class="card-header">
                                                    <h3 class="card-title">Bordered Table</h3>
                                                </div>
                                                <div class="card-body" style="overflow:scroll">
                                                    <table class="table table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th style="width: 10px">#</th>
                                                                <th>Task</th>
                                                                <th>Progress</th>
                                                                <th style="width: 40px">Label</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>1.</td>
                                                                <td>Update software</td>
                                                                <td>
                                                                    <div class="progress progress-xs">
                                                                        <div class="progress-bar progress-bar-danger" style="width: 55%"></div>
                                                                    </div>
                                                                </td>
                                                                <td><span class="badge bg-danger">55%</span></td>
                                                            </tr>

                                                            <tr>
                                                                <td>2.</td>
                                                                <td>Clean database</td>
                                                                <td>
                                                                    <div class="progress progress-xs">
                                                                        <div class="progress-bar bg-warning" style="width: 70%"></div>
                                                                    </div>
                                                                </td>
                                                                <td><span class="badge bg-warning">70%</span></td>
                                                            </tr>

                                                            <tr>
                                                                <td>3.</td>
                                                                <td>Cron job running</td>
                                                                <td>
                                                                    <div class="progress progress-xs progress-striped active">
                                                                        <div class="progress-bar bg-primary" style="width: 30%"></div>
                                                                    </div>
                                                                </td>
                                                                <td><span class="badge bg-primary">30%</span></td>
                                                            </tr>

                                                            <tr>
                                                                <td>4.</td>
                                                                <td>Fix and squish bugs</td>
                                                                <td>
                                                                    <div class="progress progress-xs progress-striped active">
                                                                        <div class="progress-bar bg-success" style="width: 90%"></div>
                                                                    </div>
                                                                </td>
                                                                <td><span class="badge bg-success">90%</span></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                
                                <div class="tab-pane fade" id="vert-tabs-trending-products" role="tabpanel" aria-labelledby="vert-tabs-trending-products-tab">
                                    <div class="container">
                                        <form action="{{route('dashboard.setting.trending.item.store')}}" method="post">
                                            @csrf
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="products_id">Item</label>
                                                    <select class="form-control {{$errors->has('products_id') ? ' is-invalid' : ''}} products" name="products_id" id="products_id">
                                                    </select>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Save Changes</button>
                                        </form>

                                        <div class="row" style="margin-top:10px;">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection()



@section('footer')
	@include('backend.footer')
@endsection()

@section('customjs')
<script>
    var action = 'ADD'
    var DataID = null;
    var baseurl = window.location.origin+'/';

    $(document).on("click", "#imagepush", function (e){
        var imageurl = $('#mediaurl').val();
        $('#'+DataID+'preview').attr('src',baseurl+imageurl);
        $('#'+DataID).val(imageurl);
    });

    $(document).on("click", ".addImage", function (e) {
        var datavalue = $(this).attr('data-value');
        DataID = datavalue;
    });

    $(document).ready(function(){
        $('.summernote-editor').summernote();
        $('.products').selectator();

        $(document).on("click", ".delete", function (e) {
            e.preventDefault();
            var link = $(this).attr("href");
            Swal.fire({
                title: "Are you sure?",
                text: "Delete this data!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!",
            }).then((result) => {
                if (result.value) {
                    window.location.href = link;
                    Swal.fire("Deleted!", "Data has been deleted.", "success");
                }
            });
        });
    })
</script>
@endsection()