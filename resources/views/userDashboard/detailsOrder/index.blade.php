@extends('userDashboard.layouts.master')
@section('title')
    الأوردارات
@endsection
@section('css')

@endsection
@section('pageHeader')
    عرض الأوردارات
@endsection
@section('content')
    <main class="main" style="direction: rtl; text-align: right;">
        @if(!$detailsOrder->deleted_at)
            <section class="section-container profile my-5 py-5">
                <div class="text-center mb-5">
                    <div class="success-gif m-auto">
                        <img class="w-25" src="{{URL::asset('/assets/imgs/success.gif')}}" width="350" height="250"
                             alt=""/>
                    </div>
                    @if($detailsOrder->delivery_status === 0)
                        <h4 class="mb-4">جاري تجهيز طلبك الآن</h4>
                        <p class="mb-1">
                            سيقوم أحد ممثلي خدمة العملاء بالتواصل معك لتأكيد الطلب
                        </p>
                        <p>برجاء الرد على الأرقام الغير مسجلة</p>
                        <h4 class="mt-15 mb-30 text-center" style="color: red">توصيل الأوردر من 3 الي 5 ايام
                            <span class="font-xl text-brand fw-900"></span></h4>
                    @else
                        <h4 class="mb-4"> تم توصيل الأوردر بنجاح - شكرا لثقاتكم </h4>
                    @endif
                    <a href="{{route('home')}}" class="btn btn-fill-out btn-block mt-30">تصفح منتجات اخري</a>
                </div>
            </section>
        @else
            <br>
            <h3 class="mb-4 text-center"> تم الغاء الأوردر </h3>
        @endif
        @include('userDashboard.detailsOrder.desktop')
        @include('userDashboard.detailsOrder.mobile')
    </main>
@endsection
