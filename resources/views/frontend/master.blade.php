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
<link rel="shortcut icon" type="image/x-icon" href="frontend/assets/images/favicon.png">
<!-- Animation CSS -->
<link rel="stylesheet" href="frontend/assets/css/animate.css">	
<!-- Latest Bootstrap min CSS -->
<link rel="stylesheet" href="frontend/assets/bootstrap/css/bootstrap.min.css">
<!-- Google Font -->
<link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900&display=swap" rel="stylesheet"> 
<link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800,900&display=swap" rel="stylesheet"> 
<!-- Icon Font CSS -->
<link rel="stylesheet" href="frontend/assets/css/all.min.css">
<link rel="stylesheet" href="frontend/assets/css/ionicons.min.css">
<link rel="stylesheet" href="frontend/assets/css/themify-icons.css">
<link rel="stylesheet" href="frontend/assets/css/linearicons.css">
<link rel="stylesheet" href="frontend/assets/css/flaticon.css">
<link rel="stylesheet" href="frontend/assets/css/simple-line-icons.css">
<!--- owl carousel CSS-->
<link rel="stylesheet" href="frontend/assets/owlcarousel/css/owl.carousel.min.css">
<link rel="stylesheet" href="frontend/assets/owlcarousel/css/owl.theme.css">
<link rel="stylesheet" href="frontend/assets/owlcarousel/css/owl.theme.default.min.css">
<!-- Magnific Popup CSS -->
<link rel="stylesheet" href="frontend/assets/css/magnific-popup.css">
<!-- Slick CSS -->
<link rel="stylesheet" href="frontend/assets/css/slick.css">
<link rel="stylesheet" href="frontend/assets/css/slick-theme.css">
<!-- Style CSS -->
<link rel="stylesheet" href="frontend/assets/css/style.css">
<link rel="stylesheet" href="frontend/assets/css/responsive.css">

</head>

<body>

<!-- LOADER -->
<div class="preloader">
    <div class="lds-ellipsis">
        <span></span>
        <span></span>
        <span></span>
    </div>
</div>
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




<!-- START MAIN CONTENT -->
<div class="main_content">


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
<div class="section bg_default small_pt small_pb">
	<div class="custom-container">	
    	<div class="row align-items-center">	
            <div class="col-md-6">
            	<div class="newsletter_text text_white">
                    <h3>Join Our Newsletter Now</h3>
                    <p> Register now to get updates on promotions. </p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="newsletter_form2 rounded_input">
                    <form>
                        <input type="text" required="" class="form-control" placeholder="Enter Email Address">
                        <button type="submit" class="btn btn-dark btn-radius" name="submit" value="Submit">Subscribe</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- START SECTION SUBSCRIBE NEWSLETTER -->

</div>
<!-- END MAIN CONTENT -->

