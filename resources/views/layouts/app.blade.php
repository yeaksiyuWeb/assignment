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
    @if(Route::currentRouteName() == 'login.student')
        @include('layouts.studentHeader')
    @elseif(Route::currentRouteName() == 'login.admin')
        @include('layouts.adminHeader')
    @endif
    @if(Auth::guard('student')->check())
        <!-- Student layout -->
        @include('layouts.welcomeheader')
        @include('layouts.studentHeader')
        <!-- LOGO HEADER END-->
        @include('layouts.studentMenubar')
    @elseif(Auth::guard('admin')->check())
        @include('layouts.adminHeader')
        @include('layouts.adminMenubar')
    @endif

    <!-- MENU SECTION END-->
    <div id="app">
        <main class="py-4">
            @yield('content')
        </main>
    </div>

    @if(Auth::guard('student')->check() || Route::currentRouteName() == 'login.student')
        @include('layouts.studentFooter')
    @elseif(Auth::guard('admin')->check() || Route::currentRouteName() == 'login.admin')
        @include('layouts.adminFooter')
    @endif
</body>
<!-- <script src="/js/app.js"></script> -->
</html>
