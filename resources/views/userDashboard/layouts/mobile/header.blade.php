<div class="header-action-right d-block d-lg-none">

    <div class="header-action-2">
        <div class="header-action-icon-2 d-block d-lg-none">
            <div class="burger-icon burger-icon-white">
                <span class="burger-icon-top"></span>
                <span class="burger-icon-mid"></span>
                <span class="burger-icon-bottom"></span>
            </div>
        </div>
        @if (Auth::check())
            <div class="header-action-icon-2">
                <a href="{{ route('fav.index') }}">
                    <img alt="A$M" src="{{ URL::asset('assets/imgs/theme/icons/icon-heart.svg') }}">
                    <span class="pro-count white">{{Auth::user()->favs()->count()}}</span>
                </a>
            </div>
            <div class="header-action-icon-2">
                <a class="mini-cart-icon" href="{{route('cart.index')}}">
                    <img alt="Surfside Media" src={{ URL::asset('assets/imgs/theme/icons/icon-cart.svg') }}>
                    <span class="pro-count white">{{Auth::user()->carts()->count()}}</span>
                </a>
            </div>
        @endif
        <div style="direction: rtl; text-align: left;">
            <a href="{{route('home')}}"><img src="{{URL::asset('assets/imgs/logo/Picsart_24-02-16_18-01-27-786.png')}}" alt="A22M Logo" style="width: 45px"></a>
        </div>
    </div>
</div>
