<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\ProductBrand;
use App\Models\ProductCategory;
use App\Models\Products;
use App\Models\ProductLabel;
use App\Models\ProductCollection;
use App\Models\ProductTax;
use App\Models\ProductTag;
use App\Models\ProductAttributeSet;
use App\Models\ProductAttribute;
use App\Models\ProductVariation;
use App\Models\Currency;
use App\Models\ShippingRule;
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
        if(!Session::has('Currency')){
            $CurrencyObj = Currency::where('is_default',1)->first();
            Session::put('Currency', $CurrencyObj);
        }

        if(!Session::has('shippingcharge')){
            $ShippingObj = ShippingRule::where('isdefault',1)->first();
            Session::put('shippingcharge', $ShippingObj->price);
        }


        $ImageSize = array("150"=>"-150x150", "500"=>"-500x500", "540" => "-540x600");

        config()->set('ImageSize',$ImageSize);

        view()->composer('*', function ($view){
            $GetAllProductBrand = ProductBrand::orderBy('id', 'DESC')->get();
            $GetAllProductCategory = ProductCategory::orderBy('id', 'DESC')->get();
            $GetAllActiveProduct = Products::where('status','published')->get();
            $GetAllProductCollection = ProductCollection::orderBy('id', 'DESC')->get();
            $GetAllProductLabel = ProductLabel::orderBy('id', 'DESC')->get();
            $GetAllProductTaxes  = ProductTax::orderBy('id', 'DESC')->get();
            $GetAllTags = ProductTag::orderBy('id', 'DESC')->get();
            $GetAllProductPublishedAttributeSet = ProductAttributeSet::where('status','Published')->orderBy('id', 'DESC')->get();
            $CurrencyList = Currency::orderBy('id', 'DESC')->get();
            $CurrencyObj = Currency::where('is_default',1)->first();
            $ProductCollections = ProductCollection::where('status','Published')->get();


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



            $view->with('CurrencyObj',$CurrencyObj);
        });
    }
}
