<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Katen - Minimal Blog & Magazine HTML Theme">

        <title>Laravel</title>
        <base href="{{asset('')}}">
        
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="shortcut icon" type="image/x-icon" href="user_asset/images/favicon.png">
    
        <!-- STYLES -->
        <link rel="stylesheet" href="user_asset/css/bootstrap.min.css" type="text/css" media="all">
        <link rel="stylesheet" href="user_asset/css/all.min.css" type="text/css" media="all">
        <link rel="stylesheet" href="user_asset/css/slick.css" type="text/css" media="all">
        <link rel="stylesheet" href="user_asset/css/simple-line-icons.css" type="text/css" media="all">
        <link rel="stylesheet" href="user_asset/css/style.css" type="text/css" media="all">

    </head>
    <body>
        {{-- <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif     
            </div> --}}
        <!-- preloader -->
{{-- <div id="preloader">
	<div class="book">
		<div class="inner">
			<div class="left"></div>
			<div class="middle"></div>
			<div class="right"></div>
		</div>
		<ul>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
		</ul>
	</div>
</div> --}}


<div class="site-wrapper">
	<div class="main-overlay"></div>
     {{-- header --}}
    @include('layouts.header')
	{{-- content --}}
	@yield('contents')
	{{-- footer --}}
     @include('layouts.footer')
</div>

@include('layouts.menu')

<!-- JAVA SCRIPTS -->
<script src="user_asset/js/jquery.min.js"></script>
<script src="user_asset/js/popper.min.js"></script>
<script src="user_asset/js/bootstrap.min.js"></script>
<script src="user_asset/js/slick.min.js"></script>
<script src="user_asset/js/jquery.sticky-sidebar.min.js"></script>
<script src="user_asset/js/custom.js"></script>
    </body>
</html>
