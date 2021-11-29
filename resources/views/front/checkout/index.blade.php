@extends('layouts.front')
@section('title', 'Checkout')
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
                            <h2 class="breadcrumb-title">Checkout</h2>
                        </div>
                        <div class="col-lg-6  col-md-6 col-sm-12">
                            <!-- breadcrumb-list start -->
                            <ul class="breadcrumb-list text-center text-md-right">
                                <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                                <li class="breadcrumb-item active">Checkout</li>
                            </ul>
                            <!-- breadcrumb-list end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- breadcrumb-area end -->

    <!-- checkout area start -->
    <form action="{{ route('order') }}" method="POST" id="orderForm">
        @csrf
    <div class="checkout-area pt-100px pb-100px">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="billing-info-wrap">
                        <h3>Billing Details</h3>
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="billing-info mb-4">
                                    <label>Full Name</label>
                                    <input type="text" id="fullname" name="fullname" />
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="billing-info mb-4">
                                    <label>Address</label>
                                    <input class="billing-address" id="address" name="address" placeholder="House number and street name" type="text" />
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="billing-info mb-4">
                                    <label>Email Address</label>
                                    <input type="email" name="email" id="email"/>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <select name="payment_type" class="form-control">
                                    <option>Pay at the door</option>
                                    <option disabled>Credit Card</option>
                                </select>
                            </div>
                        </div>


                    </div>
                </div>
                <div class="col-lg-5 mt-md-30px mt-lm-30px ">
                    <div class="your-order-area">
                        <h3>Your order</h3>
                        <div class="your-order-wrap gray-bg-4">
                            <div class="your-order-product-info">
                                <div class="your-order-top">
                                    <ul>
                                        <li>Products</li>
                                        <li>Total</li>
                                    </ul>
                                </div>
                                <div class="your-order-middle">
                                    <ul>
                                        @php($totalPrice=0.00)
                                        @foreach($cards as $card)
                                            <li><span
                                                    class="order-middle-left">{{ $card->product->product_name }} X 1</span>
                                                <span class="order-price">{{ number_format($card->product->price, 2) }} ₺</span>
                                            </li>
                                            @php($totalPrice+=$card->price_amount)
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="your-order-total">
                                    <ul>
                                        <li class="order-total">Total</li>
                                        <li>{{ number_format($totalPrice, 2) }} ₺</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="Place-order mt-25">
                            <a class="btn-hover" href="javascript:void(0)" id="orderBtn">Order</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>
@endsection

@section('js')
    <script>
        $('#orderBtn').click(function ()
        {
            if ($('#fullname').val().trim().length < 1)
            {
                alert('Full name required');
                return false;
            }
            else if ($('#address').val().trim().length < 1)
            {
                alert('Address required');
                return false;
            }
            else if ($('#email').val().trim().length < 1)
            {
                alert('Email required');
                return false;
            }
            else if (!validateEmail($('#email').val()))
            {
                alert('Type in a valid email address.');
                return false;
            }
            else
            {
                $('#orderForm').submit();
            }
        });

        function validateEmail(email)
        {
            var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return re.test(email);
        }
    </script>
@endsection
