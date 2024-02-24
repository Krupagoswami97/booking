@php
    header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");
    header('Content-Type: text/html');

@endphp

<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <noscript>
        <META HTTP-EQUIV="Refresh" CONTENT="0;URL={{ route('js_disabled')}}">
            {{--  Sorry...JavaScript is needed to go ahead. --}}
    </noscript>
    <meta name="description" content="Booking">
    <meta name="keywords" content="Booking">
    <meta name="author" content="Booking">
    <title>Booking - @yield('title')</title>
    <link rel="apple-touch-icon" href="{{  asset('theme/app-assets/images/ico/apple-icon-120.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('media/defaults/symbol.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{  asset('theme/app-assets/vendors/css/vendors.min.css') }}">
    <!-- END: Vendor CSS-->

     <!-- Select2 -->
     <link rel="stylesheet" type="text/css" href="{{ asset('theme/app-assets/vendors/css/forms/select/select2.min.css')}}">
     <!-- Select2 -->

     <!-- Sweet Alert-->
     <link rel="stylesheet" type="text/css" href="{{ asset('theme/app-assets/vendors/css/animate/animate.css')}}">
     <link rel="stylesheet" type="text/css" href="{{ asset('theme/app-assets/vendors/css/extensions/sweetalert2.min.css')}}">
     <!-- Sweet Alert Done-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{  asset('theme/app-assets/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{  asset('theme/app-assets/css/bootstrap-extended.css') }}">
    <link rel="stylesheet" type="text/css" href="{{  asset('theme/app-assets/css/colors.css') }}">
    <link rel="stylesheet" type="text/css" href="{{  asset('theme/app-assets/css/components.css') }}">
    <link rel="stylesheet" type="text/css" href="{{  asset('theme/app-assets/css/themes/dark-layout.css') }}">
    <link rel="stylesheet" type="text/css" href="{{  asset('theme/app-assets/css/themes/bordered-layout.css') }}">
    <link rel="stylesheet" type="text/css" href="{{  asset('theme/app-assets/css/themes/semi-dark-layout.css') }}">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{  asset('theme/app-assets/css/core/menu/menu-types/vertical-menu.css') }}">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{  asset('theme/assets/css/style.css') }}">
    <!-- END: Custom CSS-->

    <!-- BEGIN: Plugin CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('theme/app-assets/vendors/css/extensions/toastr.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('theme/app-assets/css/plugins/extensions/ext-component-toastr.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('theme/app-assets/css/pages/ui-feather.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('theme/app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css') }}">
    <!-- END: Plugin CSS-->

    @yield('css')

    <style>
        .toast-progress {right: 0; left: auto;}

        .dark-box{
            background: #161D31 !important;
        }
        .required:after {
            content:" *";
            color: red;
        }
        .readonly-input{
            background-color: #ffffff !important;
            border: none;
        }
        .dataTables_scrollBody::-webkit-scrollbar-track
        {
            -webkit-box-shadow: inset 0 0 2px rgba(0,0,0,0.3);
            border-radius: 10px;
            background-color: #F5F5F5;
        }

        .dataTables_scrollBody::-webkit-scrollbar
        {
            height: 12px;              /* height of horizontal scrollbar ← You're missing this */
            width: 12px;               /* width of vertical scrollbar */
            background-color: #F5F5F5;
            scroll-behavior: smooth;
        }

        .dataTables_scrollBody::-webkit-scrollbar-thumb
        {
            border-radius: 10px;
            -webkit-box-shadow: inset 0 0 2px rgba(0,0,0,.3);
            background-color: #DAE1E7;
        }

        .dt-search{
            background: transparent;
            color: rgba(0, 0, 0, 0.87);
            font-family: inherit;
            font-size: inherit;
            height: 40px;
            padding-bottom: 8px;
            border-width: 0;
            border-bottom: 2px solid #e2e2e2;
        }

        .custom-bl{ /* break large string and eclipse */
            padding-top: 1mm;
        /*  display: block;
            overflow:hidden;
            text-overflow:ellipsis; */
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }
        .custom-dc{
            height: 12rem;
        }

        .custom-bl:hover{
            overflow: visible;
            white-space: normal;
            height:auto;  /* just added this line */
            z-index: 5;
        }

        .control-label{
            text-transform: capitalize;
        }

        .custom-date{
            background-color: transparent !important;
        }

        .custom-date:disabled {
            background-color: #efefef !important;
        }

        .custmStr {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .custmStr:hover {
            overflow: visible;
        }
    </style>

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern content-left-sidebar navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="content-left-sidebar">

    <!-- BEGIN: Header-->
    @include('layout.navbar')
    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->
    <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item me-auto">
                    <a class="navbar-brand" href="{{ route('main_dashboard') }}">
                        <img src="{{ asset('media/defaults/symbol.png') }}" alt="" srcset="" class="img-responsive" style="height:40px;object-fit:scale-down;">
                        <h2 class="brand-text twtx">Booking</h2>
                    </a>
                <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pe-0" data-bs-toggle="collapse"><i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i><i class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc" data-ticon="disc"></i></a></li>
            </ul>
        </div>
        <div class="shadow-bottom"></div>
        <div class="main-menu-content">
           @include('sidebar.main')
        </div>
    </div>
    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
                @yield('breadcrumbs')
            </div>
            <div class="content-body">
                <!-- Page Content Start -->
                @yield('content')
                <!-- Page Content End -->
            </div>
        </div>
        </div>
    </div>
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
    <footer class="footer footer-static footer-light">
        <p class="clearfix mb-0"><span class="float-md-start d-block d-md-inline-block mt-25">COPYRIGHT &copy; 2021<a class="ms-25" href="https://1.envato.market/pixinvent_portfolio" target="_blank">Pixinvent</a><span class="d-none d-sm-inline-block">, All rights Reserved</span></span><span class="float-md-end d-none d-md-block">Hand-crafted & Made with<i data-feather="heart"></i></span></p>
    </footer>
    <button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>
    <!-- END: Footer-->


    <!-- BEGIN: Vendor JS-->
    <script src="{{ asset('theme/app-assets/vendors/js/vendors.min.js') }}"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset('theme/app-assets/vendors/js/extensions/toastr.min.js') }}"></script>
    <script src="{{ asset('theme/app-assets/vendors/js/forms/select/select2.full.min.js')}}"></script>
    <script src="{{ asset('theme/app-assets/vendors/js/extensions/sweetalert2.all.min.js')}}"></script>
    <script src="{{ asset('theme/app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js') }}"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{ asset('theme/app-assets/js/core/app-menu.js') }}"></script>
    <script src="{{ asset('theme/app-assets/js/core/app.js') }}"></script>
    <!-- END: Theme JS-->


    <script src="{{asset('custom_js/message.js?v='.time())}}"></script>
    <script>
        var api_url = "{{config('app.url')}}/api";
    </script>
    <script>
        function getCurrentFinancialYear() {
            var financial_year = "";
            var today = new Date();
            if ((today.getMonth() + 1) <= 3) {
                financial_year = (today.getFullYear() - 1) + "-" + today.getFullYear()
            } else {
                financial_year = today.getFullYear() + "-" + (today.getFullYear() + 1)
            }
            return financial_year;
        }


        // Prevent Double Submits
        document.querySelectorAll('form').forEach(form => {
            form.addEventListener('submit', (e) => {
                // Prevent if already submitting
                if (form.classList.contains('is-submitting')) {
                    e.preventDefault();
                }
                // Add class to hook our visual indicator on
                form.classList.add('is-submitting');
            });
        });

        $(document).ajaxStart(function () {
            $('button[type="submit"]').prop('disabled', true);
        });
        $(document).ajaxComplete(function () {
            $('button[type="submit"]').prop('disabled', false);
        });



        var api_url = "{{config('app.url')}}/api";
        var token = "{{session('api_token')}}";
        // isset helper function
        var isset = function(variable){
            return typeof(variable) !== "undefined" && variable !== null && variable !== '';
        }
        var empty = function(variable){
            return typeof(variable) == "undefined" || variable == null || variable == '' || isNaN(variable); //isNan For Numeric Value
        }
        /* if (window.history.replaceState) { //
            window.history.replaceState( null, null, window.location.href );
        } */
            /* js function to set date formate dd-mm-yyyy */
            function GetFormatedDate(dt) {
                //startdate.split("-").reverse().join("-"); single line convert in dmy,basically its reverse
                var d = new Date(dt),
                    month = '' + (d.getMonth() + 1),
                    day = '' + d.getDate(),
                    year = d.getFullYear();

                if (month.length < 2) month = '0' + month;
                if (day.length < 2) day = '0' + day;

                return [day, month, year].join('-');
            }
            /*  Basic Select2 select */
            /* $(".select2").each(function () {
                var $this = $(this);
                $this.wrap('<div class="position-relative"></div>');
                $this.select2({

                // the following code is used to disable x-scrollbar when click in select input and
                // take 100% width in responsive also
                dropdownAutoWidth: true,
                width: '100%',
                dropdownParent: $this.parent()
                });
            }); */

            $(".select2").select2({
                width: '100%',
            });

            $('.custom-date').attr("autocomplete", "off");
            $('.custom-date').flatpickr({
                altInput: true,
                altFormat: '{{ config("app.date_format_javascript") }}',
                dateFormat: '{{ config("app.date_format_javascript") }}'
                /* autoclose: true,
                todayHighlight: true,
                altFormat: 'F j, Y',
                dateFormat: '{{ config("app.date_format_javascript") }}',
                orientation: 'bottom',
                todayBtn: 'linked',
                orientation: "auto", */
            });
            /* $('.custom-date').datepick({dateFormat: '{{ config("app.date_format_javascript") }}'}); */
            $("input[type=number]").attr("min","0");
            // $("input[type=number]").keydown(function(e){
            //     if (this.value < 0 || this.value == " ") {
            //         this.value = 0;
            //     }
            //     if (e.keyCode == 69) {
            //         return false;
            //     }
            //     if(e.keyCode == 8 || e.keyCode == 9 || e.keyCode == 37 || e.keyCode == 38 || e.keyCode == 39 || e.keyCode == 40 ){
            //         return true;
            //     }else{
            //         if ($(this).val().length == 10) {
            //             return false;
            //         }
            //     }
            // });

            // for disable future date in birthday field
            $(function() {
                $("#birthdate" ).flatpickr({
                    maxDate: new Date(),
                    altFormat: '{{ config("app.date_format_javascript") }}',
                    dateFormat: '{{ config("app.date_format_javascript") }}'
                });
            });

            token_check();

            function token_check(){
                $.ajax({
                    url: api_url+'/login/auth/check',
                    method: 'post',
                    cache: false,
                    headers: {
                        Authorization : token,
                    },
                    success:function(response)
                    {
                        /* if(response.success == true)
                        {
                            toastr.success(response.message);
                        }
                        else
                        {
                            error_msg(response.message);
                        } */
                    },
                    error: function(jqXHR, textStatus, errorThrown){
                        ajax_error_event(jqXHR);
                    }
                });
            }
            /* $(document).on('click', 'button[type="submit"]', function(e){
                e.preventDefault();
                $(this).prop('disabled', true);
            });
            $(document).on('focusout', 'button[type="submit"]', function(e){
                $(this).prop('disabled', false);
            }); */

            $(document).on('click', '#Logout', function(e){
                e.preventDefault();

                $.ajax({
                    url:  "{{route('logout')}}",
                    method: 'get',
                    contentType: false,
                    cache: false,
                    processData:false,
                    headers: {
                        Authorization : token
                    },
                    success:function(response)
                    {
                        console.log(response);
                        if(response.success == true)
                        {
                            window.location.href = "{{route('login')}}";
                        }
                        else
                        {
                            //Token Expired
                            error_msg("Time Out");
                            window.location.href = "{{route('logout')}}";
                        }

                    },
                    error: function(jqXHR, textStatus, errorThrown){
                        if(jqXHR.status == 401 || jqXHR.status == 500)
                        {
                            window.location.href = "{{route('logout')}}";
                        }
                    }
                });

            });

            function thousands_separators(num)
            {
                var num_parts = num.toString().split(".");
                num_parts[0] = num_parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                return num_parts.join(".");
            }

        $(document).ready(function() {
            $('form:first *:input[type!=hidden]:first').focus(); // focus on first input
            $('body').on('keydown', 'input, select,textarea', function(e) { // enter to focus next
                var self = $(this)
                    , form = self.parents('form:eq(0)')
                    , focusable
                    , next
                    ;
                if (e.keyCode == 13) {
                    focusable = form.find('input,a,select,button,textarea').filter(':visible');
                    next = focusable.eq(focusable.index(this)+1);
                    if (next.length) {
                        next.focus();
                    } else {
                        form.submit();
                    }
                    return false;
                }
            });
            $(document).on('focus', '.select2', function (e) { // single property dropdown opens when focus
                if(!$(this).closest(".select2").siblings('select:enabled').prop('multiple')){
                    $(this).closest(".select2").siblings('select:enabled').select2('open'); // use when select has single input
                }
            });
        });
    </script>

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
        }else{
            $('.nav-link-style .ficon').attr('data-feather','sun');
        }

        window.addEventListener( "pageshow", function ( event ) {
        var historyTraversal = event.persisted ||
                                ( typeof window.performance != "undefined" &&
                                    window.performance.navigation.type === 2 );
            if ( historyTraversal ) {
                // Handle page restore.
                // window.location.reload();
                $('.select2').prop('selectedIndex', function () {
                    var selected = $(this).children('[selected]').index();
                    return selected != -1 ? selected : 0;
                });
            }
        });

    </script>

    @yield('js')


</body>
<!-- END: Body-->

</html>
