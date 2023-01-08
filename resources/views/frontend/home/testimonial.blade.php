<!-- START SECTION TESTIMONIAL -->
<div style="padding: 80px 0;" class="section bg_redon">
	<div class="container">
    	<div class="row justify-content-center">
        	<div class="col-md-6">
            	<div class="heading_s1 text-center">
                	<h2>Our Client Say!</h2>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-9">
            	<div class="testimonial_wrap testimonial_style1 carousel_slider owl-carousel owl-theme nav_style2" data-nav="true" data-dots="false" data-center="true" data-loop="true" data-autoplay="true" data-items='1'>
                	@foreach($Testimonials  as $Testimonial)
                        <div class="testimonial_box">
                            <div class="testimonial_desc">
                                {!! $Testimonial->content !!}
                            </div>
                            <div class="author_wrap">
                                <div class="author_img">
                                    <img src="{{asset('')}}{{$Testimonial->image}}" alt="{{$Testimonial->name}}" />
                                </div>
                                <div class="author_name">
                                    <h6>{{$Testimonial->name}}</h6>
                                    <span>{{$Testimonial->company}}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach()
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END SECTION TESTIMONIAL -->