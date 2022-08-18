<?php

use Illuminate\Support\Facades\Route;

// All frontend route here ----------
Route::group(['namespace'=>'App\Http\Controllers\FrontEnd'], function(){
    Route::get('/','Homecontroller@index')->name('home');
});


// All Backend route here -----------
Route::group(['namespace'=>'App\Http\Controllers\BackEnd'], function(){
    Route::get('/admin','AdminController@index')->name('dashboard');
    Route::get('/admin/product-brand','ProductController@productsBrandManage')->name('dashboard.product.brand');
    Route::get('/admin/product-brand-add','ProductController@productsBrandAdd')->name('dashboard.product.brand.add');
    Route::post('/admin/product/store','ProductController@productStore')->name('dashboard.product.store');

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
