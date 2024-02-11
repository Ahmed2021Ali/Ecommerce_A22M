@extends('userDashboard.layouts.master')
@section('title')
    السلة المشتريات
@endsection
@section('css')

@endsection
@section('pageHeader')
    سلة مشترياتك
@endsection
@section('content')
    <main class="main" style="direction: rtl; text-align: right;">
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="table shopping-summery text-center clean">
                                <thead>
                                <tr class="main-heading">
                                    <th scope="col">صورة</th>
                                    <th scope="col">الاسم</th>
                                    <th scope="col">السعر</th>
                                    <th scope="col">الكمية</th>
                                    <th scope="col">الاجمالي</th>
                                    <th scope="col">حذف من السلة</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $total_price = 0; ?>
                                @foreach($carts as $cart)
                                    <tr>
                                        <td class="image product-thumbnail">
                                            <a href="{{route('products.show', $cart->product->id)}}"><img
                                                    src="{{$cart->product->getFirstMediaUrl('productFiles')}}"></a>
                                        </td>

                                        <td class="product-des product-name">
                                            <h3 class="product-name"><a
                                                    href="{{route('products.show', $cart->product->id)}}">{{$cart->product->name}}</a>
                                            </h3>
                                            <div class="attr-detail attr-color mb-15">
                                                @if($cart->color)
                                                    <strong class="mr-10">اللون &nbsp;&nbsp;</strong>
                                                    <ul class="list-filter color-filter">
                                                        @foreach (explode(',', $cart->product->color) as $color)
                                                            {{\App\Models\Color::where('value', $color)->first()->name}}
                                                        @endforeach
                                                    </ul>
                                                @endif
                                                @if($cart->size)
                                                    <strong class="mr-10"> المقاس &nbsp;&nbsp;</strong>
                                                    <ul class="list-filter size-filter font-small">
                                                        <li><a href="#">{{$cart->size}}</a></li>
                                                    </ul>
                                                @endif
                                            </div>
                                        </td>

                                        <td class="price" data-title="Price">
                                            <span>{{$cart->product->offer ? $cart->product->price_after_offer : $cart->product->price}} </span>
                                        </td>

                                        <td class="text-center" data-title="Stock">
                                            <form action="{{route('cart.update',$cart)}}" method="post">
                                                @method('put')
                                                @csrf
                                                <input type="number" name="quantity" id="quantity"
                                                       value="{{$cart->quantity}}" min="1"
                                                       style="display: inline-block; width: 70px; padding: 6px; text-align: center; border: 1px solid #ccc; border-radius: 3px;">
                                                <button type="submit" class="btn btn-primary"> تحديث الكمية</button>
                                            </form>
                                        </td>

                                        <td class="text-right" data-title="Cart">
                                                <?php $total_price += ($cart->product->offer ? $cart->product->price_after_offer : $cart->product->price) * $cart->quantity; ?>
                                            <span>{{($cart->product->offer ? $cart->product->price_after_offer : $cart->product->price) * $cart->quantity }} </span>
                                        </td>

                                        <td class="action" data-title="Remove">
                                            <form action="{{route('cart.destroy',$cart)}}" method="post">
                                                @method('delete')
                                                @csrf
                                                <button class="btn btn-danger"><i class="fi-rs-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>

                                @endforeach
                                {{ $carts->links() }}

                                <tr>
                                    <td colspan="6" class="text-end">
                                        <a href="{{route('cart.clear')}}" class="text-muted"> <i
                                                class="fi-rs-cross-small"></i> Clear Cart</a>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="divider center_icon mt-50 mb-50"><i class="fi-rs-fingerprint"></i></div>
                        <livewire:order :total_price="$total_price" />


                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
