@extends('userDashboard.layouts.master')
@section('title')
    سلة المشتريات
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
                                <?php $subTotal = 0; ?>
                                @foreach(Auth::user()->carts() as $cart)
                                    <tr>
                                        <td class="image product-thumbnail">
                                            <a href="{{route('products.show', encrypt($cart->product->id))}}"><img
                                                    src="{{$cart->product->getFirstMediaUrl('productFiles')}}"></a>
                                        </td>

                                        <td class="product-des product-name">
                                            <h3 class="product-name"><a
                                                    href="{{route('products.show', encrypt($cart->product->id))}}">{{ Str::limit($cart->product->name , 25) }}</a>
                                            </h3>
                                            <div class="attr-detail attr-color mb-15">
                                                @if($cart->color)
                                                    <strong class="mr-10">اللون &nbsp;&nbsp;</strong>
                                                    <ul class="list-filter color-filter">
                                                        @foreach (explode(',', $cart->color) as $color)
                                                            {{\App\Models\Color::where('value', $color)->first()->name ?? ''}}
                                                        @endforeach
                                                    </ul>
                                                @endif
                                                @if($cart->size)
                                                    <strong class="mr-10"> المقاس &nbsp;&nbsp;</strong>
                                                    <ul class="list-filter size-filter font-small">
                                                        <li><a href="#">{{ Str::limit($cart->size , 25) }}</a></li>
                                                    </ul>
                                                @endif
                                            </div>
                                        </td>

                                        <td class="price" data-title="Price">
                                            <span>{{calcPriceProduct($cart->product->price,$cart->product->offer,$cart->product->price_after_offer,null)}} </span>

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
                                                <?php $subTotal += ($cart->product->offer ? $cart->product->price_after_offer : $cart->product->price) * $cart->quantity; ?>
                                            <span>{{calcPriceProduct($cart->product->price,$cart->product->offer,$cart->product->price_after_offer,$cart->quantity)}}</span>
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
                                {{ Auth::user()->carts()->links() }}
                                @if(!Auth::user()->carts()->isEmpty())
                                    <tr>
                                        <td colspan="6" class="text-end">
                                            <a href="{{route('cart.clear')}}" class="text-muted"> <i class="fi-rs-trash"></i> حذف جميع الأوردارات </a>
                                        </td>
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                        </div>
                        <div class="divider center_icon mt-50 mb-50"><i class="fi-rs-fingerprint"></i></div>
                        <livewire:order :subTotal="$subTotal"/>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
