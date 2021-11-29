@extends('layouts.front')
@section('title', 'Login Register')
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
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item active">Login</li>
                            </ul>
                            <!-- breadcrumb-list end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- breadcrumb-area end -->

    <!-- login area start -->
    <div class="login-register-area pt-100px pb-100px">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-12 ml-auto mr-auto">
                    <div class="login-register-wrapper">
                        <div class="login-register-tab-list nav">
                            <a class="active" data-bs-toggle="tab" href="#lg1">
                                <h4>login</h4>
                            </a>
                            <a data-bs-toggle="tab" href="#lg2">
                                <h4>register</h4>
                            </a>
                            <a href="{{ route('withoutRegister') }}" >
                                <h4 class="text-warning">Continue Without Registration</h4>
                            </a>
                        </div>
                        <div class="tab-content">
                            <div id="lg1" class="tab-pane active">
                                <div class="login-form-container">
                                    <div class="login-register-form">
                                        <form action="#" method="post">
                                            <input type="text" name="user-name" placeholder="Username" />
                                            <input type="password" name="user-password" placeholder="Password" />
                                            <div class="button-box">
                                                <div class="login-toggle-btn">
                                                    <input type="checkbox" />
                                                </div>
                                                <button type="submit"><span>Login</span></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div id="lg2" class="tab-pane">
                                <div class="login-form-container">
                                    <div class="login-register-form">
                                        <form action="#" method="post">
                                            <input type="text" name="user-name" placeholder="Username" />
                                            <input type="password" name="user-password" placeholder="Password" />
                                            <input name="user-email" placeholder="Email" type="email" />
                                            <div class="button-box">
                                                <button type="submit"><span>Register</span></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- login area end -->

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
