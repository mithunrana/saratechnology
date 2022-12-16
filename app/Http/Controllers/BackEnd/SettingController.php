<?php
namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;

class SettingController extends Controller
{
public function autoGenerate(){

        $Keys = array(
            "activated_plugins"=>"",
            "permalink-thigo-blog-models-post"=>"blog",
            "permalink-thigo-blog-models-category"=>"category",
            "permalink-thigo-blog-models-tags"=>"tags",

            "payment_cod_status"=>"1",
            "payment_cod_description"=>"Please pay money directly to the postman, if you choose cash on delivery method (COD).",
            "payment_bank_transfer_status"=>"1",
            "payment_bank_transfer_description"=>"Please send money to our bank account: ACB - 1990 404 19.",
            "plugins_ecommerce_customer_new_order_status"=>"0",
            "plugins_ecommerce_admin_new_order_status"=>"0",
            "ecommerce_store_name"=>"thigo",
            "ecommerce_store_phone"=>"23-456-7890",
            "ecommerce_store_address"=>"123 Street, Old Trafford",
            "ecommerce_store_country"=>"1",
            "theme"=>"thigo",
            "social_login_enable"=>"1",
            "social_login_facebook_enable"=>"1",
            "social_login_facebook_app_id"=>"1752152358341085",
            "social_login_facebook_app_secret"=>"bc1qre8jdw2azrg6tf49wmp652w00xltddxmpk98xp",
            "social_login_google_enable"=>"1",
            "social_login_github_enable"=>"1",
            "social_login_linkedin_enable"=>"1",


            "theme-thigo-newsletter_image"=>"eneral/newsletter.jpg",
            "theme-thigo-seo_og_image"=>"43",


            //Theme General information
            "theme_thigo_site_title"=>"thigo - Laravel Ecommerce system",
            "theme_thigo_show_site_name"=>"",
            "theme_thigo_copyright"=>"© 2021 THIGO. All Rights Reserved.",
            "theme_thigo_seo_title"=>"",
            "theme_thigo_seo_description"=>"",
            "theme_thigo_preloader_enabled"=>"0",
            "theme_thigo_hotline"=>"123-456-7890",
            "theme_thigo_address"=>"123 Street, Old Trafford, NewYork, USA",
            "theme_thigo_email"=>"info@sitename.com",
            "theme_thigo_about_us"=>"",
            "theme_thigo_primary_font"=>"Poppins",
            "theme_thigo_primary_color"=>"#FF324D",
            "theme_thigo_secondary_color"=>"#1D2224",
            "theme_thigo_enable_newsletter_popup"=>"1",
            "theme_thigo_newsletter_show_after_seconds"=>"10",
            "theme_thigo_facebook_comment_enabled_in_product"=>"1",
            "theme_thigo_opening_our_content"=>"",


            //Theme Logo information
            "theme_thigo_favicon"=>"demo-image.png",
            "theme_thigo_logo"=>"demo-image.png",
            "theme_thigo_logo_footer"=>"demo-image.png",
            

            //Theme Social information
            "theme_thigo_facebook"=>"https://facebook.com",
            "theme_thigo_twitter"=>"https://twitter.com/",
            "theme_thigo_youtube"=>"https://youtube.com/",
            "theme_thigo_instagram"=>"https://instagram.com/",
            "theme_thigo_linkedin"=>"https://linkedin.com/",


            //Theme header information
            "theme_thigo_enable_sticky_header"=>"1",
            "theme_thigo_collapsing_product_categories_on_homepage"=>"1",


            //Theme Facebook Integration  information
            "theme_thigo_facebook_chat_enabled"=>"0",
            "theme_thigo_facebook_page_id"=>"",
            "theme_thigo_facebook_comment_enabled_in_post"=>"0",
            "theme_thigo_facebook_app_id"=>"",
            "theme_thigo_facebook_admin"=>"",


            //Theme custom js information
            "custom_body_js"=>"",
            "header_js"=>"",
            "footer_js"=>"",


            //Theme custom css information
            "custom_css"=>"",


            //Theme Blog information
            "theme_thigo_blog_page_id"=>"",
            "theme_thigo_number_of_blog_posts_in_a_category"=>"12",
            "theme_thigo_number_of_blog_posts_in_a_tag"=>"12",
            "blog_side_banner_image"=>"demo-image.png",
            "blog_side_banner_title"=>"SALE 30% OFF",
            "blog_side_banner_subtitle"=>"NEW COLLECTION",
            "blog_side_banner_buttontext"=>"Shop Now",
            "blog_side_banner_url"=>"www.thigo.org",
            "blog_page_meta_keyword"=>"meta keyword",
            "blog_page_meta_description"=>"meta description",
            "blog_page_title"=>"Blog Page Title",


            
            
            //Theme Ecommerce information
            "theme_thigo_payment_methods_image"=>"demo-image.png",
            "theme_thigo_logo_in_invoices_image"=>"demo-image.png",
            "theme_thigo_logo_in_the_checkout_page_image"=>"demo-image.png",
            "theme_thigo_number_of_products_per_page"=>"12",
            "theme_thigo_max_filter_price"=>"100000",
            "theme_thigo_number_of_cross_sale_product_product_detail_page" => "",


            //Theme Home Page information
            "theme_thigo_homepage_id"=>"",
            
            
            //Theme cookie information
            "theme_thigo_cookie_consent_enable"=>"1",
            "theme_thigo_cookie_consent_message"=>"Your experience on this site will be improved by allowing cookies",
            "theme_thigo_cookie_consent_button_text"=>"Allow cookies",
            "theme_thigo_cookie_consent_learn_more_url"=>"http://thigo.local/cookie-policy",
            "theme_thigo_cookie_consent_learn_more_text"=>"Cookie Policy",
            "theme_thigo_cookie_consent_background_color"=>"#000000",
            "theme_thigo_cookie_consent_text_color"=>"#FFFFFF",
            "theme_thigo_cookie_consent_max_width"=>"#1170",

            
            //Theme cookie information
            "terms_and_condition"=>"",
            "refund_and_return_policy"=>"",
            "privacy_policy"=>"",
            "online_delivery" => "", 


            //Home Page information
            "home_exclusive_section_title"=>"Exclusive Products",
            "home_exclusive_section_side_banner"=>"demo-image.png",


            //Home Page information
            "home_page_first_banner_image1"=>"demo-image.png",
            "home_page_first_banner_title1"=>"Watch",
            "home_page_first_banner_subtitle1"=>"50% OFF",
            "home_page_first_banner_url1"=>"#",

            "home_page_first_banner_image2"=>"demo-image.png",
            "home_page_first_banner_title2"=>"Drone",
            "home_page_first_banner_subtitle2"=>"50% OFF",
            "home_page_first_banner_url2"=>"#",

            "home_page_first_banner_image3"=>"demo-image.png",
            "home_page_first_banner_title3"=>"Phone",
            "home_page_first_banner_subtitle3"=>"50% OFF",
            "home_page_first_banner_url3"=>"#",


            //SEO Manager 
            "og_image_width"=>"600",
            "og_image_height"=>"315",

            
        );

        foreach($Keys as $key => $val) { 
            $FindKey = Setting::where('key',$key)->first();
            if(!$FindKey){
                Setting::create([
                    'key' => $key,
                    'value' => $val
                ]);
            }
        }

        return "Key Generate successfully completed";
    }


