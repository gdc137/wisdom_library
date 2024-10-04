<!DOCTYPE html>
<html class="loading" lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Admin</title>

    <!-- Fonts -->
    <!-- <link rel="dns-prefetch" href="//fonts.bunny.net"> -->
    <!-- <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet"> -->


    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="robots" content="NOINDEX,NOFOLLOW" />
    <link rel="apple-touch-icon" href="{{ asset('assets/img/icon-small.pngg') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/icon-small.png') }}">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-app-assets/vendors/css/vendors.min.css') }}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-app-assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-app-assets/css/bootstrap-extended.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-app-assets/css/colors.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-app-assets/css/components.min.css') }}">
    <!-- END: Theme CSS-->

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('admin-app-assets/css/core/menu/menu-types/vertical-menu.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-app-assets/css/plugins/forms/form-validation.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-app-assets/css/pages/authentication.css') }}">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/css/style.css') }}">
    <!-- END: Custom CSS-->
    @vite(['resources/sass/app.scss', 'resources/css/app.css', 'resources/js/app.js'])

    <style>
        .ourlogo {
            width: 100px;
        }
    </style>
</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern blank-page navbar-floating footer-static" data-open="click"
    data-menu="vertical-menu-modern" data-col="blank-page">
    <!-- BEGIN: Content-->
    @yield('content')
    <!-- END: Content-->


    <!-- BEGIN: Vendor JS-->
    <script src="{{ asset('admin-app-assets/vendors/js/vendors.min.js') }}"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset('admin-app-assets/vendors/js/ui/jquery.sticky.js') }}"></script>
    <script src="{{ asset('admin-app-assets/vendors/js/forms/validation/jquery.validate.min.js') }}"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{ asset('admin-app-assets/js/core/app-menu.min.js') }}"></script>
    <script src="{{ asset('admin-app-assets/js/core/app.min.js') }}"></script>
    <!-- END: Theme JS-->
</body>
<!-- END: Body-->

</html>