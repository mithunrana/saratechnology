@extends('backend.master')

@section('sidebar')
	@include('backend.sidebar')
@endsection()

@section('maincontent')

    <div class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
            <ol class="breadcrumb float-sm-left">
                <li class="breadcrumb-item">
                <a href="{{route('dashboard')}}"><i class="fa fa-home"></i> HOME</a>
                </li>
                <li class="breadcrumb-item active">Appearance</li>
                <li class="breadcrumb-item active">Home Page</li>
            </ol>
            </div>
        </div>
        </div>
    </div>
  
    <section id="vueapp" class="content">

        <div class="col-md-12">
            <single-image-input-without-preview>
        </div>

        <div class="container-fluid">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title" style="background-color: #f0ad4e;color: #fff!important;display: inline-block;font-weight: 700;padding: 0.2em 0.5em;"><i class="fas fa-edit"></i> Developer Mode Enable </h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-5 col-sm-3">
                            <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist" aria-orientation="vertical">
                                <a style="color:#7a777e;font-weight:bold;" class="nav-link active" id="vert-tabs-exclusive-tab" data-toggle="pill" href="#vert-tabs-exclusive" role="tab" aria-controls="vert-tabs-exclusive" aria-selected="true">
                                    <i class="fa fa-home"></i> Exclusive Section
                                </a>
                                <a style="color:#7a777e;font-weight:bold;" class="nav-link" id="vert-tabs-3column-bannder-first-tab" data-toggle="pill" href="#vert-tabs-3column-bannder-first" role="tab" aria-controls="vert-tabs-3column-bannder-first" aria-selected="false">
                                    <i class="fa fa-image"></i> 3 Column Banner First
                                </a>
                                <a style="color:#7a777e;font-weight:bold;" class="nav-link" id="vert-tabs-social-tab" data-toggle="pill" href="#vert-tabs-social" role="tab" aria-controls="vert-tabs-social" aria-selected="false">
                                    <i class="fa fa-share-alt"></i> Social
                                </a>
                                <a style="color:#7a777e;font-weight:bold;" class="nav-link" id="vert-tabs-header-tab" data-toggle="pill" href="#vert-tabs-header" role="tab" aria-controls="vert-tabs-header" aria-selected="false">
                                    <i class="fas fa-magic"></i> Header
                                </a>
                                <a style="color:#7a777e;font-weight:bold;" class="nav-link" id="vert-tabs-facebook-tab" data-toggle="pill" href="#vert-tabs-facebook" role="tab" aria-controls="vert-tabs-facebook" aria-selected="false">
                                    <i class="fab fa-facebook"></i> Facebook Integration
                                </a>
                                <a style="color:#7a777e;font-weight:bold;" class="nav-link" id="vert-tabs-blog-tab" data-toggle="pill" href="#vert-tabs-blog" role="tab" aria-controls="vert-tabs-blog" aria-selected="false">
                                    <i class="fa fa-edit"></i> Blog
                                </a>
                                <a style="color:#7a777e;font-weight:bold;" class="nav-link" id="vert-tabs-ecommerce-tab" data-toggle="pill" href="#vert-tabs-ecommerce" role="tab" aria-controls="vert-tabs-ecommerce" aria-selected="false">
                                    <i class="fa fa-shopping-cart"></i> Ecommerce
                                </a>
                                <a style="color:#7a777e;font-weight:bold;" class="nav-link" id="vert-tabs-page-tab" data-toggle="pill" href="#vert-tabs-page" role="tab" aria-controls="vert-tabs-page" aria-selected="false">
                                    <i class="fa fa-book"></i> Page
                                </a>
                                <a style="color:#7a777e;font-weight:bold;" class="nav-link" id="vert-tabs-cookie-tab" data-toggle="pill" href="#vert-tabs-cookie" role="tab" aria-controls="vert-tabs-cookie" aria-selected="false">
                                    <i class="fas fa-cookie-bite"></i> Cookie Consent
                                </a>
                                <a style="color:#7a777e;font-weight:bold;" class="nav-link" id="vert-tabs-policy-tab" data-toggle="pill" href="#vert-tabs-policy" role="tab" aria-controls="vert-tabs-policy" aria-selected="false">
                                    <i class="fas fa-file-contract"></i> Policy
                                </a>
                            </div>
                        </div>

                        <div class="col-7 col-sm-9">
                            <div class="tab-content" id="vert-tabs-tabContent">
                                <div class="tab-pane text-left fade show active" id="vert-tabs-exclusive" role="tabpanel" aria-labelledby="vert-tabs-exclusive-tab">
                                    <div class="container">
                                        <form action="{{route('dashboard.setting.home.exclusive.update')}}" method="post">
                                            @csrf
                                            <div class="form-group">
                                                <label for="home_exclusive_section_title">Exclusive Section Title:</label>
                                                <input type="text" class="form-control" id="home_exclusive_section_title" placeholder="Exclusive Title" value="{{ $SettingKey['home_exclusive_section_title'] }}" name="home_exclusive_section_title">
                                            </div>
                                            <div class="form-group">
                                                <label for="home_exclusive_section_side_banner">Side Banner:</label><br>
                                                <img src="{{asset('')}}{{ $SettingKey['home_exclusive_section_side_banner'] }}" id="home_exclusive_section_side_bannerpreview" style="width: 150px; height: 150px; border: 2px solid rgb(23, 162, 184) !important;">
                                                <input type="hidden" name="home_exclusive_section_side_banner" id="home_exclusive_section_side_banner" value="{{ $SettingKey['home_exclusive_section_side_banner'] }}" class="image-data"><br> 
                                                <a href="#" data-value="home_exclusive_section_side_banner" data-toggle="modal" data-target="#SingleImageMedia" class="addImage">Choose image</a>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Save Changes</button>
                                        </form>
                                    </div>
                                </div>


                                <div class="tab-pane fade" id="vert-tabs-3column-bannder-first" role="tabpanel" aria-labelledby="vert-tabs-3column-bannder-first-tab">
                                    <div class="container">
                                        <form action="{{route('dashboard.setting.home.threecolumnfirstbanner.update')}}" method="post">
                                            @csrf
                                            <!-- Home  Page Banner 1 -->
                                            <div class="form-group">
                                                <label for="home_page_first_banner_image1">First Image:</label><br>
                                                <img src="{{asset('')}}{{ $SettingKey['home_page_first_banner_image1'] }}" id="home_page_first_banner_image1preview" style="width: 150px; height: 150px; border: 2px solid rgb(23, 162, 184) !important;">
                                                <input type="hidden" name="home_page_first_banner_image1" id="home_page_first_banner_image1" value="{{ $SettingKey['home_page_first_banner_image1'] }}" class="image-data"><br> 
                                                <a href="#" data-value="home_page_first_banner_image1" data-toggle="modal" data-target="#SingleImageMedia" class="addImage">Choose image</a>
                                                <br>
                                                <span class="mt-1">Image Size Should Be 540 x 300.</span>
                                            </div>

                                        
                                            <div class="form-group">
                                                <label for="home_page_first_banner_title1">Title 1:</label>
                                                <input type="text" class="form-control" id="home_page_first_banner_title1" placeholder="Title 1" value="{{ $SettingKey['home_page_first_banner_title1'] }}" name="home_page_first_banner_title1">
                                            </div>

                                            <div class="form-group">
                                                <label for="home_page_first_banner_subtitle1">Sub Title 1:</label>
                                                <input type="text" class="form-control" id="home_page_first_banner_subtitle1" placeholder="Title 2" value="{{ $SettingKey['home_page_first_banner_subtitle1'] }}" name="home_page_first_banner_subtitle1">
                                            </div>

                                            
                                            <div class="form-group">
                                                <label for="home_page_first_banner_url1">Url 1:</label>
                                                <input type="text" class="form-control" id="home_page_first_banner_url1" placeholder="Title 2" value="{{ $SettingKey['home_page_first_banner_url1'] }}" name="home_page_first_banner_url1">
                                            </div>
                                            

                                            <!-- Home  Page Banner 2 -->
                                            <div class="form-group">
                                                <label for="home_page_first_banner_image2">Second Image:</label><br>
                                                <img src="{{asset('')}}{{ $SettingKey['home_page_first_banner_image2'] }}" id="home_page_first_banner_image2preview" style="width: 150px; height: 150px; border: 2px solid rgb(23, 162, 184) !important;">
                                                <input type="hidden" name="home_page_first_banner_image2" id="home_page_first_banner_image2" value="{{ $SettingKey['home_page_first_banner_image2'] }}" class="image-data"><br> 
                                                <a href="#" data-value="home_page_first_banner_image2" data-toggle="modal" data-target="#SingleImageMedia" class="addImage">Choose image</a>
                                                <br>
                                                <span class="mt-1">Image Size Should Be 540 x 300.</span>
                                            </div>

                                            <div class="form-group">
                                                <label for="home_page_first_banner_title2">Title 2:</label>
                                                <input type="text" class="form-control" id="home_page_first_banner_title2" placeholder="Title 1" value="{{ $SettingKey['home_page_first_banner_title2'] }}" name="home_page_first_banner_title2">
                                            </div>

                                            <div class="form-group">
                                                <label for="home_page_first_banner_subtitle2">Sub Title 2:</label>
                                                <input type="text" class="form-control" id="home_page_first_banner_subtitle2" placeholder="Title 2" value="{{ $SettingKey['home_page_first_banner_subtitle2'] }}" name="home_page_first_banner_subtitle2">
                                            </div>

                                            
                                            <div class="form-group">
                                                <label for="home_page_first_banner_url2">Url 2:</label>
                                                <input type="text" class="form-control" id="home_page_first_banner_url2" placeholder="Title 2" value="{{ $SettingKey['home_page_first_banner_url2'] }}" name="home_page_first_banner_url2">
                                            </div>


                                            <!-- Home  Page Banner 3 -->
                                            <div class="form-group">
                                                <label for="home_page_first_banner_image3">Third Image:</label><br>
                                                <img src="{{asset('')}}{{ $SettingKey['home_page_first_banner_image3'] }}" id="home_page_first_banner_image3preview" style="width: 150px; height: 150px; border: 2px solid rgb(23, 162, 184) !important;">
                                                <input type="hidden" name="home_page_first_banner_image3" id="home_page_first_banner_image3" value="{{ $SettingKey['home_page_first_banner_image3'] }}" class="image-data"><br> 
                                                <a href="#" data-value="home_page_first_banner_image3" data-toggle="modal" data-target="#SingleImageMedia" class="addImage">Choose image</a>
                                                <br>
                                                <span class="mt-1">Image Size Should Be 540 x 300.</span>
                                            </div>

                                            <div class="form-group">
                                                <label for="home_page_first_banner_title3">Title 3:</label>
                                                <input type="text" class="form-control" id="home_page_first_banner_title3" placeholder="Title 1" value="{{ $SettingKey['home_page_first_banner_title3'] }}" name="home_page_first_banner_title3">
                                            </div>

                                            <div class="form-group">
                                                <label for="home_page_first_banner_subtitle3">Sub Title 2:</label>
                                                <input type="text" class="form-control" id="home_page_first_banner_subtitle3" placeholder="Title 2" value="{{ $SettingKey['home_page_first_banner_subtitle3'] }}" name="home_page_first_banner_subtitle3">
                                            </div>

                                            <div class="form-group">
                                                <label for="home_page_first_banner_url3">Url 3:</label>
                                                <input type="text" class="form-control" id="home_page_first_banner_url3" placeholder="Title 2" value="{{ $SettingKey['home_page_first_banner_url3'] }}" name="home_page_first_banner_url3">
                                            </div>
                                            <button type="submit" class="btn btn-primary">Save Changes</button>
                                        </form>
                                    </div>
                                </div>


                                <div class="tab-pane fade" id="vert-tabs-social" role="tabpanel" aria-labelledby="vert-tabs-social-tab">
                                    <div class="container">
                                        <form action="{{route('dashboard.setting.social.update')}}" method="post">
                                            @csrf
                                            <div class="form-group">
                                                <label for="theme_thigo_facebook">Facebook:</label>
                                                <input type="text" class="form-control" id="theme_thigo_facebook" value="{{ $SettingKey['theme_thigo_facebook'] }}"  name="theme_thigo_facebook">
                                            </div>
                                            <div class="form-group">
                                                <label for="theme_thigo_twitter">Twitter:</label>
                                                <input type="text" class="form-control" id="theme_thigo_twitter" value="{{ $SettingKey['theme_thigo_twitter'] }}" name="theme_thigo_twitter">
                                            </div>
                                            <div class="form-group">
                                                <label for="theme_thigo_youtube">Youtube:</label>
                                                <input type="text" class="form-control" id="theme_thigo_youtube" value="{{ $SettingKey['theme_thigo_youtube'] }}" name="theme_thigo_youtube">
                                            </div>
                                            <div class="form-group">
                                                <label for="theme_thigo_instagram">Instagram:</label>
                                                <input type="text" class="form-control" id="theme_thigo_instagram" value="{{ $SettingKey['theme_thigo_instagram'] }}" name="theme_thigo_instagram">
                                            </div>
                                            <div class="form-group">
                                                <label for="theme_thigo_linkedin">Linkedin:</label>
                                                <input type="text" class="form-control" id="theme_thigo_linkedin" value="{{ $SettingKey['theme_thigo_linkedin'] }}" name="theme_thigo_linkedin">
                                            </div>
                                            <button type="submit" class="btn btn-primary">Save Changes</button>
                                        </form>
                                    </div>
                                </div>


                                <div class="tab-pane fade" id="vert-tabs-header" role="tabpanel" aria-labelledby="vert-tabs-header-tab">
                                    <div class="container">
                                        <form action="{{route('dashboard.setting.header.update')}}" method="post">
                                            @csrf
                                            <div class="form-group">
                                                <label for="theme_thigo_enable_sticky_header">Enable sticky header?</label>
                                                <select class="form-control" id="theme_thigo_enable_sticky_header" name="theme_thigo_enable_sticky_header">
                                                    <option value="0"  @if($SettingKey['theme_thigo_enable_sticky_header'] == 0) selected @endif >No</option>
                                                    <option value="1"  @if($SettingKey['theme_thigo_enable_sticky_header'] == 1) selected @endif >YES</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="theme_thigo_collapsing_product_categories_on_homepage">Collapsing product categories on homepage?</label>
                                                <select class="form-control" id="theme_thigo_collapsing_product_categories_on_homepage" name="theme_thigo_collapsing_product_categories_on_homepage">
                                                    <option value="0"  @if($SettingKey['theme_thigo_collapsing_product_categories_on_homepage'] == 0) selected @endif >No</option>
                                                    <option value="1"  @if($SettingKey['theme_thigo_collapsing_product_categories_on_homepage'] == 1) selected @endif >YES</option>
                                                </select>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Save Changes</button>
                                        </form>
                                    </div>
                                </div>


                                <div class="tab-pane fade" id="vert-tabs-facebook" role="tabpanel" aria-labelledby="vert-tabs-facebook-tab">
                                    <div class="container">
                                        <form action="{{route('dashboard.setting.facebook.update')}}" method="post">
                                            @csrf
                                            <div class="form-group">
                                                <label for="theme_thigo_facebook_chat_enabled">Enable Facebook chat?</label>
                                                <select class="form-control" id="theme_thigo_facebook_chat_enabled" name="theme_thigo_facebook_chat_enabled">
                                                    <option value="0"  @if($SettingKey['theme_thigo_facebook_chat_enabled'] == 0) selected @endif >No</option>
                                                    <option value="1"  @if($SettingKey['theme_thigo_facebook_chat_enabled'] == 1) selected @endif >YES</option>
                                                </select>
                                                <span style="background-color: #d9edf7;border: 1px solid #bce8f1;cursor: help;" class="help-block">To show chat box on that website, please go to 
                                                    <a href="https://www.facebook.com//settings/?tab=messenger_platform">https://www.facebook.com//settings/?tab=messenger_platform</a>
                                                    and add <a href="{{asset('')}}">{{asset('')}}</a> to whitelist domains!
                                                </span>
                                            </div>
                                            <div class="form-group">
                                                <label for="theme_thigo_facebook_page_id">Facebook page ID:</label>
                                                <input type="text" class="form-control" id="theme_thigo_facebook_page_id" value="{{ $SettingKey['theme_thigo_facebook_page_id'] }}" name="theme_thigo_facebook_page_id">
                                                <span style="background-color: #d9edf7;border: 1px solid #bce8f1;cursor: help;" class="help-block">
                                                    You can get fan page ID using this site <a href="https://findmyfbid.com">https://findmyfbid.com</a>
                                                </span>
                                            </div>
                                            <div class="form-group">
                                                <label for="theme_thigo_facebook_comment_enabled_in_post">Enable Facebook comment in post detail page?</label>
                                                <select class="form-control" id="theme_thigo_facebook_comment_enabled_in_post" name="theme_thigo_facebook_comment_enabled_in_post">
                                                    <option value="0"  @if($SettingKey['theme_thigo_facebook_comment_enabled_in_post'] == 0) selected @endif >No</option>
                                                    <option value="1"  @if($SettingKey['theme_thigo_facebook_comment_enabled_in_post'] == 1) selected @endif >YES</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="theme_thigo_facebook_app_id">Facebook App ID:</label>
                                                <input type="text" class="form-control" id="theme_thigo_facebook_app_id" value="{{ $SettingKey['theme_thigo_facebook_app_id'] }}" name="theme_thigo_facebook_app_id">
                                                <span style="background-color: #d9edf7;border: 1px solid #bce8f1;cursor: help;" class="help-block">
                                                    You can create your app in <a href="https://developers.facebook.com/apps">https://developers.facebook.com/apps</a>
                                                </span>
                                            </div>
                                            <div class="form-group">
                                                <label for="theme_thigo_facebook_admin">Facebook Admin ID:</label>
                                                <input type="text" class="form-control" id="theme_thigo_facebook_admin" value="{{ $SettingKey['theme_thigo_facebook_admin'] }}" name="theme_thigo_facebook_admin">
                                            </div>
                                            <button type="submit" class="btn btn-primary">Save Changes</button>
                                        </form>
                                    </div>
                                </div>


                                <div class="tab-pane fade" id="vert-tabs-blog" role="tabpanel" aria-labelledby="vert-tabs-blog-tab">
                                    <div class="container">
                                        <form action="{{route('dashboard.setting.blog.update')}}" method="post">
                                            @csrf
                                            <div class="form-group">
                                                <label for="theme_thigo_blog_page_id">Blog page</label>
                                                <select class="form-control" id="theme_thigo_blog_page_id" name="theme_thigo_blog_page_id">
                                                    <option value=""  @if($SettingKey['theme_thigo_blog_page_id'] == '') selected @endif >No</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="theme_thigo_number_of_blog_posts_in_a_category">Number of posts per page in a category:</label>
                                                <input type="text" class="form-control" id="theme_thigo_number_of_blog_posts_in_a_category" value="{{ $SettingKey['theme_thigo_number_of_blog_posts_in_a_category'] }}" name="theme_thigo_number_of_blog_posts_in_a_category">
                                            </div>
                                            <div class="form-group">
                                                <label for="theme_thigo_number_of_blog_posts_in_a_tag">Number of posts per page in a tag:</label>
                                                <input type="text" class="form-control" id="theme_thigo_number_of_blog_posts_in_a_tag" value="{{ $SettingKey['theme_thigo_number_of_blog_posts_in_a_tag'] }}" name="theme_thigo_number_of_blog_posts_in_a_tag">
                                            </div>
                                            <button type="submit" class="btn btn-primary">Save Changes</button>
                                        </form>
                                    </div>
                                </div>


                                <div class="tab-pane fade" id="vert-tabs-ecommerce" role="tabpanel" aria-labelledby="vert-tabs-ecommerce-tab">
                                    <div class="container">
                                        <form action="{{route('dashboard.setting.ecommerce.update')}}" method="post">
                                            @csrf
                                            <div class="form-group">
                                                <label for="theme_thigo_payment_methods_image">Accepted Payment methods:</label><br>
                                                <img src="{{asset('')}}{{ $SettingKey['theme_thigo_payment_methods_image'] }}" id="theme_thigo_payment_methods_imagepreview" style="width: 150px; height: 150px; border: 2px solid rgb(23, 162, 184) !important;">
                                                <input type="hidden" name="theme_thigo_payment_methods_image" id="theme_thigo_payment_methods_image" value="{{ $SettingKey['theme_thigo_payment_methods_image'] }}" class="image-data"><br> 
                                                <a href="#" data-value="theme_thigo_payment_methods_image" data-toggle="modal" data-target="#SingleImageMedia" class="addImage">Choose image</a>
                                            </div>
                                            <div class="form-group">
                                                <label for="theme_thigo_number_of_products_per_page">Number of products per page:</label>
                                                <input type="text" class="form-control" id="theme_thigo_number_of_products_per_page" value="{{ $SettingKey['theme_thigo_number_of_products_per_page'] }}" name="theme_thigo_number_of_products_per_page">
                                            </div>
                                            <div class="form-group">
                                                <label for="theme_thigo_number_of_cross_sale_product_product_detail_page">Number of cross sale products in product detail page:</label>
                                                <input type="text" class="form-control" id="theme_thigo_number_of_cross_sale_product_product_detail_page" value="{{ $SettingKey['theme_thigo_number_of_cross_sale_product_product_detail_page'] }}" name="theme_thigo_number_of_cross_sale_product_product_detail_page">
                                            </div>
                                            <div class="form-group">
                                                <label for="theme_thigo_max_filter_price">Maximum price to filter:</label>
                                                <input type="text" class="form-control" id="theme_thigo_max_filter_price" value="{{ $SettingKey['theme_thigo_max_filter_price'] }}" name="theme_thigo_max_filter_price">
                                            </div>
                                            <div class="form-group">
                                                <label for="theme_thigo_logo_in_the_checkout_page_image">Logo in the checkout page (Default is the main logo):</label><br>
                                                <img src="{{asset('')}}{{ $SettingKey['theme_thigo_logo_in_the_checkout_page_image'] }}" id="theme_thigo_logo_in_the_checkout_page_imagepreview" style="width: 150px; height: 150px; border: 2px solid rgb(23, 162, 184) !important;">
                                                <input type="hidden" name="theme_thigo_logo_in_the_checkout_page_image" id="theme_thigo_logo_in_the_checkout_page_image" value="{{ $SettingKey['theme_thigo_logo_in_the_checkout_page_image'] }}" class="image-data"><br> 
                                                <a href="#" data-value="theme_thigo_logo_in_the_checkout_page_image" data-toggle="modal" data-target="#SingleImageMedia" class="addImage">Choose image</a>
                                            </div>
                                            <div class="form-group">
                                                <label for="theme_thigo_logo_in_invoices_image">Logo in invoices (Default is the main logo):</label><br>
                                                <img src="{{asset('')}}{{ $SettingKey['theme_thigo_logo_in_invoices_image'] }}" id="theme_thigo_logo_in_invoices_imagepreview" style="width: 150px; height: 150px; border: 2px solid rgb(23, 162, 184) !important;">
                                                <input type="hidden" name="theme_thigo_logo_in_invoices_image" id="theme_thigo_logo_in_invoices_image" value="{{ $SettingKey['theme_thigo_logo_in_invoices_image'] }}" class="image-data"><br> 
                                                <a href="#" data-value="theme_thigo_logo_in_invoices_image" data-toggle="modal" data-target="#SingleImageMedia" class="addImage">Choose image</a>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Save Changes</button>
                                        </form>
                                    </div>
                                </div>


                                <div class="tab-pane fade" id="vert-tabs-page" role="tabpanel" aria-labelledby="vert-tabs-page-tab">
                                    <div class="container">
                                        <form action="{{route('dashboard.setting.homepage.update')}}" method="post">
                                            @csrf
                                            <div class="form-group">
                                                <label for="theme_thigo_homepage_id">Your homepage displays</label>
                                                <select class="form-control" id="theme_thigo_homepage_id" name="theme_thigo_homepage_id">
                                                    <option value=""  @if($SettingKey['theme_thigo_homepage_id'] == '') selected @endif >No</option>
                                                </select>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Save Changes</button>
                                        </form>
                                    </div>
                                </div>


                                <div class="tab-pane fade" id="vert-tabs-cookie" role="tabpanel" aria-labelledby="vert-tabs-cookie-tab">
                                    <div class="container">
                                        <form action="{{route('dashboard.setting.cookie.update')}}" method="post">
                                            @csrf
                                            <div class="form-group">
                                                <label for="theme_thigo_cookie_consent_enable">Enable cookie consent?</label>
                                                <select class="form-control" id="theme_thigo_cookie_consent_enable" name="theme_thigo_cookie_consent_enable">
                                                    <option value="0"  @if($SettingKey['theme_thigo_cookie_consent_enable'] == '') selected @endif >NO</option>
                                                    <option value="1"  @if($SettingKey['theme_thigo_cookie_consent_enable'] == '') selected @endif >YES</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="theme_thigo_cookie_consent_message">Message:</label>
                                                <input type="text" class="form-control" id="theme_thigo_cookie_consent_message" value="{{ $SettingKey['theme_thigo_cookie_consent_message'] }}" name="theme_thigo_cookie_consent_message">
                                            </div>
                                            <div class="form-group">
                                                <label for="theme_thigo_cookie_consent_button_text">Button text:</label>
                                                <input type="text" class="form-control" id="theme_thigo_cookie_consent_button_text" value="{{ $SettingKey['theme_thigo_cookie_consent_button_text'] }}" name="theme_thigo_cookie_consent_button_text">
                                            </div>
                                            <div class="form-group">
                                                <label for="theme_thigo_cookie_consent_learn_more_url">Learn more URL:</label>
                                                <input type="text" class="form-control" id="theme_thigo_cookie_consent_learn_more_url" value="{{ $SettingKey['theme_thigo_cookie_consent_learn_more_url'] }}" name="theme_thigo_cookie_consent_learn_more_url">
                                            </div>
                                            <div class="form-group">
                                                <label for="theme_thigo_cookie_consent_learn_more_text">Learn more text</label>
                                                <input type="text" class="form-control" id="theme_thigo_cookie_consent_learn_more_text" value="{{ $SettingKey['theme_thigo_cookie_consent_learn_more_text'] }}" name="theme_thigo_cookie_consent_learn_more_text">
                                            </div>
                                            <div class="form-group">
                                                <label for="theme_thigo_cookie_consent_background_color">Background color</label>
                                                <input type="text" class="form-control" id="theme_thigo_cookie_consent_background_color" value="{{ $SettingKey['theme_thigo_cookie_consent_background_color'] }}" name="theme_thigo_cookie_consent_background_color">
                                            </div>
                                            <div class="form-group">
                                                <label for="theme_thigo_cookie_consent_text_color">Text Color</label>
                                                <input type="text" class="form-control" id="theme_thigo_cookie_consent_text_color" value="{{ $SettingKey['theme_thigo_cookie_consent_text_color'] }}" name="theme_thigo_cookie_consent_text_color">
                                            </div>
                                            <div class="form-group">
                                                <label for="theme_thigo_cookie_consent_max_width">Max width (px)</label>
                                                <input type="text" class="form-control" id="theme_thigo_cookie_consent_max_width" value="{{ $SettingKey['theme_thigo_cookie_consent_max_width'] }}" name="theme_thigo_cookie_consent_max_width">
                                            </div>
                                            <button type="submit" class="btn btn-primary">Save Changes</button>
                                        </form>
                                    </div>
                                </div>


                                <div class="tab-pane fade" id="vert-tabs-policy" role="tabpanel" aria-labelledby="vert-tabs-policy-tab">
                                    <div class="container">
                                        <form action="{{route('dashboard.setting.policy.update')}}" method="post">
                                            @csrf
                                            <div class="form-group">
                                                <label for="terms_and_condition">Terms And Condition:</label>
                                                <textarea class="form-control summernote-editor" rows="6" id="terms_and_condition" name="terms_and_condition">{{ $SettingKey['terms_and_condition'] }}</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="refund_and_return_policy">Refund Return Policy:</label>
                                                <textarea class="form-control summernote-editor" rows="6" id="refund_and_return_policy" name="refund_and_return_policy">{{ $SettingKey['refund_and_return_policy'] }}</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="privacy_policy">Privacy Policy:</label>
                                                <textarea class="form-control summernote-editor" rows="6" id="privacy_policy" name="privacy_policy">{{ $SettingKey['privacy_policy'] }}</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="online_delivery">Online Delivery Policy:</label>
                                                <textarea class="form-control summernote-editor" rows="6" id="online_delivery" name="online_delivery">{{ $SettingKey['online_delivery'] }}</textarea>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Save Changes</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection()



@section('footer')
	@include('backend.footer')
@endsection()

@section('customjs')
<script>
    var action = 'ADD'
    var DataID = null;
    var baseurl = window.location.origin+'/';

    $(document).on("click", "#imagepush", function (e) {
        var imageurl = $('#mediaurl').val();
        $('#'+DataID+'preview').attr('src',baseurl+imageurl);
        $('#'+DataID).val(imageurl);
    });

    $(document).on("click", ".addImage", function (e) {
        var datavalue = $(this).attr('data-value');
        DataID = datavalue;
    });

    $(document).ready(function(){
        $('.summernote-editor').summernote()
    })
</script>
@endsection()