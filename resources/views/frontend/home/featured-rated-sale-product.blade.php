<div class="section pt-0 pb_20">
	<div class="custom-container">
    	<div class="row">

        	<div class="col-lg-4">
                <div class="row">
                    <div class="col-12">
                        <div class="heading_tab_header">
                            <div class="heading_s2">
                                <h4>Featured Products</h4>
                            </div>
                            <div class="view_all">
                            	<a href="{{route('products')}}" class="text_default"><span>View All</span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="product_slider carousel_slider product_list owl-carousel owl-theme nav_style5" data-nav="true" data-dots="false" data-loop="true" data-margin="20" data-responsive='{"0":{"items": "1"}, "380":{"items": "1"}, "640":{"items": "2"}, "991":{"items": "1"}}'>
                            <div class="item">
                                @foreach($FeaturedProducts as $Product)
                                    <div class="product_wrap">
                                        <div class="product_img">
                                            <a href="{{asset('')}}{{$Product->permalink}}">
                                                <img src="{{$Product->productFirstImageLongHeightSize($Product->id)}}" alt="el_img1">
                                            </a>
                                        </div>
                                        <div class="product_info">
                                            <h6 class="product_title"><a href="{{asset('')}}{{$Product->permalink}}">{{$Product->name}}</a></h6>
                                            <div class="product_price">
                                                <span class="price">@if(Session::get('Currency')->is_prefix_symbol==0){{Session::get('Currency')->symbol}}@endif{{$Product->sale_price}}@if(Session::get('Currency')->is_prefix_symbol!=0){{Session::get('Currency')->symbol}}@endif</span>
                                                <del>@if(Session::get('Currency')->is_prefix_symbol==0){{Session::get('Currency')->symbol}}@endif{{$Product->price}}@if(Session::get('Currency')->is_prefix_symbol!=0){{Session::get('Currency')->symbol}}@endif</del>
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
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="item">
                                @foreach($FeaturedProducts2 as $Product)
                                    <div class="product_wrap">
                                        <div class="product_img">
                                            <a href="{{asset('')}}{{$Product->permalink}}">
                                                <img src="{{$Product->productFirstImageLongHeightSize($Product->id)}}" alt="{{$Product->name}}">
                                            </a>
                                        </div>
                                        <div class="product_info">
                                            <h6 class="product_title"><a href="{{asset('')}}{{$Product->permalink}}">{{$Product->name}}</a></h6>
                                            <div class="product_price">
                                                <span class="price">@if(Session::get('Currency')->is_prefix_symbol==0){{Session::get('Currency')->symbol}}@endif{{$Product->sale_price}}@if(Session::get('Currency')->is_prefix_symbol!=0){{Session::get('Currency')->symbol}}@endif</span>
                                                <del>@if(Session::get('Currency')->is_prefix_symbol==0){{Session::get('Currency')->symbol}}@endif{{$Product->price}}@if(Session::get('Currency')->is_prefix_symbol!=0){{Session::get('Currency')->symbol}}@endif</del>
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
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
        	</div>


            <div class="col-lg-4">
                <div class="row">
                    <div class="col-12">
                        <div class="heading_tab_header">
                            <div class="heading_s2">
                                <h4>Top Rated Products</h4>
                            </div>
                            <div class="view_all">
                            	<a href="{{route('products')}}" class="text_default"><span>View All</span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="product_slider carousel_slider product_list owl-carousel owl-theme nav_style5" data-nav="true" data-dots="false" data-loop="true" data-margin="20" data-responsive='{"0":{"items": "1"}, "380":{"items": "1"}, "640":{"items": "2"}, "991":{"items": "1"}}'>
                            <div class="item">
                                @foreach($TopRatedProducts as $Review)
                                    <div class="product_wrap">
                                        <div class="product_img">
                                            <a href="{{route('productview',$Review->Product->permalink)}}">
                                                <img src="{{$Review->Product->productFirstImageLongHeightSize($Review->Product->id)}}" alt="{{$Review->Product->name}}">
                                            </a>
                                        </div>
                                        <div class="product_info">
                                            <h6 class="product_title"><a href="{{route('productview',$Review->Product->permalink)}}">{{$Review->Product->name}}</a></h6>
                                            <div class="product_price">
                                                <span class="price">@if(Session::get('Currency')->is_prefix_symbol==0){{Session::get('Currency')->symbol}}@endif{{$Review->Product->sale_price}}@if(Session::get('Currency')->is_prefix_symbol!=0){{Session::get('Currency')->symbol}}@endif</span>
                                                <del>@if(Session::get('Currency')->is_prefix_symbol==0){{Session::get('Currency')->symbol}}@endif{{$Review->Product->price}}@if(Session::get('Currency')->is_prefix_symbol!=0){{Session::get('Currency')->symbol}}@endif</del>
                                                <div class="on_sale">
                                                    <span>{{number_format((100-($Review->Product->sale_price) / ($Review->Product->price/100)),2)}}% Off</span>
                                                </div>
                                            </div>
                                            <div class="rating_wrap">
                                                <div class="rating">
                                                    <div class="product_rate" style="width:{{$Review->Product->reviews->average('star')*20}}%"></div>
                                                </div>
                                                <span class="rating_num">({{($Review->Product->reviews->count())}})</span>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="item">
                                @foreach($TopRatedProducts2 as $Review)
                                    <div class="product_wrap">
                                        <div class="product_img">
                                            <a href="{{route('productview',$Review->Product->permalink)}}">
                                                <img src="{{$Review->Product->productFirstImageLongHeightSize($Review->Product->id)}}" alt="{{$Review->Product->name}}">
                                            </a>
                                        </div>
                                        <div class="product_info">
                                            <h6 class="product_title"><a href="{{route('productview',$Review->Product->permalink)}}">{{$Review->Product->name}}</a></h6>
                                            <div class="product_price">
                                                <span class="price">@if(Session::get('Currency')->is_prefix_symbol==0){{Session::get('Currency')->symbol}}@endif{{$Review->Product->sale_price}}@if(Session::get('Currency')->is_prefix_symbol!=0){{Session::get('Currency')->symbol}}@endif</span>
                                                <del>@if(Session::get('Currency')->is_prefix_symbol==0){{Session::get('Currency')->symbol}}@endif{{$Review->Product->price}}@if(Session::get('Currency')->is_prefix_symbol!=0){{Session::get('Currency')->symbol}}@endif</del>
                                                <div class="on_sale">
                                                    <span>{{number_format((100-($Review->Product->sale_price) / ($Review->Product->price/100)),2)}}% Off</span>
                                                </div>
                                            </div>
                                            <div class="rating_wrap">
                                                <div class="rating">
                                                    <div class="product_rate" style="width:{{$Review->Product->reviews->average('star')*20}}%"></div>
                                                </div>
                                                <span class="rating_num">({{($Review->Product->reviews->count())}})</span>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
        	</div>
            
            <div class="col-lg-4">
                <div class="row">
                    <div class="col-12">
                        <div class="heading_tab_header">
                            <div class="heading_s2">
                                <h4>On Sale Products</h4>
                            </div>
                            <div class="view_all">
                            	<a href="{{route('products')}}" class="text_default"><span>View All</span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="product_slider carousel_slider product_list owl-carousel owl-theme nav_style5" data-nav="true" data-dots="false" data-loop="true" data-margin="20" data-responsive='{"0":{"items": "1"}, "380":{"items": "1"}, "640":{"items": "2"}, "991":{"items": "1"}}'>
                            <div class="item">
                                @foreach($OrderProducts as $Order)
                                    <div class="product_wrap">
                                        <div class="product_img">
                                            <a href="{{route('productview',$Order->Product->permalink)}}">
                                                <img src="{{$Order->Product->productFirstImageLongHeightSize($Order->Product->id)}}" alt="{{$Order->Product->name}}">
                                            </a>
                                        </div>
                                        <div class="product_info">
                                            <h6 class="product_title"><a href="{{route('productview',$Order->Product->permalink)}}">{{$Order->Product->name}}</a></h6>
                                            <div class="product_price">
                                                <span class="price">@if(Session::get('Currency')->is_prefix_symbol==0){{Session::get('Currency')->symbol}}@endif{{$Order->Product->sale_price}}@if(Session::get('Currency')->is_prefix_symbol!=0){{Session::get('Currency')->symbol}}@endif</span>
                                                <del>@if(Session::get('Currency')->is_prefix_symbol==0){{Session::get('Currency')->symbol}}@endif{{$Order->Product->price}}@if(Session::get('Currency')->is_prefix_symbol!=0){{Session::get('Currency')->symbol}}@endif</del>
                                                <div class="on_sale">
                                                    <span>{{number_format((100-($Order->Product->sale_price) / ($Order->Product->price/100)),2)}}% Off</span>
                                                </div>
                                            </div>
                                            <div class="rating_wrap">
                                                <div class="rating">
                                                    <div class="product_rate" style="width:{{$Order->Product->reviews->average('star')*20}}%"></div>
                                                </div>
                                                <span class="rating_num">({{($Order->Product->reviews->count())}})</span>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="item">
                                @foreach($OrderProducts2 as $Order)
                                    <div class="product_wrap">
                                        <div class="product_img">
                                            <a href="{{route('productview',$Order->Product->permalink)}}">
                                                <img src="{{$Order->Product->productFirstImageLongHeightSize($Order->Product->id)}}" alt="{{$Order->Product->name}}">
                                            </a>
                                        </div>
                                        <div class="product_info">
                                            <h6 class="product_title"><a href="{{route('productview',$Order->Product->permalink)}}">{{$Order->Product->name}}</a></h6>
                                            <div class="product_price">
                                                <span class="price">@if(Session::get('Currency')->is_prefix_symbol==0){{Session::get('Currency')->symbol}}@endif{{$Order->Product->sale_price}}@if(Session::get('Currency')->is_prefix_symbol!=0){{Session::get('Currency')->symbol}}@endif</span>
                                                <del>@if(Session::get('Currency')->is_prefix_symbol==0){{Session::get('Currency')->symbol}}@endif{{$Order->Product->price}}@if(Session::get('Currency')->is_prefix_symbol!=0){{Session::get('Currency')->symbol}}@endif</del>
                                                <div class="on_sale">
                                                    <span>{{number_format((100-($Order->Product->sale_price) / ($Order->Product->price/100)),2)}}% Off</span>
                                                </div>
                                            </div>
                                            <div class="rating_wrap">
                                                <div class="rating">
                                                    <div class="product_rate" style="width:{{$Order->Product->reviews->average('star')*20}}%"></div>
                                                </div>
                                                <span class="rating_num">({{($Order->Product->reviews->count())}})</span>
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
</div>