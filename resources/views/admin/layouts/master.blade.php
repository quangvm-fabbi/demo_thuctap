<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <link rel="icon" type="image/png" href="{{ asset(config('setting.font_image.ico')) }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <title>{{ trans('setting.title1') }}</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport'/>
    <meta name="viewport" content="width=device-width"/>
    <link href="{{ asset('admin_bower/css/bootstrap.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('admin_bower/css/animate.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('admin_bower/css/light-bootstrap-dashboard.css?v=1.4.0') }}" rel="stylesheet"/>
    <link href="{{ asset('admin_bower/css/demo.css') }}" rel="stylesheet"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('admin_bower/css/pe-icon-7-stroke.css') }}" rel="stylesheet"/>
    @yield('css')
</head>
<body>
<div class="wrapper" id="app">
    @include('admin.layouts.sidebar')
    <div class="main-panel">
        @include('admin.layouts.header')
        @yield('content')
        @include('admin.layouts.footer')
    </div>
</div>
</body>
    <script src="{{ asset('admin_bower/js/jquery.3.2.1.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin_bower/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin_bower/js/chartist.min.js') }}"></script>
    <script src="{{ asset('admin_bower/js/bootstrap-notify.js') }}"></script>
    <script src="{{ asset('admin_bower/js/light-bootstrap-dashboard.js?v=1.4.0') }}"></script>
    <script src="{{ asset('admin_bower/js/demo.js') }}"></script>
    <script src="{{ asset('admin_bower/js/custom.js') }}"></script>
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>

    @yield('js')
</html>
