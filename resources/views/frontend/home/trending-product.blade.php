<div class="section small_pt small_pb">
	<div class="custom-container">
    	<div class="row">
        	<div class="col-xl-3 d-none d-xl-block">
            	<div class="sale-banner">
                	<a class="hover_effect1" href="{{$SettingKey['home_trending_section_side_banner_url']}}">
                		<img src="{{$SettingKey['home_trending_section_side_banner']}}" alt="shop_banner_img10">
                    </a>
                </div>
            </div>
        	<div class="col-xl-9">
                <div class="row">
                    <div class="col-12">
                        <div class="heading_tab_header">
                            <div class="heading_s2">
                                <h4>{{$SettingKey['home_trending_section_title']}}</h4>
                            </div>
                            <div class="view_all">
                            	<a href="{{route('products')}}" class="text_default"><i class="linearicons-power"></i> <span>View All</span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="product_slider carousel_slider owl-carousel owl-theme dot_style1" data-loop="true" data-margin="20" data-responsive='{"0":{"items": "1"}, "481":{"items": "2"}, "768":{"items": "3"}, "991":{"items": "4"}}'>
                            @foreach($TrendingProducts as $Product)
                                <div class="item">
                                    <div class="product_wrap">
                                        <div class="product_img">
                                            <a href="shop-product-detail.html">
                                                <img src="{{$Product->product->productFirstImageLongHeightSize($Product->product->id)}}" alt="{{$Product->name}}">
                                            </a>
                                            <div class="product_action_box">
                                                <ul class="list_none pr_action_btn">
                                                    <li><a href="shop-compare.html" class="popup-ajax"><i class="icon-shuffle"></i></a></li>
                                                    <li><a href="{{route('product.shortview',$Product->product->id)}}" class="popup-ajax"><i class="icon-magnifier-add"></i></a></li>
                                                    <li><a href="#"><i class="icon-heart"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="product_info">
                                            <h6 class="product_title"><a href="{{route('productview',$Product->product->permalink)}}">{{$Product->product->name}}</a></h6>
                                            <div class="product_price">
                                                <span class="price">@if(Session::get('Currency')->is_prefix_symbol==0){{Session::get('Currency')->symbol}}@endif{{$Product->product->sale_price}}@if(Session::get('Currency')->is_prefix_symbol!=0){{Session::get('Currency')->symbol}}@endif</span>
                                                <del>@if(Session::get('Currency')->is_prefix_symbol==0){{Session::get('Currency')->symbol}}@endif{{$Product->product->price}}@if(Session::get('Currency')->is_prefix_symbol!=0){{Session::get('Currency')->symbol}}@endif</del>
                                                <div class="on_sale">
                                                    <span>{{number_format((100-($Product->product->sale_price) / ($Product->product->price/100)),2)}}% Off</span>
                                                </div>
                                            </div>
                                            <div class="rating_wrap">
                                                <div class="rating">
                                                    <div class="product_rate" style="width:{{$Product->product->reviews->average('star')*20}}%"></div>
                                                </div>
                                                <span class="rating_num">({{($Product->product->reviews->where('status','published')->count())}})</span>
                                            </div>
                                            <div style="text-align: center;" class="add-to-cart">
                                                <button style="padding: 5px 10px;" href="#" class="btn btn-border-fill btn-radius btn-addtocart"  data-id="{{$Product->product->id}}"><i class="icon-basket-loaded"></i> Add To Cart</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
        	</div>
        </div>
    </div>
</div>