    public function settingOption(){
        return view('backend.settings.options');
    }

    public function customJS(){
        return view('backend.settings.customjs');
    }


    public function metaManagerUpdate(){
        Setting::where('key','og_image_width')->update(['value'=>$request->og_image_width]);
        Setting::where('key','og_image_height')->update(['value'=>$request->og_image_height]);
        return redirect()->back()->with('message','Meta Information Successfully Updated');
    }


    public function customJSUpdate(Request $request){
        Setting::where('key','custom_body_js')->update(['value'=>$request->custom_body_js]);
        Setting::where('key','header_js')->update(['value'=>$request->header_js]);
        Setting::where('key','footer_js')->update(['value'=>$request->footer_js]);
        return redirect()->back()->with('message','Custom js succesfully updated');
    }

    public function customCSS(){
        return view('backend.settings.customcss');
    }

    public function customCSSUpdate(Request $request){
        Setting::where('key','custom_css')->update(['value'=>$request->custom_css]);
        return redirect()->back()->with('message','Custom CSS succesfully updated');
    }

    public function generalInformationUpdate(Request $request){
        Setting::where('key','theme_thigo_site_title')->update(['value'=>$request->theme_thigo_site_title]);
        Setting::where('key','theme_thigo_show_site_name')->update(['value'=>$request->theme_thigo_show_site_name]);
        Setting::where('key','theme_thigo_copyright')->update(['value'=>$request->theme_thigo_copyright]);
        Setting::where('key','theme_thigo_seo_title')->update(['value'=>$request->theme_thigo_seo_title]);
        Setting::where('key','theme_thigo_seo_description')->update(['value'=>$request->theme_thigo_seo_description]);
        Setting::where('key','theme_thigo_preloader_enabled')->update(['value'=>$request->theme_thigo_preloader_enabled]);
        Setting::where('key','theme_thigo_hotline')->update(['value'=>$request->theme_thigo_hotline]);
        Setting::where('key','theme_thigo_address')->update(['value'=>$request->theme_thigo_address]);
        Setting::where('key','theme_thigo_email')->update(['value'=>$request->theme_thigo_email]);
        Setting::where('key','theme_thigo_about_us')->update(['value'=>$request->theme_thigo_about_us]);
        Setting::where('key','theme_thigo_primary_font')->update(['value'=>$request->theme_thigo_primary_font]);
        Setting::where('key','theme_thigo_primary_color')->update(['value'=>$request->theme_thigo_primary_color]);
        Setting::where('key','theme_thigo_secondary_color')->update(['value'=>$request->theme_thigo_secondary_color]);
        Setting::where('key','theme_thigo_enable_newsletter_popup')->update(['value'=>$request->theme_thigo_enable_newsletter_popup]);
        Setting::where('key','theme_thigo_newsletter_show_after_seconds')->update(['value'=>$request->theme_thigo_newsletter_show_after_seconds]);
        Setting::where('key','theme_thigo_facebook_comment_enabled_in_product')->update(['value'=>$request->theme_thigo_facebook_comment_enabled_in_product]);
        Setting::where('key','theme_thigo_opening_our_content')->update(['value'=>$request->theme_thigo_opening_our_content]);
        return redirect()->back()->with('message','General Information succesfully updated');
    }

