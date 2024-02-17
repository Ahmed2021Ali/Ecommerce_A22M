<!-- layouts/master.blade.php -->
<!DOCTYPE html>
<html class="no-js" lang="ar">
<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="A&m Store">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:title" content="A&m Store">
    <meta property="og:type" content="A&m Store">
    <meta property="og:url" content="A&m Store">
    <meta property="og:image" content="A&m Store">
    @include('userDashboard.layouts.headCSS')
    @yield('css')
</head>

<body>
    @include('userDashboard.layouts.mainHeader')

    <main class="main">
        @livewireStyles
        @if(!isset($sliders))
        <div class="page-header breadcrumb-wrap" style="direction: rtl; text-align:right">
            <div class="container">
                <div class="breadcrumb">
                    <a href="{{route('home')}}" rel="nofollow">الصفحة الرئيسية</a>
                    <span></span>  @yield('pageHeader')
                </div>
            </div>
        </div>
        @endif
        @yield('content')
        @livewireScripts
    </main>
    @include('userDashboard.layouts.footer')
    @include('userDashboard.layouts.footerScripts')
    @yield('js')
</body>
</html>
