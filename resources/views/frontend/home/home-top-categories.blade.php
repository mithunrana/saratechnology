<!-- START SECTION CATEGORIES -->
<div class="section small_pb small_pt">
	<div class="custom-container">
    	<div class="row justify-content-center">
			<div class="col-md-6">
                <div class="heading_s4 text-center">
                    <h2>Top Categories</h2>
                </div>
                <p class="text-center leads">{{$SettingKey['home_page_top_categories_text']}}</p>
            </div>
		</div>
        <div class="row align-items-center">
            <div class="col-12">
                <div class="cat_slider cat_style1 mt-4 mt-md-0 carousel_slider owl-carousel owl-theme nav_style5" data-loop="true" data-dots="false" data-nav="true" data-margin="30" data-responsive='{"0":{"items": "2"}, "480":{"items": "3"}, "576":{"items": "4"}, "768":{"items": "5"}, "991":{"items": "6"}, "1199":{"items": "7"}}'>
                    @foreach($ProductPublishCategories->where('is_featured',1) as $Category)
                        <div class="item">
                            <div class="categories_box">
                                <a href="{{route('category.products',$Category->permalink)}}">
                                    <img src="{{$Category->image}}" alt="{{$Category->name}}"/>
                                    <span>{{$Category->name}}</span>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END SECTION CATEGORIES --> 