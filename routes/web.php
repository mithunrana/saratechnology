<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontEnd\AuthenticatedSessionController;
use App\Http\Controllers\FrontEnd\CustomerController;




// All Backend route here -----------
Route::group(['namespace'=>'App\Http\Controllers\BackEnd'], function(){
    Route::get('/admin','AdminController@index')->name('dashboard');
    

    Route::get('/admin/product','ProductController@productsManage')->name('dashboard.product');
    Route::get('/admin/product-add','ProductController@productsAdd')->name('dashboard.product.add');
    Route::post('/admin/product-store','ProductController@productStore')->name('dashboard.product.store');
    Route::get('/admin/product-edit/{productid}','ProductController@productsEdit')->name('dashboard.product.edit');
    Route::post('/admin/product-edit/{productid}','ProductController@productUpdate')->name('dashboard.product.update');
    Route::post('/admin/product-update/{productid}','ProductController@productUpdate')->name('dashboard.product.update');
    Route::get('/admin/product-delete/{productid}','ProductController@productDelete')->name('dashboard.product.delete');


    Route::post('/admin/product.variation.store','ProductController@productVariationStore')->name('dashboard.product.variation.store');
    Route::post('/admin/product.variation.update','ProductController@productVariationUpdate')->name('dashboard.product.variation.update');
    Route::get('/admin/product-variation-delete/{variationid}','ProductController@productVariationDelete')->name('dashboard.product.variation.delete');
    Route::post('/admin/prdoct-with-attribute-set-update','ProductController@productWithAttributeSetUpdate')->name('dashboard.product.with.attributeset.update');


    Route::get('/admin/product-brand','ProductController@productsBrandManage')->name('dashboard.product.brand');
    Route::get('/admin/product-brand-add','ProductController@productsBrandAdd')->name('dashboard.product.brand.add');
    Route::post('/admin/product/brand-store','ProductController@productBrandStore')->name('dashboard.product.brand.store');
    Route::get('/admin/product-brand-edit/{brandid}','ProductController@productsBrandEdit')->name('dashboard.product.brand.edit');
    Route::post('/admin/product-brand-edit/{brandid}','ProductController@productBrandUpdate')->name('dashboard.product.brand.update');
    
    

    Route::get('/admin/product-category','ProductController@productsCategoryManage')->name('dashboard.product.category');
    Route::get('/admin/product-category-add','ProductController@productsCategoryAdd')->name('dashboard.product.category.add');
    Route::post('/admin/product/category-store','ProductController@productCategoryStore')->name('dashboard.product.category.store');
    Route::get('/admin/product-category-edit/{categoryid}','ProductController@productsCategoryEdit')->name('dashboard.product.category.edit');
    Route::post('/admin/product-category-edit/{categoryid}','ProductController@productCategoryUpdate')->name('dashboard.product.category.update');

    

    Route::get('/admin/product-label','ProductController@productsLabelManage')->name('dashboard.product.label');
    Route::get('/admin/product-label-add','ProductController@productsLabelAdd')->name('dashboard.product.label.add');
    Route::post('/admin/product/product-label-store','ProductController@productLabelStore')->name('dashboard.product.label.store');
    Route::get('/admin/product-label-edit/{categoryid}','ProductController@productsLabelEdit')->name('dashboard.product.label.edit');
    Route::post('/admin/product-label-edit/{categoryid}','ProductController@productLabelUpdate')->name('dashboard.product.label.update');



    Route::get('/admin/product-collection','ProductController@productCollectionManage')->name('dashboard.product.collection');
    Route::get('/admin/product-collection-add','ProductController@productsCollectionAdd')->name('dashboard.product.collection.add');
    Route::post('/admin/product/product-collection-store','ProductController@productCollectionstore')->name('dashboard.product.collection.store');
    Route::get('/admin/product-collection-edit/{categoryid}','ProductController@productsCollectionEdit')->name('dashboard.product.collection.edit');
    Route::post('/admin/product-collection-edit/{categoryid}','ProductController@productCollectionUpdate')->name('dashboard.product.collection.update');



    Route::get('/admin/product-tags','ProductController@productTagsManage')->name('dashboard.product.tags');
    Route::get('/admin/product-tags-add','ProductController@productsTagsAdd')->name('dashboard.product.tags.add');
    Route::post('/admin/product/product-tags-store','ProductController@productTagsstore')->name('dashboard.product.tags.store');
    Route::get('/admin/product-tags-edit/{categoryid}','ProductController@productsTagsEdit')->name('dashboard.product.tags.edit');
    Route::post('/admin/product-tags-edit/{categoryid}','ProductController@productTagsUpdate')->name('dashboard.product.tags.update');


    Route::get('/admin/product-taxes','ProductController@productTaxesManage')->name('dashboard.product.taxes');
    Route::get('/admin/product-taxes-add','ProductController@productsTaxesAdd')->name('dashboard.product.taxes.add');
    Route::post('/admin/product/product-taxes-store','ProductController@productTaxesstore')->name('dashboard.product.taxes.store');
    Route::get('/admin/product-taxes-edit/{categoryid}','ProductController@productsTaxesEdit')->name('dashboard.product.taxes.edit');
    Route::post('/admin/product-taxes-edit/{categoryid}','ProductController@productTaxesUpdate')->name('dashboard.product.taxes.update');


    Route::get('/admin/product-attribute','ProductController@productAttributeManage')->name('dashboard.product.attribute');
    Route::get('/admin/product-attribute-add','ProductController@productsAttributeAdd')->name('dashboard.product.attribute.add');
    Route::post('/admin/product/product-attribute-store','ProductController@productAttributestore')->name('dashboard.product.attribute.store');
    Route::get('/admin/product-attribute-edit/{attributeid}','ProductController@productsAttributeEdit')->name('dashboard.product.attribute.edit');
    Route::post('/admin/product-attribute-edit/{attributeid}','ProductController@productAttributeUpdate')->name('dashboard.product.attribute.update');



    Route::get('/admin/customer','CustomerController@index')->name('dashboard.customer');
    Route::get('/admin/customer-add','CustomerController@add')->name('dashboard.customer.add');
    Route::post('/admin/customer-store','CustomerController@store')->name('dashboard.customer.store');
    Route::get('/admin/customer-edit/{attributeid}','CustomerController@edit')->name('dashboard.customer.edit');
    Route::post('/admin/customer-update/{attributeid}','CustomerController@update')->name('dashboard.customer.update');


    Route::get('/admin/country','SetupMasterController@country')->name('dashboard.country');
    Route::get('/admin/country-add','SetupMasterController@countryAdd')->name('dashboard.country.add');
    Route::post('/admin/country-store','SetupMasterController@countryStore')->name('dashboard.country.store');
    Route::get('/admin/country-edit/{attributeid}','SetupMasterController@countryEdit')->name('dashboard.country.edit');
    Route::post('/admin/country-update/{attributeid}','SetupMasterController@countryUpdate')->name('dashboard.country.update');

    Route::get('/admin/currency','SetupMasterController@currency')->name('dashboard.currency');
    Route::get('/admin/currency-add','SetupMasterController@currencyAdd')->name('dashboard.currency.add');
    Route::post('/admin/currency-store','SetupMasterController@currencyStore')->name('dashboard.currency.store');
    Route::get('/admin/currency-edit/{id}','SetupMasterController@currencyEdit')->name('dashboard.currency.edit');
    Route::post('/admin/currency-update/{id}','SetupMasterController@currencyUpdate')->name('dashboard.currency.update');


    Route::get('/admin/shipping-method','SetupMasterController@shippingMethod')->name('dashboard.shipping.method');
    Route::get('/admin/shipping-method-add','SetupMasterController@shippingMethodAdd')->name('dashboard.shipping.method.add');
    Route::post('/admin/shipping-method-store','SetupMasterController@shippingMethodStore')->name('dashboard.shipping.method.store');
    Route::get('/admin/shipping-method-edit/{id}','SetupMasterController@shippingMethodEdit')->name('dashboard.shipping.method.edit');
    Route::post('/admin/shipping-method-update/{id}','SetupMasterController@shippingMethodUpdate')->name('dashboard.shipping.method.update');


    Route::get('/admin/slider','SetupMasterController@slider')->name('dashboard.slider');
    Route::get('/admin/slider-add','SetupMasterController@sliderAdd')->name('dashboard.slider.add');
    Route::post('/admin/slider-store','SetupMasterController@sliderStore')->name('dashboard.slider.store');
    Route::get('/admin/slider-edit/{id}','SetupMasterController@sliderEdit')->name('dashboard.slider.edit');
    Route::post('/admin/slider-update/{id}','SetupMasterController@sliderUpdate')->name('dashboard.slider.update');
    Route::get('/admin/slider-delete/{id}','SetupMasterController@sliderDelete')->name('dashboard.slider.delete');


    Route::post('/admin/slider-item-store','SetupMasterController@sliderItemStore')->name('dashboard.slider.item.store');
    Route::post('/admin/slider-item-update/{id}','SetupMasterController@sliderItemUpdate')->name('dashboard.slider.item.update');
    Route::get('/admin/slider-item-delete/{id}','SetupMasterController@sliderItemDelete')->name('dashboard.slider.item.delete');




    //Route::get('/admin/media','MediaController@getMedia')->name('get.media');
    Route::get('/admin/media/{folderid}','MediaController@fetchMedia')->name('media.fetch');
    Route::post('/admin/media-upload','MediaController@mediaStore')->name('media.upload');
    Route::post('/admin/media-folder-create','MediaController@mediaFolderCreate')->name('media.folder.create');

});




