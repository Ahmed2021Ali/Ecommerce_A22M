<div class="header-action-right d-block d-lg-none">
    <div class="header-action-2">

        <!-- Hamburger Menu Icon -->
        <div class="header-action-icon-2 d-block d-lg-none">
            <div class="burger-icon burger-icon-white">
                <span class="burger-icon-top"></span>
                <span class="burger-icon-mid"></span>
                <span class="burger-icon-bottom"></span>
            </div>
        </div>

        @auth
            <!-- Favorite Icon -->
            <div class="header-action-icon-2">
                <a href="{{ route('fav.index') }}">
                    <img alt="Favorite" src="{{ URL::asset('assets/imgs/theme/icons/icon-heart.svg') }}">
                    <span class="pro-count white">{{ Auth::user()->favs()->count() }}</span>
                </a>
            </div>

            <!-- Cart Icon -->
            <div class="header-action-icon-2">
                <a class="mini-cart-icon" href="{{ route('cart.index') }}">
                    <img alt="Cart" src="{{ URL::asset('assets/imgs/theme/icons/icon-cart.svg') }}">
                    <span class="pro-count white">{{ Auth::user()->carts()->count() }}</span>
                </a>
            </div>

            <!-- User Profile Image and Name -->
            <div class="user-profile" style="margin-right: 8px; text-align: left;">
                <a href="{{ route('profile.index') }}">
                    @if (Auth::user()->hasMedia('userImages'))
                        <img src="{{ Auth::user()->getFirstMediaUrl('userImages') }}"
                            alt="User Image"
                            style="width: 45px; height: 45px; border-radius: 50%;">
                            
                    @else
                        <div style="text-align: left;">
                            <i class="fas fa-user fa-lg" style="color: black;"></i>
                            <span style="direction: rtl;text-align:right">
                                {{ STR::limit(auth()->user()->name, 15) }}
                            </span>
                        </div>
                    @endif
                </a>
            </div>
            
            
        @endauth
    </div>
</div>

<!-- Logo -->
<div class="header-action-right d-block d-lg-none">
    <div class="header-action-2">
        <div style="direction: ltr; text-align: left;">
            <a href="{{ route('home') }}"><img src="{{ URL::asset('assets/imgs/logo/Picsart_24-02-16_18-01-27-786.png') }}"
                alt="A22M Logo" style="width: 45px"></a>
        </div>
    </div>
</div>