<div class="section pt-0 small_pb">
	<div class="custom-container">
    	<div class="row">
			<div class="col-md-12">
            	<div class="heading_tab_header">
                    <div class="heading_s2">
                        <h4>Our Brands</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
        	<div class="col-12">
            	<div class="client_logo carousel_slider owl-carousel owl-theme nav_style3" data-dots="false" data-nav="true" data-margin="30" data-loop="true" data-autoplay="true" data-responsive='{"0":{"items": "2"}, "480":{"items": "3"}, "767":{"items": "4"}, "991":{"items": "5"}, "1199":{"items": "6"}}'>
                    @foreach($Brands as $Brand)
                        <div class="item">
                            <div class="cl_logo">
                                <a href="{{route('brand.products',$Brand->permalink)}}">
                                    <img src="{{asset('')}}{{$Brand->logo}}" alt="{{$Brand->name}}"/>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>