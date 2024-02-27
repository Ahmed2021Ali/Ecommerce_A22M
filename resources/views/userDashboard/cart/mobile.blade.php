<div class="d-block d-lg-none">
    <?php $subTotal = 0; ?>
    <section class="cart-section section-b-space">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <table class="table cart-table">
                        <tbody>
                        @foreach(Auth::user()->carts() as $cart)
                            <tr>
                                <td>
                                    <a href="{{route('products.show', encrypt($cart->product->id))}}"><img
                                            src="{{$cart->product->getFirstMediaUrl('productFiles')}}"
                                            class="blur-up lazyloaded" alt=""></a>
                                </td>
                                <td>
                                    <h4>
                                        <a href="{{route('products.show', encrypt($cart->product->id))}}">{{$cart->product->name}}</a>
                                    </h4>
                                    @if($cart->color)
                                        <ul class="list-filter color-filter"><strong
                                                class="mr-10">اللون&nbsp;&nbsp;</strong>{{\App\Models\Color::where('value', $cart->color)->first()->name ?? ''}}
                                        </ul>
                                    @endif
                                    @if($cart->size)
                                        <ul class="list-filter size-filter font-small">
                                            <li><a href="#">{{ Str::limit($cart->size , 25) }}</a></li>
                                            <strong class="mr-10"> المقاس &nbsp;&nbsp;</strong></ul>
                                    @endif
                                </td>
                                <td>

                                        <?php $subTotal += ($cart->product->offer ? $cart->product->price_after_offer : $cart->product->price) * $cart->quantity; ?>
                                    <h3>
                                        <span> {{calcPriceProduct($cart->product->price,$cart->product->offer,$cart->product->price_after_offer,$cart->quantity)}}</span>
                                    </h3>
                                    جينية
                                </td>
                                <td>
                                    <form action="{{route('cart.update',$cart)}}" method="post">
                                        @method('put') @csrf
                                        <input type="number" name="quantity" id="quantity"
                                               value="{{$cart->quantity}}" min="1"
                                               style="display: inline-block; width: 70px; padding: 6px; text-align: center; border: 1px solid #ccc; border-radius: 3px;">
                                        <button type="submit" class="btn btn-primary"> تحديث الكمية</button>
                                        @error('quantity')<span class="invalid-feedback"
                                                                role="alert"><strong>{{ $message }}</strong></span>@enderror
                                    </form>
                                </td>
                                <td>
                                    <form action="{{route('cart.destroy',$cart)}}" method="post">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-danger"><i class="fi-rs-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div style="direction: rtl; text-align: right;">
                    @if(!Auth::user()->carts()->isEmpty())
                        <tr>
                            <td colspan="6" class="text-end">
                                <a href="{{route('cart.clear')}}" class="text-muted"> <i class="fi-rs-trash"></i>
                                    حذف جميع الأوردارات </a>
                            </td>
                        </tr>
                    @else
                        <h4 style="color: red" class="text-center">  لا يوجد منتجات في سلة تسوقك </h4>
                    @endif
                </div>
            </div>
        </div>
    </section>
    @if(!Auth::user()->carts()->isEmpty())
        <livewire:order :subTotal="$subTotal"/>
    @endif
</div>
