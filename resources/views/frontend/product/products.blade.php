@extends('frontend.master')

@section('home-header')
    @include('frontend.common.home-header')
@endsection()



@section('category-and-menu-section')
    @include('frontend.common.category-and-menu')
@endsection()


@section('main-content')
    <!-- START SECTION SHOP -->
    <div class="section">
        <div class="custom-container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="row align-items-center mb-4 pb-1">
                        <div class="col-12">
                            <div class="product_header">
                                <div class="product_header_left">
                                    <div class="custom_select">
                                        <select class="form-control form-control-sm submit-form-on-change" name="sort-by" id="sort-by">
                                            <option value="default_sorting">Default</option>
                                            <option value="date_asc">Oldest</option>
                                            <option value="date_desc" selected="">Newest</option>
                                            <option value="price_asc">Price: low to high</option>
                                            <option value="price_desc">Price: high to low</option>
                                            <option value="name_asc">Name: A-Z</option>
                                            <option value="name_desc">Name : Z-A</option>
                                            <option value="rating_asc">Rating: low to high</option>
                                            <option value="rating_desc">Rating: high to low</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="product_header_right">
                                    <div class="products_view">
                                        <a href="javascript:Void(0);" class="shorting_icon grid active"><i class="ti-view-grid"></i></a>
                                        <a href="javascript:Void(0);" class="shorting_icon list"><i class="ti-layout-list-thumb"></i></a>
                                    </div>
                                    <div class="custom_select">
                                        <select class="form-control form-control-sm">
                                            <option value="">Showing</option>
                                            <option value="9">9</option>
                                            <option value="12">12</option>
                                            <option value="18">18</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> 
                    <div class="row shop_container">
                        @foreach($Products as $Product)
                            <div class="col-md-3 col-6">
                                <div class="product">
                                    <div class="product_img">
                                        <a href="{{route('productview',$Product->permalink)}}">
                                            <img src="{{asset('')}}{{$Product->productFirstImageMediumSize($Product->id)}}" alt="{{$Product->name}}">
                                        </a>
                                        <div class="product_action_box">
                                            <ul class="list_none pr_action_btn">
                                                <li><a href="shop-compare.html" class="popup-ajax"><i class="icon-shuffle"></i></a></li>
                                                <li><a href="{{route('product.shortview',$Product->id)}}"  class="popup-ajax"><i class="icon-magnifier-add"></i></a></li>
                                                <li><a href="#"><i class="icon-heart"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product_info">
                                        <h6 class="product_title"><a href="{{route('productview',$Product->permalink)}}">{{$Product->name}}</a></h6>
                                        <div class="product_price">
                                            <span class="price">@if(Session::get('Currency')->is_prefix_symbol==0){{Session::get('Currency')->symbol}}@endif{{$Product->sale_price}}@if(Session::get('Currency')->is_prefix_symbol!=0){{Session::get('Currency')->symbol}}@endif</span>
                                            <del>@if(Session::get('Currency')->is_prefix_symbol!=0){{Session::get('Currency')->symbol}}@endif{{$Product->price}}@if(Session::get('Currency')->is_prefix_symbol!=0){{Session::get('Currency')->symbol}}@endif</del>
                                            <div class="on_sale">
                                                <span>{{number_format((100-($Product->sale_price) / ($Product->price/100)),2)}}% Off</span>
                                            </div>
                                        </div>
                                        <div class="rating_wrap">
                                            <div class="rating">
                                                <div class="product_rate" style="width:{{$Product->reviews->average('star')*20}}%"></div>
                                            </div>
                                            <span class="rating_num">({{($Product->reviews->count())}})</span>
                                        </div>
                                        <div style="text-align: center;margin-top:7px;" class="add-to-cart">
                                            <button style="padding: 5px 10px;" href="#" class="btn btn-border-fill btn-radius btn-addtocart"  data-id="{{$Product->id}}"><i class="icon-basket-loaded"></i> Add To Cart</button>
                                        </div>
                                        <div class="pr_desc">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit massa enim. Nullam id varius nunc id varius nunc.</p>
                                        </div>
                                        <div class="list_product_action_box">
                                            <ul class="list_none pr_action_btn">
                                                <li><a href="shop-compare.html" class="popup-ajax"><i class="icon-shuffle"></i></a></li>
                                                <li><a href="shop-quick-view.html" class="popup-ajax"><i class="icon-magnifier-add"></i></a></li>
                                                <li><a href="#"><i class="icon-heart"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach()
                    </div>

                    {{ $Products->links('vendor.pagination.custom') }}

                </div>
                <div class="col-lg-3 order-lg-first mt-4 pt-2 mt-lg-0 pt-lg-0">
                    <div class="sidebar">
                        <div class="widget">
                            <h5 class="widget_title">Categories</h5>
                            <ul class="widget_categories">
                                @foreach($ProductPublishCategories->where('parent_id',NULL) as $Category)
                                    <li><a href="{{route('category.products',$Category->permalink)}}"><span class="categories_name">{{$Category->name}}</span><span class="categories_num">({{$Category->products->count()}})</span></a></li>
                                @endforeach()
                            </ul>
                        </div>
                        <div class="widget">
                            <h5 class="widget_title">Filter</h5>
                            <div class="filter_price">
                                <div id="price_filter" data-min="0" data-max="500" data-min-value="50" data-max-value="300" data-price-sign="$"></div>
                                <div class="price_range">
                                    <span>Price: <span id="flt_price"></span></span>
                                    <input type="hidden" id="price_first">
                                    <input type="hidden" id="price_second">
                                </div>
                            </div>
                        </div>
                        <div class="widget">
                            <h5 class="widget_title">Brand</h5>	
                            <ul class="list_brand">
                                @foreach($Brands as $Brand)
                                    <li>
                                        <div class="custome-checkbox">
                                            <input class="form-check-input" type="checkbox" name="checkbox" id="Arrivals" value="{{$Brand->id}}">
                                            <label class="form-check-label" for="Arrivals"><span>{{$Brand->name}}</span></label>
                                        </div>
                                    </li>
                                @endforeach()
                            </ul>
                        </div>
                        <div class="widget">
                            <h5 class="widget_title">Product Tags</h5>	
                            <ul class="list_brand">
                                @foreach($ProductTags as $Tag)
                                    <li>
                                        <div class="custome-checkbox">
                                            <input class="form-check-input" type="checkbox" name="checkbox" id="Arrivals" value="{{$Tag->id}}">
                                            <label class="form-check-label" for="Arrivals"><span>{{$Tag->name}}</span></label>
                                        </div>
                                    </li>
                                @endforeach()
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END SECTION SHOP -->
@endsection()



@section('footersection')
    @include('frontend.common.home-footer')
@endsection()