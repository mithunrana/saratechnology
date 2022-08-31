@extends('frontend.master')


@section('end-screen-popup')
    @include('frontend.common.subscribe-popup')
@endsection()



@section('home-header')
    @include('frontend.common.home-header')
@endsection()



@section('category-and-menu-section')
    @include('frontend.common.home-category-and-menu')
@endsection()


@section('banner-section')
    @include('frontend.common.home-banner')
@endsection()


@section('exclusive-product')
    @include('frontend.product.home.exclusive-product')
@endsection()


@section('category-banner')
    @include('frontend.product.home.category-bannger')
@endsection()


@section('offer-product')
    @include('frontend.product.home.offer-product')
@endsection()


@section('trending-product')
    @include('frontend.product.home.trending-product')
@endsection()


@section('brand-section')
    @include('frontend.product.home.brand-section')
@endsection()


@section('featured-rated-sale-product')
    @include('frontend.product.home.featured-rated-sale-product')
@endsection()

@section('newsletter')
    @include('frontend.common.newsletter')
@endsection()


@section('footersection')
    @include('frontend.common.home-footer')
@endsection()
