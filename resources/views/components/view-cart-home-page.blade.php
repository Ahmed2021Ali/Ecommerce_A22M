<div >
    @if( Auth::check())
        <div class="cart-dropdown-wrap cart-dropdown-hm2" style="direction: rtl; text-align: right;" >
            <h3 style="color: #F15412; text-align:center">طلباتك</h3>
            <hr>
            <ul>
                    <?php $total_price = 0; ?>
                    @foreach($carts as $cart)
                    <li class="cart-item">
                        <div class="shopping-cart-img" >
                            <a href="{{ route('products.show', $cart->product->id) }}">
                                <img alt="Product Image" src="{{ $cart->product->getFirstMediaUrl('productFiles') }}" style="border-radius:15px">
                            </a>
                        </div>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <div class="cart-item-details">
                            <h4><a href="{{ route('products.show', $cart->product->id) }}">{{ Str::limit($cart->product->name, 15) }}</a></h4>
                            <?php
                            $itemPrice = $cart->product->offer ? $cart->product->price_after_offer : $cart->product->price;
                            $total_price += $itemPrice * $cart->quantity;
                            ?>
                            <p>{{ $cart->quantity }} × {{ $itemPrice }} جنية</p>

                            <p>اللون {{ $cart->color }} </p>
                        </div>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <div class="cart-item-actions">
                            <form action="{{ route('cart.destroy', $cart) }}" method="post">
                                @method('delete')
                                @csrf
                                <button type="submit" class="btn-trash"><i class="fas fa-trash" title="حذف الأوردر"></i></button>
                            </form>
                        </div>
                    </li>
                @endforeach
                
            </ul>
            <div class="shopping-cart-footer">
                <div class="shopping-cart-total">
                    <h4>&nbsp;{{$total_price}}&nbsp;&nbsp;جنية <span>الإجمالي = </span></h4>
                </div>
                <div class="shopping-cart-button">
                    <a href="{{route('cart.index')}}" class="outline">عرض الأوردر</a>
                    <a href="{{route('cart.index')}}">الدفع</a>
                </div>
            </div>
        </div>
    @endif
</div>
