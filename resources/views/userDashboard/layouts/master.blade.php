<!-- layouts/master.blade.php -->
<!DOCTYPE html>
<html class="no-js" lang="ar">
<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:title" content="">
    <meta property="og:type" content="">
    <meta property="og:url" content="">
    <meta property="og:image" content="">
    @include('userDashboard.layouts.headCSS')
    @yield('css')
</head>

<body>
    @include('userDashboard.layouts.mainHeader')

    <main class="main">
        @livewireStyles
        @yield('content')
        @livewireScripts
    </main>
    @include('userDashboard.layouts.footer')
    @include('userDashboard.layouts.footerScripts')
    @yield('js')
</body>
</html>
