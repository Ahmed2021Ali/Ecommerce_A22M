<!-- layouts/master.blade.php -->
<!DOCTYPE html>
<html class="no-js" lang="ar">
<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="A&M Store">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:title" content="A&M Store">
    <meta property="og:type" content="A&M Store">
    <meta property="og:url" content="A&M Store">
    <meta property="og:image" content="A&M Store">
    <meta name="keywords" content="متجر الكتروتي"/>
    @include('userDashboard.layouts.headCSS')
    @yield('css')
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-5HMP26MM');</script>
    <!-- End Google Tag Manager -->
</head>

<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5HMP26MM"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
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
