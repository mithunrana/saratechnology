<div class="mt-4 staggered-animation-wrap">
	<div class="custom-container">
    	<div class="row">
        	<div class="col-lg-9 offset-lg-3">
            	<div class="banner_section shop_el_slider">
                    <div id="carouselExampleControls" class="carousel slide carousel-fade light_arrow" data-ride="carousel">
                        <div class="carousel-inner">

                            @foreach($SlideItems as $Slide)
                                <div class="carousel-item background_bg  @if($loop->index==0) active @endif"  data-img-src="{{asset('')}}{{$Slide->image}}">
                                    <div class="banner_slide_content banner_content_inner">
                                        <div class="col-lg-7 col-10">
                                            <div class="banner_content3 overflow-hidden">
                                                <h5 class="mb-3 staggered-animation font-weight-light" data-animation="slideInLeft" data-animation-delay="0.5s">{{$Slide->description}}</h5>
                                                <h2 class="staggered-animation" data-animation="slideInLeft" data-animation-delay="1s">{{$Slide->title}}</h2>
                                                <a class="btn btn-fill-out btn-radius staggered-animation text-uppercase" href="{{asset('')}}{{$Slide->link}}" data-animation="slideInLeft" data-animation-delay="1.5s">{{$Slide->button_text}}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                        <ol class="carousel-indicators indicators_style1">
                            @foreach($SlideItems as $Slide)
                                <li data-target="#carouselExampleControls" data-slide-to="{{ $loop->index }}"  @if($loop->index==0) class='active' @endif ></li>
                            @endforeach
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>