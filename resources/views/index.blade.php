<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Katen - Minimal Blog & Magazine HTML Theme">

    <title>Laravel</title>
    <base href="{{ asset('') }}">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="user_asset/images/favicon.png">
    <link href="{{ asset('admin_asset/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">

    <!-- STYLES -->
    <link rel="stylesheet" href="user_asset/css/bootstrap.min.css" type="text/css" media="all">
    <link rel="stylesheet" href="user_asset/css/all.min.css" type="text/css" media="all">
    <link rel="stylesheet" href="user_asset/css/slick.css" type="text/css" media="all">
    <link rel="stylesheet" href="user_asset/css/simple-line-icons.css" type="text/css" media="all">
    <link rel="stylesheet" href="user_asset/css/style.css" type="text/css" media="all">
    <script src="ckeditor/ckeditor.js"></script>
    <script src="ckfinder/ckfinder.js"></script>
    @stack('styles')
    <style>
        .instagram {
            line-height: 2;
        }

        .form-inputs {
            position: relative;
        }

        .form-inputs i {
            position: absolute;
            right: 10px;
            top: 14px
        }

    </style>




</head>

<body>
    <div class="site-wrapper">
        <div class="main-overlay"></div>
        {{-- header --}}
        @include('layouts.header')
        {{-- content --}}
        @yield('contents')
        {{-- footer --}}
        {{-- @include('layouts.footer') --}}
    </div>

    @include('layouts.menu')

    <!-- JAVA SCRIPTS -->
    <script src="user_asset/js/jquery.min.js"></script>
    <script src="user_asset/js/popper.min.js"></script>
    <script src="user_asset/js/bootstrap.min.js"></script>
    <script src="user_asset/js/slick.min.js"></script>
    <script src="user_asset/js/jquery.sticky-sidebar.min.js"></script>
    <script src="user_asset/js/custom.js"></script>
    @yield('scripts')
    @yield('js')
</body>
@stack('footers')

</html>