// All frontend route here ----------
Route::group(['namespace'=>'App\Http\Controllers\FrontEnd'], function(){
    Route::get('/','Homecontroller@index')->name('home');

    Route::get('/cart','CartController@index')->name('cart');
    Route::get('/checkout','CartController@checkout')->name('checkout');

    Route::get('/cart/store/{id}', 'CartController@store');
    Route::get('/qty/inc/{rowId}', 'CartController@qtyInc');
    Route::get('/qty/dec/{rowId}', 'CartController@qtyDec');
    Route::get('cart/delete/{id}','CartController@cartdelete');

    Route::post('/confirm-order', 'OrderController@order')->name('order.confirm');
    Route::get('/sucess','OrderController@sucessOrder');

    Route::get('/switch-currency/{id}', 'CurrencyController@swithCurrency')->name('currency.switch');
    Route::get('/shipping-method-change', 'CartController@shippingMethodChange')->name('shipping.method.change');
    Route::get('/switch-shipping/{id}', 'CartController@switchShippingMethod')->name('switch.shipping.method');

    Route::get('/product-rating','ProductController@ratingSubmit')->name('product.rating');

    Route::get('/{url}','ProductController@productView')->name('productview');
});


Route::get('/customer/login', [AuthenticatedSessionController::class, 'create'])->name('customer.login')->middleware('guest:customer');
Route::post('/customer/login/store', [AuthenticatedSessionController::class, 'store'])->name('customer.login.store');
Route::group(['middleware' => 'customer'], function() {
    Route::get('/customer/dashboard', [CustomerController::class, 'index'])->name('customer.dashboard');
    Route::get('/customer/logout', [AuthenticatedSessionController::class, 'destroy'])->name('customer.logout');
});



/*
Route::get('/', function () {
    return view('welcome');
});*/


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth','verified'])->name('dashboard');

require __DIR__.'/auth.php';





/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

