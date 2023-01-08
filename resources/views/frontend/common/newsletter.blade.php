<div class="section bg_default small_pt small_pb">
    <div class="custom-container">	
        <div class="row align-items-center">	
            <div class="col-md-6">
                <div class="newsletter_text text_white">
                    <h3>{{$SettingKey['theme_thigo_newsletter_title']}}</h3>
                    <p> {{$SettingKey['theme_thigo_newsletter_text']}} </p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="newsletter_form2 rounded_input">
                    <form action="{{route('newsletter.subscribe')}}" method="post">
                        @csrf
                        <input type="email" required="" name="email" class="form-control" placeholder="Enter Email Address">
                        @if(Session::has('message')) {{Session::get('message')}} @endif
                        <button type="submit" class="btn btn-dark btn-radius" name="submit" value="Submit">Subscribe</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>