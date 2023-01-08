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
<div class="login_register_wrap section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-md-10">
                <div class="login_wrap">
            		<div class="padding_eight_all bg-white">
                        <div class="heading_s1">
                            <h3 style="text-align:center">Mail Verification</h3>
                        </div>
                        <form method="POST" action="{{ route('customer.verification.send') }}" id="contact-form" class="default-form">
                            <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                <p style="font-size: 14px;text-align:center">
                                    Thanks for signing up! Before getting started, could you verify your email address by clicking on 
                                    the link we just emailed to you? If you didn't receive the email, we will gladly send you another.
                                </p>

                                <p style="font-size: 14px;color:black;font-weight:bold;text-align:center;margin-top:10px;">
                                    PLEASE CHECK YOUR MAIL INBOX OR SPAM FOLDER VERIFY YOUR MAIL ADDRESS
                                </p>

                                @if(Session::has('message'))
                                    <div class="alert alert-success alert-dismissible">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        {{Session::get('message')}}
                                    </div>
                                @endif
                            </div>
                            @csrf 
                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 col-sm-12 form-group message-btn">
                                    <button style="width: 100%;" class="btn btn-fill-out btn-block" type="submit" name="submit-form">Resend Verification Email</button>
                                </div>
                            </div>
                        </form>
                        <div class="different_login">
                            <span> or</span>
                        </div>
                        <ul class="btn-login list_none text-center">
                            <li><a href="{{route('customer.logout')}}"  class="btn btn-fill-out btn-block">Logout</a></li>
                        </ul>
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