    public function logoInformationUpdate(Request $request){
        Setting::where('key','theme_thigo_favicon')->update(['value'=>$request->theme_thigo_favicon]);
        Setting::where('key','theme_thigo_logo')->update(['value'=>$request->theme_thigo_logo]);
        Setting::where('key','theme_thigo_logo_footer')->update(['value'=>$request->theme_thigo_logo_footer]);
        return redirect()->back()->with('message','Logo Information succesfully updated');
    }

    public function socialInformationUpdate(Request $request){
        Setting::where('key','theme_thigo_facebook')->update(['value'=>$request->theme_thigo_facebook]);
        Setting::where('key','theme_thigo_twitter')->update(['value'=>$request->theme_thigo_twitter]);
        Setting::where('key','theme_thigo_youtube')->update(['value'=>$request->theme_thigo_youtube]);
        Setting::where('key','theme_thigo_instagram')->update(['value'=>$request->theme_thigo_instagram]);
        Setting::where('key','theme_thigo_linkedin')->update(['value'=>$request->theme_thigo_linkedin]);
        return redirect()->back()->with('message','Social Information succesfully updated');
    }

    public function headerlInformationUpdate(Request $request){
        Setting::where('key','theme_thigo_enable_sticky_header')->update(['value'=>$request->theme_thigo_enable_sticky_header]);
        Setting::where('key','theme_thigo_collapsing_product_categories_on_homepage')->update(['value'=>$request->theme_thigo_collapsing_product_categories_on_homepage]);
        return redirect()->back()->with('message','Header Information succesfully updated');
    }

