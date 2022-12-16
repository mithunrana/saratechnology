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
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <ol class="breadcrumb justify-content-md-start">
                            <li class="breadcrumb-item"><a href="{{route('home')}}"> <i class="fa fa-home" style="font-size:14px;"></i>Home</a></li>
                            <li class="breadcrumb-item"><a href="{{route('blog')}}">Blog</a></li>
                            <li class="breadcrumb-item"><a href="{{route('single.blog',$BlogData->permalink)}}">{{$BlogData->name}}</a></li>
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
                    <div class="col-xl-9">
                        <div class="single_post">
                            <h1 class="blog_title">{{$BlogData->name}}</h1>
                            <ul class="list_none blog_meta">
                                <li><a href="#"><i class="ti-calendar"></i> {{ date_format($BlogData->created_at,"d M Y");}}</a></li>
                                <li><a href="#"><i class="ti-comments"></i> 2 Comment</a></li>
                            </ul>
                            <div class="blog_img">
                                <img src="{{asset('')}}{{$BlogData->image}}" alt="{{$BlogData->name}}">
                            </div>
                            <div class="blog_content">
                                <div class="blog_text">

                                    {!! $BlogData->content !!}

                                    <div class="blog_post_footer">
                                        <div class="row justify-content-between align-items-center">
                                            <div class="col-md-8 mb-3 mb-md-0">
                                                <div class="tags">
                                                    @foreach($BlogData->tags as $Tags)
                                                        <a href="{{route('tag.blog',$Tags->permalink)}}">{{$Tags->name}}</a>
                                                    @endforeach()
                                                </div>
                                            </div>
                                            <!--<div class="col-md-4">
                                                <ul class="social_icons text-md-right">
                                                    <li><a href="#" class="sc_facebook"><i class="ion-social-facebook"></i></a></li>
                                                    <li><a href="#" class="sc_twitter"><i class="ion-social-twitter"></i></a></li>
                                                    <li><a href="#" class="sc_google"><i class="ion-social-googleplus"></i></a></li>
                                                    <li><a href="#" class="sc_youtube"><i class="ion-social-youtube-outline"></i></a></li>
                                                    <li><a href="#" class="sc_instagram"><i class="ion-social-instagram-outline"></i></a></li>
                                                </ul>
                                            </div>-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--<div class="comment-area">
                            <div class="content_title">
                                <h5>(03) Comments</h5>
                            </div>
                            <ul class="list_none comment_list">
                                <li class="comment_info">
                                    <div class="d-flex">
                                        <div class="comment_user">
                                            <img src="{{asset('')}}frontend/assets/images/user2.jpg" alt="user2">
                                        </div>
                                        <div class="comment_content">
                                            <div class="d-flex">
                                                <div class="meta_data">
                                                    <h6><a href="#">Alden Smith</a></h6>
                                                    <div class="comment-time">MARCH 5, 2018, 6:05 PM</div>
                                                </div>
                                                <div class="ml-auto">
                                                    <a href="#" class="comment-reply"><i class="ion-reply-all"></i>Reply</a>
                                                </div>
                                            </div>
                                            <p>We denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire that the cannot foresee the pain and trouble that.</p>
                                        </div>
                                    </div>
                                    <ul class="children">
                                        <li class="comment_info">
                                            <div class="d-flex">
                                                <div class="comment_user">
                                                    <img src="{{asset('')}}frontend/assets/images/user3.jpg" alt="user3">
                                                </div>
                                                <div class="comment_content">
                                                    <div class="d-flex align-items-md-center">
                                                        <div class="meta_data">
                                                            <h6><a href="#">Daisy Lana</a></h6>
                                                            <div class="comment-time">april 8, 2018, 5:15 PM</div>
                                                        </div>
                                                        <div class="ml-auto">
                                                            <a href="#" class="comment-reply"><i class="ion-reply-all"></i>Reply</a>
                                                        </div>
                                                    </div>
                                                    <p>We denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire that the cannot foresee the pain and trouble that.</p>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                                <li class="comment_info">
                                    <div class="d-flex">
                                        <div class="comment_user">
                                            <img src="{{asset('')}}frontend/assets/images/user4.jpg" alt="user4">
                                        </div>
                                        <div class="comment_content">
                                            <div class="d-flex">
                                                <div class="meta_data">
                                                    <h6><a href="#">John Becker</a></h6>
                                                    <div class="comment-time">april 15, 2018, 10:30 PM</div>
                                                </div>
                                                <div class="ml-auto">
                                                    <a href="#" class="comment-reply"><i class="ion-reply-all"></i>Reply</a>
                                                </div>
                                            </div>
                                            <p>We denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire that the cannot foresee the pain and trouble that.</p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <div class="content_title">
                                <h5>Write a comment</h5>
                            </div>
                            <form class="field_form" name="enq" method="post">
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <input name="name" class="form-control" placeholder="Your Name" required="required" type="text">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <input name="email" class="form-control" placeholder="Your Email" required="required" type="email">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <input name="website" class="form-control" placeholder="Your Website" required="required" type="text">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <textarea rows="3" name="message" class="form-control" placeholder="Your Comment" required="required"></textarea>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <button value="Submit" name="submit" class="btn btn-fill-out" title="Submit Your Message!" type="submit">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>-->
                    </div>


                <div class="col-lg-3 mt-4 pt-2 mt-lg-0 pt-lg-0">
                    <div class="sidebar">
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
                                                <p class="small m-0">{{ date_format($Blog->created_at,"d M Y");}}</p>
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
    <!-- END SECTION BLOG -->
@endsection()


@section('newsletter')
    @include('frontend.common.newsletter')
@endsection()


@section('footersection')
    @include('frontend.common.home-footer')
@endsection()