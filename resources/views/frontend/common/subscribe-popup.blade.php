<div class="modal fade subscribe_popup" id="onload-popup" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="ion-ios-close-empty"></i></span>
                </button>
                <div class="row no-gutters">
                    <div class="col-sm-7">
                        <div class="popup_content text-left">
                            <div class="popup-text">
                                <div class="heading_s1">
                                    <h3>{{$SettingKey['theme_thigo_newsletter_title']}}</h3>
                                </div>
                                <p>{{$SettingKey['theme_thigo_newsletter_text']}}</p>
                            </div>
                            <form action="{{route('newsletter.subscribe')}}" method="post">
                                @csrf
                            	<div class="form-group">
                                	<input name="email" required type="email" class="form-control" placeholder="Enter Your Email">
                                </div>
                                @if(Session::has('message')) {{Session::get('message')}} @endif
                                <div class="form-group">
                                	<button class="btn btn-fill-out btn-block text-uppercase" title="Subscribe" type="submit">Subscribe</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-sm-5">
                    	<div class="background_bg h-100" data-img-src="{{$SettingKey['theme_thigo_newsletter_image']}}"></div>
                    </div>
                </div>
            </div>
    	</div>
    </div>
</div>