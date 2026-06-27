<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    @php
        $metaTitle = trim($__env->yieldContent('title', 'GEMNAH'));
        $metaDescription = trim($__env->yieldContent('meta_description', 'GEMNAH timeless elegance.'));
        $metaImage = trim($__env->yieldContent('meta_image', asset('frontend/assets/image/index/gemnah-social-logo-preview.png')));
    @endphp
    <title>{{ $metaTitle }}</title>
    <meta name="description" content="{{ $metaDescription }}">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="GEMNAH">
    <meta property="og:title" content="{{ $metaTitle }}">
    <meta property="og:description" content="{{ $metaDescription }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="{{ $metaImage }}">
    <meta property="og:image:secure_url" content="{{ $metaImage }}">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:alt" content="GEMNAH logo">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $metaTitle }}">
    <meta name="twitter:description" content="{{ $metaDescription }}">
    <meta name="twitter:image" content="{{ $metaImage }}">
    <link rel="shortcut icon" type="image/favicon" href="{{ asset('frontend/assets/image/index/favicon.png') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/plugin.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/theme.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/collection.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/blog.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/other.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/gemnah.css') }}?v={{ filemtime(public_path('frontend/assets/css/gemnah.css')) }}">
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
