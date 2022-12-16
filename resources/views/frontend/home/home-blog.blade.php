
<!-- START SECTION BLOG -->
<div class="section pb_20">
	<div class="container">
    	<div class="row justify-content-center">
        	<div class="col-lg-6 col-md-8">
            	<div class="heading_s1 text-center">
                	<h2>Latest News</h2>
                </div>
                <p class="leads text-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.</p>
            </div>
        </div>
        <div class="row justify-content-center">
            @foreach($BlogPost as $Blog)
        	<div class="col-lg-4 col-md-6">
            	<div class="blog_post blog_style2 box_shadow1">
                	<div class="blog_img">
                        <a href="{{route('single.blog',$Blog->permalink)}}">
                            <img src="{{$Blog->image}}" alt="{{$Blog->name}}">
                        </a>
                    </div>
                    <div class="blog_content bg-white">
                    	<div class="blog_text">
                            <h5 class="blog_title"><a href="{{route('single.blog',$Blog->permalink)}}">{{$Blog->name}}</a></h5>
                            <ul class="list_none blog_meta">
                                <li><a href="#"><i class="ti-calendar"></i> {{ date_format($Blog->created_at,"d-M-Y");}}</a></li>
                                <li><a href="#"><i class="ti-comments"></i> 2 Comment</a></li>
                            </ul>
                            <p> {!! Str::limit($Blog->description, 60, ' ...') !!}</p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach()
        </div>
    </div>
</div>
<!-- END SECTION BLOG -->