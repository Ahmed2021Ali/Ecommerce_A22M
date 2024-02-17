@extends('adminlte::page')

@section('title', 'لوحة تحكم المسؤلين')

@section('content_header')
    <h1 style="text-align:center">لوحة تحكم المسؤلين</h1>
    <p style="text-align:center">  احصائيات حول الموقع الكتروني </p>
    <div style="text-align: left;">
        <p style="font-size: 18px; color: #333; margin-bottom: 10px; display: inline;">مرحبًا بك مرة أخرى،</p>
        <h2 style="font-size: 24px; font-weight: bold; color: #007bff; display: inline; margin-right: 5px;">{{ auth()->user()->name }}</h2>
    </div>
@stop

@section('content')

<div class="row">

    {{-- count of user --}}
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
                <h3> {{ $countUsers ?? '0' }}  </h3>
                <p> المستخدمين الموقع </p>
            </div>
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>

    {{-- count of categories --}}
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-secondary">
            <div class="inner">
                <h3>{{$countCategories??'0'}}</h3>
                <p> الاقسام المعروضة ع الموقع </p>
            </div>
            <div class="icon">
                <i class="ion ion-pie-graph"></i>
            </div>
            <a href="{{route('category.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>

    {{-- count of Product --}}
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
            <div class="inner">
                <h3>{{$countProducts??'0'}}</h3>
                <p> المنتجات المعروضة علي الموقع </p>
            </div>
            <div class="icon">
                <i class="ion ion-person-add"></i>
            </div>
            <a href="{{route('product.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>

    {{-- count of city --}}
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-light">
            <div class="inner">
                <h3>{{$countCity??'0'}}</h3>
                <p> عدد المحافضات المتاح فيها التوصيل الاردرات </p>
            </div>
            <div class="icon">
                <i class="ion ion-person-add"></i>
            </div>
            <a href="{{route('city.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>

    {{-- count of order in witing --}}
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
            <div class="inner">
                <h3>{{$countorderwiting??'0'}}</h3>
                <p>الاردرات التي لم يتم توصيلها- في قائمة الانتظار </p>
            </div>
            <div class="icon">
                <i class="ion ion-person-add"></i>
            </div>
            <a href="{{route('product.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>

    {{-- count of order in done --}}
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
            <div class="inner">
                <h3>{{$countorderdone??'0'}}</h3>
                <p>الاردرات تم توصيلها بنجاح </p>
            </div>
            <div class="icon">
                <i class="ion ion-pie-graph"></i>
            </div>
            <a href="{{route('category.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>

    {{-- count of order in coupon --}}
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-primary">
            <div class="inner">
                <h3>{{$countCoupon??'0'}}</h3>
                <p>عدد الكوبونات المتاحة للمستخدين  </p>
            </div>
            <div class="icon">
                <i class="ion ion-pie-graph"></i>
            </div>
            <a href="{{route('category.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>

</div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@endsection
