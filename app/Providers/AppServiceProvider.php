<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\ProductBrand;
use App\Models\ProductCategory;
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
            $view->with('GetAllProductBrand',$GetAllProductBrand);
            $view->with('GetAllProductCategory',$GetAllProductCategory);
        });
    }
}
