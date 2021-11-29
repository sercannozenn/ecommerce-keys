@extends('layouts.front')
@section('title', 'Products')
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
                            <h2 class="breadcrumb-title">Products</h2>
                        </div>
                        <div class="col-lg-6  col-md-6 col-sm-12">
                            <!-- breadcrumb-list start -->
                            <ul class="breadcrumb-list text-center text-md-right">
                                <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                                <li class="breadcrumb-item active">Products</li>
                            </ul>
                            <!-- breadcrumb-list end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb-area end -->

    <!-- Shop Category pages -->
    <div class="shop-category-area pb-100px pt-70px">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 order-lg-last col-md-12 order-md-first">
                    <!-- Shop Top Area Start -->
                    <div class="shop-top-bar d-flex">
                        <!-- Left Side start -->
                        <p>There Are {{ $products->count() }} Products.</p>
                        <!-- Left Side End -->
                        <!-- Right Side Start -->
                        <div class="select-shoing-wrap d-flex align-items-center">
                            <div class="shot-product">
                                <p>Sort By:</p>
                            </div>
                            <form action="" id="productSort">
                                <input type="hidden" name="sort" id="prSort">
                            </form>
                                <div class="shop-select">
                                    <select class="shop-sort">
                                        <option data-display="Relevance">Relevance</option>
                                        <option value="asc" {{ request()->get('sort') == 'asc' ? 'selected' : '' }}> Name, A to Z</option>
                                        <option value="desc" {{ request()->get('sort') == 'desc' ? 'selected' : '' }}> Name, Z to A</option>
                                        <option value="ascPrice" {{ request()->get('sort') == 'ascPrice' ? 'selected' : '' }}> Price, low to high</option>
                                        <option value="descPrice" {{ request()->get('sort') == 'descPrice' ? 'selected' : '' }}> Price, high to low</option>
                                    </select>
                                </div>

                        </div>
                        <!-- Right Side End -->
                    </div>
                    <!-- Shop Top Area End -->

                    <!-- Shop Bottom Area Start -->
                    <div class="shop-bottom-area">

                        <div class="row">
                            @foreach($products as $product)
                                <div class="col-lg-4  col-md-6 col-sm-6 col-xs-6" data-aos="fade-up" data-aos-delay="200">
                                    <!-- Single Prodect -->
                                    <div class="product mb-5">
                                        <div class="thumb">
                                            <a href="{{ route('product.viewDetail', ['slug' => $product->slug]) }}" class="image">
                                                <img src="{{ asset($product->featureImage->image) }}" alt="{{ $product->product_name }}" />
                                                <img class="hover-image" src="{{ asset($product->featureImage->image) }}" alt="{{ $product->product_name }}" />
                                            </a>
                                            <span class="badges">
                                                <span class="new">{{ $product->category->category_name }}</span>
                                            </span>
                                            <div class="actions">
                                                <a href="#" class="action quickview" data-link-action="quickview"
                                                   title="Quick view" data-bs-toggle="modal" data-id="{{ $product->product_id }}"
                                                   data-bs-target="#exampleModal">
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
                                            <span class="price">
                                                <span class="new">{{ $product->price }} ₺</span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <!--  Pagination Area Start -->
                        <div class="pro-pagination-style text-center mb-md-30px mb-lm-30px mt-6" data-aos="fade-up">
                            {{ $products->links('vendor.pagination.front-paginate') }}
                        </div>
                        <!--  Pagination Area End -->
                    </div>
                    <!-- Shop Bottom Area End -->
                </div>
                <!-- Sidebar Area Start -->
                <div class="col-lg-3 order-lg-first col-md-12 order-md-last mb-md-60px mb-lm-60px">
                    <div class="shop-sidebar-wrap">
                        <!-- Sidebar single item -->
                        <div class="sidebar-widget">
                            <div class="main-heading">
                                <h3 class="sidebar-title">Category</h3>
                            </div>
                            <div class="sidebar-widget-category">
                                <ul>
                                    @foreach($categories as $category)
                                        <li>
                                            <a href="#" class="selected">{{ $category->category_name }}
                                                <span>{{ $category->products()->count() }}</span>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>


@endsection

@section('js')
    <script>
        $('span.current').bind('DOMSubtreeModified', function(){
            let sortType = document.querySelector('.nice-select >.list > li.selected').getAttribute('data-value');
            $('#prSort').val(sortType);
            $('#productSort').submit();

        });
    </script>
@endsection
