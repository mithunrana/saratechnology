<!DOCTYPE html>
<html lang="en">
<head>
<!-- Meta -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">


<!-- SEO RELATED DATA START-->
<title>  @isset($title) {{$title}} @endisset </title>
<meta name="author" content="Mithun Rana">
<meta name="description" content="@isset($metadescription){{$metadescription}}@endisset">
<meta name="keywords" content="@isset($metakeywords){{$metakeywords}}@endisset">
<link rel="shortcut icon" href="{{ $SettingKey['theme_thigo_favicon'] }}" sizes="32x32" />
<link rel="icon" type="image/ico" href="{{ $SettingKey['theme_thigo_favicon'] }}" sizes="192x1922" />

<meta name="fb:app_id" property="fb:app_id" content="308590786521219" />

<meta property="og:url"           content="@php echo url()->current(); @endphp"/>
<meta property="og:title"         content="@isset($title){{$title}}@endisset"/>
<meta property="og:description"   content="@isset($metadescription){{$metadescription}}@endisset" />
<meta property="og:image"         content="@isset($image){{asset('')}}{{$image}}@endisset" />

<meta property="og:image:width"   content="{{ $SettingKey['og_image_width'] }}" />
<meta property="og:image:height"  content="{{ $SettingKey['og_image_height'] }}" />
<!-- SEO RELATED DATA END-->



<!-- Animation CSS -->
<link rel="stylesheet" href="{{asset('')}}frontend/assets/css/animate.css">	
<!-- Latest Bootstrap min CSS -->
<link rel="stylesheet" href="{{asset('')}}frontend/assets/bootstrap/css/bootstrap.min.css">
<!-- Google Font -->
<link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900&display=swap" rel="stylesheet"> 
<link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800,900&display=swap" rel="stylesheet"> 
<!-- Icon Font CSS -->
<link rel="stylesheet" href="{{asset('')}}frontend/assets/css/all.min.css">
<link rel="stylesheet" href="{{asset('')}}frontend/assets/css/ionicons.min.css">
<link rel="stylesheet" href="{{asset('')}}frontend/assets/css/themify-icons.css">
<link rel="stylesheet" href="{{asset('')}}frontend/assets/css/linearicons.css">
<link rel="stylesheet" href="{{asset('')}}frontend/assets/css/flaticon.css">
<link rel="stylesheet" href="{{asset('')}}frontend/assets/css/simple-line-icons.css">
<!--- owl carousel CSS-->
<link rel="stylesheet" href="{{asset('')}}frontend/assets/owlcarousel/css/owl.carousel.min.css">
<link rel="stylesheet" href="{{asset('')}}frontend/assets/owlcarousel/css/owl.theme.css">
<link rel="stylesheet" href="{{asset('')}}frontend/assets/owlcarousel/css/owl.theme.default.min.css">
<!-- Magnific Popup CSS -->
<link rel="stylesheet" href="{{asset('')}}frontend/assets/css/magnific-popup.css">
<!-- jquery-ui CSS -->
<link rel="stylesheet" href="{{asset('')}}frontend/assets/css/jquery-ui.css">
<!-- Slick CSS -->
<link rel="stylesheet" href="{{asset('')}}frontend/assets/css/slick.css">
<link rel="stylesheet" href="{{asset('')}}frontend/assets/css/slick-theme.css">
<!-- Style CSS -->
<link rel="stylesheet" href="{{asset('')}}frontend/assets/css/style.css">
<link rel="stylesheet" href="{{asset('')}}frontend/assets/css/responsive.css">
<link href="{{ asset('defaults/toastr/toastr.min.css') }}" rel="stylesheet" />
</head>

<body>
<!-- LOADER -->
<!--<div class="preloader">
    <div class="lds-ellipsis">
        <span></span>
        <span></span>
        <span></span>
    </div>
</div>-->
<!-- END LOADER -->


<!-- Home Popup Section -->
    @yield('end-screen-popup')
<!-- End Screen Load Popup Section --> 



<!-- START HEADER -->
    <header class="header_wrap fixed-top header_with_topbar">
        @yield('home-header')
        @yield('category-and-menu-section')
    </header>
<!-- END HEADER -->




<!-- START SECTION BANNER -->
    @yield('banner-section')
<!-- END SECTION BANNER -->

<!-- START SECTION BANNER -->
    @yield('bread-crumb')
<!-- END SECTION BANNER -->


