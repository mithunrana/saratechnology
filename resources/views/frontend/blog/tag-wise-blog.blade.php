@extends('frontend.master')


@section('end-screen-popup')
    @include('frontend.common.subscribe-popup')
@endsection()



@section('home-header')
    @include('frontend.common.home-header')
@endsection()



@section('category-and-menu-section')
    @include('frontend.common.home-category-and-menu')
@endsection()



@section('main-content')
    <!-- START SECTION BREADCRUMB -->
    <div class="breadcrumb_section bg_gray page-title-mini">
        <!-- STRART CONTAINER -->
        <div class="custom-container">
            <div class="row">
                <div class="col-md-12">
                    <ol class="breadcrumb justify-content-md-start">
                        <li class="breadcrumb-item"><a href="{{route('home')}}"> <i class="fa fa-home" style="font-size:14px;"></i>Home</a></li>
                        <li class="breadcrumb-item"><a href="{{route('blog')}}">Blog</a></li>
                        <li class="breadcrumb-item"><a href="{{route('tag.blog',$TagData->permalink)}}">{{$TagData->name}}</a></li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- END CONTAINER-->
    </div>
    <!-- END SECTION BREADCRUMB -->



    
    <!-- START SECTION BLOG -->
    <div class="section">
        <div class="custom-container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="row grid_container masonry">
                        <div class="col-xl-4 col-md-6 grid-sizer"></div>
                        @foreach($TagData->blogs as $Blog)
                            <div class="col-xl-4 col-md-6 grid_item">
                                <div class="blog_post blog_style2 box_shadow1">
                                    <div class="blog_img">
                                        <a href="{{route('single.blog',$Blog->permalink)}}">
                                            <img src="{{asset('')}}{{$Blog->image}}" alt="{{$Blog->name}}">
                                        </a>
                                    </div>
                                    <div class="blog_content bg-white">
                                        <div class="blog_text">
                                            <h6 class="blog_title">
                                                <a href="{{route('single.blog',$Blog->permalink)}}">{{$Blog->name}}</a>
                                            </h6>
                                            <ul class="list_none blog_meta">
                                                <li><a href="#"><i class="ti-calendar"></i> {{ date_format($Blog->created_at,"d M Y");}}</a></li>
                                                <li><a href="#"><i class="ti-comments"></i> 10</a></li>
                                            </ul>
                                            <p>{!! Str::limit($Blog->description, 60, ' ...') !!}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach()
                    </div>
                </div>


                <div class="col-lg-3 mt-4 pt-2 mt-lg-0 pt-lg-0">
                    <div class="sidebar">
                        <div class="widget">
                            <div class="search_form">
                                <form> 
                                    <input required="" class="form-control" placeholder="Search..." type="text">
                                    <button type="submit" title="Subscribe" class="btn icon_search" name="submit" value="Submit">
                                        <i class="ion-ios-search-strong"></i>
                                    </button>
                                </form>
                            </div>
                        </div>

                        <div class="widget">
                            <h5 class="widget_title">Recent Posts</h5>
                            <ul class="widget_recent_post">
                                @foreach($RecentBlog as $Blog)
                                    <li>
                                        <div class="post_footer">
                                            <div class="post_img">
                                                <a href="{{route('single.blog',$Blog->permalink)}}">
                                                    <img src="{{asset('')}}{{$Blog->image}}" alt="{{$Blog->name}}">
                                                </a>
                                            </div>
                                            <div class="post_content">
                                                <h6><a href="{{route('single.blog',$Blog->permalink)}}">{{$Blog->name}}</a></h6>
                                                <p class="small m-0">{{ date_format($Blog->created_at,"d-M-Y");}}</p>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach()
                            </ul>
                        </div>

                        <div class="widget">
                            <h5 class="widget_title">Categories</h5>
                            <ul class="widget_archive">
                                @foreach($BlogCategories as $Category)
                                    <li><a href="{{route('category.blog',$Category->permalink)}}"><span class="archive_year">{{$Category->name }}</span><span class="archive_num">({{$Category->blogs->count()}})</span></a></li>
                                @endforeach
                            </ul>
                        </div>


                        <div class="widget">
                            <div class="shop_banner">
                                <div class="banner_img overlay_bg_20">
                                    <img src="{{asset('')}}{{$SettingKey['blog_side_banner_image']}}" alt="sidebar_banner_img">
                                </div> 
                                <div class="shop_bn_content2 text_white">
                                    <h5 class="text-uppercase shop_subtitle">{{$SettingKey['blog_side_banner_subtitle']}}</h5>
                                    <h3 class="text-uppercase shop_title">{{$SettingKey['blog_side_banner_title']}}</h3>
                                    <a href="{{$SettingKey['blog_side_banner_url']}}" class="btn btn-white rounded-0 btn-sm text-uppercase">{{$SettingKey['blog_side_banner_buttontext']}}</a>
                                </div>
                            </div>
                        </div>


                        <div class="widget">
                            <h5 class="widget_title">tags</h5>
                            <div class="tags">
                                @foreach($BlogTags as $Tags)
                                    <a href="{{route('tag.blog',$Tags->permalink)}}">{{$Tags->name}}</a>
                                @endforeach()
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END SECTION BLOG -->

@endsection()




@section('newsletter')
    @include('frontend.common.newsletter')
@endsection()



@section('footersection')
    @include('frontend.common.home-footer')
@endsection()