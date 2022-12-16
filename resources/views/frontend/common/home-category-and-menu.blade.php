<div class="bottom_header dark_skin main_menu_uppercase border-top border-bottom">
    	<div class="custom-container">
            <div class="row"> 
            	<div class="col-lg-3 col-md-4 col-sm-6 col-3">
                	<div class="categories_wrap">
                        <button type="button" data-toggle="collapse" data-target="#navCatContent" aria-expanded="false" class="categories_btn">
                            <i class="linearicons-menu"></i><span>All Categories </span>
                        </button>
                        <div id="navCatContent" class="@if(Route::currentRouteName() == 'home') nav_cat @endif navbar collapse">
                            <ul> 
                                @foreach($PublishDefaultProductCategories as $Categories)
                                    @if(count($Categories->childItems))
                                        <li class="dropdown dropdown-mega-menu">
                                            <a class="dropdown-item nav-link dropdown-toggler" data-toggle="dropdown" href="{{route('category.products',$Categories->permalink)}}"><i class="{{$Categories->icon}}"></i> <span>{{$Categories->name}}</span></a>
                                            <div class="dropdown-menu">
                                                <ul class="mega-menu d-lg-flex">
                                                    <li class="mega-menu-col col-lg-12">
                                                        <ul class="d-lg-flex">
                                                            @foreach($Categories->childItems as $SubCategory)
                                                                <li class="mega-menu-col col-lg-6">
                                                                    <ul> 
                                                                        <li class="dropdown-header">{{$SubCategory->name}}</li>
                                                                        @foreach($SubCategory->childItems as $Item)
                                                                            <li><a class="dropdown-item nav-link nav_item" href="{{route('category.products',$Item->permalink)}}">{{$Item->name}}</a></li>
                                                                        @endforeach
                                                                    </ul>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                    @else
                                        <li>
                                            <a class="dropdown-item nav-link nav_item" href="{{route('category.products',$Categories->permalink)}}">
                                                <i class="{{$Categories->icon}}"></i> <span>{{$Categories->name}}</span>
                                            </a>
                                        </li>
                                    @endif
                                @endforeach

                                @if($PublishMoreProductCategories->count() > 0)
                                    @foreach($PublishMoreProductCategories as $Categories)
                                        <li>
                                            <ul class="more_slide_open">
                                                @if(count($Categories->childItems))
                                                    <li class="dropdown dropdown-mega-menu">
                                                        <a class="dropdown-item nav-link dropdown-toggler" data-toggle="dropdown" href="{{route('category.products',$Categories->permalink)}}"><i class="{{$Categories->icon}}"></i> <span>{{$Categories->name}}</span></a>
                                                        <div class="dropdown-menu">
                                                            <ul class="mega-menu d-lg-flex">
                                                                <li class="mega-menu-col col-lg-12">
                                                                    <ul class="d-lg-flex">
                                                                        @foreach($Categories->childItems as $SubCategory)
                                                                            <li class="mega-menu-col col-lg-6">
                                                                                <ul> 
                                                                                    <li class="dropdown-header">{{$SubCategory->name}}</li>
                                                                                    @foreach($SubCategory->childItems as $Item)
                                                                                        <li><a class="dropdown-item nav-link nav_item" href="{{route('category.products',$Item->permalink)}}">{{$Item->name}}</a></li>
                                                                                    @endforeach
                                                                                </ul>
                                                                            </li>
                                                                        @endforeach
                                                                    </ul>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </li>
                                                @else
                                                    <li>
                                                        <a class="dropdown-item nav-link nav_item" href="{{route('category.products',$Categories->permalink)}}">
                                                            <i class="{{$Categories->icon}}"></i> <span>{{$Categories->name}}</span>
                                                        </a>
                                                    </li>
                                                @endif
                                            </ul>
                                        </li>
                                    @endforeach
                                @endif
                            </ul>
                            @if($PublishMoreProductCategories->count() > 0)
                                <div class="more_categories">More Categories</div>
                            @endif
                        </div>
                    </div>
                </div>


                <div class="col-lg-9 col-md-8 col-sm-6 col-9">
                	<nav class="navbar navbar-expand-lg">
                    	<button class="navbar-toggler side_navbar_toggler" type="button" data-toggle="collapse" data-target="#navbarSidetoggle" aria-expanded="false"> 
                            <span class="ion-android-menu"></span>
                        </button>
                        <div class="pr_search_icon">
                            <a href="javascript:void(0);" class="nav-link pr_search_trigger"><i class="linearicons-magnifier"></i></a>
                        </div> 
                        <div class="collapse navbar-collapse mobile_side_menu" id="navbarSidetoggle">
							<ul class="navbar-nav">
                                @foreach($MainMenuLocationObj->menu->menuitems->where('parent_id',0) as $Item)
                                    @if(count($Item->childItems))
                                        @if($Item->dropdownmega == 'YES')
                                            <li class="dropdown dropdown-mega-menu">
                                                <a class="dropdown-toggle nav-link" href="{{$Item->url}}" data-toggle="dropdown">{{$Item->title}}</a>
                                                <div class="dropdown-menu">
                                                    <ul class="mega-menu d-lg-flex">
                                                        @foreach($Item->subMenu as $SubItem)
                                                            <li class="mega-menu-col col-lg-3">
                                                                <ul>
                                                                    <li class="dropdown-header">{{$SubItem->title}}</li>
                                                                    @foreach ($SubItem->childItems as $childItems)
                                                                        @include('frontend.common.submenu', ['sub_items' => $childItems])
                                                                    @endforeach
                                                                </ul>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </li>
                                        @else
                                            <li class="dropdown {{$Item->css_class}}">
                                                <a class="dropdown-toggle nav-link" href="{{$Item->url}}" data-toggle="dropdown">{{$Item->title}}</a>
                                                <div class="dropdown-menu">
                                                    <ul> 
                                                        @foreach ($Item->childItems as $childItems)
                                                            @include('frontend.common.submenu', ['sub_items' => $childItems])
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </li>
                                        @endif
                                    @else
                                        <li class="{{$Item->css_class}}"> <a class="nav-link nav_item" href="{{$Item->url}}">{{$Item->title}}</a></li> 
                                    @endif 
                                @endforeach
                            </ul>
                        </div>
                        <div class="contact_phone contact_support">
                            <i class="linearicons-phone-wave"></i>
                            <span>123-456-7689</span>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>