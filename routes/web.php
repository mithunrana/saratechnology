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


    Route::get('/admin/flash-sales','FlashSaleController@index')->name('dashboard.flash.sale');
    Route::get('/admin/flash-sale-create','FlashSaleController@create')->name('dashboard.flash.sale.create');
    Route::post('/admin/flash-sale-store','FlashSaleController@store')->name('dashboard.flash.sale.store');
    Route::get('/admin/flash-sale-edit/{id}','FlashSaleController@edit')->name('dashboard.flash.sale.edit');
    Route::post('/admin/flash-sale-update/{id}','FlashSaleController@update')->name('dashboard.flash.sale.update');
    Route::get('/admin/flash-sale-delete/{id}','FlashSaleController@delete')->name('dashboard.flash.sale.delete');

    Route::post('/admin/flash-sale-item-store/','FlashSaleController@flashSaleItemStore')->name('dashboard.flash.sale.item.store');
    Route::post('/admin/flash-sale-item-update/{id}','FlashSaleController@flashSaleItemUpdate')->name('dashboard.flash.sale.item.update');
    Route::get('/admin/flash-sale-item-delete/{id}','FlashSaleController@flashSaleItemRemove')->name('dashboard.flash.sale.item.delete');


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



    Route::get('/admin/blog','BlogController@blogManage')->name('dashboard.blog');
    Route::get('/admin/blog-add','BlogController@blogAdd')->name('dashboard.blog.add');
    Route::post('/admin/blog-store','BlogController@blogStore')->name('dashboard.blog.store');
    Route::get('/admin/blog-edit/{productid}','BlogController@blogEdit')->name('dashboard.blog.edit');
    Route::post('/admin/blog-update/{productid}','BlogController@blogUpdate')->name('dashboard.blog.update');
    Route::get('/admin/blog-delete/{productid}','BlogController@blogDelete')->name('dashboard.blog.delete');


    Route::get('/admin/blog-category','BlogController@blogCategory')->name('dashboard.blog.category');
    Route::get('/admin/blog-category-add','BlogController@blogCategoryAdd')->name('dashboard.blog.category.add');
    Route::post('/admin/blog-category-store','BlogController@blogCategoryStore')->name('dashboard.blog.category.store');
    Route::get('/admin/blog-category-edit/{categoryid}','BlogController@blogCategoryEdit')->name('dashboard.blog.category.edit');
    Route::post('/admin/blog-category-update/{categoryid}','BlogController@blogCategoryUpdate')->name('dashboard.blog.category.update');
    Route::get('/admin/blog-category-delete/{categoryid}','BlogController@blogCategoryDelete')->name('dashboard.blog.category.delete');


    Route::get('/admin/blog-tag','BlogController@blogTag')->name('dashboard.blog.tag');
    Route::get('/admin/blog-tag-add','BlogController@blogTagAdd')->name('dashboard.blog.tag.add');
    Route::post('/admin/blog-tag-store','BlogController@blogTagStore')->name('dashboard.blog.tag.store');
    Route::get('/admin/blog-tag-edit/{tagid}','BlogController@blogTagEdit')->name('dashboard.blog.tag.edit');
    Route::post('/admin/blog-tag-update/{tagid}','BlogController@blogTagUpdate')->name('dashboard.blog.tag.update');
    Route::get('/admin/blog-tag-delete/{tagid}','BlogController@blogTagDelete')->name('dashboard.blog.tag.delete');




    Route::get('/admin/service','ServiceController@index')->name('dashboard.service');
    Route::get('/admin/service-add','ServiceController@add')->name('dashboard.service.add');
    Route::post('/admin/service-store','ServiceController@store')->name('dashboard.service.store');
    Route::get('/admin/service-edit/{id}','ServiceController@edit')->name('dashboard.service.edit');
    Route::post('/admin/service-edit/{id}','ServiceController@update')->name('dashboard.service.update');
    Route::get('/admin/service-delete/{id}','ServiceController@delete')->name('dashboard.service.delete');

    

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


    Route::get('/admin/contact','ContactController@index')->name('dashboard.contact');
    Route::get('/admin/contact-edit/{id}','ContactController@contactEdit')->name('dashboard.contact.edit');
    Route::post('/admin/contact-update/{id}','ContactController@contactUpdate')->name('dashboard.contact.update');
    Route::get('/admin/contact-delete/{id}','ContactController@contactDelete')->name('dashboard.contact.delete');
    Route::post('/admin/contact-reply/{id}','ContactController@contactReply')->name('dashboard.contact.reply');


    Route::get('/admin/newsletter','NewsletterController@index')->name('dashboard.newsletter');
    Route::get('/admin/newsletter-edit/{id}','NewsletterController@newsletterEdit')->name('dashboard.newsletter.edit');
    Route::post('/admin/newsletter-update/{id}','NewsletterController@newsletterUpdate')->name('dashboard.newsletter.update');
    Route::get('/admin/newsletter-delete/{id}','NewsletterController@newsletterDelete')->name('dashboard.newsletter.delete');


    Route::get('/admin/shipping-method','SetupMasterController@shippingMethod')->name('dashboard.shipping.method');
    Route::get('/admin/shipping-method-add','SetupMasterController@shippingMethodAdd')->name('dashboard.shipping.method.add');
    Route::post('/admin/shipping-method-store','SetupMasterController@shippingMethodStore')->name('dashboard.shipping.method.store');
    Route::get('/admin/shipping-method-edit/{id}','SetupMasterController@shippingMethodEdit')->name('dashboard.shipping.method.edit');
    Route::post('/admin/shipping-method-update/{id}','SetupMasterController@shippingMethodUpdate')->name('dashboard.shipping.method.update');


    Route::get('/admin/reviews','ReviewController@index')->name('dashboard.review');
    Route::get('/admin/review/edit/{id}','ReviewController@edit')->name('dashboard.review.edit');
    Route::post('/admin/review/update/{id}','ReviewController@update')->name('dashboard.review.update');
    Route::get('/admin/review/delete/{id}','ReviewController@delete')->name('dashboard.slider.item.delete');



    Route::get('/admin/testimonials','TestimonialController@index')->name('dashboard.testimonials');
    Route::get('/admin/testimonial/add','TestimonialController@create')->name('dashboard.testimonial.add');
    Route::post('/admin/testimonial/store','TestimonialController@store')->name('dashboard.testimonial.store');
    Route::get('/admin/testimonial/edit/{id}','TestimonialController@edit')->name('dashboard.testimonial.edit');
    Route::post('/admin/testimonial/update/{id}','TestimonialController@update')->name('dashboard.testimonial.update');
    Route::get('/admin/testimonial/delete/{id}','TestimonialController@delete')->name('dashboard.testimonial.delete');


    Route::get('/admin/slider','SetupMasterController@slider')->name('dashboard.slider');
    Route::get('/admin/slider-add','SetupMasterController@sliderAdd')->name('dashboard.slider.add');
    Route::post('/admin/slider-store','SetupMasterController@sliderStore')->name('dashboard.slider.store');
    Route::get('/admin/slider-edit/{id}','SetupMasterController@sliderEdit')->name('dashboard.slider.edit');
    Route::post('/admin/slider-update/{id}','SetupMasterController@sliderUpdate')->name('dashboard.slider.update');
    Route::get('/admin/slider-delete/{id}','SetupMasterController@sliderDelete')->name('dashboard.slider.delete');


    Route::post('/admin/slider-item-store','SetupMasterController@sliderItemStore')->name('dashboard.slider.item.store');
    Route::post('/admin/slider-item-update/{id}','SetupMasterController@sliderItemUpdate')->name('dashboard.slider.item.update');
    Route::get('/admin/slider-item-delete/{id}','SetupMasterController@sliderItemDelete')->name('dashboard.slider.item.delete');

    
    Route::get('/admin/menubar','MenubarController@index')->name('dashboard.menubar');
    Route::get('/admin/menubar-add','MenubarController@add')->name('dashboard.menubar.add');
    Route::post('/admin/menubar-store','MenubarController@store')->name('dashboard.menubar.store');
    Route::get('/admin/menubar-edit/{id}','MenubarController@edit')->name('dashboard.menubar.edit');
    Route::post('/admin/menubar-update/{id}','MenubarController@update')->name('dashboard.menubar.update');
    Route::get('/admin/menubar-delete/{id}','MenubarController@delete')->name('dashboard.menubar.delete');


    Route::post('/admin/menubar-item-store','MenubarController@menuItemStore')->name('dashboard.menubar.item.store');
    Route::post('/admin/menubar-item-update/{id}','MenubarController@menuItemUpdate')->name('dashboard.menubar.item.update');
    Route::get('/admin/menubar-item-delete/{id}','MenubarController@menuItemDelete')->name('dashboard.menubar.item.delete');


    Route::get('/admin/widget','WidgetCotroller@index')->name('dashboard.widget');
    Route::post('/admin/widget','WidgetCotroller@widgetStore')->name('dashboard.widget.store');
    Route::post('/admin/widgetbar','WidgetCotroller@widgetBarStore')->name('dashboard.widget.bar.store');
    Route::post('/admin/widgetset','WidgetCotroller@widgetSetStore')->name('dashboard.widget.set.store');
    Route::post('/admin/widgetset-update/{id}','WidgetCotroller@widgetSetUpdate')->name('dashboard.widget.set.update');
    Route::get('/admin/widgetset-delete/{id}','WidgetCotroller@widgetSetDelete')->name('dashboard.widget.set.delete');


    Route::get('/admin/autogenerate','SettingController@autoGenerate')->name('dashboard.autogenerate');
    Route::get('/admin/setting/options','SettingController@settingOption')->name('dashboard.setting.option');

    Route::get('/admin/setting/home/options','SettingController@homePageSetting')->name('dashboard.setting.home.option');
    
    Route::post('/admin/setting/home/exclusivesectionupdate','SettingController@homeExclusiveSectionUpdate')->name('dashboard.setting.home.exclusive.update');
    Route::post('/admin/setting/home/3columnfirstbannerupdate','SettingController@home3ColumnFirstBannerUpdate')->name('dashboard.setting.home.threecolumnfirstbanner.update');

    Route::post('/admin/setting/socialupdate','SettingController@socialInformationUpdate')->name('dashboard.setting.social.update');
    Route::post('/admin/setting/headerupdate','SettingController@headerlInformationUpdate')->name('dashboard.setting.header.update');

    Route::post('/admin/setting/facebookinformationupdate','SettingController@facebookInformationUpdate')->name('dashboard.setting.facebook.update');
    Route::post('/admin/setting/bloginformationupdate','SettingController@blogInformationUpdate')->name('dashboard.setting.blog.update');

    Route::post('/admin/setting/ecommerceinformationupdate','SettingController@ecommerceInformationUpdate')->name('dashboard.setting.ecommerce.update');
    Route::post('/admin/setting/homepageinformationupdate','SettingController@homepageInformationUpdate')->name('dashboard.setting.homepage.update');
    Route::post('/admin/setting/cookieinformationupdate','SettingController@cookieInformationUpdate')->name('dashboard.setting.cookie.update');
    
    Route::post('/admin/setting/generalupdate','SettingController@generalInformationUpdate')->name('dashboard.setting.general.update');
    Route::post('/admin/setting/logoupdate','SettingController@logoInformationUpdate')->name('dashboard.setting.logo.update');

    Route::get('/admin/setting/customjs','SettingController@customJS')->name('dashboard.setting.customjs');
    Route::post('/admin/setting/customjsupdate','SettingController@customJSUpdate')->name('dashboard.setting.customjs.update');

    Route::get('/admin/setting/customcss','SettingController@customCSS')->name('dashboard.setting.customcss');
    Route::post('/admin/setting/customcssupdate','SettingController@customCSSUpdate')->name('dashboard.setting.customcss.update');
    Route::post('/admin/setting/policyupdate','SettingController@policyUpdate')->name('dashboard.setting.policy.update');

    Route::post('/admin/setting/metamanagerupdate','SettingController@metaManagerUpdate')->name('dashboard.setting.metamanager.update');


    
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

    Route::get('/service','ServiceController@index')->name('service');
    Route::get('/about','Homecontroller@about')->name('about.us');
    Route::get('/contact','ContactController@index')->name('contact.us');
    Route::post('/contact','ContactController@sendMail')->name('contact.us.mail');
    Route::post('/subscribe','NewsletterController@subsCribe')->name('newsletter.subscribe');

    Route::get('/privacy-policy','Homecontroller@PrivacyPolicy')->name('privacy.policy');
    Route::get('/terms-condition','Homecontroller@TermsCondition')->name('terms.condition');
    Route::get('/return-refund-policy','Homecontroller@ReturnRefundPolicy')->name('return.refund.policy');
    Route::get('/online-delivery','Homecontroller@OnlineDelivery')->name('online.delivery');

    Route::get('/blog','BlogController@index')->name('blog');
    Route::get('/category/{url}','BlogController@categoryWiseBlogs')->name('category.blog');
    Route::get('/tag/{url}','BlogController@tagWiseBlogs')->name('tag.blog');
    Route::get('blog/{url}','BlogController@singleBlog')->name('single.blog');

    Route::get('/products','ProductController@index')->name('products');
    Route::get('/products/{url}','ProductController@categoryWiseProducts')->name('category.products');
    Route::get('/{url}','ProductController@productView')->name('productview');



});




Route::get('/customer/register', [CustomerController::class, 'create'])->name('customer.register')->middleware('guest:customer');
Route::post('/customer/register', [CustomerController::class, 'register'])->name('customer.register')->middleware('guest:customer');

Route::get('/customer/login', [AuthenticatedSessionController::class, 'create'])->name('customer.login')->middleware('guest:customer');
Route::post('/customer/login/store', [AuthenticatedSessionController::class, 'store'])->name('customer.login.store');


Route::group(['middleware' => ['customer']], function() {
    Route::post('/customer/verification', [CustomerController::class, 'resendMailVerificationSend'])->name('customer.verification.send');
    Route::get('/customer/verification', [CustomerController::class, 'resendMailVerification'])->name('customer.verification');
    Route::get('/customer/logout', [AuthenticatedSessionController::class, 'destroy'])->name('customer.logout');
});


Route::group(['middleware' => ['customer','is_customer_verify_email']], function() {
    Route::get('/customer/dashboard', [CustomerController::class, 'index'])->name('customer.dashboard');
});

Route::get('customer/verify/{token}', [CustomerController::class, 'verifyAccount'])->name('customer.verify'); 




/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

