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
            <li class="breadcrumb-item active">Theme options</li>
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
                                <a style="color:#7a777e;font-weight:bold;" class="nav-link active" id="vert-tabs-general-tab" data-toggle="pill" href="#vert-tabs-general" role="tab" aria-controls="vert-tabs-general" aria-selected="true">
                                    <i class="fa fa-home"></i> General
                                </a>
                                <a style="color:#7a777e;font-weight:bold;" class="nav-link" id="vert-tabs-logo-tab" data-toggle="pill" href="#vert-tabs-logo" role="tab" aria-controls="vert-tabs-logo" aria-selected="false">
                                    <i class="fa fa-image"></i> Logo
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
                                <div class="tab-pane text-left fade show active" id="vert-tabs-general" role="tabpanel" aria-labelledby="vert-tabs-general-tab">
                                    <div class="container">
                                        <form action="{{route('dashboard.setting.general.update')}}" method="post">
                                            @csrf
                                            <div class="form-group">
                                                <label for="theme_thigo_site_title">Site title:</label>
                                                <input type="text" class="form-control" id="theme_thigo_site_title" placeholder="Enter site title" value="{{ $SettingKey['theme_thigo_site_title'] }}" name="theme_thigo_site_title">
                                            </div>
                                            <div class="form-group">
                                                <label for="theme_thigo_show_site_name">Show site name after page title, separate with "-"?</label>
                                                <select class="form-control" id="theme_thigo_show_site_name" name="theme_thigo_show_site_name">
                                                    <option value="0"  @if($SettingKey['theme_thigo_show_site_name'] == 0) selected @endif >No</option>
                                                    <option value="1"  @if($SettingKey['theme_thigo_show_site_name'] == 1) selected @endif >YES</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="theme_thigo_seo_title">SEO Title:</label>
                                                <input type="text" class="form-control" id="theme_thigo_seo_title"  value="{{ $SettingKey['theme_thigo_seo_title'] }}" name="theme_thigo_seo_title">
                                            </div>
                                            <div class="form-group">
                                                <label for="theme_thigo_seo_description">SEO Description:</label>
                                                <textarea class="form-control" rows="4" id="theme_thigo_seo_description" name="theme_thigo_seo_description">{{ $SettingKey['theme_thigo_seo_description'] }}</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="theme_thigo_copyright">Copyright:</label>
                                                <input type="text" class="form-control" id="theme_thigo_copyright" value="{{ $SettingKey['theme_thigo_copyright'] }}" name="theme_thigo_copyright">
                                                <span class="help-block">Copyright on footer of site</span>
                                            </div>
                                            <div class="form-group">
                                                <label for="theme_thigo_preloader_enabled">Enable Preloader?</label>
                                                <select class="form-control" id="theme_thigo_preloader_enabled" name="theme_thigo_preloader_enabled">
                                                    <option value="0"  @if($SettingKey['theme_thigo_preloader_enabled'] == 0) selected @endif >No</option>
                                                    <option value="1"  @if($SettingKey['theme_thigo_preloader_enabled'] == 1) selected @endif >YES</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="theme_thigo_hotline">Hotline:</label>
                                                <input type="text" class="form-control" id="theme_thigo_hotline" value="{{ $SettingKey['theme_thigo_hotline'] }}" name="theme_thigo_hotline">
                                            </div>
                                            <div class="form-group">
                                                <label for="theme_thigo_address">Address:</label>
                                                <input type="text" class="form-control" id="theme_thigo_address" value="{{ $SettingKey['theme_thigo_address'] }}" name="theme_thigo_address">
                                            </div>
                                            <div class="form-group">
                                                <label for="theme_thigo_email">Email:</label>
                                                <input type="text" class="form-control" id="theme_thigo_email" value="{{ $SettingKey['theme_thigo_email'] }}" name="theme_thigo_email">
                                            </div>
                                            <div class="form-group">
                                                <label for="theme_thigo_about_us">About us:</label>
                                                <textarea class="form-control" rows="4" id="theme_thigo_about_us" name="theme_thigo_about_us">{{ $SettingKey['theme_thigo_about_us'] }}</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="theme_thigo_opening_our_content">Opening Our Content:</label>
                                                <textarea class="form-control" rows="4" id="theme_thigo_opening_our_content" name="theme_thigo_opening_our_content">{{ $SettingKey['theme_thigo_opening_our_content'] }}</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="theme_thigo_primary_font">Primary font</label>
                                                <select class="form-control" id="theme_thigo_primary_font" name="theme_thigo_primary_font">
                                                    <option value="Poppins" @if($SettingKey['theme_thigo_primary_font'] == 'Poppins') selected @endif>Poppins</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="theme_thigo_primary_color">Primary color:</label>
                                                <input type="text" class="form-control" id="theme_thigo_primary_color" value="{{ $SettingKey['theme_thigo_primary_color'] }}" name="theme_thigo_primary_color">
                                            </div>
                                            <div class="form-group">
                                                <label for="theme_thigo_secondary_color">Secondary color:</label>
                                                <input type="text" class="form-control" id="theme_thigo_secondary_color" value="{{ $SettingKey['theme_thigo_secondary_color'] }}" name="theme_thigo_secondary_color">
                                            </div>
                                            <div class="form-group">
                                                <label for="theme_thigo_enable_newsletter_popup">Enable Newsletter popup?</label>
                                                <select class="form-control" id="theme_thigo_enable_newsletter_popup" name="theme_thigo_enable_newsletter_popup">
                                                    <option value="0"  @if($SettingKey['theme_thigo_enable_newsletter_popup'] == 0) selected @endif >No</option>
                                                    <option value="1"  @if($SettingKey['theme_thigo_enable_newsletter_popup'] == 1) selected @endif >YES</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="theme_thigo_newsletter_show_after_seconds">Newsletter popup delay time (seconds):</label>
                                                <input type="text" class="form-control" id="theme_thigo_newsletter_show_after_seconds" value="{{ $SettingKey['theme_thigo_newsletter_show_after_seconds'] }}"  name="theme_thigo_newsletter_show_after_seconds">
                                            </div>
                                            <div class="form-group">
                                                <label for="theme_thigo_facebook_comment_enabled_in_product">Enable Facebook comment in product detail page?</label>
                                                <select class="form-control" id="theme_thigo_facebook_comment_enabled_in_product" name="theme_thigo_facebook_comment_enabled_in_product">
                                                    <option value="0"  @if($SettingKey['theme_thigo_facebook_comment_enabled_in_product'] == 0) selected @endif >No</option>
                                                    <option value="1"  @if($SettingKey['theme_thigo_facebook_comment_enabled_in_product'] == 1) selected @endif >YES</option>
                                                </select>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Save Changes</button>
                                        </form>
                                    </div>
                                </div>


                                <div class="tab-pane fade" id="vert-tabs-logo" role="tabpanel" aria-labelledby="vert-tabs-logo-tab">
                                    <div class="container">
                                        <form action="{{route('dashboard.setting.logo.update')}}" method="post">
                                            @csrf
                                            <div class="form-group">
                                                <label for="theme_thigo_favicon">Favicon:</label><br>
                                                <img src="{{asset('')}}{{ $SettingKey['theme_thigo_favicon'] }}" id="theme_thigo_faviconpreview" style="width: 150px; height: 150px; border: 2px solid rgb(23, 162, 184) !important;">
                                                <input type="hidden" name="theme_thigo_favicon" id="theme_thigo_favicon" value="{{ $SettingKey['theme_thigo_favicon'] }}" class="image-data"><br> 
                                                <a href="#" data-value="theme_thigo_favicon" data-toggle="modal" data-target="#SingleImageMedia" class="addImage">Choose image</a>
                                            </div>
                                            <div class="form-group">
                                                <label for="theme_thigo_logo">Logo:</label><br>
                                                <img src="{{asset('')}}{{ $SettingKey['theme_thigo_logo'] }}" id="theme_thigo_logopreview" style="width: 150px; height: 150px; border: 2px solid rgb(23, 162, 184) !important;">
                                                <input type="hidden" name="theme_thigo_logo" id="theme_thigo_logo" value="{{ $SettingKey['theme_thigo_logo'] }}" class="image-data"><br> 
                                                <a href="#" data-value="theme_thigo_logo" data-toggle="modal" data-target="#SingleImageMedia" class="addImage">Choose image</a>
                                            </div>
                                            <div class="form-group">
                                                <label for="theme_thigo_logo_footer">Dark Logo:</label><br>
                                                <img src="{{asset('')}}{{ $SettingKey['theme_thigo_logo_footer'] }}" id="theme_thigo_logo_footerpreview" style="width: 150px; height: 150px; border: 2px solid rgb(23, 162, 184) !important;">
                                                <input type="hidden" name="theme_thigo_logo_footer" id="theme_thigo_logo_footer" value="{{ $SettingKey['theme_thigo_logo_footer'] }}" class="image-data"><br> 
                                                <a href="#" data-value="theme_thigo_logo_footer" data-toggle="modal" data-target="#SingleImageMedia" class="addImage">Choose image</a>
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