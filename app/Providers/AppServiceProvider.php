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
        view()->composer('*', function ($view){
            $GetAllProductBrand = ProductBrand::orderBy('id', 'DESC')->get();
            $GetAllProductCategory = ProductCategory::orderBy('id', 'DESC')->get();
            $GetAllActiveProduct = Products::where('status','published')->get();
            $GetAllProductCollection = ProductCollection::orderBy('id', 'DESC')->get();
            $GetAllProductLabel = ProductLabel::orderBy('id', 'DESC')->get();
            $GetAllProductTaxes  = ProductTax::orderBy('id', 'DESC')->get();
            $GetAllTags = ProductTag::orderBy('id', 'DESC')->get();
            $GetAllProductAttributeSet = ProductAttributeSet::orderBy('id', 'DESC')->get();


            $view->with('GetAllProductBrand',$GetAllProductBrand);
            $view->with('GetAllProductCategory',$GetAllProductCategory);
            $view->with('GetAllActiveProduct',$GetAllActiveProduct);
            $view->with('Categories',$GetAllProductCategory);
            $view->with('Brands',$GetAllProductBrand);
            $view->with('GetAllProductCollection',$GetAllProductCollection);
            $view->with('GetAllProductLabel',$GetAllProductLabel);
            $view->with('GetAllProductTaxes',$GetAllProductTaxes);
            $view->with('GetAllTags',$GetAllTags);
            $view->with('GetAllProductAttributeSet',$GetAllProductAttributeSet);
        });
    }
}
