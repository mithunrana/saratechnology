<?php

use Illuminate\Support\Facades\Route;

// All frontend route here ----------
Route::group(['namespace'=>'App\Http\Controllers\FrontEnd'], function(){
    Route::get('/','Homecontroller@index')->name('home');
});


// All Backend route here -----------
Route::group(['namespace'=>'App\Http\Controllers\BackEnd'], function(){
    Route::get('/admin','AdminController@index')->name('dashboard');
    

    Route::get('/admin/product','ProductController@productsManage')->name('dashboard.product');
    Route::get('/admin/product-add','ProductController@productsAdd')->name('dashboard.product.add');
    Route::post('/admin/product-store','ProductController@productStore')->name('dashboard.product.store');
    Route::get('/admin/product-edit/{productid}','ProductController@productsEdit')->name('dashboard.product.edit');
    Route::post('/admin/product-edit/{productid}','ProductController@productUpdate')->name('dashboard.product.update');


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
    Route::get('/admin/product-attribute-edit/{categoryid}','ProductController@productsAttributeEdit')->name('dashboard.product.attribute.edit');
    Route::post('/admin/product-attribute-edit/{categoryid}','ProductController@productAttributeUpdate')->name('dashboard.product.attribute.update');
    

    //Route::get('/admin/media','MediaController@getMedia')->name('get.media');
    Route::get('/admin/media/{folderid}','MediaController@fetchMedia')->name('media.fetch');
    Route::post('/admin/media-upload','MediaController@mediaStore')->name('media.upload');
    Route::post('/admin/media-folder-create','MediaController@mediaFolderCreate')->name('media.folder.create');

});



/*
Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');
*/

require __DIR__.'/auth.php';
