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
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item active">Product Detail</li>
                </ol>
            </div>
        </div>
    </div><!-- END CONTAINER-->
</div>
<!-- END SECTION BREADCRUMB -->
@endsection()


@section('main-content')
<div class="login_register_wrap section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-md-10">
                <div class="login_wrap">
            		<div class="padding_eight_all bg-white">
                        <div class="heading_s1">
                            <h3>Login</h3>
                        </div>
                        <form action="{{ route('customer.login.store') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <span class="text-danger">@error('email'){{ $message }}@enderror</span>
                                <input type="text" required="" value="{{old('email')}}" class="form-control" name="email" placeholder="Your Email">
                            </div>
                            <div class="form-group">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <input class="form-control" required="" type="password" name="password" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-fill-out btn-block" name="login">Log in</button>
                            </div>
                        </form>
                        <div class="different_login">
                            <span> or</span>
                        </div>
                        <ul class="btn-login list_none text-center">
                            <li><a href="#" class="btn btn-facebook"><i class="ion-social-facebook"></i>Facebook</a></li>
                            <li><a href="#" class="btn btn-google"><i class="ion-social-googleplus"></i>Google</a></li>
                        </ul>
                        <div class="form-note text-center">Don't Have an Account? <a href="signup.html">Sign up now</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection()




@section('footersection')
    @include('frontend.common.home-footer')
@endsection()
