<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge"/>
    <title>
        @yield('title')
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Add site Favicon -->
    <link rel="icon" href="{{ asset('assets/images/favicon/favicon.png') }}" sizes="32x32"/>
    <link rel="icon" href="{{ asset('assets/images/favicon/favicon.png') }}" sizes="192x192"/>
    <link rel="apple-touch-icon" href="{{ asset('assets/images/favicon/favicon.png') }}"/>
    <meta name="msapplication-TileImage" content="{{ asset('assets/images/favicon/favicon.png') }}"/>
    <!-- Structured Data  -->
    <script type="application/ld+json">
        {
            "@context": "http://schema.org",
            "@type": "WebSite",
            "name": "Replace_with_your_site_title",
            "url": "Replace_with_your_site_URL"
        }

    </script>

    <!-- vendor css (Bootstrap & Icon Font) -->
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/simple-line-icons.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/ionicons.min.css') }}"/>

    <!-- plugins css (All Plugins Files) -->
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/animate.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/swiper-bundle.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/jquery-ui.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/jquery.lineProgressbar.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/nice-select.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/venobox.css') }}"/>

    <!-- Use the minified version files listed below for better performance and remove the files listed above -->
    <!-- <link rel="stylesheet" href="assets/css/vendor/vendor.min.css" />
    <link rel="stylesheet" href="assets/css/plugins/plugins.min.css" />
    <link rel="stylesheet" href="assets/css/style.min.css"> -->

    <!-- Main Style -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}"/>

</head>

<body>
<!-- Header Area start  -->
<div class="header section">

    <!-- Header Bottom  Start -->
    <div class="header-bottom d-none d-lg-block">
        <div class="container position-relative">
            <div class="row align-self-center">
                <!-- Header Logo Start -->
                <div class="col-auto align-self-center">
                    <div class="header-logo">
                        <a href="index.html">
                            <img src="{{ asset('assets/images/logo/logo.png') }}" alt="Site Logo"/>
                        </a>
                    </div>
                </div>
                <!-- Header Logo End -->

                <!-- Header Action Start -->
                <div class="col align-self-center">
                    <div class="header-actions">
                        <div class="header_account_list">
                            <a href="javascript:void(0)" class="header-action-btn search-btn"><i
                                    class="icon-magnifier"></i></a>
                            <div class="dropdown_search">
                                <form class="action-form" action="#">
                                    <input class="form-control" placeholder="Enter your search key" type="text">
                                    <button class="submit" type="submit"><i class="icon-magnifier"></i></button>
                                </form>
                            </div>
                        </div>
                        <!-- Single Wedge Start -->
                        <div class="header-bottom-set dropdown">
                            <button class="dropdown-toggle header-action-btn" data-bs-toggle="dropdown"><i
                                    class="icon-user"></i></button>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li><a class="dropdown-item" href="my-account.html">My account</a></li>
                                <li><a class="dropdown-item" href="checkout.html">Checkout</a></li>
                                <li><a class="dropdown-item" href="login.html">Sign in</a></li>
                            </ul>
                        </div>
                        <!-- Single Wedge End -->
                        <a href="#offcanvas-cart"
                           class="header-action-btn header-action-btn-cart offcanvas-toggle pr-0">
                            <i class="icon-handbag"></i>
                            <span class="header-action-num">01</span>
                            <!-- <span class="cart-amount">€30.00</span> -->
                        </a>
                        <a href="#offcanvas-mobile-menu"
                           class="header-action-btn header-action-btn-menu offcanvas-toggle d-lg-none">
                            <i class="icon-menu"></i>
                        </a>
                    </div>
                </div>
                <!-- Header Action End -->
            </div>
        </div>
    </div>
    <!-- Header Bottom  End -->
    <!-- Header Bottom  Start -->
    <div class="header-bottom d-lg-none sticky-nav bg-white">
        <div class="container position-relative">
            <div class="row align-self-center">
                <!-- Header Logo Start -->
                <div class="col-auto align-self-center">
                    <div class="header-logo">
                        <a href="index.html"><img src="assets/images/logo/logo.png" alt="Site Logo"/></a>
                    </div>
                </div>
                <!-- Header Logo End -->

                <!-- Header Action Start -->
                <div class="col align-self-center">
                    <div class="header-actions">
                        <div class="header_account_list">
                            <a href="javascript:void(0)" class="header-action-btn search-btn"><i
                                    class="icon-magnifier"></i></a>
                            <div class="dropdown_search">
                                <form class="action-form" action="#">
                                    <input class="form-control" placeholder="Enter your search key" type="text">
                                    <button class="submit" type="submit"><i class="icon-magnifier"></i></button>
                                </form>
                            </div>
                        </div>
                        <!-- Single Wedge Start -->
                        <div class="header-bottom-set dropdown">
                            <button class="dropdown-toggle header-action-btn" data-bs-toggle="dropdown"><i
                                    class="icon-user"></i></button>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li><a class="dropdown-item" href="my-account.html">My account</a></li>
                                <li><a class="dropdown-item" href="checkout.html">Checkout</a></li>
                                <li><a class="dropdown-item" href="login.html">Sign in</a></li>
                            </ul>
                        </div>
                        <!-- Single Wedge End -->
                        <a href="#offcanvas-cart"
                           class="header-action-btn header-action-btn-cart offcanvas-toggle pr-0">
                            <i class="icon-handbag"></i>
                            <span class="header-action-num">01</span>
                            <!-- <span class="cart-amount">€30.00</span> -->
                        </a>
                        <a href="#offcanvas-mobile-menu"
                           class="header-action-btn header-action-btn-menu offcanvas-toggle d-lg-none">
                            <i class="icon-menu"></i>
                        </a>
                    </div>
                </div>
                <!-- Header Action End -->
            </div>
        </div>
    </div>
    <!-- Header Bottom  End -->
    <!-- Main Menu Start -->
    <div class="bg-black d-none d-lg-block sticky-nav">
        <div class="container position-relative">
            <div class="row">
                <div class="col-md-12 align-self-center">
                    <div class="main-menu">
                        <ul>
                            <li>
                                <a href="{{ route('index') }}">Home</a>
                            </li>
                            <li><a href="{{ route('products.index') }}">Products</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main Menu End -->
