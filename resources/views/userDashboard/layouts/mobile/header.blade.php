<p class="mobile-promotion">Happy <span class="text-brand">Mother's Day</span>. Big Sale Up to 40%</p>
<div class="header-action-right d-block d-lg-none">

    {{--
        <a href="{{route('home')}}" style="direction: rtl; text-align:left;"><img src="{{URL::asset('assets/imgs/logo/Picsart_24-02-16_18-01-27-786.png')}}" alt="A22M Logo" style="width: 55px"></a>
    --}}

    <div class="header-action-2">
        @if (Auth::check())
            <div class="header-action-icon-2">
                <a href="{{ route('fav.index') }}">
                    <img alt="A$M" src="assets/imgs/theme/icons/icon-heart.svg">
                    <span class="pro-count white">{{Auth::user()->favs()->count()}}</span>
                </a>
            </div>
            <div class="header-action-icon-2">
                <a class="mini-cart-icon" href="{{route('cart.index')}}">
                    <img alt="Surfside Media" src="assets/imgs/theme/icons/icon-cart.svg">
                    <span class="pro-count white">{{Auth::user()->carts()->count()}}</span>
                </a>
                {{--<div class="cart-dropdown-wrap cart-dropdown-hm2">
                    <ul>
                        <li>
                            <div class="shopping-cart-img">
                                <a href="product-details.html"><img alt="Surfside Media" src="assets/imgs/shop/thumbnail-3.jpg"></a>
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
                </div>--}}
            </div>
        @endif
        <div class="header-action-icon-2 d-block d-lg-none">
            <div class="burger-icon burger-icon-white">
                <span class="burger-icon-top"></span>
                <span class="burger-icon-mid"></span>
                <span class="burger-icon-bottom"></span>
            </div>
        </div>
    </div>
</div>
