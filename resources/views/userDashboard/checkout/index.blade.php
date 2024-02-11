@extends('userDashboard.layouts.master')
@section('title')
    الاردر
@endsection
@section('css')

@endsection
@section('content')
    <main class="main" style="direction: rtl; text-align: right;">

        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="{{route('home')}}" rel="nofollow">الصفحة الرائيسية </a>
                    <span></span> سلة المشتريات
                    <span></span> عرض الاردر
                </div>
            </div>
        </div>

        <section class="section-container profile my-5 py-5">
            <div class="text-center mb-5">
                <div class="success-gif m-auto">
                    <img class="w-25" src="/assets/imgs/success.gif" width="200" height="300" alt=""/>
                </div>
                @if($detailsOrder->delivery_status === 0)
                    <h4 class="mb-4">جاري تجهيز طلبك الآن</h4>
                    <p class="mb-1">
                        سيقوم أحد ممثلي خدمة العملاء بالتواصل معك لتأكيد الطلب
                    </p>
                    <p>برجاء الرد على الأرقام الغير مسجلة</p>
                @else
                    <h4 class="mb-4">   تم توصيل الاردر بنجاح  - شكرا لثقاتكم </h4>
                @endif

                <a href="{{route('home')}}" class="btn btn-fill-out btn-block mt-30">تصفح منتجات اخري</a>
            </div>

        </section>

        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <section class="section-container mb-5">
                            <h2>عنوان الفاتورة</h2>
                            <br>
                            <table class="table">
                                <tr>
                                    <th> رقم الاستعلام عن الاردر </th>
                                    <td class="product-subtotal"
                                        colspan="2" style="color:red;">{{$detailsOrder->order_number }}</td>
                                </tr>
                                <tr>
                                    <th> الاسم</th>
                                    <td class="product-subtotal"
                                        colspan="2">{{$detailsOrder->address->fname . $detailsOrder->address->lname }}</td>
                                </tr>
                                <tr>
                                    <th> العنوان</th>
                                    <td class="product-subtotal" colspan="2">{{$detailsOrder->address->address}}</td>
                                </tr>
                                <tr>
                                    <th> المدينة</th>
                                    <td class="product-subtotal" colspan="2">{{$detailsOrder->address->city->name}}</td>
                                </tr>
                                <tr>
                                    <th> رقم الهاتف</th>
                                    <td class="product-subtotal" colspan="2">{{$detailsOrder->address->phone}}</td>
                                </tr>
                                <tr>
                                    <th> الاميل</th>
                                    <td class="product-subtotal" colspan="2">{{$detailsOrder->address->email}}</td>
                                </tr>
                                <tr>
                                    <th> ملحوظة توصل</th>
                                    <td class="product-subtotal" colspan="2">{{$detailsOrder->address->note}}</td>
                                </tr>
                            </table>
                            <a href="#" class="btn btn-fill-out btn-block mt-30">تعديل العنوان</a>
                        </section>
                    </div>
                    <div class="col-md-6">
                        <div class="order_review">
                            <div class="mb-20">
                                <h4>تفاصيل الاردر</h4>
                            </div>
                            <div class="table-responsive order_table text-center">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th colspan="2">المنتجات</th>
                                        <th>الاجمالي</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        @foreach($orders as $order)
                                            <td class="image product-thumbnail"><img
                                                    src="{{$order->product->getFirstMediaUrl('productFiles')}}" alt="#">
                                            </td>
                                            <td>
                                                <h5>
                                                    <a href="{{route('products.show', $order->product->id)}}">{{$order->product->name}}</a>
                                                </h5>
                                                @if($order->size)
                                                    <h5>{{$order->size}}</h5>
                                                @endif
                                                @if($order->size)
                                                    <h5>{{$order->color}}</h5>
                                                @endif
                                                <span class="product-qty">{{$order->quantity}}</span>
                                            </td>
                                            <td>{{$order->total_price}}</td>
                                    </tr>
                                    @endforeach
                                    <tr>
                                        <th> عدد المنتجات</th>
                                        <td class="product-subtotal"
                                            colspan="2">{{$detailsOrder->number_of_product}}</td>
                                    </tr>
                                    <tr>
                                        <th>الاجمالي المنتجات</th>
                                        <td class="product-subtotal" colspan="2">{{$detailsOrder->subtotal}} جينية</td>
                                    </tr>
                                    <tr>
                                        <th>سعر التوصيل</th>
                                        <td colspan="2"><em>{{$detailsOrder->delivery_price}} جينية </em></td>
                                    </tr>
                                    @if ($detailsOrder->coupon_value)
                                        <tr>
                                            <th> كود خصم</th>
                                            <td colspan="2"><em>{{$detailsOrder->coupon_value}} % </em></td>
                                        </tr>
                                    @endif
                                    <tr>
                                        <th>الاجمالي الكلي</th>
                                        <td colspan="2" class="product-subtotal"><span
                                                class="font-xl text-brand fw-900">{{$detailsOrder->total}}  جينية </span>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="bt-1 border-color-1 mt-30 mb-30"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
