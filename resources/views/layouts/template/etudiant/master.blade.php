<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title')</title>
         <!-- Favicons -->
        <link href="welcome_assets/img/favicon.png" rel="icon">
        <link href="welcome_assets/img/apple-touch-icon.png" rel="apple-touch-icon">


    <!-- Prevent the demo from appearing in search engines -->
    <meta name="robots" content="noindex">

    <!-- Prevent the demo from appearing in search engines -->
    <meta name="robots" content="noindex">

    <!-- Perfect Scrollbar -->
    <link type="text/css" href="{{asset('assets/vendor/perfect-scrollbar.css')}}" rel="stylesheet">

    <!-- Fix Footer CSS -->
    <link type="text/css" href="{{asset('assets/vendor/fix-footer.css')}}" rel="stylesheet">

    <!-- Material Design Icons -->
    <link type="text/css" href="{{asset('assets/css/material-icons.css')}}" rel="stylesheet">
    <link type="text/css" href="{{asset('assets/css/material-icons.rtl.css')}}" rel="stylesheet">

    <!-- Font Awesome Icons -->
    <link type="text/css" href="{{asset('assets/css/fontawesome.css')}}" rel="stylesheet">
    <link type="text/css" href="{{asset('assets/css/fontawesome.rtl.css')}}" rel="stylesheet">

    <!-- Preloader -->
    <link type="text/css" href="{{asset('assets/css/preloader.css')}}" rel="stylesheet">
    <link type="text/css" href="{{asset('assets/css/preloader.rtl.css')}}" rel="stylesheet">

    <!-- App CSS -->
    <link type="text/css" href="{{asset('assets/css/app.css')}}" rel="stylesheet">
    <link type="text/css" href="{{asset('assets/css/app.rtl.css')}}" rel="stylesheet">

</head>

<body class="layout-navbar-mini-fixed-bottom">
    @include('layouts.template.preload')

    @include('sweetalert::alert')

    <!-- Page Layout -->
    <div class="mdk-header-layout js-mdk-header-layout">

        <!-- Navtop Layout -->

        @include('layouts.template.etudiant.navtop')

        <!-- // END Navtop Layout -->

        @yield('content_page')

        <!-- Layout Content -->

        <!-- // END Layout Content -->
    </div>
    <!-- // END Page Layout -->

    <!-- jQuery -->
    <script src="{{asset('assets/vendor/jquery.min.js')}}"></script>

    <!-- Bootstrap -->
    <script src="{{asset('assets/vendor/popper.min.js')}}"></script>
    <script src="{{asset('assets/vendor/bootstrap.min.js')}}"></script>

    <!-- Perfect Scrollbar -->
    <script src="{{asset('assets/vendor/perfect-scrollbar.min.js')}}"></script>

    <!-- DOM Factory -->
    <script src="{{asset('assets/vendor/dom-factory.js')}}"></script>

    <!-- MDK -->
    <script src="{{asset('assets/vendor/material-design-kit.js')}}"></script>

    <!-- Fix Footer -->
    <script src="{{asset('assets/vendor/fix-footer.js')}}"></script>

    <!-- Chart.js -->
    <script src="{{asset('assets/vendor/Chart.min.js')}}"></script>

    <!-- App JS -->
    <script src="{{asset('assets/js/app.js')}}"></script>

    <!-- Highlight.js -->
    <script src="{{asset('assets/js/hljs.js')}}"></script>

    <!-- App Settings (safe to remove) -->
    <script src="{{asset('assets/js/app-settings.js')}}"></script>

    <!-- Global Settings -->
    <script src="{{asset('assets/js/settings.js')}}"></script>

    <!-- Moment.js -->
    <script src="{{asset('assets/vendor/moment.min.js')}}"></script>
    <script src="{{asset('assets/vendor/moment-range.min.js')}}"></script>

    <!-- Chart.js -->
    <script src="{{asset('assets/vendor/Chart.min.js')}}"></script>

    <!-- Charts JS -->
    <script src="{{asset('assets/js/chartjs.js')}}"></script>

    <!-- Chart.js Samples -->
    <script src="{{asset('assets/js/page.student-dashboard.js')}}"></script>

    @yield('script')

</body>

</html>
