<div class="section pt-0 pb-0">
	<div class="custom-container">
    	<div class="row">
        	<div class="col-md-12">
            	<div class="heading_tab_header">
                    <div class="heading_s2">
                        <h4>Deal Of The Day</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
        	<div class="col-md-12">
            	<div class="product_slider carousel_slider owl-carousel owl-theme nav_style3" data-loop="true" data-dots="false" data-nav="true" data-margin="30" data-responsive='{"0":{"items": "1"}, "650":{"items": "2"}, "1199":{"items": "2"}}'>
                    @foreach($FlashSales as $FlashSale)
                        @if($FlashSale->item->count() > 0)
                            @foreach($FlashSale->item as $Item)
                                @if($Item->products->status=='published')
                                    <div class="item">
                                        <div class="deal_wrap">
                                            <div class="product_img">
                                                <a href="{{route('productview',$Item->products->permalink)}}">
                                                    <img src="{{asset('')}}{{$Item->products->productFirstImageLongHeightSize($Item->products->id)}}" alt="{{$Item->products->name}}">
                                                </a>
                                            </div>
                                            <div class="deal_content">
                                                <div class="product_info">
                                                    <h5 class="product_title"><a href="{{route('productview',$Item->products->permalink)}}">{{$Item->products->name}}</a></h5>
                                                    <div class="product_price">
                                                        <span class="price">@if(Session::get('Currency')->is_prefix_symbol==0){{Session::get('Currency')->symbol}}@endif{{$Item->price}}@if(Session::get('Currency')->is_prefix_symbol!=0){{Session::get('Currency')->symbol}}@endif</span>
                                                        <del>@if(Session::get('Currency')->is_prefix_symbol==0){{Session::get('Currency')->symbol}}@endif{{$Item->products->price}}@if(Session::get('Currency')->is_prefix_symbol!=0){{Session::get('Currency')->symbol}}@endif</del>
                                                    </div>
                                                </div>
                                                <div class="deal_progress">
                                                    <span class="stock-sold">Already Sold: <strong>{{$Item->sold}}</strong></span>
                                                    <span class="stock-available">Available: <strong>{{$Item->availableQuantity($Item->quantity,$Item->sold)}}</strong></span>
                                                    <div class="progress">
                                                        <div class="progress-bar" role="progressbar" aria-valuenow="{{$Item->availablePercent($Item->quantity,$Item->sold)}}" aria-valuemin="0" aria-valuemax="100" style="width:{{$Item->availablePercent($Item->quantity,$Item->sold)}}%"> {{$Item->availablePercent($Item->quantity,$Item->sold)}} </div>
                                                    </div>
                                                </div>
                                                <div class="countdown_time countdown_style4 mb-4" data-time="{{$FlashSale->end_date}}"></div>
                                            </div>
                                        </div>
                                    </div>
                                @endif()
                            @endforeach()
                        @endif()
                    @endforeach()
                </div>
            </div>
        </div>
    </div>
</div>