<!-- START MAIN CONTENT -->
<div class="main_content">

    @yield('main-content')

    <!-- START PRODUCT VIEW SECTION -->
        @yield('product-view-details')
    <!-- END PRODUCT VIEW SECTION -->


    <!-- START SECTION SHOP -->
        @yield('home-top-categories')
    <!-- END SECTION SHOP -->


    <!-- START SECTION SHOP -->
        @yield('exclusive-product')
    <!-- END SECTION SHOP -->



    <!-- START CATEGORY SECTION BANNER --> 
        @yield('category-banner')
    <!-- END CATEGORY SECTION BANNER --> 

    

    <!-- START SECTION SHOP -->
        @yield('offer-product')
    <!-- END SECTION SHOP -->



    <!-- START SECTION SHOP | Trending Products-->
        @yield('trending-product')
    <!-- END SECTION SHOP -->



    <!-- START SECTION BRAND LOGO -->
        @yield('brand-section')
    <!-- END SECTION CLIENT LOGO -->


    <!-- START SECTION SHOP -->
        @yield('featured-rated-sale-product')
    <!-- END SECTION SHOP -->



    <!-- START SECTION SHOP -->
        @yield('testimonial-section')
    <!-- END SECTION SHOP -->
    

    <!-- START SECTION BLOG  -->
        @yield('home-blog-section')
    <!-- END SECTION BLOG  -->



    <!-- START SECTION SUBSCRIBE NEWSLETTER -->
        @yield('newsletter')
    <!-- START SECTION SUBSCRIBE NEWSLETTER -->
</div>
<!-- END MAIN CONTENT -->



<!-- START FOOTER -->
@yield('footersection')
<!-- END FOOTER -->


<a href="#" class="scrollup" style="display: none;"><i class="ion-ios-arrow-up"></i></a> 

<!-- Latest jQuery --> 
<script src="{{asset('')}}frontend/assets/js/jquery-1.12.4.min.js"></script> 
<!-- jquery-ui --> 
<script src="{{asset('')}}frontend/assets/js/jquery-ui.js"></script>
<!-- popper min js -->
<script src="{{asset('')}}frontend/assets/js/popper.min.js"></script>
<!-- Latest compiled and minified Bootstrap --> 
<script src="{{asset('')}}frontend/assets/bootstrap/js/bootstrap.min.js"></script> 
<!-- owl-carousel min js  --> 
<script src="{{asset('')}}frontend/assets/owlcarousel/js/owl.carousel.min.js"></script> 
<!-- magnific-popup min js  --> 
<script src="{{asset('')}}frontend/assets/js/magnific-popup.min.js"></script> 
<!-- waypoints min js  --> 
<script src="{{asset('')}}frontend/assets/js/waypoints.min.js"></script> 
<!-- parallax js  --> 
<script src="{{asset('')}}frontend/assets/js/parallax.js"></script> 
<!-- countdown js  --> 
<script src="{{asset('')}}frontend/assets/js/jquery.countdown.min.js"></script> 
<!-- imagesloaded js --> 
<script src="{{asset('')}}frontend/assets/js/imagesloaded.pkgd.min.js"></script>
<!-- isotope min js --> 
<script src="{{asset('')}}frontend/assets/js/isotope.min.js"></script>
<!-- jquery.dd.min js -->
<script src="{{asset('')}}frontend/assets/js/jquery.dd.min.js"></script>
<!-- slick js -->
<script src="{{asset('')}}frontend/assets/js/slick.min.js"></script>
<!-- elevatezoom js -->
<script src="{{asset('')}}frontend/assets/js/jquery.elevatezoom.js"></script>
<!-- scripts js --> 
<script src="{{asset('')}}frontend/assets/js/scripts.js"></script>

<!-- Toastr -->
<script src="{{ asset('defaults/toastr/toastr.min.js') }}"></script>

    @yield('customjs')

<script>
    @if (Session::has('message'))
        var type = "{{ Session::get('alert-type', 'info') }}"
        switch (type) {
            case 'info':
                toastr.info("{{ Session::get('message') }}");
                break;
            case 'success':
                toastr.success("{{ Session::get('message') }}");
                break;
            case 'warning':
                toastr.warning("{{ Session::get('message') }}");
                break;
            case 'error':
                toastr.error("{{ Session::get('message') }}");
                break;
        }
    @endif
</script>


