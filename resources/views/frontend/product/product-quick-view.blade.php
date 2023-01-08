
<div class="ajax_quick_view">
	<div class="row">
        <div class="col-lg-6 col-md-6 mb-4 mb-md-0">
          <div class="product-image">
                <div class="product_img_box">
                    <img id="product_img" src="{{asset('')}}{{$Product->productFirstImageNormalSize($Product->id)}}" data-zoom-image="{{asset('')}}{{$Product->productFirstImageNormalSize($Product->id)}}" alt="{{$Product->name}}" />
                </div>
                <div id="pr_item_gallery" class="product_gallery_item slick_slider" data-slides-to-show="4" data-slides-to-scroll="1" data-infinite="false">
                    @if($Product->productImages->count() > 0)
                        @foreach($Product->productImages as $Image)
                            <div class="item">
                                <a style="text-align:center;" href="#" class="product_gallery_item" data-image="{{asset('')}}{{$Image->urlwithoutextension }}{{$ImageSize[500]}}.{{$Image->extension }}">
                                    <img style="display: initial!important;"  src="{{asset('')}}{{$Image->urlwithoutextension }}{{$ImageSize[150]}}.{{$Image->extension }}" alt="product_small_img1" />
                                </a>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6">
            <div class="pr_detail">
                <div class="product_description">
                    <h4 class="product_title"><a href="#">Blue Dress For Woman</a></h4>
                    <div class="product_price">
                        <span class="price"><span>@if(Session::get('Currency')->is_prefix_symbol==0){{Session::get('Currency')->symbol}}@endif</span>{{number_format($Product->sale_price,2)}}<span>@if(Session::get('Currency')->is_prefix_symbol !=0){{Session::get('Currency')->symbol}}@endif</span></span>
                        <del><span>@if(Session::get('Currency')->is_prefix_symbol==0){{Session::get('Currency')->symbol}}@endif</span>{{number_format($Product->price,2)}}<span>@if(Session::get('Currency')->is_prefix_symbol !=0){{Session::get('Currency')->symbol}}@endif</span></del>
                        <div class="on_sale">
                            <span>35% Off</span>
                        </div>
                    </div>
                    <div class="rating_wrap">
                            <div class="rating">
                                <div class="product_rate" style="width:80%"></div>
                            </div>
                            <span class="rating_num">(21)</span>
                        </div>
                    <div class="pr_desc">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit massa enim. Nullam id varius nunc id varius nunc.</p>
                    </div>
                    <div class="product_sort_info">
                        <ul>
                            <li><i class="linearicons-shield-check"></i> 1 Year AL Jazeera Brand Warranty</li>
                            <li><i class="linearicons-sync"></i> 30 Day Return Policy</li>
                            <li><i class="linearicons-bag-dollar"></i> Cash on Delivery available</li>
                        </ul>
                    </div>
                    <div class="pr_switch_wrap">
                        <span class="switch_lable">Color</span>
                        <div class="product_color_switch">
                            <span class="active" data-color="#87554B"></span>
                            <span data-color="#333333"></span>
                            <span data-color="#DA323F"></span>
                        </div>
                    </div>
                    <div class="pr_switch_wrap">
                        <span class="switch_lable">Size</span>
                        <div class="product_size_switch">
                            <span>xs</span>
                            <span>s</span>
                            <span>m</span>
                            <span>l</span>
                            <span>xl</span>
                        </div>
                    </div>
                </div>
                <hr />
                <div class="cart_extra">
                    <div class="cart-product-quantity">
                        <div class="quantity">
                            <input type="button" value="-" class="minus">
                            <input type="text" name="quantity" value="1" title="Qty" class="qty" size="4">
                            <input type="button" value="+" class="plus">
                        </div>
                    </div>
                    <div class="cart_btn">
                        <button class="btn btn-fill-out btn-addtocart" type="button"><i class="icon-basket-loaded"></i> Add to cart</button>
                        <a class="add_compare" href="#"><i class="icon-shuffle"></i></a>
                        <a class="add_wishlist" href="#"><i class="icon-heart"></i></a>
                    </div>
                </div>
                <hr />
                <ul class="product-meta">
                    <li>SKU: <a href="#">BE45VGRT</a></li>
                    <li>Category: <a href="#">Clothing</a></li>
                    <li>Tags: <a href="#" rel="tag">Cloth</a>, <a href="#" rel="tag">printed</a> </li>
                </ul>
                
                <div class="product_share">
                    <span>Share:</span>
                    <ul class="social_icons">
                        <li><a href="#"><i class="ion-social-facebook"></i></a></li>
                        <li><a href="#"><i class="ion-social-twitter"></i></a></li>
                        <li><a href="#"><i class="ion-social-googleplus"></i></a></li>
                        <li><a href="#"><i class="ion-social-youtube-outline"></i></a></li>
                        <li><a href="#"><i class="ion-social-instagram-outline"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>