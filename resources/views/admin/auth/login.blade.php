<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Enlink - Admin Dashboard Template</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/logo/favicon.png') }}">

    <!-- page css -->

    <!-- Core css -->
    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet">

</head>

<body>
<div class="app">
    <div class="container-fluid p-h-0 p-v-20 bg full-height d-flex" style="background-image: url('assets/images/others/login-3.png')">
        <div class="d-flex flex-column justify-content-between w-100">
            <div class="container d-flex h-100">
                <div class="row align-items-center w-100">
                    <div class="col-md-7 col-lg-5 m-h-auto">
                        <div class="card shadow-lg">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between m-b-30">
                                    <img class="img-fluid" alt="" src="{{ asset('assets/images/logo/logo.png') }}">
                                    <h2 class="m-b-0">Sign In</h2>
                                </div>
                                <form action="" method="POST">
                                    @csrf
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul style="list-style: none;">
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <div class="form-group">
                                        <label class="font-weight-semibold" for="email">Email:</label>
                                        <div class="input-affix">
                                            <i class="prefix-icon fa fa-envelope"></i>
                                            <input name="email" type="text" class="form-control" id="email" placeholder="Email"
                                                   value="{{ old('email') }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="font-weight-semibold" for="password">Password:</label>
                                        <a class="float-right font-size-13 text-muted" href="javascript:void(0)">Forget Password?</a>
                                        <div class="input-affix m-b-10">
                                            <i class="prefix-icon fa fa-lock"></i>
                                            <input name="password" type="password" class="form-control" id="password" placeholder="Password">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="d-flex align-items-center justify-content-between">
                                                <span class="font-size-13 text-muted">
                                                    Don't have an account?
                                                    <a class="small" href=""> Signup</a>
                                                </span>
                                            <button class="btn btn-primary">Sign In</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-none d-md-flex p-h-40 justify-content-between">
                <span class="">© {{ date('Y') }} Sercan Özen</span>
            </div>
        </div>
    </div>
</div>


<!-- Core Vendors JS -->
<script src="{{ asset('assets/js/vendors.min.js') }}"></script>

<!-- page js -->

<!-- Core JS -->
<script src="{{ asset('assets/js/app.min.js') }}"></script>

</body>

</html>
