<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8" />

    <title>Visen | Login</title>

    <!-- Site favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/backend/src/images/fav.png') }}" />
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/backend/src/images/fav.png') }}" />
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/backend/src/images/fav.png') }}" />

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="content">
    <meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet" />

    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/backend/vendors/styles/core.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/backend/vendors/styles/icon-font.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/backend/src/plugins/jquery-steps/jquery.steps.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/backend/vendors/styles/style.css') }}" />

    <!-- Toaster CSS / JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
</head>

<body class="login-page">
    <div class="login-header box-shadow">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <div class="brand-logo">
                <a href="{{ route('admin.login') }}">
                    <img src="{{ asset('assets/backend/src/images/visen-logo.jpg') }}" alt="" style="height: 80% !important; width:60px !important;" />
                </a>
            </div>
            {{-- <div class="login-menu">
                <ul>
                    <li><a href="{{ route('admin.login') }}">Login</a></li>
                </ul>
            </div> --}}
        </div>
    </div>
    <div class="register-page-wrap d-flex align-items-center flex-wrap justify-content-center">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 col-lg-7">
                    <img src="{{ asset('assets/backend/vendors/images/login-page-img.png') }}" alt="" />
                </div>
                <div class="col-md-6 col-lg-5">
                    <div class="login-box bg-white box-shadow border-radius-10">
                        <div class="text-center p-2">
                            <img src="{{ asset('assets/backend/src/images/visen-logo.jpg') }}" alt="" style="height: 80px !important; width:60px !important;"/>
                        </div>
                        <h4 class="text-center text-primary">Login</h4>
                        <form method="POST" action="{{ route('admin.login.store') }}" content="{{ csrf_token() }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group mb-2">
                                <label class="form-control-label"><b>Email Id : <span class="text-danger">*</span></b></label>
                               <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus placeholder="Enter Email Id">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group mb-2">
                                <label class="form-control-label"><b>Password : <span class="text-danger">*</span></b></label>
                                <div class="pass-group">
                                    <input id="password" type="password" class="form-control pass-input @error('password') is-invalid @enderror" name="password" autocomplete="current-password" placeholder="Enter Password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <input class="form-check-input" type="hidden" name="remember_token" id="remember_token" value="true">
                            <br>
                            <button class="btn btn-lg btn-block btn-primary w-100" type="submit">Login</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- js -->
    <script src="{{ asset('assets/backend/vendors/scripts/core.js') }}"></script>
    <script src="{{ asset('assets/backend/vendors/scripts/script.min.js') }}"></script>
    <script src="{{ asset('assets/backend/vendors/scripts/process.js') }}"></script>
    <script src="{{ asset('assets/backend/vendors/scripts/layout-settings.js') }}"></script>
    <script src="{{ asset('assets/backend/src/plugins/jquery-steps/jquery.steps.js') }}"></script>
    <script src="{{ asset('assets/backend/vendors/scripts/steps-setting.js') }}"></script>

    <script>
        @if(Session::has('message'))
        toastr.options =
        {
            "positionClass": "toast-top-right",
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"

        }
                toastr.success("{{ session('message') }}");
        @endif

        @if(Session::has('error'))
        toastr.options =
        {
            "positionClass": "toast-top-right",
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
                toastr.error("{{ session('error') }}");
        @endif

        @if(Session::has('info'))
        toastr.options =
        {
            "positionClass": "toast-top-right",
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
                toastr.info("{{ session('info') }}");
        @endif

        @if(Session::has('warning'))
        toastr.options =
        {
            "positionClass": "toast-top-right",
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
                toastr.warning("{{ session('warning') }}");
        @endif
    </script>
</body>

</html>
