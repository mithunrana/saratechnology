@extends('frontend.master')


@section('end-screen-popup')
    @include('frontend.common.subscribe-popup')
@endsection()


@section('home-header')
    @include('frontend.common.home-header')
@endsection()


@section('category-and-menu-section')
    @include('frontend.common.category-and-menu')
@endsection()


@section('banner-section')
    @include('frontend.common.home-banner')
@endsection()


@section('home-top-categories')
    @include('frontend.home.home-top-categories')
@endsection()


@section('exclusive-product')
    @include('frontend.home.exclusive-product')
@endsection()


@section('category-banner')
    @include('frontend.home.home-first-three-column-banner')
@endsection()


@section('offer-product')
    @include('frontend.home.offer-product')
@endsection()



@section('trending-product')
    @include('frontend.home.trending-product')
@endsection()


@section('brand-section')
    @include('frontend.home.brand-section')
@endsection()


@section('featured-rated-sale-product')
    @include('frontend.home.featured-rated-sale-product')
@endsection()


@section('testimonial-section')
    @include('frontend.home.testimonial')
@endsection()


@section('newsletter')
    @include('frontend.common.newsletter')
@endsection()


@section('home-blog-section')
    @include('frontend.home.home-blog')
@endsection()


@section('footersection')
    @include('frontend.common.home-footer')
@endsection()
