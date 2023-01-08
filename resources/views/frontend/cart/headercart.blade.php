<li><a href="#" class="nav-link"><i class="linearicons-user"></i></a></li>
<li><a href="#" class="nav-link"><i class="linearicons-heart"></i><span class="wishlist_count">0</span></a></li>
<li class="dropdown cart_dropdown"><a class="nav-link cart_trigger" href="#" data-toggle="dropdown"><i class="linearicons-bag2"></i><span class="cart_count">{{Cart::content()->count()}}</span></a>
    <div class="cart_box cart_right dropdown-menu dropdown-menu-right">
        @if(Cart::content()->count()>0)
            <ul class="cart_list">
                @foreach(Cart::content() as $Product)
                    <li class="product-remove">
                        <a href="#" class="item_remove"><i style="width: 30px;" class="ion-close cartdelete"  data-id="{{$Product->rowId}}"></i></a>
                        <a href="#"><img src="{{asset('')}}{{$Product->options->image}}" alt="cart_thumb1">{{$Product->name}}</a>
                        <span class="cart_quantity"> {{$Product->qty}} x <span class="cart_amount"> <span class="price_symbole">@if(Session::get('Currency')->is_prefix_symbol==0){{Session::get('Currency')->symbol}}@endif</span></span>{{$Product->total}}@if(Session::get('Currency')->is_prefix_symbol!=0){{Session::get('Currency')->symbol}}@endif</span>
                    </li>
                @endforeach()
            </ul>
            <div class="cart_footer">
                <p class="cart_total"><strong>Subtotal:</strong> <span class="cart_price"> <span class="price_symbole">@if(Session::get('Currency')->is_prefix_symbol==0){{Session::get('Currency')->symbol}}@endif</span></span>{{Cart::subtotal()}}@if(Session::get('Currency')->is_prefix_symbol!=0){{Session::get('Currency')->symbol}}@endif</p>
                <p class="cart_buttons"><a href="{{route('cart')}}" class="btn btn-fill-line view-cart">View Cart</a><a href="{{route('checkout')}}" class="btn btn-fill-out checkout">Checkout</a></p>
            </div>
        @else
            <p class="text-center">Your cart is empty!</p>
        @endif()
    </div>
</li>