<div >
    @if( Auth::check())
        <div class="cart-dropdown-wrap cart-dropdown-hm2" style="direction: rtl; text-align: right;" >
            <ul >
                    <?php $total_price = 0; ?>
                @foreach($carts as $cart)
                    <li>
                        <div class="shopping-cart-img" >
                            <a href="{{route('products.show', $cart->product->id)}}"><img alt="Surfside Media"
                                                                src="{{$cart->product->getFirstMediaUrl('productFiles')}}"></a>
                        </div>
                        <div class="shopping-cart-title">
                            <h4 ><a href="{{route('products.show', $cart->product->id)}}">{{$cart->product->name}}</a></h4>
                                <?php $total_price += ($cart->product->offer ? $cart->product->price_after_offer : $cart->product->price) * $cart->quantity; ?>
                            <h4>
                                <span>{{$cart->quantity}} × </span>{{($cart->product->offer ? $cart->product->price_after_offer : $cart->product->price)}}
                            </h4>
                        </div>
                        <div class="shopping-cart-delete">
                            <form action="{{route('cart.destroy',$cart)}}" method="post">
                                @method('delete')
                                @csrf
                                <button><i class="fi-rs-cross-small"></i></button>
                            </form>
                        </div>
                    </li>
                @endforeach

            </ul>
            <div class="shopping-cart-footer">
                <div class="shopping-cart-total">
                    <h4>   {{$total_price}}  جينية <span> الاجماعي    =   </span></h4>
                </div>
                <div class="shopping-cart-button">
                    <a href="{{route('cart.index')}}" class="outline">View cart</a>
                    <a href="{{route('cart.index')}}">Checkout</a>
                </div>
            </div>
        </div>
    @endif
</div>
