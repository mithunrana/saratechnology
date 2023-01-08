<footer class="bg_gray">
	<div class="footer_top small_pt pb_20">
        <div class="custom-container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="widget mb-lg-0">
                        <div class="footer_logo">
                            <a href="{{asset('')}}"><img src="{{asset('')}}{{ $SettingKey['theme_thigo_logo_footer'] }}" alt="{{asset('')}}{{ $SettingKey['theme_thigo_show_site_name'] }}"/></a>
                        </div>
                        <p class="mb-3">{{ $SettingKey['theme_thigo_about_us'] }}</p>
                        <ul class="social_icons text-center text-lg-left">
                            <li><a href="{{ $SettingKey['theme_thigo_facebook'] }}" class="sc_facebook"><i class="ion-social-facebook"></i></a></li>
                            <li><a href="{{ $SettingKey['theme_thigo_twitter'] }}" class="sc_twitter"><i class="ion-social-twitter"></i></a></li>
                            <li><a href="{{ $SettingKey['theme_thigo_linkedin'] }}" class="sc_linkedin"><i class="ion-social-linkedin"></i></a></li>
                            <li><a href="{{ $SettingKey['theme_thigo_youtube'] }}" class="sc_youtube"><i class="ion-social-youtube-outline"></i></a></li>
                            <li><a href="{{ $SettingKey['theme_thigo_instagram'] }}" class="sc_instagram"><i class="ion-social-instagram-outline"></i></a></li>
                        </ul>
                    </div>
                </div>

                @foreach($FooterBarObj->widgetset->sortBy('order') as $Widget)
                    @if($Widget->widget->type == 'text')
                        {!! $Widget->content !!}
                    @elseif($Widget->widget->type == 'menu')
                        <div class="col-lg-2 col-md-4 col-sm-6">
                            <div class="widget">
                                <h3 class="widget_title">{{$Widget->widgetshowname}}</h3>
                                <ul class="widget_links">
                                    @foreach($Widget->menu->menuitems->sortBy('order') as $Item)
                                        <li><a style="{{$Item->css_class}}" href="{{$Item->title}}"><i class="{{$Item->icon_font}}"></i>{{$Item->title}}</a></li>
                                    @endforeach()
                                </ul>
                            </div>
                        </div>
                    @endif()
                @endforeach()

                <div class="col-lg-3 col-md-4 col-sm-6">
                	<div class="widget">
                        <h3 class="widget_title">Contact Info</h3>
                        <ul class="contact_info">
                            <li>
                                <i class="ti-location-pin"></i>
                                <p>{{ $SettingKey['theme_thigo_address'] }}</p>
                            </li>
                            <li>
                                <i class="ti-email"></i>
                                <a href="mailto:{{ $SettingKey['theme_thigo_email'] }}">{{ $SettingKey['theme_thigo_email'] }}</a>
                            </li>
                            <li>
                                <i class="ti-mobile"></i>
                                <p>{{ $SettingKey['theme_thigo_hotline'] }}</p>
                            </li>
                        </ul>
                    </div>
        		</div>
            </div>
        </div>
    </div>

    <div class="middle_footer">
    	<div class="custom-container">
        	<div class="row">
            	<div class="col-12">
                	<div class="shopping_info">
                        <div class="row justify-content-center">
                            @foreach($OurFeatures as $Feature)
                                <div class="col-md-4">	
                                    <div class="icon_box icon_box_style2">
                                        <div class="icon">
                                            <i class="{{$Feature->icon}}"></i>
                                        </div>
                                        <div class="icon_box_content">
                                            <h5>{{$Feature->title}}</h5>
                                            <p>{{$Feature->content}}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach()
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bottom_footer border-top-tran">
        <div class="custom-container">
            <div class="row">
                <div class="col-lg-12">
                    <p class="mb-md-0 text-center ">{{ $SettingKey['theme_thigo_copyright'] }}</p>
                </div>
            </div>
        </div>
    </div>
</footer>