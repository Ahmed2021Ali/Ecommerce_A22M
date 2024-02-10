<header class="header-area header-style-1 header-height-2">
    <div class="header-top header-top-ptb-1 d-none d-lg-block">
        <div class="container" style="direction: rtl; text-align: right;>
            <div class="row align-items-center">
            <div class="col-xl-3 col-lg-4">
                <div class="header-info header-info-right">
                    @guest
                        <ul>
                            <li><i class="fi-rs-key"></i><a href="{{ route('signin.view.form') }}">تسجيل دخول</a> / <a
                                    href="{{ route('signup.view.form') }}">إنشاء حساب</a></li>
                        </ul>
                    @endguest
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="header-middle header-middle-ptb-1 d-none d-lg-block">
        <div class="container">
            <div class="header-wrap">
                {{-- <div class="logo logo-width-1">
                    <a href="index.html"><img src="assets/imgs/logo/logo.png" alt="logo"></a>
                </div> --}}
                <div class="header-right">
                    <div class="search-style-1" style="direction: rtl; text-align: right;">
                        <form action="#">
                            <input type="text" style="direction: rtl; text-align: right;" placeholder="بحث">
                        </form>
                    </div>
                    <div class="header-action-right">
                        <div class="header-action-2">
                            <div class="header-action-icon-2">

                                @if (Auth::check())
                                    <a href="{{ route('fav.index') }}">
                                        <img class="svgInject" alt="Surfside Media"
                                            src="{{ URL::asset('assets/imgs/theme/icons/icon-heart.svg') }}">
                                        <x-count-fav />
                                    </a>
                                @endif
                            </div>
                            <div class="header-action-icon-2">
                                <a class="mini-cart-icon" href="cart.html">
                                    <img alt="Surfside Media"
                                        src="{{ URL::asset('assets/imgs/theme/icons/icon-cart.svg') }}">
                                    <span class="pro-count blue">2</span>
                                </a>
                                <div class="cart-dropdown-wrap cart-dropdown-hm2">
                                    <ul>
                                        <li>
                                            <div class="shopping-cart-img">
                                                <a href="product-details.html"><img alt="Surfside Media"
                                                        src="assets/imgs/shop/thumbnail-3.jpg"></a>
                                            </div>
                                            <div class="shopping-cart-title">
                                                <h4><a href="product-details.html">Daisy Casual Bag</a></h4>
                                                <h4><span>1 × </span>$800.00</h4>
                                            </div>
                                            <div class="shopping-cart-delete">
                                                <a href="#"><i class="fi-rs-cross-small"></i></a>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="shopping-cart-img">
                                                <a href="product-details.html"><img alt="Surfside Media"
                                                        src="assets/imgs/shop/thumbnail-2.jpg"></a>
                                            </div>
                                            <div class="shopping-cart-title">
                                                <h4><a href="product-details.html">Corduroy Shirts</a></h4>
                                                <h4><span>1 × </span>$3200.00</h4>
                                            </div>
                                            <div class="shopping-cart-delete">
                                                <a href="#"><i class="fi-rs-cross-small"></i></a>
                                            </div>
                                        </li>
                                    </ul>
                                    <div class="shopping-cart-footer">
                                        <div class="shopping-cart-total">
                                            <h4>Total <span>$4000.00</span></h4>
                                        </div>
                                        <div class="shopping-cart-button">
                                            <a href="cart.html" class="outline">View cart</a>
                                            <a href="checkout.html">Checkout</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-bottom header-bottom-bg-color sticky-bar" style="direction: rtl; text-align: right;">
        <div class="container">
            <div class="header-wrap header-space-between position-relative">
                {{-- <div class="logo logo-width-1 d-block d-lg-none">
                    <a href="index.html"><img src="assets/imgs/logo/logo.png" alt="logo"></a>
                </div> --}}
                <div class="header-nav d-none d-lg-flex">
                    <div class="main-menu main-menu-padding-1 main-menu-lh-2 d-none d-lg-block">
                        <nav>
                            <ul class="menu-list">
                                <li><a class="active" href="{{ route('home') }}"><i style="font-size: 25px" class="fas fa-home fa-lg"></i> الصفحة الرئيسية</a></li>
                                <li><a href="#about-us"><i class="fas fa-info-circle fa-lg"></i> تعرف علينا</a></li>
                                <li><a href="{{ route('products.index') }}"><i class="fas fa-shopping-cart fa-lg"></i> تصفح المنتجات</a></li>
                                <li class="position-static"><a href="#"><i class="fas fa-cubes fa-lg"></i> منتجاتنا <i class="fi-rs-angle-down"></i></a>
                                    <ul class="mega-menu">
                                        @foreach (App\Models\Category::all() as $category)
                                        <li class="sub-mega-menu sub-mega-menu-width-22">
                                            <a class="menu-title" href="{{route('category.products', $category->id)}}">{{ $category->name }}</a>
                                            <ul>
                                                @foreach ($category->products as $product)
                                                <li><a href="{{ route('products.show', $product->id) }}">{{ $product->name }}</a></li>
                                                @endforeach
                                            </ul>
                                        </li>
                                        @endforeach
                                    </ul>
                                </li>
                                <li><a href="{{url('contact-us')}}"><i class="fas fa-comments"></i> تواصل معنا</a></li>
                                <li><a href="#"><i class="fas fa-user fa-lg"></i> حسابي <i class="fi-rs-angle-down"></i></a>
                                    <ul class="sub-menu">
                                        <li><a href="{{route('profile.index')}}"><i class="fas fa-cogs fa-lg"></i>&nbsp; اعدادات الحساب</a></li>
                                        <li><a href="#"><i class="fas fa-shopping-bag"></i>&nbsp; الطلبات</a></li>
                                        <li><a href="{{route('fav.index')}}"><i class="fas fa-heart fa-lg"></i>&nbsp; المفضلة</a></li>
                                        @auth
                                        <li class="nav-item">
                                            <form action="{{ route('logout') }}" method="POST">
                                                @csrf
                                                <button type="submit" style=" align-items: center;  border: none; background-color: white;
                                                color: black; cursor: pointer; padding: 5px; font-size: 16px; margin-right: 10px;">
                                                    <i class="fas fa-sign-out-alt fa-lg"></i> تسجيل خروج
                                                </button>
                                            </form>
                                        </li>
                                    @endauth
                                    </li>
                            </ul>
                            
                        </nav>
                    </div>
                </div>
                <div class="hotline d-none d-lg-block">
                    <p style="font-size: 16px; color: #333; margin-bottom: 10px;">
                        <i style="margin-right: 5px;" class="fi-rs-smartphone"></i>
                        <span>اتصل بنا: </span>
                        <span style="font-weight: bold; color: #F15412">(+1) 0000-000-000</span>
                    </p>
                </div>
                <p class="mobile-promotion">Happy <span class="text-brand">Mother's Day</span>. Big Sale Up to 40%</p>
                <div class="header-action-right d-block d-lg-none">
                    <div class="header-action-2">
                        <div class="header-action-icon-2">
                            <a href="shop-wishlist.php">
                                <img alt="Surfside Media" src="assets/imgs/theme/icons/icon-heart.svg">
                                <span class="pro-count white">4</span>
                            </a>
                        </div>
                        <div class="header-action-icon-2">
                            <a class="mini-cart-icon" href="cart.html">
                                <img alt="Surfside Media" src="assets/imgs/theme/icons/icon-cart.svg">
                                <span class="pro-count white">2</span>
                            </a>
                            <div class="cart-dropdown-wrap cart-dropdown-hm2">
                                <ul>
                                    <li>
                                        <div class="shopping-cart-img">
                                            <a href="product-details.html"><img alt="Surfside Media"
                                                    src="assets/imgs/shop/thumbnail-3.jpg"></a>
                                        </div>
                                        <div class="shopping-cart-title">
                                            <h4><a href="product-details.html">Plain Striola Shirts</a></h4>
                                            <h3><span>1 × </span>$800.00</h3>
                                        </div>
                                        <div class="shopping-cart-delete">
                                            <a href="#"><i class="fi-rs-cross-small"></i></a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="shopping-cart-img">
                                            <a href="product-details.html"><img alt="Surfside Media"
                                                    src="assets/imgs/shop/thumbnail-4.jpg"></a>
                                        </div>
                                        <div class="shopping-cart-title">
                                            <h4><a href="product-details.html">Macbook Pro 2022</a></h4>
                                            <h3><span>1 × </span>$3500.00</h3>
                                        </div>
                                        <div class="shopping-cart-delete">
                                            <a href="#"><i class="fi-rs-cross-small"></i></a>
                                        </div>
                                    </li>
                                </ul>
                                <div class="shopping-cart-footer">
                                    <div class="shopping-cart-total">
                                        <h4>Total <span>$383.00</span></h4>
                                    </div>
                                    <div class="shopping-cart-button">
                                        <a href="cart.html">View cart</a>
                                        <a href="shop-checkout.php">Checkout</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="header-action-icon-2 d-block d-lg-none">
                            <div class="burger-icon burger-icon-white">
                                <span class="burger-icon-top"></span>
                                <span class="burger-icon-mid"></span>
                                <span class="burger-icon-bottom"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="mobile-header-active mobile-header-wrapper-style">
    <div class="mobile-header-wrapper-inner">
        <div class="mobile-header-top">


            <div class="mobile-menu-close close-style-wrap close-style-position-inherit">
                <button class="close-style search-close">
                    <i class="icon-top"></i>
                    <i class="icon-bottom"></i>
                </button>
            </div>
        </div>
        <div class="mobile-header-content-area">
            <div class="mobile-search search-style-3 mobile-header-border" style="direction: rtl; text-align: right;">
                <form action="#">
                    <input type="text" placeholder="بحث" style="direction: rtl; text-align: right;">
                    <button type="submit"><i class="fi-rs-search"></i></button>
                </form>
            </div>
            <div class="mobile-menu-wrap mobile-header-border">
                <div class="main-categori-wrap mobile-header-border">
                    <a class="categori-button-active-2" href="#">
                        <span class="fi-rs-apps"></span> تصفح المنتجات
                    </a>
                    <div class="categori-dropdown-wrap categori-dropdown-active-small">
                        <ul>
                            <li><a href="shop.html"><i class="surfsidemedia-font-dress"></i>Women's Clothing</a></li>
                            <li><a href="shop.html"><i class="surfsidemedia-font-tshirt"></i>Men's Clothing</a></li>
                            <li><a href="shop.html"><i class="surfsidemedia-font-smartphone"></i> Cellphones</a></li>
                            <li><a href="shop.html"><i class="surfsidemedia-font-desktop"></i>Computer & Office</a>
                            </li>
                            <li><a href="shop.html"><i class="surfsidemedia-font-cpu"></i>Consumer Electronics</a>
                            </li>
                            <li><a href="shop.html"><i class="surfsidemedia-font-home"></i>Home & Garden</a></li>
                            <li><a href="shop.html"><i class="surfsidemedia-font-high-heels"></i>Shoes</a></li>
                            <li><a href="shop.html"><i class="surfsidemedia-font-teddy-bear"></i>Mother & Kids</a>
                            </li>
                            <li><a href="shop.html"><i class="surfsidemedia-font-kite"></i>Outdoor fun</a></li>
                        </ul>
                    </div>
                </div>
                <!-- mobile menu start -->
                <nav>
                    <ul class="mobile-menu">
                        <li class="menu-item-has-children"><span class="menu-expand"></span><a
                                href="index.html">Home</a></li>
                        <li class="menu-item-has-children"><span class="menu-expand"></span><a
                                href="shop.html">shop</a>
                        </li>
                        <li class="menu-item-has-children"><span class="menu-expand"></span><a href="#">Our
                                Collections</a>
                            <ul class="dropdown">
                                <li class="menu-item-has-children"><span class="menu-expand"></span><a
                                        href="#">Women's
                                        Fashion</a>
                                    <ul class="dropdown">
                                        <li><a href="product-details.html">Dresses</a></li>
                                        <li><a href="product-details.html">Blouses & Shirts</a></li>
                                        <li><a href="product-details.html">Hoodies & Sweatshirts</a></li>
                                        <li><a href="product-details.html">Women's Sets</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children"><span class="menu-expand"></span><a
                                        href="#">Men's
                                        Fashion</a>
                                    <ul class="dropdown">
                                        <li><a href="product-details.html">Jackets</a></li>
                                        <li><a href="product-details.html">Casual Faux Leather</a></li>
                                        <li><a href="product-details.html">Genuine Leather</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children"><span class="menu-expand"></span><a
                                        href="#">Technology</a>
                                    <ul class="dropdown">
                                        <li><a href="product-details.html">Gaming Laptops</a></li>
                                        <li><a href="product-details.html">Ultraslim Laptops</a></li>
                                        <li><a href="product-details.html">Tablets</a></li>
                                        <li><a href="product-details.html">Laptop Accessories</a></li>
                                        <li><a href="product-details.html">Tablet Accessories</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children"><span class="menu-expand"></span><a
                                href="blog.html">Blog</a>
                        </li>
                        <li class="menu-item-has-children"><span class="menu-expand"></span><a
                                href="#">Language</a>
                            <ul class="dropdown">
                                <li><a href="#">English</a></li>
                                <li><a href="#">French</a></li>
                                <li><a href="#">German</a></li>
                                <li><a href="#">Spanish</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <!-- mobile menu end -->
            </div>
            <div class="mobile-header-info-wrap mobile-header-border">
                <div class="single-mobile-header-info mt-30">
                    <a href="contact.html"> Our location </a>
                </div>
                <div class="single-mobile-header-info">
                    <a href="login.html">تسجيل دخول</a>
                </div>
                <div class="single-mobile-header-info">
                    <a href="register.html"> إنشاء حساب</a>
                </div>
                <div class="single-mobile-header-info">
                    <a href="#">(+1) 0000-000-000 </a>
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
