@extends('frontend.master')

@section('home-header')
    @include('frontend.common.home-header')
@endsection()


@section('category-and-menu-section')
    @include('frontend.common.close-category-menu')
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

        <div class="custom-container">
            @if(Cart::count() != null)
                <div class="row">
                    <div class="col-12">
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
                                            <td class="product-price" data-title="Price">{{$Product->price}}৳</td>
                                            <td class="product-quantity" data-title="Quantity">
                                                <div class="quantity">
                                                    <input type="button" value="-" class="minus qtyDec" id="{{$Product->rowId}}">
                                                    <input type="text" name="quantity" value="{{$Product->qty}}" title="Qty" class="qty" class="{{$Product->rowId}}" size="4">
                                                    <input type="button" value="+" class="plus qtyInc" id="{{$Product->rowId}}">
                                                </div>
                                            </td>
                                            <td class="product-subtotal" data-title="Total">{{$Product->total}}</td>
                                            <td class="product-remove" data-title="Remove"><a href="{{asset('')}}cart/delete/{{$Product->rowId}}"><i class="ti-close"></i></a></td>
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
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="medium_divider"></div>
                        <div class="divider center_icon"><i class="ti-shopping-cart-full"></i></div>
                        <div class="medium_divider"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="heading_s1 mb-3">
                            <h6>Calculate Shipping</h6>
                        </div>
                        <form class="field_form shipping_calculator">
                            <div class="form-row">
                                <div class="form-group col-lg-12">
                                    <div class="custom_select">
                                        <select class="form-control first_null not_chosen">
                                            <option value="">Choose a option...</option>
                                            <option value="BD">Bangladesh</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-lg-6">
                                    <input required="required" placeholder="State / Country" class="form-control" name="name" type="text">
                                </div>
                                <div class="form-group col-lg-6">
                                    <input required="required" placeholder="PostCode / ZIP" class="form-control" name="name" type="text">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-lg-12">
                                    <button class="btn btn-fill-line" type="submit">Update Totals</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6">
                        <div class="border p-3 p-md-4">
                            <div class="heading_s1 mb-3">
                                <h6>Cart Totals</h6>
                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td class="cart_total_label">Cart Subtotal</td>
                                            <td class="cart_total_amount">{{Cart::subtotal()}}</td>
                                        </tr>
                                        <tr>
                                            <td class="cart_total_label">VAT</td>
                                            <td class="cart_total_amount">{{Cart::tax()}}</td>
                                        </tr>
                                        <tr>
                                            <td class="cart_total_label">Shipping</td>
                                            <td class="cart_total_amount">Free Shipping</td>
                                        </tr>
                                        <tr>
                                            <td class="cart_total_label">Discount</td>
                                            <td class="cart_total_amount">{{Cart::discount()}}</td>
                                        </tr>
                                        <tr>
                                            <td class="cart_total_label">Total</td>
                                            <td class="cart_total_amount"><strong>{{Cart::total()}}</strong></td>
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
