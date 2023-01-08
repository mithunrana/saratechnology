<div class="section small_pt pb-0">
	<div class="custom-container">
    	<div class="row">
        	<div class="col-xl-3 d-none d-xl-block">
            	<div class="sale-banner">
                	<a class="hover_effect1" href="#">
                		<img src="{{asset('')}}{{ $SettingKey['home_exclusive_section_side_banner'] }}" alt="Exclusive Banner">
                    </a>
                </div>
            </div>
        	<div class="col-xl-9">
                <div class="row">
                    <div class="col-12">
                        <div class="heading_tab_header">
                            <div class="heading_s2">
                                <h4>{{ $SettingKey['home_exclusive_section_title'] }}</h4>
                            </div>
                            <div class="tab-style2">
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#tabmenubar" aria-expanded="false"> 
                                    <span class="ion-android-menu"></span>
                                </button>
                                <ul class="nav nav-tabs justify-content-center justify-content-md-end" id="tabmenubar" role="tablist">
                                    @foreach($ProductCollections as $Collection)
                                        <li class="nav-item">
                                            <a class="nav-link" id="arrival-tab" data-toggle="tab" href="#THI{{$Collection->id}}" role="tab" aria-controls="arrival" aria-selected="true">{{$Collection->name}}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="tab_slider">
                            @foreach($ProductCollections as $Collection)
                                <div class="tab-pane fade @if($loop->index == 1)show active @endif" id="THI{{$Collection->id}}" role="tabpanel" aria-labelledby="arrival-tab">
                                    <div class="product_slider carousel_slider owl-carousel owl-theme dot_style1" data-loop="true" data-margin="20" data-responsive='{"0":{"items": "1"}, "481":{"items": "2"}, "768":{"items": "3"}, "991":{"items": "4"}}'>
                                        @foreach($Collection->products as $Product)
                                            <div class="item">
                                                <div class="product_wrap">
                                                    <div class="product_img">
                                                        <a href="shop-product-detail.html">
                                                            <img src="{{$Product->productFirstImageLongHeightSize($Product->id)}}" alt="el_img1">
                                                        </a>
                                                        <div class="product_action_box">
                                                            <ul class="list_none pr_action_btn">
                                                                <li><a href="shop-compare.html" class="popup-ajax"><i class="icon-shuffle"></i></a></li>
                                                                <li><a href="{{route('product.shortview',$Product->id)}}" class="popup-ajax"><i class="icon-magnifier-add"></i></a></li>
                                                                <li><a href="#"><i class="icon-heart"></i></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="product_info">
                                                        <h6 class="product_title"><a href="{{route('productview',$Product->permalink)}}">{{$Product->name}}</a></h6>
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
                                                        <div style="text-align: center;" class="add-to-cart">
                                                            <button style="padding: 5px 10px;" href="#" class="btn btn-border-fill btn-radius btn-addtocart"  data-id="{{$Product->id}}"><i class="icon-basket-loaded"></i> Add To Cart</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
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