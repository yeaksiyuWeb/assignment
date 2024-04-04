<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
    <!-- Bootstrap Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <!-- Additional Custom CSS -->
    <link href="{{ asset('css/customCSS.css') }}" rel="stylesheet">
</head>
<body>
    <!--Will need to change later to handle auth tokens-->
    @if(session('studName'))
        <!-- Student layout -->
        @include('layouts.welcomeheader')
        @include('layouts.studentHeader')
        <!-- LOGO HEADER END-->
        @include('layouts.studentMenubar')
        {{-- @if(Auth->check())
            @include('layouts.studentMenubar')
        @endif --}}
    @elseif(session('adminName') || true)
        @include('layouts.adminHeader')
        @include('layouts.adminMenubar')
        {{-- @if(Auth->check())
            @include('layouts.adminMenubar')
        @endif --}}
    @endif
    <!-- MENU SECTION END-->
    <div id="app">
        <main class="py-4">
            @yield('content')
        </main>
    </div>

    @if(session('studName'))
        @include('layouts.studentFooter')
    @elseif(session('adminName') || true)
        @include('layouts.adminFooter')
    @endif
</body>
<!-- <script src="/js/app.js"></script> -->
</html>
