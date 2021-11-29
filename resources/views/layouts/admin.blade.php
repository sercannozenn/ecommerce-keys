<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>
        @yield('title')
    </title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/logo/favicon.png') }}">

    <!-- page css -->
    <link href="{{ asset('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css') }}" rel="stylesheet">
    @yield('css')

    <!-- Core css -->
    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet">
</head>

<body>
<div class="app">
    <div class="layout">
        <!-- Header START -->
        <div class="header">
            <div class="logo logo-dark">
                <a href="{{ route('admin.index') }}">
                    <img src="{{ asset('assets/images/logo/logo.png') }}" alt="Logo">
                    <img class="logo-fold" src="{{ asset('assets/images/logo/logo-fold.png') }}" alt="Logo">
                </a>
            </div>
            <div class="logo logo-white">
                <a href="{{ route('admin.index') }}">
                    <img src="assets/images/logo/logo-white.png" alt="Logo">
                    <img class="logo-fold" src="assets/images/logo/logo-fold-white.png" alt="Logo">
                </a>
            </div>
            <div class="nav-wrap">
                <ul class="nav-left">
                    <li class="desktop-toggle">
                        <a href="javascript:void(0);">
                            <i class="anticon"></i>
                        </a>
                    </li>
                    <li class="mobile-toggle">
                        <a href="javascript:void(0);">
                            <i class="anticon"></i>
                        </a>
                    </li>

                </ul>
                <ul class="nav-right">
                    <li class="dropdown dropdown-animated scale-left">
                        <div class="pointer" data-toggle="dropdown">
                            <div class="avatar avatar-image  m-h-10 m-r-15">
                                <img src="{{ asset('assets/images/avatars/thumb-3.jpg') }}"  alt="">
                            </div>
                        </div>
                        <div class="p-b-15 p-t-20 dropdown-menu pop-profile">
                            <div class="p-h-20 p-b-15 m-b-10 border-bottom">
                                <div class="d-flex m-r-50">
                                    <div class="avatar avatar-lg avatar-image">
                                        <img src="{{ asset('assets/images/avatars/thumb-3.jpg') }}" alt="">
                                    </div>
                                    <div class="m-l-10">
                                        <p class="m-b-0 text-dark font-weight-semibold">Marshall Nichols</p>
                                        <p class="m-b-0 opacity-07">UI/UX Desinger</p>
                                    </div>
                                </div>
                            </div>

                            <a href="javascript:void(0);" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                               class="dropdown-item d-block p-h-15 p-v-10">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div>
                                        <i class="anticon opacity-04 font-size-16 anticon-logout"></i>
                                        <span class="m-l-10">Logout</span>
                                    </div>
                                    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <!-- Header END -->

        <!-- Side Nav START -->
        <div class="side-nav">
            <div class="side-nav-inner">
                <ul class="side-nav-menu scrollable">
                    <li class="nav-item dropdown open">
                        <a class="dropdown-toggle" href="{{ route('admin.index') }}">
                                <span class="icon-holder">
                                    <i class="anticon anticon-dashboard"></i>
                                </span>
                            <span class="title">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="dropdown-toggle" href="javascript:void(0);">
                                <span class="icon-holder">
                                    <i class="anticon anticon-appstore"></i>
                                </span>
                            <span class="title">E-commerce</span>
                            <span class="arrow">
                                    <i class="arrow-icon"></i>
                                </span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="{{ route('admin.products.index') }}">Products</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.products.create') }}">Products Add</a>
                            </li>
                        </ul>
                    </li>

                </ul>
            </div>
        </div>
        <!-- Side Nav END -->

        <!-- Page Container START -->
        <div class="page-container">

            <!-- Content Wrapper START -->
            <div class="main-content">
                @yield('content')
            </div>
            <!-- Content Wrapper END -->

            <!-- Footer START -->
            <footer class="footer">
                <div class="footer-content">
                    <p class="m-b-0">Copyright © {{ date('Y') }} Sercan Özen. All rights reserved.</p>
                </div>
            </footer>
            <!-- Footer END -->

        </div>
        <!-- Page Container END -->

    </div>
</div>

<div class="notification-toast top-right" id="notification-toast"></div>

<!-- Core Vendors JS -->
<script src="{{ asset('assets/js/vendors.min.js') }}"></script>

<!-- page js -->
<script src="{{ asset('assets/vendors/chartjs/Chart.min.js') }}"></script>
<script src="{{ asset('assets/js/pages/dashboard-e-commerce.js') }}"></script>
@yield('js')

<!-- Core JS -->
<script src="{{ asset('assets/js/app.min.js') }}"></script>
<script>
    @if (session()->has('result'))
    showToast();
    function showToast() {
        var toastHTML = `@include('components.elements.toaster')`;
        $('#notification-toast').append(toastHTML)
        $('#notification-toast .toast').toast('show');
        setTimeout(function(){
            $('#notification-toast .toast:first-child').remove();
        }, 10000);
    }
    @endif
</script>
</body>

</html>
