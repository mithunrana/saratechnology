<div class="top-header">
    <div class="custom-container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="d-flex align-items-center justify-content-center justify-content-md-start">
                    <div class="lng_dropdown mr-2">
                        <select name="countries" class="custome_select">
                            <option value='en' data-image="assets/images/eng.png" data-title="English">English</option>
                            <option value='fn' data-image="assets/images/fn.png" data-title="France">France</option>
                        </select>
                    </div>
                    <div class="mr-3">
                        <select name="countries" class="custome_select currency_change">
                            @foreach($CurrencyList as $Currency)
                                <option value="{{$Currency->id}}" @if(Session::get('Currency')->id == $Currency->id) selected @endif>{{$Currency->title}}</option>
                            @endforeach()
                        </select>
                    </div>
                    <ul class="contact_detail text-center text-lg-left">
                        <li><i class="ti-email"></i><span>{{$SettingKey['theme_thigo_email']}}</span></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6">
                <div class="text-center text-md-right">
                    <ul class="header_list">
                        <li><a href="#"><i class="ti-control-shuffle"></i><span>Compare</span></a></li>
                        <li><a href="#"><i class="ti-heart"></i><span>Wishlist</span></a></li>
                        <li><a href="{{route('customer.login')}}"><i class="ti-user"></i><span>Login</span></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="middle-header dark_skin">
    <div class="custom-container">
        <div class="nav_block">
            <a class="navbar-brand" href="{{asset('')}}">
                <img class="logo_dark" src="{{asset('')}}{{$SettingKey['theme_thigo_logo']}}" alt="{{$SettingKey['theme_thigo_site_title']}}" />
                <img class="logo_light" src="{{asset('')}}{{$SettingKey['theme_thigo_logo']}}" alt="{{$SettingKey['theme_thigo_site_title']}}" />
            </a>
            <div class="product_search_form rounded_input">
                <form method="get">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="custom_select">
                                <select class="category">
                                    <option value="">All Category</option>
                                    @foreach($ProductPublishCategories->where('parent_id',Null) as $Category)
                                        <option value="{{$Category->id}}">{{$Category->name}}</option>
                                    @endforeach()
                                </select>
                            </div>
                        </div>
                        <input name="keyword" class="form-control" placeholder="Search Product..." required=""  type="text">
                        <button type="submit" class="search_btn2"><i class="fa fa-search"></i></button>
                    </div>
                </form>
            </div>
            <div class="contact_phone contact_support">
                <i class="linearicons-phone-wave"></i>
                <span>{{$SettingKey['theme_thigo_hotline']}}</span>
            </div>
        </div>
    </div>
</div>