@extends('userDashboard.layouts.master')
@section('title')
    الصفحة الرئيسية
@endsection
@section('css')

@endsection

@section('content')
    @include('userDashboard.slider.index')
    @include('userDashboard.services.index')

    <section class="product-tabs section-padding position-relative wow fadeIn animated">
        <div class="bg-square"></div>
        <div class="container">
            <div class="tab-header" style="direction: rtl; text-align: right;">
                <ul class="nav nav-tabs" id="myTab" role="tablist" style="direction: rtl; text-align: right;">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="nav-tab-one" data-bs-toggle="tab" data-bs-target="#tab-one"
                                type="button" role="tab" aria-controls="tab-one" aria-selected="true"> المنتجات المميزة
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="nav-tab-two" data-bs-toggle="tab" data-bs-target="#tab-two"
                                type="button" role="tab" aria-controls="tab-two" aria-selected="false">أشهر المنتجات
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="nav-tab-three" data-bs-toggle="tab" data-bs-target="#tab-three"
                                type="button" role="tab" aria-controls="tab-three" aria-selected="false">المنتجات الجديدة
                        </button>
                    </li>
                </ul>
                <a href="{{route('products.index')}}" class="view-more d-none d-md-flex">عرض الكل<i
                        class="fi-rs-angle-double-small-left"></i></a>
            </div>
            <!--End nav-tabs-->
            <div class="tab-content wow fadeIn animated" id="myTabContent">
                @include('userDashboard.products.featured.index')
                @include('userDashboard.products.popular.index')
                @include('userDashboard.products.newAdded.index')
            </div>
        </div>
    </section>

    @include('userDashboard.banners.index')

    <section class="section-padding" style="direction: rtl; text-align: center;">
        <div class="container wow fadeIn animated">
            <h3 class="section-title mb-20"><span>المنتجات</span> الجديدة</h3>
            <div class="carausel-6-columns-cover position-relative">
                <div class="slider-arrow slider-arrow-2 carausel-6-columns-arrow"
                     id="carausel-6-columns-2-arrows"></div>
                <div class="carausel-6-columns carausel-arrow-center" id="carausel-6-columns-2">
                    @foreach($newArrivalProducts as $product)
                        <div class="product-cart-wrap small hover-up">
                            <div class="product-img-action-wrap">
                                <div class="product-img product-img-zoom" style="direction: rtl; text-align: right;">
                                    <a href="">
                                        <a href="{{route('products.show', encrypt($product->id))}}">
                                            <img src="{{ $product->getFirstMediaUrl('productFiles') }}" width="400" height="250" style="direction: rtl; text-align: right;">
                                        </a>
                                    </a>
                                </div>
                                <div class="product-action-1">
                                    <a aria-label="عرض" class="action-btn hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                    <button aria-label="إضافة إلي المفضلة" class="action-btn hover-up" onclick="addToFavorites({{ $product->id }})">
                                        <i class="fi-rs-heart"></i>
                                    </button>
                                    <a aria-label="تسوق الآن" class="action-btn hover-up" href="{{route('products.show', encrypt($product->id))}}"><i class="fi-rs-shopping-bag-add"></i></a>
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <h2><a href="">{{ $product->name }}</a></h2>
                                <span>
                                    @include('userDashboard.products.review.ratingProduct', ['rate' => calcReview($product)])
                                    @if($product->offer)
                                        <span>تخفيض %{{ $product->offer }}</span>
                                    @endif
                                </span>                                
                                <div class="product-price">
                                    <span>${{ $product->price_after_offer ?? $product->price }}</span>
                                    @if($product->offer)
                                        <span class="old-price">${{ $product->price }}</span>
                                    @endif
                                </div>
                            </div>

                        </div>
                        <!-- End product-cart-wrap-2 -->
                    @endforeach
                </div>
            </div>
        </div>

    </section>

    <section class="section-padding">
        <div class="container">
            <h3 class="section-title mb-20 wow fadeIn animated" style="text-align: center;"><span>الماركات</span></h3>
            <div class="carausel-6-columns-cover position-relative wow fadeIn animated">
                <div class="slider-arrow slider-arrow-2 carausel-6-columns-arrow"
                     id="carausel-6-columns-3-arrows"></div>
                <div class="carausel-6-columns text-center" id="carausel-6-columns-3">
                    @foreach($brands as $brand)
                        <div class="brand-logo">
                                <img src="{{$brand->getFirstMediaUrl('brandFiles')}}" class="img-grey-hover" alt="الماركات" style="width: 175px; height: 150px;">
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')

@endsection
