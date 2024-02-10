@extends('userDashboard.layouts.master')
@section('title')
    السلة المشتريات
@endsection
@section('css')

@endsection
@section('content')
    <main class="main" style="direction: rtl; text-align: right;">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="{{route('home')}}" rel="nofollow">االصفحة الرائيسة </a>
                    <span></span> سلة مشترياتك
                </div>
            </div>
        </div>
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
                        <div class="row mb-50">
                            <div class="col-lg-6 col-md-12">
                                <div class="border p-md-4 p-30 border-radius cart-totals">
                                    <div class="heading_s1 mb-3">
                                        <h4>اجمالي سلة المشتريات</h4>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tbody>
                                            <tr>
                                                <td class="cart_total_label">الاجمالي المنتجات</td>
                                                <td class="cart_total_amount"><span
                                                        class="font-lg fw-900 text-brand">{{$total_price}}</span></td>
                                            </tr>
                                            <tr>
                                                <td class="cart_total_label">سعر التوصيل</td>
                                                <td class="cart_total_amount"><i class="ti-gift mr-5"></i>
                                                    
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="cart_total_label">الاجمالي</td>
                                                <td class="cart_total_amount"><strong><span
                                                            class="font-xl fw-900 text-brand">$240.00</span></strong>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="mb-30 mt-50">
                                        <div class="heading_s1 mb-3">
                                            <h4>لديك كوبون خصم </h4>
                                        </div>
                                        <div class="total-amount">
                                            <div class="left">
                                                <div class="coupon">
                                                    <form action="#" target="_blank">
                                                        <div class="form-row row justify-content-center">
                                                            <div class="form-group col-lg-6">
                                                                <input class="font-medium" name="Coupon"
                                                                       placeholder="ادخل الكوبون">
                                                            </div>
                                                            <div class="form-group col-lg-6">
                                                                <button class="btn  btn-sm"><i
                                                                        class="fi-rs-label mr-10"></i>تأكيد
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>

                            <div class="col-lg-6 col-md-12">
                                <div class="heading_s1 mb-3">
                                    <h4>Calculate Shipping</h4>
                                </div>
                                <h4 class="mt-15 mb-30 text-center" style="color: red">توصيل الاردر من 3 الي 5 ايام
                                    <span class="font-xl text-brand fw-900"></span></h4>
                                <form class="field_form shipping_calculator">
                                    <div class="mb-3">
                                        <div class="cart-action text-end">
                                            <a href="{{route('address.create')}}" class="btn"><i
                                                    class="fi-rs-shopping-bag mr-10"></i> اضافة عنوان توصيل اخر</a>
                                        </div>
                                        <br>

                                        <label for="status" style="color:blue"> اختار عنوان التوصيل <span
                                                class="required">*</span></label>
                                        <select name="address" id="address" class="form-control" required>
                                            <option style="display: none" value=""> اختار عنوان التوصيل</option>
                                            @if($addresses)
                                                @foreach($addresses as $address)
                                                    <option
                                                        value="{{$address->id}}">{{$address->city." - ".$address->address}} </option>
                                                @endforeach
                                            @endif
                                            @error('address')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </select>
                                    </div>
                                    <div style="text-align:center">
                                        <a href="checkout.html" class="btn "> <i class="fi-rs-box-alt mr-10"></i> تاكيد الطلب </a>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
