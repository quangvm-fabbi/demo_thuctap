<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{ trans('setting.title1') }}</title>
    <meta name="description" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/chosen.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/material-design-iconic-font.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/meanmenu.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bundle.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
    @yield('css')
</head>
<body>
<div class="organic_food_wrapper" id="app">
<input type="hidden" value="{{ route('api.cart.addToCart') }}" id="add-to-cart">
<input type="hidden" value="{{ route('api.cart.getCart') }}" id="get-cart">
@include('pages.layouts.header')

@yield('content')
@include('pages.layouts.footer')
</div>
</body>
</html>