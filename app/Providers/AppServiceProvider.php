<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\ProductBrand;
use App\Models\ProductCategory;
use App\Models\Products;
use App\Models\Reviews;
use App\Models\ProductLabel;
use App\Models\ProductCollection;
use App\Models\ProductTax;
use App\Models\ProductTag;
use App\Models\ProductAttributeSet;
use App\Models\ProductAttribute;
use App\Models\ProductVariation;
use App\Models\Currency;
use App\Models\ShippingRule;
use App\Models\Widget;
use App\Models\WidgetBar;
use App\Models\Menu;
use App\Models\Menu_Node;
use App\Models\MenuLocation;
use App\Models\WidgetSetWithWidgetBar;
use APP\Models\Slider;
use App\Models\Setting;
use App\Models\BlogCategory;
use App\Models\BlogPost;
use App\Models\BlogTag;
use Session;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        
        $ImageSize = array("150"=>"-150x150", "500"=>"-500x500", "540" => "-540x600");

        config()->set('ImageSize',$ImageSize);
        view()->composer('*', function ($view){

            #Public collection and object
            $ProductCollections = ProductCollection::where('status','published')->get();
            $GetReviews = Reviews::where('status','published')->orderBy('star', 'ASC')->skip(0)->take(10)->get();
            $FeaturedPoducts = Products::where('status','published')->where('is_featured',1)->orderBy('id', 'DESC')->skip(0)->take(4)->get();
            $GetAllProductPublishedAttributeSet = ProductAttributeSet::where('status','published')->orderBy('id', 'DESC')->get();
            $GetAllActiveProduct = Products::where('status','published')->get();
            $PublishDefaultProductCategories = ProductCategory::where('status','published')->whereNull('parent_id')->orderBy('order', 'ASC')->skip(0)->take(10)->get();
            $PublishMoreProductCategories = ProductCategory::where('status','published')->whereNull('parent_id')->orderBy('order', 'ASC')->skip(10)->take(1000)->get();
            $PublishAllProductCategories = ProductCategory::where('status','published')->whereNull('parent_id')->orderBy('order', 'ASC')->get();


            #Unpublish and publish collection and object
            $GetAllProductBrand = ProductBrand::orderBy('id', 'DESC')->get();
            $GetAllProductCategory = ProductCategory::orderBy('id', 'DESC')->get();
            $GetAllProductCollection = ProductCollection::orderBy('id', 'DESC')->get();
            $ProductFeatures = ProductCollection::orderBy('order', 'ASC')->skip(0)->take(3)->get();
            $GetAllProductLabel = ProductLabel::orderBy('id', 'DESC')->get();
            $GetAllProductTaxes  = ProductTax::orderBy('id', 'DESC')->get();
            $GetAllTags = ProductTag::orderBy('id', 'DESC')->get();
            $CurrencyList = Currency::orderBy('id', 'DESC')->get();
            $CurrencyObj = Currency::where('is_default',1)->first();

            $Widgets = Widget::orderBy('id', 'DESC')->get();
            $WidgetBars = WidgetBar::orderBy('id', 'DESC')->get();
            $FooterBarObj = WidgetBar::where('key', 'footer_bar')->first();
            $PrimarySideBarObj = WidgetBar::where('key', 'primary_side_bar')->first();
            $MainMenuLocationObj = MenuLocation::where('location','main-menu')->first();
            $MenuList = Menu::orderBy('id', 'DESC')->get();
            $BlogAllCategory = BlogCategory::all();
            $BlogAllTag = BlogTag::all();
            $SettingKey = Setting::get()->pluck('value','key')->toArray();
            if(!Session::has('Currency')){
                $CurrencyObj = Currency::where('is_default',1)->first();
                Session::put('Currency', $CurrencyObj);
            }

            if(!Session::has('shippingcharge')){
                $ShippingObj = ShippingRule::where('isdefault',1)->first();
                Session::put('shippingcharge', $ShippingObj->price);
            }

            $ImageSize = array("150"=>"-150x150", "500"=>"-500x500", "540" => "-540x600");
            
            $view->with('GetAllProductBrand',$GetAllProductBrand);
            $view->with('GetAllProductCategory',$GetAllProductCategory);
            $view->with('GetAllActiveProduct',$GetAllActiveProduct);
            $view->with('Categories',$GetAllProductCategory);
            $view->with('Brands',$GetAllProductBrand);
            $view->with('GetAllProductCollection',$GetAllProductCollection);
            $view->with('GetAllProductLabel',$GetAllProductLabel);
            $view->with('GetAllProductTaxes',$GetAllProductTaxes);
            $view->with('GetAllTags',$GetAllTags);
            $view->with('PublishedProductAttributeSet',$GetAllProductPublishedAttributeSet);
            $view->with('ImageSize',$ImageSize);
            $view->with('CurrencyList',$CurrencyList);
            $view->with('ProductCollections',$ProductCollections);
            $view->with('ProductFeatures',$ProductFeatures);
            $view->with('TopTenReview',$GetReviews);
            $view->with('FeaturedPoducts',$FeaturedPoducts);
            $view->with('CurrencyObj',$CurrencyObj);
            $view->with('Widgets',$Widgets);
            $view->with('WidgetBars',$WidgetBars);
            $view->with('MenuList',$MenuList);
            $view->with('FooterBarObj',$FooterBarObj);
            $view->with('PrimarySideBarObj',$PrimarySideBarObj);
            $view->with('MainMenuLocationObj',$MainMenuLocationObj);
            $view->with('BlogAllCategory',$BlogAllCategory);
            $view->with('BlogAllTag',$BlogAllTag);
            $view->with('SettingKey',$SettingKey);
            $view->with('PublishDefaultProductCategories',$PublishDefaultProductCategories);
            $view->with('PublishMoreProductCategories',$PublishMoreProductCategories);
            $view->with('PublishAllProductCategories',$PublishAllProductCategories);
        });
    }
}