    public function facebookInformationUpdate(Request $request){
        Setting::where('key','theme_thigo_facebook_chat_enabled')->update(['value'=>$request->theme_thigo_facebook_chat_enabled]);
        Setting::where('key','theme_thigo_facebook_page_id')->update(['value'=>$request->theme_thigo_facebook_page_id]);
        Setting::where('key','theme_thigo_facebook_comment_enabled_in_post')->update(['value'=>$request->theme_thigo_facebook_comment_enabled_in_post]);
        Setting::where('key','theme_thigo_facebook_app_id')->update(['value'=>$request->theme_thigo_facebook_app_id]);
        Setting::where('key','theme_thigo_facebook_admin')->update(['value'=>$request->theme_thigo_facebook_admin]);
        return redirect()->back()->with('message','Facebook Information succesfully updated');
    }

    public function blogInformationUpdate(Request $request){
        Setting::where('key','theme_thigo_blog_page_id')->update(['value'=>$request->theme_thigo_blog_page_id]);
        Setting::where('key','theme_thigo_number_of_blog_posts_in_a_category')->update(['value'=>$request->theme_thigo_number_of_blog_posts_in_a_category]);
        Setting::where('key','theme_thigo_number_of_blog_posts_in_a_tag')->update(['value'=>$request->theme_thigo_number_of_blog_posts_in_a_tag]);
        Setting::where('key','blog_side_banner_url')->update(['value'=>$request->blog_side_banner_url]);
        Setting::where('key','blog_side_banner_buttontext')->update(['value'=>$request->blog_side_banner_buttontext]);
        Setting::where('key','blog_side_banner_subtitle')->update(['value'=>$request->blog_side_banner_subtitle]);
        Setting::where('key','blog_side_banner_title')->update(['value'=>$request->blog_side_banner_title]);
        Setting::where('key','blog_side_banner_image')->update(['value'=>$request->blog_side_banner_image]);
        return redirect()->back()->with('message','Facebook Information succesfully updated');
    }


    public function ecommerceInformationUpdate(Request $request){
        Setting::where('key','theme_thigo_payment_methods_image')->update(['value'=>$request->theme_thigo_payment_methods_image]);
        Setting::where('key','theme_thigo_logo_in_invoices_image')->update(['value'=>$request->theme_thigo_logo_in_invoices_image]);
        Setting::where('key','theme_thigo_logo_in_the_checkout_page_image')->update(['value'=>$request->theme_thigo_logo_in_the_checkout_page_image]);
        Setting::where('key','theme_thigo_number_of_products_per_page')->update(['value'=>$request->theme_thigo_number_of_products_per_page]);
        Setting::where('key','theme_thigo_max_filter_price')->update(['value'=>$request->theme_thigo_max_filter_price]);
        Setting::where('key','theme_thigo_number_of_cross_sale_product_product_detail_page')->update(['value'=>$request->theme_thigo_number_of_cross_sale_product_product_detail_page]);
        return redirect()->back()->with('message','Ecommerce Information succesfully updated');
    }


    public function homepageInformationUpdate(Request $request){
        Setting::where('key','theme_thigo_homepage_id')->update(['value'=>$request->theme_thigo_homepage_id]);
        return redirect()->back()->with('message','Home page Information succesfully updated');
    }

