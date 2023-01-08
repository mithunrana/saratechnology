@extends('frontend.master')

@section('home-header')
    @include('frontend.common.home-header')
@endsection()


@section('category-and-menu-section')
    @include('frontend.common.category-and-menu')
@endsection()


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

        <div class="custom-container pagecart" >
            @if(Cart::count() != null)
                <div class="row">
                    <div class="col-12">
                        <div class="small_divider"></div>
                        <div class="divider center_icon"><i class="ti-shopping-cart-full"></i></div>
                        <div class="small_divider"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <div class="table-responsive shop_cart_table">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="product-thumbnail">&nbsp;</th>
                                        <th class="product-name">Product</th>
                                        <th class="product-price">Price</th>
                                        <th class="product-quantity">Quantity</th>
                                        <th class="product-subtotal">Total</th>
                                        <th class="product-remove">Remove</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach(Cart::content() as $Product)
                                        <tr>
                                            <td class="product-thumbnail"><a href="#"><img src="{{asset('')}}{{$Product->options->image}}" alt="product1"></a></td>
                                            <td class="product-name" data-title="Product"><a href="#">{{$Product->name}}</a></td>
                                            <td class="product-price" data-title="Price">
                                                @if(Session::get('Currency')->is_prefix_symbol==0){{Session::get('Currency')->symbol}}@endif{{$Product->price}}@if(Session::get('Currency')->is_prefix_symbol !=0){{Session::get('Currency')->symbol}}@endif
                                            </td>
                                            <td class="product-quantity" data-title="Quantity">
                                                <div class="quantity">
                                                    <input type="button" value="-" class="minus qtyDec" id="{{$Product->rowId}}">
                                                    <input type="text" name="quantity" value="{{$Product->qty}}" title="Qty" class="qty" class="{{$Product->rowId}}" size="4">
                                                    <input type="button" value="+" class="plus qtyInc" id="{{$Product->rowId}}">
                                                </div>
                                            </td>
                                            <td class="product-subtotal" data-title="Total">
                                                @if(Session::get('Currency')->is_prefix_symbol==0){{Session::get('Currency')->symbol}}@endif{{$Product->total}}@if(Session::get('Currency')->is_prefix_symbol !=0){{Session::get('Currency')->symbol}}@endif
                                            </td>
                                            <td class="product-remove cartdelete"  data-id="{{$Product->rowId}}" data-title="Remove"><a href="javascript:Void(0);"><i class="ti-close"></i></a></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="6" class="px-0">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-lg-4 col-md-6 mb-3 mb-md-0">
                                                    <div class="coupon field_form input-group">
                                                        <input type="text" value="" class="form-control form-control-sm" placeholder="Enter Coupon Code..">
                                                        <div class="input-group-append">
                                                            <button class="btn btn-fill-out btn-sm" type="submit">Apply Coupon</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-8 col-md-6 text-left text-md-right">
                                                    <a href="{{ route('cart') }}" class="btn btn-line-fill btn-sm" type="submit">Update Cart</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="border p-3 p-md-4">
                            <div class="heading_s1 mb-3">
                                <h6>Cart Totals</h6>
                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td class="cart_total_label">Cart Subtotal</td>
                                            <td class="cart_total_amount">@if(Session::get('Currency')->is_prefix_symbol==0){{Session::get('Currency')->symbol}}@endif{{Cart::subtotal()}}@if(Session::get('Currency')->is_prefix_symbol!=0){{Session::get('Currency')->symbol}}@endif</td>
                                        </tr>
                                        <tr>
                                            <td class="cart_total_label">VAT</td>
                                            <td class="cart_total_amount">@if(Session::get('Currency')->is_prefix_symbol==0){{Session::get('Currency')->symbol}}@endif{{Cart::tax()}}@if(Session::get('Currency')->is_prefix_symbol!=0){{Session::get('Currency')->symbol}}@endif</td>
                                        </tr>
                                        <tr>
                                            <td class="cart_total_label">Shipping</td>
                                            <td class="cart_total_amount">Free Shipping</td>
                                        </tr>
                                        <tr>
                                            <td class="cart_total_label">Discount</td>
                                            <td class="cart_total_amount">@if(Session::get('Currency')->is_prefix_symbol==0){{Session::get('Currency')->symbol}}@endif{{Cart::discount()}}@if(Session::get('Currency')->is_prefix_symbol!=0){{Session::get('Currency')->symbol}}@endif</td>
                                        </tr>
                                        <tr>
                                            <td class="cart_total_label">Total</td>
                                            <td class="cart_total_amount"><strong>@if(Session::get('Currency')->is_prefix_symbol==0){{Session::get('Currency')->symbol}}@endif{{Cart::total()}}@if(Session::get('Currency')->is_prefix_symbol!=0){{Session::get('Currency')->symbol}}@endif</strong></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <a href="{{ route('checkout') }}" class="btn btn-fill-out">Proceed To CheckOut</a>
                        </div>
                    </div>
                </div>
            @else
                <div class="row">
                    <div class="col-sm-12">
                        <h4 style="text-align:center">Your Shoping Cart Is Empty</h4>
                        <a class="d-flex justify-content-around btn" style="background-color:#FF324D !important" href="{{asset('')}}" style="text-align:center">Continue Shoping</a>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection()




@section('footersection')
    @include('frontend.common.home-footer')
@endsection()
