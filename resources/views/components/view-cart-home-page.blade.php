<div >
    @if( Auth::check())
        <div class="cart-dropdown-wrap cart-dropdown-hm2" >
            <ul >
                    <?php $total_price = 0; ?>
                @foreach($carts as $cart)
                    <li>
                        <div class="shopping-cart-img" >
                            <a href="{{route('products.show', $cart->product->id)}}"><img alt="Surfside Media"
                                                                src="{{$cart->product->getFirstMediaUrl('productFiles')}}"></a>
                        </div>
                        <div class="shopping-cart-title">
                            <h4><a href="{{route('products.show', $cart->product->id)}}">{{$cart->product->name}}</a></h4>
                                <?php $total_price += ($cart->product->offer ? $cart->product->price_after_offer : $cart->product->price) * $cart->quantity; ?>
                            <h4>
                                <span>{{$cart->quantity}} × </span>{{($cart->product->offer ? $cart->product->price_after_offer : $cart->product->price)}}
                            </h4>
                        </div>
                        <div class="shopping-cart-delete">
                            <a href="{{route('cart.destroy',$cart)}}"><i class="fi-rs-cross-small"></i></a>
                        </div>
                    </li>
                @endforeach
                {{ $carts->links() }}

            </ul>
            <div class="shopping-cart-footer">
                <div class="shopping-cart-total">
                    <h4>الاجمالي <span>{{$total_price}}</span></h4>
                </div>
                <div class="shopping-cart-button">
                    <a href="{{route('cart.index')}}" class="outline">View cart</a>
                    <a href="{{route('cart.index')}}">Checkout</a>
                </div>
            </div>
        </div>
    @endif
</div>
