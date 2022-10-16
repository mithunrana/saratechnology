@extends('frontend.master')

@section('home-header')
    @include('frontend.common.home-header')
@endsection()


@section('category-and-menu-section')
    @include('frontend.common.close-category-menu')
@endsection()


@if(Cart::count() == null)
<script>window.location = "/cart";</script>
@endif

@section('bread-crumb')
<!-- START SECTION BREADCRUMB -->
<div class="breadcrumb_section bg_gray page-title-mini">
    <div class="custom-container"><!-- STRART CONTAINER -->
        <div class="row align-items-center">
            <div class="col-md-12">
                <ol class="breadcrumb justify-content-md-start">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item active">Product Detail</li>
                </ol>
            </div>
        </div>
    </div><!-- END CONTAINER-->
</div>
<!-- END SECTION BREADCRUMB -->
@endsection()


@section('main-content')
<div class="section">
	<div class="custom-container">
        <div class="row">
            <div class="col-12">
            	<div style="height:30px;" class="medium_divider"></div>
            	<div class="divider center_icon"><i class="linearicons-credit-card"></i></div>
            	<div style="height:30px;" class="medium_divider"></div>
            </div>
        </div>

        <form action="{{route('order.confirm')}}" method="post" novalidate>
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="heading_s1">
                        <h4>Billing Details</h4>
                        <div class="toggle_info">
                	        <span><i class="fas fa-user"></i>Returning customer? <a href="#loginform" data-toggle="collapse" class="collapsed" aria-expanded="false">Click here to login</a></span>
                        </div>
                    </div>
                        <div class="row">
                            <div class="form-group col-sm-6">
                                @if ($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                                <input type="text" required="" class="form-control {{$errors->has('content') ? ' is-invalid' : ''}}" value="{{old('name')}}" @auth('customer') value="{{Auth::guard('customer')->user()->name}}" @endauth name="name" placeholder="Name *">
                            </div>
                            <div class="form-group col-sm-6">
                                @if ($errors->has('mobile'))
                                    <span class="text-danger">{{ $errors->first('mobile') }}</span>
                                @endif
                                <input class="form-control {{$errors->has('mobile') ? ' is-invalid' : ''}}" required="" value="{{old('mobile')}}" type="text" name="mobile" placeholder="Mobile *">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-sm-6">
                                <div class="custom_select">
                                    @if ($errors->has('country'))
                                        <span class="text-danger">{{ $errors->first('country') }}</span>
                                    @endif
                                    <select class="form-control {{$errors->has('country') ? ' is-invalid' : ''}} first_null not_chosen" name="country">
                                        <option value="">Select an Country...</option>
                                        <option @if (old('status') == "BD") {{ 'selected' }} @endif  value="BD">Bangladesh</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-sm-6">
                                <div class="custom_select">
                                    @if ($errors->has('city'))
                                        <span class="text-danger">{{ $errors->first('city') }}</span>
                                    @endif
                                    <select class="form-control {{$errors->has('city') ? ' is-invalid' : ''}} first_null not_chosen" name="city">
                                        <option value="">Select an City...</option>
                                        <option @if (old('status') == "BD") {{ 'selected' }} @endif value="BD">Bangladesh</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            @if ($errors->has('address'))
                                <span class="text-danger">{{ $errors->first('address') }}</span>
                            @endif
                            <input type="text" class="form-control" value="{{old('address')}}" name="address" required="" placeholder="Address *">
                        </div>
                        
                        <div class="row">
                            <div class="form-group col-sm-6">
                                @if ($errors->has('zipcode'))
                                    <span class="text-danger">{{ $errors->first('zipcode') }}</span>
                                @endif
                                <input class="form-control {{$errors->has('zipcode') ? ' is-invalid' : ''}}" required="" type="text" value="{{old('zipcode')}}" name="zipcode" placeholder="Postcode / ZIP *">
                            </div>

                            <div class="form-group col-sm-6">
                                @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                                <input class="form-control {{$errors->has('email') ? ' is-invalid' : ''}}" required="" type="text" value="{{old('email')}}" name="email" placeholder="Email address">
                            </div>
                        </div>

                        <div style="margin-bottom:10px;" class="row">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div style="margin-bottom: 10px;" class="heading_s1">
                                            <h5>Shipping method</h5>
                                        </div>
                                        @if ($errors->has('shipping_method'))
                                            <span class="text-danger">{{ $errors->first('shipping_method') }}</span>
                                        @endif
                                        @foreach($ShippingMethods as $ShippingMethod)
                                            <div class="custome-radio">
                                                <input class="form-check-input shippingmethod" type="radio" name="shipping_method" id="{{$ShippingMethod->id}}" value="{{$ShippingMethod->id}}" @if($ShippingMethod->isdefault==1) checked @endif>
                                                <label class="form-check-label" for="{{$ShippingMethod->id}}">{{$ShippingMethod->name}} - <strong>{{$ShippingMethod->price}}</strong></label>
                                            </div>
                                        @endforeach
                                    </div> 
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="chek-form">
                                <div class="custome-checkbox">
                                    @if ($errors->has('agree'))
                                        <span class="text-danger">{{ $errors->first('agree') }}</span>
                                    @endif
                                    <input class="form-check-input" type="checkbox" name="agree" id="agree" @if (old('agree') == "on") checked @endif>
                                    <label class="form-check-label label_info" for="agree"><span style="font-weight: 300;font-size: 16px;">I have read and agree to the Terms and Conditions, Privacy Policy, Return Refund Policy</span></label>
                                </div>
                            </div>
                        </div>


                        <div class="ship_detail">
                            <div class="form-group">
                            <div class="chek-form">
                                <div class="custome-checkbox">
                                    <input class="form-check-input" type="checkbox"  name="differentaddress" id="differentaddress" @if (old('differentaddress') == "on") {{ 'checked' }} @endif>
                                    <label class="form-check-label label_info" for="differentaddress"><span>Ship to a different address?</span></label>
                                </div>
                            </div>
                        </div>

                        <div class="different_address" style="display: block!important;"  >
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    @if ($errors->has('shiping_name'))
                                        <span class="text-danger">{{ $errors->first('shiping_name') }}</span>
                                    @endif
                                    <input type="text" required="" value="{{old('shiping_name')}}" class="form-control" name="shiping_name" placeholder="Name *">
                                </div>
                                <div class="form-group col-sm-6">
                                    @if ($errors->has('shiping_mobile'))
                                        <span class="text-danger">{{ $errors->first('shiping_mobile') }}</span>
                                    @endif
                                    <input class="form-control" required="" value="{{old('shiping_mobile')}}" type="text" name="shiping_mobile" placeholder="Mobile *">
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-sm-6">
                                    @if ($errors->has('shiping_city'))
                                        <span class="text-danger">{{ $errors->first('shiping_country') }}</span>
                                    @endif
                                    <div class="custom_select">
                                        <select class="form-control first_null not_chosen" name="shiping_country">
                                            <option value="">Select an Country...</option>
                                            <option @if (old('status') == "BD") {{ 'selected' }} @endif value="BD">Bangladesh</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group col-sm-6">
                                    @if ($errors->has('city'))
                                        <span class="text-danger">{{ $errors->first('shiping_city') }}</span>
                                    @endif
                                    <div class="custom_select">
                                        <select class="form-control first_null not_chosen" name="shiping_city">
                                            <option value="">Select an City...</option>
                                            <option @if (old('status') == "BD") {{ 'selected' }} @endif value="BD">Bangladesh</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                @if ($errors->has('shiping_address'))
                                    <span class="text-danger">{{ $errors->first('shiping_address') }}</span>
                                @endif
                                <input type="text" class="form-control" value="{{old('shiping_address')}}" name="shiping_address" required="" placeholder="Address *">
                            </div>

                            <div class="row">
                                <div class="form-group col-sm-6">
                                    @if ($errors->has('shiping_zipcode'))
                                        <span class="text-danger">{{ $errors->first('shiping_zipcode') }}</span>
                                    @endif
                                    <input class="form-control" required="" value="{{old('shiping_zipcode')}}" type="text" name="shiping_zipcode" placeholder="Postcode / ZIP *">
                                </div>

                                <div class="form-group col-sm-6">
                                    @if ($errors->has('shiping_email'))
                                        <span class="text-danger">{{ $errors->first('shiping_email') }}</span>
                                    @endif
                                    <input class="form-control" required="" value="{{old('shiping_email')}}" type="text" name="shiping_email" placeholder="Email address">
                                </div>
                            </div>
                            </div>
                        </div>

                        <div class="heading_s1">
                            <h4>Additional information</h4>
                        </div>

                        <div class="form-group mb-0">
                            <textarea rows="3" class="form-control" placeholder="Order notes" name="description">{{old('description')}}</textarea>
                        </div>
                    </div>
            
                <div class="col-md-6">
                    <div class="order_review">
                        <div style="margin-bottom: 15px;" class="heading_s1">
                            <h4>Your Orders</h4>
                        </div>
                        
                        <div class="panel-collapse coupon_form collapse show" id="coupon" style="">
                            <div style="margin-top: 0px;padding:20px;" class="panel-body">
                                <p style="margin-bottom: 8px;">If you have a coupon code, please apply it below.</p>
                                <div class="coupon field_form input-group">
                                    <input type="text" value="" class="form-control" placeholder="Enter Coupon Code..">
                                    <div class="input-group-append">
                                        <button class="btn btn-fill-out btn-sm" type="submit">Apply Coupon</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive order_table">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach(Cart::content() as $Product)
                                        <tr>
                                            <td>{{$Product->name}} <span class="product-qty">x {{$Product->qty}}</span></td>
                                            <td>{{$Product->price}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot id="shipping-method-change">
                                    <tr>
                                        <th>SubTotal</th>
                                        <td class="product-subtotal">{{Cart::subtotal()}}</td>
                                    </tr>
                                    <tr>
                                        <th>VAT</th>
                                        <td class="product-subtotal">{{Cart::tax()}}</td>
                                    </tr>
                                    <tr>
                                        <th>Discount</th>
                                        <td class="product-subtotal">{{Cart::discount()}}</td>
                                    </tr>
                                    <tr>
                                        <th>Shipping</th>
                                        <td>{{session()->get('shippingcharge')}}</td>
                                    </tr>
                                    <tr>
                                        <th>Total</th>
                                        <td class="product-subtotal">{{$NetTotalAmount}}</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="payment_method">
                                    <div style="margin-bottom: 10px;" class="heading_s1">
                                        <h5>Payment method</h5>
                                    </div>
                                    @if ($errors->has('payment_method'))
                                        <span class="text-danger">{{ $errors->first('payment_method') }}</span>
                                    @endif
                                    <div class="payment_method">
                                        <div class="custome-radio">
                                            <input class="form-check-input" required="" type="radio" name="payment_method" id="exampleRadios3" value="option3" checked="" >
                                            <label class="form-check-label" for="exampleRadios3">Direct Bank Transfer</label>
                                            <p data-method="option3" class="payment-text" style="display: none;"></p>
                                        </div>
                                        <div class="custome-radio">
                                            <input class="form-check-input" type="radio" name="payment_method" id="exampleRadios4" value="option4">
                                            <label class="form-check-label" for="exampleRadios4">Check Payment</label>
                                            <p data-method="option4" class="payment-text" style="display: block;"></p>
                                        </div>
                                        <div class="custome-radio">
                                            <input class="form-check-input" type="radio" name="payment_method" id="exampleRadios5" value="option5">
                                            <label class="form-check-label" for="exampleRadios5">Paypal</label>
                                            <p data-method="option5" class="payment-text" style="display: none;"></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button type="submit" href="{{route('order.confirm')}}" class="btn btn-fill-out btn-block">Place Order</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection()




@section('footersection')
    @include('frontend.common.home-footer')
@endsection()
