{{-- Mobile  menu  --}}
<div class="mobile-header-active mobile-header-wrapper-style" style="direction: rtl; text-align: right;">
    <div class="mobile-header-wrapper-inner">
        <div class="mobile-header-top">
            <div class="mobile-menu-close close-style-wrap close-style-position-inherit">
                <button class="close-style search-close"><i class="icon-top"></i><i class="icon-bottom"></i></button>
            </div>
        </div>
        @if(Auth::check())
        <!-- Authenticated User's Image and Name -->
        <div class="single-mobile-header-info" style="margin-left: auto; display: flex; align-items: center; justify-content: center;">
            <a href="{{ route('profile.index') }}" style="text-decoration: none; color: black; text-align: center;">
                @if (Auth::user()->hasMedia('userImages'))
                    <div style="display: flex; flex-direction: column; align-items: center; margin-right: 5px;">
                        <img src="{{ Auth::user()->getFirstMediaUrl('userImages') }}"
                            alt="User Image"
                            style="width: 108px; height: 107px; border-radius: 50%; margin-bottom: 5px; margin-top: 15px;">
                        <span style="direction: rtl;">
                            {{ Auth::user()->name }}
                        </span>
                    </div>
                @else
                    <i class="fas fa-user fa-lg" style="margin-right: 5px; margin-top: 15px;"></i>
                    <span style="direction: rtl;">
                        {{ Auth::user()->name }}
                    </span>
                @endif
            </a>
        </div>
    @endif

        <div class="mobile-header-content-area">
            {{-- Search --}}
            <div class="mobile-search search-style-3 mobile-header-border" style="direction: rtl; text-align: right;">
                <form action="{{ route('search') }}" method="GET">
                    <input type="text" placeholder="بحث" style="direction: rtl; text-align: right;">
                    <button type="submit"><i class="fi-rs-search"></i></button>
                </form>
            </div>
            <div class="mobile-menu-wrap mobile-header-border">
                <!-- mobile menu start -->
                <nav>
                    <ul class="mobile-menu">
                        <li class="menu-item-has-children"><span class="menu-expand"></span><a href="{{route('home')}}">الصفحة
                                الرائيسية </a></li>
                        <li class="menu-item-has-children"><span class="menu-expand"></span><a
                                href="{{route('products.index')}}">تصفح المنتجات </a></li>
                        {{--show Categories and Products --}}
                        <li class="menu-item-has-children"><span class="menu-expand"></span><a href="#">الاقسام </a>
                            <x-category-mobile/>
                        </li>
                        <li class="menu-item-has-children"><span class="menu-expand"></span><a
                                href="{{route('contact-us.index')}}"> تواصل معنا </a></li>
                    </ul>
                </nav>
                <!-- mobile menu end -->
            </div>
            <div class="mobile-header-info-wrap mobile-header-border">
                @guest
                    <div class="single-mobile-header-info">
                        <a href="{{route('signin.view.form')}}">تسجيل دخول</a>
                    </div>
                    <div class="single-mobile-header-info">
                        <a href="{{route('signup.view.form')}}"> إنشاء حساب </a>
                    </div>
                @endguest
                @if(Auth::check())
                    <div class="single-mobile-header-info" style="margin-right: -20px">
                        <a href="{{route('profile.index')}}" style="align-items: center; border: none; background-color: white; color: black; cursor: pointer; padding: 5px; font-size: 16px; margin-right: 10px;">
                            <i class="fas fa-cogs fa-lg"></i> اعدادات الحساب
                        &nbsp;</a>
                    </div>
                    <div class="single-mobile-header-info" style="margin-right: -20px">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit"
                                    style="align-items: center; border: none; background-color: white; color: black; cursor: pointer; padding: 5px; font-size: 16px; margin-right: 10px;">
                                <i class="fas fa-sign-out-alt fa-lg"></i> تسجيل خروج
                            </button>
                        </form>
                    </div>
                @endif
                <div class="single-mobile-header-info">
                    <a href="tel:+0201017786080">  رقم التواصل   01004297302 ( 02+) </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="widget-about font-md mb-md-5 mb-lg-0">
                        <a href="{{route('home')}}"><img src="{{URL::asset('assets/imgs/logo/Picsart_24-02-16_18-01-27-786.png')}}" alt="A22M Logo" style="width: 50px"></a>

                    <h5 class="mb-10 mt-30 fw-600 text-grey-4"><i class="fas fa-share-alt"></i> تابعنا علي</h5>
                    <div class="mobile-social-icon">
                        <a href="https://www.facebook.com/profile.php?id=100095016672467&mibextid=ZbWKwL"><i class="fab fa-facebook-f"></i></a>
                        <a href="https://www.instagram.com/a22m3_8/"><i class="fab fa-instagram"></i></a>
                        <a href="https://www.tiktok.com/@am801237?_t=8jxvsw05DkL&_r=1"><i class="fab fa-tiktok"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
