{{-- Mobile  menu  --}}
<div class="mobile-header-active mobile-header-wrapper-style" style="direction: rtl; text-align: right;">
    <div class="mobile-header-wrapper-inner">

        <div class="mobile-header-top">
            <div class="mobile-menu-close close-style-wrap close-style-position-inherit">
                <button class="close-style search-close"><i class="icon-top"></i><i class="icon-bottom"></i></button>
            </div>
        </div>

        <div class="mobile-header-content-area">

            {{-- Search --}}
            <div class="mobile-search search-style-3 mobile-header-border" style="direction: rtl; text-align: right;">
                <form action="{{ route('search') }}" method="GET">
                    <input type="text" placeholder="بحث" style="direction: rtl; text-align: right;">
                    <button type="submit"><i class="fi-rs-search"></i></button>
                </form>
            </div>

            <div class="mobile-menu-wrap mobile-header-border">

                {{-- show product  Products --}}
                <x-product-mobile/>

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
                                href="blog.html">تعرف علينا</a></li>

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
                    <div class="single-mobile-header-info">
                        <a href="{{route('profile.index')}}" style="align-items: center; border: none; background-color: white; color: black; cursor: pointer; padding: 5px; font-size: 16px; margin-right: 10px;"><i class="fas fa-cogs fa-lg"></i> اعدادات الحساب &nbsp;</a>
                    </div>
                    <div class="single-mobile-header-info">
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
                    <a href="#">(+02)01017786080</a>
                </div>
            </div>

            <div class="mobile-social-icon">
                <h5 class="mb-15 text-grey-4">Follow Us</h5>
                <a href="#"><img src="assets/imgs/theme/icons/icon-facebook.svg" alt=""></a>
                <a href="#"><img src="assets/imgs/theme/icons/icon-twitter.svg" alt=""></a>
                <a href="#"><img src="assets/imgs/theme/icons/icon-instagram.svg" alt=""></a>
                <a href="#"><img src="assets/imgs/theme/icons/icon-pinterest.svg" alt=""></a>
                <a href="#"><img src="assets/imgs/theme/icons/icon-youtube.svg" alt=""></a>
            </div>
        </div>
    </div>
</div>