    public function cookieInformationUpdate(Request $request){
        Setting::where('key','theme_thigo_cookie_consent_enable')->update(['value'=>$request->theme_thigo_cookie_consent_enable]);
        Setting::where('key','theme_thigo_cookie_consent_message')->update(['value'=>$request->theme_thigo_cookie_consent_message]);
        Setting::where('key','theme_thigo_cookie_consent_button_text')->update(['value'=>$request->theme_thigo_cookie_consent_button_text]);
        Setting::where('key','theme_thigo_cookie_consent_learn_more_url')->update(['value'=>$request->theme_thigo_cookie_consent_learn_more_url]);
        Setting::where('key','theme_thigo_cookie_consent_learn_more_text')->update(['value'=>$request->theme_thigo_cookie_consent_learn_more_text]);
        Setting::where('key','theme_thigo_cookie_consent_background_color')->update(['value'=>$request->theme_thigo_cookie_consent_background_color]);
        Setting::where('key','theme_thigo_cookie_consent_text_color')->update(['value'=>$request->theme_thigo_cookie_consent_text_color]);
        Setting::where('key','theme_thigo_cookie_consent_max_width')->update(['value'=>$request->theme_thigo_cookie_consent_max_width]);
        return redirect()->back()->with('message','Cookies Information succesfully updated');
    }


    public function policyUpdate(Request $request){
        Setting::where('key','terms_and_condition')->update(['value'=>$request->terms_and_condition]);
        Setting::where('key','refund_and_return_policy')->update(['value'=>$request->refund_and_return_policy]);
        Setting::where('key','privacy_policy')->update(['value'=>$request->privacy_policy]);
        Setting::where('key','online_delivery')->update(['value'=>$request->online_delivery]);
        return redirect()->back()->with('message','Policy Information succesfully updated');
    }


    //========================= Home Page Setting ===========================//

    public function homePageSetting(){
        return view('backend.settings.home-option');
    }


    public function homeExclusiveSectionUpdate(Request $request){
        Setting::where('key','home_exclusive_section_title')->update(['value'=>$request->home_exclusive_section_title]);
        Setting::where('key','home_exclusive_section_side_banner')->update(['value'=>$request->home_exclusive_section_side_banner]);
        return redirect()->back()->with('message','Home Exclusive Section Information Update');
    }



    public function home3ColumnFirstBannerUpdate(Request $request){
        Setting::where('key','home_page_first_banner_image1')->update(['value'=>$request->home_page_first_banner_image1]);
        Setting::where('key','home_page_first_banner_title1')->update(['value'=>$request->home_page_first_banner_title1]);
        Setting::where('key','home_page_first_banner_subtitle1')->update(['value'=>$request->home_page_first_banner_subtitle1]);
        Setting::where('key','home_page_first_banner_url1')->update(['value'=>$request->home_page_first_banner_url1]);

        Setting::where('key','home_page_first_banner_image2')->update(['value'=>$request->home_page_first_banner_image2]);
        Setting::where('key','home_page_first_banner_title2')->update(['value'=>$request->home_page_first_banner_title2]);
        Setting::where('key','home_page_first_banner_subtitle2')->update(['value'=>$request->home_page_first_banner_subtitle2]);
        Setting::where('key','home_page_first_banner_url2')->update(['value'=>$request->home_page_first_banner_url2]);

        Setting::where('key','home_page_first_banner_image3')->update(['value'=>$request->home_page_first_banner_image3]);
        Setting::where('key','home_page_first_banner_title3')->update(['value'=>$request->home_page_first_banner_title3]);
        Setting::where('key','home_page_first_banner_subtitle3')->update(['value'=>$request->home_page_first_banner_subtitle3]);
        Setting::where('key','home_page_first_banner_url3')->update(['value'=>$request->home_page_first_banner_url3]);
        return redirect()->back()->with('message','Home Page 3 Column First Banner Update');
    }





}