<script>
    //header cart
    function headerCart() {
        $.ajax({
            url: "{{ route('header.cart') }}",
            success: function(data) {
                $('.headercart').html(data);
            }
        })
    }

    //page Cart
    function pageCart() {
        $.ajax({
            url: "{{ route('page.cart') }}",
            success: function(data) {
                $('.pagecart').html(data);
            }
        })
    }
</script>



<!-- Add cart -->
<script>
    $(document).on('click', '.btn-addtocart', function(e) {
        e.preventDefault();
        var id = $(this).attr('data-id');
        $.ajax({
            url: "{{ url('/cart/store') }}/" + id,
            method: "GET",
            dataType: "JSON",
            beforeSend: function() {
                $(".ajaxloading").fadeIn();
            },
            success: function(data) {
                headerCart();
                pageCart();
                if ($.isEmptyObject(data.error)) {
                    toastr.success(data.success, 'Success', {
                        timeOut: 3000
                    });
                } else {
                    toastr.error(data.error, {
                        timeOut: 3000
                    });
                }
            },
            complete: function() {
                $(".ajaxloading").fadeOut();
            },
        });
    });
</script>




<!--Qty Inc-->
<script>
    $(document).on('click', '.qtyInc', function(e) {
        e.preventDefault();
        var rowId = $(this).attr('id');
        $.ajax({
            url: "{{ url('/qty/inc') }}/" + rowId,
            method: "GET",
            dataType: "JSON",
            beforeSend: function() {
                $(".ajaxloading").fadeIn();
            },
            success: function(data) {
                headerCart();
                pageCart();
                toastr.success('পণ্যের পরিমাণ আপডেট হয়েছে!', 'Updated', {
                    timeOut: 3000
                });
            },
            complete: function() {
                $(".ajaxloading").fadeOut();
            },
        });
    });
</script>


<!--Qty Dec-->
<script>
    $(document).on('click', '.qtyDec', function(e) {
        e.preventDefault();
        var rowId = $(this).attr('id');
        var qty = $(this).attr('data-qty');
        if (qty<=1) {
            toastr.error('পণ্যের পরিমাণ ১ চেয়ে কম হবে না!', 'Updated', {
                timeOut: 3000
            });
        }else {
            $.ajax({
                url: "{{ url('/qty/dec') }}/" + rowId,
                method: "GET",
                dataType: "JSON",
                beforeSend: function() {
                    $(".ajaxloading").fadeIn();
                },
                success: function(data) {
                    headerCart();
                    pageCart();
                    toastr.success('পণ্যের পরিমাণ আপডেট হয়েছে!', 'Updated', {
                        timeOut: 3000
                    });
                },
                complete: function() {
                    $(".ajaxloading").fadeOut();
                },
            });
        }
    });
</script>


<!--Cart Delete-->
<script>
    $(document).on('click', '.cartdelete', function(e) {
        e.preventDefault();
        var id = $(this).attr('data-id');
        $.ajax({
            url: "{{ url('cart/delete') }}/" + id,
            method: "GET",
            dataType: "JSON",
            type: "DELETE",
            success: function(data) {
                headerCart();
                pageCart();
                toastr.success(data.message, 'Removed', {
                    timeOut: 3000
                });
            },
        });
    });
</script>





<script>
    $(document).ready(function(){
        $('.ratingid').click(function(){
            $('#starvalue').val($(this).attr('data-value'));
        });

        $(".currency_change").change(function(){
            var id = $(this).val();
            $.ajax({
                url: "{{ url('switch-currency') }}/" + id,
                method: "GET",
                dataType: "text",
                type: "DELETE",
                success: function(data) {
                    location.reload();
                },
            });
        });
    });


    @if($SettingKey['theme_thigo_enable_newsletter_popup']=='1')
        $(window).on('load',function(){
            setTimeout(function() {
                $("#onload-popup").modal('show', {}, 500);
            }, {{$SettingKey['theme_thigo_newsletter_show_after_seconds']}});
	    });
    @endif
    


    function switchShipping(){
        $.ajax({
            url: "{{ url('shipping-method-change') }}/",
            method: "GET",
            success: function(data) {
                $('#shipping-method-change').html(data);
            },
        });
    }

    $(document).on('click', '.shippingmethod', function(e) {
        var id = $(this).attr('id');
        $.ajax({
            url: "{{ url('switch-shipping') }}/" + id,
            method: "GET",
            success: function(data) {
                switchShipping();
            },
        });
    });
</script>

</body>
</html>