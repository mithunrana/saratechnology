<!DOCTYPE html>
<html lang="en">
<head>
<!-- Meta -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="Anil z" name="author">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="Shopwise is Powerful features and You Can Use The Perfect Build this Template For Any eCommerce Website. The template is built for sell Fashion Products, Shoes, Bags, Cosmetics, Clothes, Sunglasses, Furniture, Kids Products, Electronics, Stationery Products and Sporting Goods.">
<meta name="keywords" content="ecommerce, electronics store, Fashion store, furniture store,  bootstrap 4, clean, minimal, modern, online store, responsive, retail, shopping, ecommerce store">

<!-- SITE TITLE -->
<title>Shopwise - eCommerce Bootstrap 4 HTML Template</title>
<!-- Favicon Icon -->
<link rel="shortcut icon" type="image/x-icon" href="{{asset('')}}frontend/assets/images/favicon.png">
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
<header class="header_wrap">
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

    @yield('product-view-details')

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
    /*
       //Header Cart Item
        function headerCartItem() {
            $.ajax({
                url: "{{ url('/drop/cart') }}",
                success: function(data) {
                    $('.dropCart').html(data);
                }
            })
        }*/

    //page Cart
    function pageCart() {
        $.ajax({
            url: "{{ url('/page/cart') }}",
            success: function(data) {
                $('.pageCart').html(data);
            }
        })
    }
    //pageCart();


    //Cart Count
    function cartCount() {
        $.ajax({
            url: "{{ url('/cart/count') }}",
            success: function(data) {
                $('.cartQty').html(data);
            }
        })
    }
    //cartCount();

    //Cart total
    function cartTotal() {
        $.ajax({
            url: "{{ url('/cart/total') }}",
            success: function(data) {
                $('.cartTotal').html(data);
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
                //cartCount();
                //cartTotal();
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
        var id = $(this).attr('id');
        $.ajax({
            url: "{{ url('cart/delete') }}/" + id,
            method: "GET",
            dataType: "JSON",
            type: "DELETE",
            success: function(data) {
                toastr.success('পণ্যটি কার্ট থেকে মুছে ফেলা হয়েছে !', 'Removed', {
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
    });

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