</div>
<!-- Header Area End  -->

<!-- OffCanvas Cart Start -->
<div id="offcanvas-cart" class="offcanvas offcanvas-cart">
    <div class="inner cardInner">
    </div>
</div>
<!-- OffCanvas Cart End -->

<!-- OffCanvas Menu Start -->
<div id="offcanvas-mobile-menu" class="offcanvas offcanvas-mobile-menu">
    <button class="offcanvas-close"></button>
    <div class="inner customScroll">
        <div class="offcanvas-menu mb-4">
            <ul>
                <li><a href="{{ route('index') }}">Home</a></li>
                <li><a href="{{ route('products.index') }}">Products</a></li>
            </ul>
        </div>
        <!-- OffCanvas Menu End -->
    </div>
</div>
<!-- OffCanvas Menu End -->


<div class="offcanvas-overlay"></div>

@yield('content')


<!-- Footer Area Start -->
<div class="footer-area mt-5">
    <div class="footer-container mt-10">
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <!-- Start single blog -->
                    <div class="col-md-6 col-lg-4 mb-md-30px mb-lm-30px" data-aos="fade-up" data-aos-delay="200">
                        <div class="single-wedge">
                            <h4 class="footer-herading">about us</h4>
                            <p class="about-text">Lorem ipsum dolor sit amet cons adipisicing elit sed do eiusm tempor
                                incididunt ut labor et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                            </p>
                            <ul class="link-follow">
                                <li class="li">
                                    <a class="paypal icon-paypal m-0" title="Paypal" href="#"></a>
                                </li>
                                <li class="li">
                                    <a class="tumblr icon-social-tumblr" title="Tumblr" href="#"></a>
                                </li>
                                <li class="li">
                                    <a class="twitter icon-social-twitter" title="Twitter" href="#"></a>
                                </li>
                                <li class="li">
                                    <a class="pinterest icon-social-pinterest" title="Pinterest" href="#"></a>
                                </li>
                                <li class="li">
                                    <a class="linkedin icon-social-linkedin" title="Linkedin" href="#"></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- End single blog -->
                    <!-- Start single blog -->
                    <div class="col-md-6 col-sm-6 col-lg-3 mb-md-30px mb-lm-30px" data-aos="fade-up"
                         data-aos-delay="400">
                        <div class="single-wedge">
                            <h4 class="footer-herading">information</h4>
                            <div class="footer-links">
                                <div class="footer-row">
                                    <ul class="align-items-center">
                                        <li class="li"><a class="single-link" href="about.html">About us</a></li>
                                        <li class="li"><a class="single-link" href="#">Delivery Information</a></li>
                                        <li class="li"><a class="single-link" href="privacy-policy.html">Privacy &
                                                Policy</a></li>
                                        <li class="li"><a class="single-link" href="#">Terms & Condition</a></li>
                                        <li class="li"><a class="single-link" href="#">Manufactures</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End single blog -->
                    <!-- Start single blog -->
                    <div class="col-md-6 col-lg-2 col-sm-6 mb-lm-30px" data-aos="fade-up" data-aos-delay="600">
                        <div class="single-wedge">
                            <h4 class="footer-herading">my account</h4>
                            <div class="footer-links">
                                <div class="footer-row">
                                    <ul class="align-items-center">
                                        <li class="li"><a class="single-link" href="my-account.html">My
                                                Account</a>
                                        </li>
                                        <li class="li"><a class="single-link" href="cart.html">My Cart</a></li>
                                        <li class="li"><a class="single-link" href="login.html">Login</a></li>
                                        <li class="li"><a class="single-link" href="wishlist.html">Wishlist</a></li>
                                        <li class="li"><a class="single-link" href="checkout.html">Checkout</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End single blog -->
                    <!-- Start single blog -->
                    <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="800">
                        <div class="single-wedge">
                            <h4 class="footer-herading">newsletter</h4>
                            <div class="footer-links">
                                <!-- News letter area -->
                                <div id="mc_embed_signup" class="subscribe-form">
                                    <form id="mc-embedded-subscribe-form" class="validate" novalidate="" target="_blank"
                                          name="mc-embedded-subscribe-form" method="post"
                                          action="http://devitems.us11.list-manage.com/subscribe/post?u=6bbb9b6f5827bd842d9640c82&amp;id=05d85f18ef">
                                        <div id="mc_embed_signup_scroll" class="mc-form">
                                            <input class="email" type="email" required="" placeholder="Your Mail*"
                                                   name="EMAIL" value=""/>
                                            <div class="mc-news" aria-hidden="true">
                                                <input type="text" value="" tabindex="-1"
                                                       name="b_6bbb9b6f5827bd842d9640c82_05d85f18ef"/>
                                            </div>
                                            <div class="clear">
                                                <button id="mc-embedded-subscribe" class="button btn-primary"
                                                        type="submit" name="subscribe" value=""><i
                                                        class="icon-cursor"></i> Send Mail
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- News letter area  End -->
                            </div>
                        </div>
                    </div>
                    <!-- End single blog -->
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="row flex-sm-row-reverse">
                    <div class="col-md-6 text-right">
                        <div class="payment-link">
                            <img src="assets/images/icons/payment.png" alt="">
                        </div>
                    </div>
                    <div class="col-md-6 text-left">
                        <p class="copy-text">Copyright © 2021 <a class="company-name" href="https://hasthemes.com/">
                                HasThemes</a>. All Rights Reserved</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer Area End -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">x</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-5 col-sm-12 col-xs-12 mb-lm-30px mb-sm-30px">
                        <!-- Swiper -->
                        <div class="swiper-container gallery-top mb-4">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <img class="img-responsive m-auto" src="assets/images/product-image/1.jpg" alt="">
                                </div>
                                <div class="swiper-slide">
                                    <img class="img-responsive m-auto" src="assets/images/product-image/2.jpg" alt="">
                                </div>
                                <div class="swiper-slide">
                                    <img class="img-responsive m-auto" src="assets/images/product-image/3.jpg" alt="">
                                </div>
                                <div class="swiper-slide">
                                    <img class="img-responsive m-auto" src="assets/images/product-image/4.jpg" alt="">
                                </div>
                                <div class="swiper-slide">
                                    <img class="img-responsive m-auto" src="assets/images/product-image/5.jpg" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="swiper-container gallery-thumbs slider-nav-style-1 small-nav">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <img class="img-responsive m-auto" src="assets/images/product-image/1.jpg" alt="">
                                </div>
                                <div class="swiper-slide">
                                    <img class="img-responsive m-auto" src="assets/images/product-image/2.jpg" alt="">
                                </div>
                                <div class="swiper-slide">
                                    <img class="img-responsive m-auto" src="assets/images/product-image/3.jpg" alt="">
                                </div>
                                <div class="swiper-slide">
                                    <img class="img-responsive m-auto" src="assets/images/product-image/4.jpg" alt="">
                                </div>
                                <div class="swiper-slide">
                                    <img class="img-responsive m-auto" src="assets/images/product-image/5.jpg" alt="">
                                </div>
                            </div>
                            <!-- Add Arrows -->
                            <div class="swiper-buttons">
                                <div class="swiper-button-next"></div>
                                <div class="swiper-button-prev"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7 col-sm-12 col-xs-12">
                        <div class="product-details-content quickview-content">
                            <h2>Originals Kaval Windbr</h2>
                            <p class="reference">Reference:<span> demo_17</span></p>
                            <div class="pro-details-rating-wrap">
                                <div class="rating-product">
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                </div>
                                <span class="read-review"><a class="reviews" href="#">Read reviews (1)</a></span>
                            </div>
                            <div class="pricing-meta">
                                <ul>
                                    <li class="old-price not-cut">$18.90</li>
                                </ul>
                            </div>
                            <p class="quickview-para">Lorem ipsum dolor sit amet, consectetur adipisic elit eiusm tempor
                                incidid ut labore et dolore magna aliqua. Ut enim ad minim venialo quis nostrud
                                exercitation ullamco</p>
                            <div class="pro-details-size-color">
                                <div class="pro-details-color-wrap">
                                    <span>Color</span>
                                    <div class="pro-details-color-content">
                                        <ul>
                                            <li class="blue"></li>
                                            <li class="maroon active"></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="pro-details-quality">
                                <div class="cart-plus-minus">
                                    <input class="cart-plus-minus-box" type="text" name="qtybutton" value="1"/>
                                </div>
                                <div class="pro-details-cart btn-hover">
                                    <button class="add-cart btn btn-primary btn-hover-primary ml-4"> Add To
                                        Cart
                                    </button>
                                </div>
                            </div>
                            <div class="pro-details-wish-com">
                                <div class="pro-details-wishlist">
                                    <a href="wishlist.html"><i class="ion-android-favorite-outline"></i>Add to
                                        wishlist</a>
                                </div>
                                <div class="pro-details-compare">
                                    <a href="compare.html"><i class="ion-ios-shuffle-strong"></i>Add to compare</a>
                                </div>
                            </div>
                            <div class="pro-details-social-info">
                                <span>Share</span>
                                <div class="social-info">
                                    <ul>
                                        <li>
                                            <a href="#"><i class="ion-social-facebook"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="ion-social-twitter"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="ion-social-google"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="ion-social-instagram"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal end -->


<script src="{{ asset('assets/js/vendor/vendor.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/plugins.min.js') }}"></script>

<!-- Main Js -->
<script src="{{ asset('assets/js/main.js') }}"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    initCard();
    function initCard()
    {
        $.ajax({
            url: '{{ route('card.init') }}',
            type: "POST",
            success: function (response)
            {
                $('.cardInner').html(response.card);
            }
        });

    }
    $(document).on('click','body .add-to-cart',function(){
       let productID= $(this).data('id');
        $.ajax({
            url: '{{ route('card.add') }}',
            type: "POST",
            data: {
                productID: productID
            },
            success: function (response)
            {
                $('.cardInner').html(response.card);
                alert('Product add card.');
            }
        });
    });
    $(document).on('click','body .removeCard',function(){

        let cardID= $(this).data('id');
        $.ajax({
            url: '{{ route('card.remove') }}',
            type: "POST",
            data: {
                cardID: cardID
            },
            success: function (response)
            {
                $('.cardInner').html(response.card);
                alert('Product delete card.')
            }
        });
    });

</script>
@yield('js')
</body>

</html>
