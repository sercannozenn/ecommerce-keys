@extends('layouts.front')
@section('title', 'Homepage')
@section('css')
@endsection

@section('content')
    <!-- Hero/Intro Slider Start -->
    <div class="section ">
        <div class="hero-slider swiper-container slider-nav-style-1 slider-dot-style-1">
            <!-- Hero slider Active -->
            <div class="swiper-wrapper">
                <!-- Single slider item -->
                <div class="hero-slide-item slider-height swiper-slide d-flex">
                    <div class="container align-self-center">
                        <div class="row">
                            <div class="col-xl-6 col-lg-7 col-md-7 col-sm-7 align-self-center">
                                <div class="hero-slide-content slider-animated-1">
                                    <span class="category">New Products</span>
                                    <h2 class="title-1">Flexible Chair </h2>
                                    <p>Torem ipsum dolor sit amet, consectetur adipisicing elitsed do eiusmo tempor
                                        incididunt ut labore et dolore magna</p>
                                    <a href="#" class="btn btn-lg btn-primary btn-hover-dark mt-5">Shop Now</a>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-5 col-md-5 col-sm-5">
                                <div class="hero-slide-image">
                                    <img src="assets/images/slider-image/slider-1.png" alt=""/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Single slider item -->
                <div class="hero-slide-item slider-height swiper-slide d-flex">
                    <div class="container align-self-center">
                        <div class="row">
                            <div class="col-xl-6 col-lg-7 col-md-7 col-sm-7 align-self-center">
                                <div class="hero-slide-content slider-animated-1">
                                    <span class="category">New Products</span>
                                    <h2 class="title-1">Flexible Chair </h2>
                                    <p>Torem ipsum dolor sit amet, consectetur adipisicing elitsed do eiusmo tempor
                                        incididunt ut labore et dolore magna</p>
                                    <a href="#" class="btn btn-lg btn-primary btn-hover-dark mt-5">Shop Now</a>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-5 col-md-5 col-sm-5">
                                <div class="hero-slide-image">
                                    <img src="assets/images/slider-image/slider-2.png" alt=""/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Add Pagination -->
            <div class="swiper-pagination swiper-pagination-white"></div>
            <!-- Add Arrows -->
            <div class="swiper-buttons">
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>
    </div>

    <!-- Hero/Intro Slider End -->

    <!-- Product Category Start -->
    <div class="section pt-100px pb-100px">
        <div class="container">
            <div class="category-slider swiper-container" data-aos="fade-up">
                <div class="category-wrapper swiper-wrapper">
                    <!-- Single Category -->
                    <div class=" swiper-slide">
                        <a href="shop-left-sidebar.html" class="category-inner ">
                            <div class="category-single-item">
                                <img src="assets/images/icons/1.png" alt="">
                                <span class="title">Office Chair</span>
                            </div>
                        </a>
                    </div>
                    <!-- Single Category -->
                    <div class=" swiper-slide">
                        <a href="shop-left-sidebar.html" class="category-inner ">
                            <div class="category-single-item">
                                <img src="assets/images/icons/2.png" alt="">
                                <span class="title">Book Shelf</span>
                            </div>
                        </a>
                    </div>
                    <!-- Single Category -->
                    <div class=" swiper-slide">
                        <a href="shop-left-sidebar.html" class="category-inner ">
                            <div class="category-single-item">
                                <img src="assets/images/icons/3.png" alt="">
                                <span class="title">Light & Sofa</span>
                            </div>
                        </a>
                    </div>
                    <!-- Single Category -->
                    <div class=" swiper-slide">
                        <a href="shop-left-sidebar.html" class="category-inner ">
                            <div class="category-single-item">
                                <img src="assets/images/icons/4.png" alt="">
                                <span class="title">Reading Table</span>
                            </div>
                        </a>
                    </div>
                    <!-- Single Category -->
                    <div class="swiper-slide">
                        <a href="shop-left-sidebar.html" class="category-inner ">
                            <div class="category-single-item">
                                <img src="assets/images/icons/5.png" alt="">
                                <span class="title">Corner Table</span>
                            </div>
                        </a>
                    </div>
                    <!-- Single Category -->
                </div>
            </div>
        </div>
    </div>

    <!-- Product Category End -->

    <!-- Product tab Area Start -->
    <div class="section product-tab-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center" data-aos="fade-up">
                    <div class="section-title mb-0">
                        <h2 class="title">Our Products</h2>
                        <p class="sub-title mb-6">Torem ipsum dolor sit amet, consectetur adipisicing elitsed do eiusmo
                            tempor incididunt ut labore</p>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($products as $product)
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 mb-6" data-aos="fade-up" data-aos-delay="200">
                        <!-- Single Prodect -->
                        <div class="product">
                            <div class="thumb">
                                <a href="{{ route('product.viewDetail', ['slug' => $product->slug]) }}" class="image">
                                    <img src="{{ asset($product->featureImage->image) }}" alt="{{ $product->product_name }}"/>
                                    <img class="hover-image" src="{{ asset($product->featureImage->image) }}"
                                         alt="{{ $product->product_name }}"/>
                                </a>
                                <span class="badges"><span class="new">{{ $product->category->category_name }}</span></span>
                                <div class="actions">
                                    <a href="#" class="action quickview" data-link-action="quickview" title="Quick view"
                                       data-bs-toggle="modal" data-bs-target="#exampleModal" data-id="{{ $product->product_id }}">
                                        <i class="icon-size-fullscreen"></i>
                                    </a>
                                </div>
                                <button title="Add To Cart" class="add-to-cart" data-id="{{ $product->product_id }}">
                                    Add To Cart
                                </button>
                            </div>
                            <div class="content">
                                <h5 class="title">
                                    <a href="{{ route('product.viewDetail', ['slug' => $product->slug]) }}">
                                        {{ $product->product_name }}
                                    </a>
                                </h5>
                                <span class="price"> <span class="new">{{ $product->price }} ₺</span> </span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Product tab Area End -->

@endsection

@section('js')
@endsection
