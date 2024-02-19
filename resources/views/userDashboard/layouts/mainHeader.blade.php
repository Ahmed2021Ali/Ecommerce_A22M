<header class="header-area header-style-1 header-height-2">

    <div class="header-top header-top-ptb-1 d-none d-lg-block">
        <div class="container" style="direction: rtl; text-align: right;">
            <div class="row align-items-center"></div>
            <div class="col-xl-3 col-lg-4">
                <div class="header-info header-info-right">
                    @guest
                        <ul>
                            <li><i class="fi-rs-key"></i><a href="{{ route('signin.view.form') }}">تسجيل دخول</a> / <a href="{{ route('signup.view.form') }}">إنشاء حساب</a></li>
                        </ul>
                    @endguest
                </div>
            </div>
        </div>
    </div>

    <div class="header-middle header-middle-ptb-1 d-none d-lg-block">
        <div class="container">
            <div class="header-wrap">
                <div class="header-right">

                    <a href="{{route('home')}}"><img src="{{URL::asset('assets/imgs/logo/Picsart_24-02-16_18-01-27-786.png')}}" alt="A22M Logo" style="width: 88px"></a>

                    {{-- Search Icons--}}
                    <div class="search-style-1" style="direction: rtl; text-align: right;">
                        <form action="{{ route('search') }}" method="GET">
                            <div style="display: flex; align-items: center;">
                                <button type="submit" style="background: none; border: none; padding: 0; margin: 0; cursor: pointer;"><i class="fas fa-search fa-lg" style="margin-right: 8px; padding: 13px 11px 11px 18px;"></i></button>
                                <!-- Input with placeholder on the right -->
                                <input required type="text" name="search" style="direction: rtl; text-align: right; flex: 1;" placeholder="بحث">
                            </div>
                        </form>
                    </div>

                    {{-- Fav and Cart Icons--}}
                    @auth
                    <div class="header-action-right">
                            <div class="header-action-2">
                                <div class="header-action-icon-2">
                                    <a href="{{ route('fav.index') }}">
                                        <img class="svgInject" alt="Surfside Media"
                                             src="{{ URL::asset('assets/imgs/theme/icons/icon-heart.svg') }}">
                                        <span class="pro-count blue">{{Auth::user()->favs()->count()}}</span>
                                    </a>
                                </div>
                                <div class="header-action-icon-2">
                                    <a class="mini-cart-icon" href="{{route('cart.index')}}">
                                        <img alt="Surfside Media"
                                             src="{{ URL::asset('assets/imgs/theme/icons/icon-cart.svg') }}">
                                        <span class="pro-count blue">{{Auth::user()->carts()->count()}}</span>
                                    </a>
                                    <x-view-cart-home-page/>
                                </div>
                            </div>
                    </div>
                    @endauth

                </div>
            </div>
        </div>
    </div>

    <div class="header-bottom header-bottom-bg-color sticky-bar" style="direction: rtl; text-align: right;">
        <div class="container">
            <div class="header-wrap header-space-between position-relative">

                {{-- Navbar --}}
                <div class="header-nav d-none d-lg-flex">
                    <div class="main-menu main-menu-padding-1 main-menu-lh-2 d-none d-lg-block">
                        <nav>
                            <ul class="menu-list">
                                <li><a class="active" href="{{ route('home') }}"><i style="font-size: 25px"
                                                                                    class="fas fa-home fa-lg"></i>
                                        الصفحة الرئيسية</a></li>
                                <li><a href="#about-us"><i class="fas fa-info-circle fa-lg"></i> تعرف علينا</a></li>
                                <li><a href="{{ route('products.index') }}"><i class="fas fa-shopping-cart fa-lg"></i>
                                        تصفح المنتجات</a></li>
                                <li class="position-static"><a href="#"><i class="fas fa-cubes fa-lg"></i> منتجاتنا <i
                                            class="fi-rs-angle-down"></i></a>
                                    <x-categories/>
                                </li>
                                <li><a href="{{url('contact-us/index')}}"><i class="fas fa-comments"></i> تواصل معنا</a>
                                </li>
                                <li>
                                    @auth
                                        <a href="{{ route('profile.index') }}"
                                           style="align-items: center; text-decoration: none; color: #000;">
                                            @if (Auth::user()->hasMedia('userImages'))
                                                <img src="{{Auth::user()->getFirstMediaUrl('userImages')}}"
                                                     alt="User Image"
                                                     style="width: 55px; height: 55px; border-radius: 50%; margin-bottom: -22px;">
                                            @else
                                                <i class="fas fa-user fa-lg"></i>
                                            @endif
                                            {{ Str::limit(Auth::user()->name, 9) }} <i class="fi-rs-angle-down"></i>
                                        </a>
                                        <ul class="sub-menu">
                                            <li><i class="fas fa-user fa-lg" style="margin-right: 23px;"></i>&nbsp;
                                                {{ Auth::user()->name }}
                                            </li>
                                            <li><a href="{{route('profile.index')}}"><i class="fas fa-cogs fa-lg"></i>&nbsp;
                                                    اعدادات الحساب</a></li>
                                            <li><a href="{{route('cart.index')}}"><i class="fas fa-shopping-bag"></i>&nbsp; الطلبات</a></li>
                                            <li><a href="{{route('fav.index')}}"><i class="fas fa-heart fa-lg"></i>&nbsp;
                                                    المفضلة</a></li>
                                            <li class="nav-item">
                                                <form action="{{ route('logout') }}" method="POST">
                                                    @csrf
                                                    <button type="submit"
                                                            style="align-items: center; border: none; background-color: white; color: black; cursor: pointer; padding: 5px; font-size: 16px; margin-right: 10px;">
                                                        <i class="fas fa-sign-out-alt fa-lg"></i> تسجيل خروج
                                                    </button>
                                                </form>
                                            </li>
                                        </ul>
                                    @endauth
                                </li>
                                @if(Auth::check() && Auth::user()->hasRole(['المدير', 'ادمن']))
                                <!-- If the user is an admin or manager -->
                                <li class="position-static">
                                    <a href="{{ route('admin.dashboard') }}">
                                        {{ __('الانتقال إلى لوحة التحكم') }}
                                    </a>
                                </li>
                            @endif
                            </ul>
                        </nav>
                    </div>
                </div>

                <div class="hotline d-none d-lg-block">
                    <p style="font-size: 16px; color: #333; margin-bottom: 10px;">
                        <i style="margin-right: 5px;" class="fi-rs-smartphone"></i>
                        <span>اتصل بنا: </span>
                        <span style="font-weight: bold; color: #F15412">
                            <a href="tel:+10000000000">(+1) 0000-000-000</a>
                        </span>
                    </p>
                </div>
                

                {{-- Mobile  header --}}
                @include('userDashboard.layouts.mobile.header')
            </div>
        </div>
    </div>

</header>

{{-- Mobile  menu  --}}
@include('userDashboard.layouts.mobile.menu')

