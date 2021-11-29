@extends('layouts.front')
@section('title', $product->product_name)
@section('css')
@endsection

@section('content')
    <!-- breadcrumb-area start -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row breadcrumb_box  align-items-center">
                        <div class="col-lg-6 col-md-6 col-sm-12 text-center text-md-left">
                            <h2 class="breadcrumb-title">Shop</h2>
                        </div>
                        <div class="col-lg-6  col-md-6 col-sm-12">
                            <!-- breadcrumb-list start -->
                            <ul class="breadcrumb-list text-center text-md-right">
                                <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Shop</a></li>
                                <li class="breadcrumb-item active">Product Details</li>
                            </ul>
                            <!-- breadcrumb-list end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- breadcrumb-area end -->

    <!-- Product Details Area Start -->
    <div class="product-details-area pt-100px pb-100px">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-sm-12 col-xs-12 mb-lm-30px mb-md-30px mb-sm-30px">
                    <!-- Swiper -->
                    <div class="swiper-container zoom-top">
                        <div class="swiper-wrapper">
                            @foreach($product->images as $image)
                                <div class="swiper-slide zoom-image-hover">
                                    <img class="img-responsive m-auto" src="{{ asset($image->image) }}" alt="{{ $product->product_name }}">
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="swiper-container zoom-thumbs slider-nav-style-1 small-nav mt-3 mb-3">
                        <div class="swiper-wrapper">
                            @foreach($product->images as $image)
                                <div class="swiper-slide">
                                    <img class="img-responsive m-auto" src="{{ asset($image->image) }}" alt="{{ $product->product_name }}">
                                </div>
                            @endforeach
                        </div>
                        <!-- Add Arrows -->
                        <div class="swiper-buttons">
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 col-sm-12 col-xs-12" data-aos="fade-up" data-aos-delay="200">
                    <div class="product-details-content quickview-content">
                        <h2>{{ $product->product_name }}</h2>
                        <p class="reference">Reference:<span> {{ $product->product_code }}</span></p>

                        <div class="pricing-meta">
                            <ul>
                                <li class="old-price not-cut">{{ $product->price }} ₺</li>
                            </ul>
                        </div>
                        <p class="quickview-para">
                            {!! $product->product_short_description !!}
                        </p>
                        <div class="pro-details-quality">
                            <div class="cart-plus-minus">
                                <input class="cart-plus-minus-box" type="text" name="quantity" value="1" maxL="{{ $product->quantity }}" />
                            </div>
                            <div class="pro-details-cart">
                                <button class="add-cart btn btn-primary btn-hover-primary ml-4" href="#">
                                    Add To Cart
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- product details description area start -->
    <div class="description-review-area pb-100px" data-aos="fade-up" data-aos-delay="200">
        <div class="container">
            <div class="description-review-wrapper">
                <div class="description-review-topbar nav">
                    <a data-bs-toggle="tab" href="#des-details1">Description</a>
                </div>
                <div class="tab-content description-review-bottom">
                    <div id="des-details2" class="tab-pane active">
                        <div class="product-anotherinfo-wrapper">
                            {!! $product->product_description !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- product details description area end -->

@endsection

@section('js')
@endsection
