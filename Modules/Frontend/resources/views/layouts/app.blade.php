<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>@yield('title', 'GEMNAH')</title>
    <meta name="description" content="GEMNAH timeless elegance.">
    <link rel="shortcut icon" type="image/favicon" href="{{ asset('frontend/assets/image/index/favicon.png') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/plugin.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/theme.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/collection.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/blog.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/other.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/gemnah.css') }}">
    @stack('styles')
</head>
<body>
    @include('frontend::partials.preloader')
    @include('frontend::partials.header')

    @yield('content')

    @include('frontend::partials.footer')
    @include('frontend::partials.extras')

    <script src="{{ asset('frontend/assets/js/plugin.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/theme.js') }}"></script>
    @stack('scripts')
</body>
</html>
