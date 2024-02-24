<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="description" content="Booking">
    <meta name="keywords" content="Booking">
    <meta name="author" content="Booking">
    <title>Login - {{ config('app.name') }}</title>

    <link rel="apple-touch-icon" href="{{ asset('media/defaults/favicon/apple-icon-120x120.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('media/defaults/symbol.png') }}">

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('theme/app-assets/vendors/css/vendors.min.css') }}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('theme/app-assets/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('theme/app-assets/css/bootstrap-extended.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('theme/app-assets/css/colors.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('theme/app-assets/css/components.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('theme/app-assets/css/themes/dark-layout.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('theme/app-assets/css/themes/bordered-layout.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('theme/app-assets/css/themes/semi-dark-layout.css') }}">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('theme/app-assets/css/core/menu/menu-types/vertical-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('theme/app-assets/css/plugins/forms/form-validation.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('theme/app-assets/css/pages/authentication.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('theme/app-assets/vendors/css/extensions/toastr.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('theme/app-assets/css/plugins/extensions/ext-component-toastr.css') }}">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('theme/assets/css/style.css')}}">
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern blank-page navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="blank-page">
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <div class="auth-wrapper auth-basic px-2">
                    <div class="auth-inner my-2">
                        <!-- Login basic -->
                        <div class="card mb-0">
                            <div class="card-body">
                                <a href="javascript:void(0)" class="brand-logo">
                                    <img src="{{ asset('media/defaults/logo.png') }}" alt="" class="img-responsive" id="Logo">
                                    {{-- <h2 class="brand-text text-primary ms-1">Vuexy</h2> --}}
                                </a>

                                <h4 class="card-title mb-1">Welcome to Booking! 👋</h4>
                                <p class="card-text mb-2">Please sign-in to your account and start the adventure</p>
                                <form class="auth-login-form mt-2" id="login_form">
                                    <div class="mb-1">
                                        <label for="login-email" class="form-label">Email</label>
                                        <span class="error invalid-feedback email_error"></span>
                                        <input type="text" class="form-control email" id="email" name="email" placeholder="john@example.com" aria-describedby="login-email" tabindex="1" autofocus />
                                        <span class="error invalid-feedback email_error"></span>
                                    </div>

                                    <div class="mb-1">
                                        <div class="d-flex justify-content-between">
                                            <label class="form-label" for="login-password">Password</label>
                                        </div>
                                        <div class="input-group input-group-merge form-password-toggle password" >
                                            <input type="password" class="form-control form-control-merge  password" id="password" name="password" tabindex="2" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="login-password" />
                                            <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                                            <span class="error invalid-feedback password_error"></span>
                                        </div>
                                    </div>
                                    {{-- <div class="mb-1">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="remember-me" tabindex="3" />
                                            <label class="form-check-label" for="remember-me"> Remember Me </label>
                                        </div>
                                    </div> --}}
                                    <button class="btn btn-primary w-100" tabindex="4">
                                        <span class="txt">Login</span>
                                        <div class="spinner-border spinner-border-sm d-none" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>
                                    </button>
                                </form>

                                <div class="divider my-2">
                                    {{-- <div class="divider-text">or</div> --}}
                                </div>

                                <p class="text-center mt-2">
                                    <span>Already have an account?</span>
                                    <a href="{{ route('register') }}">
                                        <span>Sign Up instead</span>
                                    </a>
                                </p>

                                <div class="auth-footer-btn d-flex justify-content-center">
                                   {{--  <a href="#" class="btn btn-facebook">
                                        <i data-feather="facebook"></i>
                                    </a>
                                    <a href="#" class="btn btn-twitter white">
                                        <i data-feather="twitter"></i>
                                    </a>
                                    <a href="#" class="btn btn-google">
                                        <i data-feather="mail"></i>
                                    </a>
                                    <a href="#" class="btn btn-github">
                                        <i data-feather="github"></i>
                                    </a> --}}
                                </div>
                            </div>
                        </div>
                        <!-- /Login basic -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Content-->


    <!-- BEGIN: Vendor JS-->
    <script src="{{ asset('theme/app-assets/vendors/js/vendors.min.js') }}"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset('theme/app-assets/vendors/js/forms/validation/jquery.validate.min.js') }}"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{ asset('theme/app-assets/js/core/app-menu.js') }}"></script>
    <script src="{{ asset('theme/app-assets/js/core/app.js') }}"></script>
    <script src="{{ asset('theme/app-assets/vendors/js/extensions/toastr.min.js') }}"></script>
    <!-- END: Theme JS-->
    <!-- BEGIN: Page JS-->
    {{-- <script src="{{asset('theme/app-assets/vendors/js/extensions/sweetalert2.all.min.js')}}"></script> --}}
    <script src="{{asset('custom_js/message.js')}}"></script>
    <script>
        var url = "{{config('app.url')}}";

        $(document).on('submit', '#login_form', function(e){
            e.preventDefault();
            $('.is-invalid').removeClass('is-invalid');
            $('.error').html('');
            $.ajax({
                url: url+"/api/login",
                method: 'POST',
                data : $(this).serialize(),
                beforeSend: function(){
                    $(".spinner-border").removeClass('d-none');
                    $(".txt").hide();
                },
                success:function(response)
                {
                    console.log(response);
                    if(response.success == true)
                    {
                        store_token_session(response);
                        // if(response.results.user.is_admin == '1')
                        // {

                        // }
                        // else
                        // {
                        //     error_msg("You are not admin");
                        // }
                    }
                    else
                    {

                        error_msg(response.message);
                    }
                },
                error: function(jqXHR, textStatus, errorThrown){
                    ajax_error_event(jqXHR);
                },
                complete: function(){
                    $(".spinner-border").addClass('d-none');
                    $(".txt").show();
                }
            });
        });
        function store_token_session(response)
        {
            $.ajax({
                url: "{{route('do_login')}}",
                method: 'post',
                data : {'_token':"{{ csrf_token() }}", user_token:response.results.token, user:response.results.user},
                beforeSend: function(){
                    $(".spinner-border").removeClass('d-none');
                    $(".txt").hide();
                },
                success:function(response)
                {
                    console.log(response);
                    if(response.success == true)
                    {
                        if(response.success == true)
                        {
                            // success_msg(response.message);

                                window.location.href = "{{route('main_dashboard')}}";

                        }
                    }
                    else
                    {
                        error_msg(response.message);
                    }
                },
                error: function(jqXHR, textStatus, errorThrown){
                    console.log(jqXHR);
                    ajax_error_event(jqXHR);
                },
                complete: function(){
                    $(".spinner-border").addClass('d-none');
                    $(".txt").show();
                }
            });
        }

    </script>
    <!-- END: Page JS-->

    <script>
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        })

        $('html').addClass(localStorage.getItem('light-layout-current-skin'));
        if(localStorage.getItem('light-layout-current-skin') == 'light-layout'){
            $('.nav-link-style .ficon').attr('data-feather','moon');
            $('#Logo').attr('src',"{{ asset('media/defaults/logo.png') }}");
        }else{
            $('.nav-link-style .ficon').attr('data-feather','sun');
            $('#Logo').attr('src',"{{ asset('media/defaults/logo.png') }}");
        }

    </script>
</body>
<!-- END: Body-->

</html>