<!-- START FOOTER -->
<footer class="bg_gray">
	<div class="footer_top small_pt pb_20">
        <div class="custom-container">
            <div class="row">
                <div class="col-lg-4 col-md-12 col-sm-12">
                	<div class="widget">
                        <div class="footer_logo">
                            <a href="#"><img src="frontend/assets/images/logo_dark.png" alt="logo"/></a>
                        </div>
                        <p class="mb-3">If you are going to use of Lorem Ipsum need to be sure there isn't anything hidden of text</p>
                        <ul class="contact_info">
                            <li>
                                <i class="ti-location-pin"></i>
                                <p>123 Street, Old Trafford, NewYork, USA</p>
                            </li>
                            <li>
                                <i class="ti-email"></i>
                                <a href="mailto:info@sitename.com">info@sitename.com</a>
                            </li>
                            <li>
                                <i class="ti-mobile"></i>
                                <p>+ 457 789 789 65</p>
                            </li>
                        </ul>
                    </div>
        		</div>
                <div class="col-lg-2 col-md-4 col-sm-6">
                	<div class="widget">
                        <h6 class="widget_title">Useful Links</h6>
                        <ul class="widget_links">
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">FAQ</a></li>
                            <li><a href="#">Location</a></li>
                            <li><a href="#">Affiliates</a></li>
                            <li><a href="#">Contact</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6">
                	<div class="widget">
                        <h6 class="widget_title">My Account</h6>
                        <ul class="widget_links">
                            <li><a href="#">My Account</a></li>
                            <li><a href="#">Discount</a></li>
                            <li><a href="#">Returns</a></li>
                            <li><a href="#">Orders History</a></li>
                            <li><a href="#">Order Tracking</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                	<div class="widget">
                        <h6 class="widget_title">Instagram</h6>
                        <ul class="widget_instafeed instafeed_col4">
                            <li><a href="#"><img src="frontend/assets/images/insta_img1.jpg" alt="insta_img"><span class="insta_icon"><i class="ti-instagram"></i></span></a></li>
                            <li><a href="#"><img src="frontend/assets/images/insta_img2.jpg" alt="insta_img"><span class="insta_icon"><i class="ti-instagram"></i></span></a></li>
                            <li><a href="#"><img src="frontend/assets/images/insta_img3.jpg" alt="insta_img"><span class="insta_icon"><i class="ti-instagram"></i></span></a></li>
                            <li><a href="#"><img src="frontend/assets/images/insta_img4.jpg" alt="insta_img"><span class="insta_icon"><i class="ti-instagram"></i></span></a></li>
                            <li><a href="#"><img src="frontend/assets/images/insta_img5.jpg" alt="insta_img"><span class="insta_icon"><i class="ti-instagram"></i></span></a></li>
                            <li><a href="#"><img src="frontend/assets/images/insta_img6.jpg" alt="insta_img"><span class="insta_icon"><i class="ti-instagram"></i></span></a></li>
                            <li><a href="#"><img src="frontend/assets/images/insta_img7.jpg" alt="insta_img"><span class="insta_icon"><i class="ti-instagram"></i></span></a></li>
                            <li><a href="#"><img src="frontend/assets/images/insta_img8.jpg" alt="insta_img"><span class="insta_icon"><i class="ti-instagram"></i></span></a></li>
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
                            <div class="col-md-4">	
                                <div class="icon_box icon_box_style2">
                                    <div class="icon">
                                        <i class="flaticon-shipped"></i>
                                    </div>
                                    <div class="icon_box_content">
                                    	<h5>Free Delivery</h5>
                                        <p>Phasellus blandit massa enim elit of passage varius nunc.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">	
                                <div class="icon_box icon_box_style2">
                                    <div class="icon">
                                        <i class="flaticon-money-back"></i>
                                    </div>
                                    <div class="icon_box_content">
                                    	<h5>30 Day Returns Guarantee</h5>
                                        <p>Phasellus blandit massa enim elit of passage varius nunc.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">	
                                <div class="icon_box icon_box_style2">
                                    <div class="icon">
                                        <i class="flaticon-support"></i>
                                    </div>
                                    <div class="icon_box_content">
                                    	<h5>27/4 Online Support</h5>
                                        <p>Phasellus blandit massa enim elit of passage varius nunc.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bottom_footer border-top-tran">
        <div class="custom-container">
            <div class="row">
                <div class="col-lg-4">
                    <p class="mb-lg-0 text-center">© 2020 All Rights Reserved by Bestwebcreator</p>
                </div>
                <div class="col-lg-4 order-lg-first">
                    <div class="widget mb-lg-0">
                        <ul class="social_icons text-center text-lg-left">
                            <li><a href="#" class="sc_facebook"><i class="ion-social-facebook"></i></a></li>
                            <li><a href="#" class="sc_twitter"><i class="ion-social-twitter"></i></a></li>
                            <li><a href="#" class="sc_google"><i class="ion-social-googleplus"></i></a></li>
                            <li><a href="#" class="sc_youtube"><i class="ion-social-youtube-outline"></i></a></li>
                            <li><a href="#" class="sc_instagram"><i class="ion-social-instagram-outline"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                    <ul class="footer_payment text-center text-lg-right">
                        <li><a href="#"><img src="frontend/assets/images/visa.png" alt="visa"></a></li>
                        <li><a href="#"><img src="frontend/assets/images/discover.png" alt="discover"></a></li>
                        <li><a href="#"><img src="frontend/assets/images/master_card.png" alt="master_card"></a></li>
                        <li><a href="#"><img src="frontend/assets/images/paypal.png" alt="paypal"></a></li>
                        <li><a href="#"><img src="frontend/assets/images/amarican_express.png" alt="amarican_express"></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- END FOOTER -->

<a href="#" class="scrollup" style="display: none;"><i class="ion-ios-arrow-up"></i></a> 

<!-- Latest jQuery --> 
<script src="frontend/assets/js/jquery-1.12.4.min.js"></script> 
<!-- popper min js -->
<script src="frontend/assets/js/popper.min.js"></script>
<!-- Latest compiled and minified Bootstrap --> 
<script src="frontend/assets/bootstrap/js/bootstrap.min.js"></script> 
<!-- owl-carousel min js  --> 
<script src="frontend/assets/owlcarousel/js/owl.carousel.min.js"></script> 
<!-- magnific-popup min js  --> 
<script src="frontend/assets/js/magnific-popup.min.js"></script> 
<!-- waypoints min js  --> 
<script src="frontend/assets/js/waypoints.min.js"></script> 
<!-- parallax js  --> 
<script src="frontend/assets/js/parallax.js"></script> 
<!-- countdown js  --> 
<script src="frontend/assets/js/jquery.countdown.min.js"></script> 
<!-- imagesloaded js --> 
<script src="frontend/assets/js/imagesloaded.pkgd.min.js"></script>
<!-- isotope min js --> 
<script src="frontend/assets/js/isotope.min.js"></script>
<!-- jquery.dd.min js -->
<script src="frontend/assets/js/jquery.dd.min.js"></script>
<!-- slick js -->
<script src="frontend/assets/js/slick.min.js"></script>
<!-- elevatezoom js -->
<script src="frontend/assets/js/jquery.elevatezoom.js"></script>
<!-- scripts js --> 
<script src="frontend/assets/js/scripts.js"></script>
</body>
</html>