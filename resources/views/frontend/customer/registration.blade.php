@extends('frontend.master')

@section('home-header')
    @include('frontend.common.home-header')
@endsection()


@section('category-and-menu-section')
    @include('frontend.common.close-category-menu')
@endsection()


@section('bread-crumb')
<!-- START SECTION BREADCRUMB -->
<div class="breadcrumb_section bg_gray page-title-mini">
    <div class="custom-container"><!-- STRART CONTAINER -->
        <div class="row align-items-center">
            <div class="col-md-12">
                <ol class="breadcrumb justify-content-md-start">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item active">Login</li>
                </ol>
            </div>
        </div>
    </div><!-- END CONTAINER-->
</div>
<!-- END SECTION BREADCRUMB -->
@endsection()



@section('main-content')
<!-- START LOGIN SECTION -->
<div class="login_register_wrap section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-md-10">
                <div class="login_wrap">
            		<div class="padding_eight_all bg-white">
                        <div class="heading_s1">
                            <h3>Create an Account</h3>
                        </div>
                        <form method="post" action="{{ route('customer.register') }}">
                            @csrf
                            <div class="form-group">
                                @if ($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                                <input type="text" required="" class="form-control{{$errors->has('name') ? ' is-invalid' : ''}}" name="name" placeholder="Enter Your Name">
                            </div>
                            <div class="form-group">
                                @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                                <input type="text" required="" class="form-control{{$errors->has('email') ? ' is-invalid' : ''}}" name="email" placeholder="Enter Your Email">
                            </div>
                            <div class="form-group">
                                @if ($errors->has('password'))
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                                <input class="form-control{{$errors->has('password') ? ' is-invalid' : ''}}" required="" type="password" name="password" placeholder="Password">
                            </div>
                            <div class="form-group">
                                @if ($errors->has('retype_password'))
                                    <span class="text-danger">{{ $errors->first('retype_password') }}</span>
                                @endif
                                <input class="form-control{{$errors->has('retype_password') ? ' is-invalid' : ''}}" required="" type="password" name="retype_password" placeholder="Confirm Password">
                            </div>
                            <div class="login_footer form-group">
                                <div class="chek-form">
                                    <div class="custome-checkbox">
                                        <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox2" value="">
                                        <label class="form-check-label" for="exampleCheckbox2"><span>I agree to terms &amp; Policy.</span></label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-fill-out btn-block" name="register">Register</button>
                            </div>
                        </form>
                        <div class="different_login">
                            <span> or</span>
                        </div>
                        <ul class="btn-login list_none text-center">
                            <li><a href="#" class="btn btn-facebook"><i class="ion-social-facebook"></i>Facebook</a></li>
                            <li><a href="#" class="btn btn-google"><i class="ion-social-googleplus"></i>Google</a></li>
                        </ul>
                        <div class="form-note text-center">Already have an account? <a href="login.html">Log in</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END LOGIN SECTION -->
@endsection()



@section('footersection')
    @include('frontend.common.home-footer')
@endsection()
