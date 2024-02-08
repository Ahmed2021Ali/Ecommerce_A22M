@extends('userDashboard.layouts.master')
@section('title')
    الصفحة الرئيسية   
@endsection
@section('css')

@endsection

@section('content')
    @include('userDashboard.slider.index')
    <section class="featured section-padding position-relative">
        <div class="container">
            <div class="row">
                <div class="row">
                    <div class="row" style="direction: rtl; text-align: center;">
                        <div class="col-12 text-right mb-4">
                            <h4 style="font-weight: bold; color: #F15412">الخدمات</h4>
                        </div>
                        @foreach($services as $service)
                            <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0 text-center">
                                @foreach($service->getMedia('serviceFiles') as $media)
                                    <img src="{{ $media->getFullUrl() }}" width="100" height="100">
                                @endforeach
                                <h4>{{ $service->name }}</h4>
                            </div>
                        @endforeach
                    </div>
                    
                    
                </div>
                
            </div>
        </div>
    </section>
    <section class="product-tabs section-padding position-relative wow fadeIn animated">
        <div class="bg-square"></div>
        <div class="container">
            <div class="tab-header">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="nav-tab-one" data-bs-toggle="tab" data-bs-target="#tab-one"
                                type="button" role="tab" aria-controls="tab-one" aria-selected="true">Featured
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="nav-tab-two" data-bs-toggle="tab" data-bs-target="#tab-two"
                                type="button" role="tab" aria-controls="tab-two" aria-selected="false">Popular
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="nav-tab-three" data-bs-toggle="tab" data-bs-target="#tab-three"
                                type="button" role="tab" aria-controls="tab-three" aria-selected="false">New added
                        </button>
                    </li>
                </ul>
                <a href="#" class="view-more d-none d-md-flex">View More<i
                        class="fi-rs-angle-double-small-right"></i></a>
            </div>
            <!--End nav-tabs-->
            <div class="tab-content wow fadeIn animated" id="myTabContent">
                @include('userDashboard.products.featured.index')
                @include('userDashboard.products.popular.index')
                @include('userDashboard.products.newAdded.index')

            </div>
        </div>
    </section>
    {{-- <section class="banner-2 section-padding pb-0">
        <div class="container">
            <div class="banner-img banner-big wow fadeIn animated f-none">
                <img src="assets/imgs/banner/banner-4.png" alt="">
                <div class="banner-text d-md-block d-none">
                    <h4 class="mb-15 mt-40 text-brand">Repair Services</h4>
                    <h1 class="fw-600 mb-20">We're an Apple <br>Authorised Service Provider</h1>
                    <a href="shop.html" class="btn">Learn More <i class="fi-rs-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </section> --}}
    {{-- <section class="popular-categories section-padding mt-15 mb-25">
        <div class="container wow fadeIn animated">
            <h3 class="section-title mb-20"><span>Popular</span> Categories</h3>
            <div class="carausel-6-columns-cover position-relative">
                <div class="slider-arrow slider-arrow-2 carausel-6-columns-arrow" id="carausel-6-columns-arrows"></div>
                <div class="carausel-6-columns" id="carausel-6-columns">
                    @include('userDashboard.products.popular.index')

                </div>
            </div>
        </div>
    </section> --}}
    <section class="banners mb-15">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="banner-img wow fadeIn animated">
                        <img src="assets/imgs/banner/banner-1.png" alt="">
                        <div class="banner-text">
                            <span>Smart Offer</span>
                            <h4>Save 20% on <br>Woman Bag</h4>
                            <a href="shop.html">Shop Now <i class="fi-rs-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="banner-img wow fadeIn animated">
                        <img src="assets/imgs/banner/banner-2.png" alt="">
                        <div class="banner-text">
                            <span>Sale off</span>
                            <h4>Great Summer <br>Collection</h4>
                            <a href="shop.html">Shop Now <i class="fi-rs-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 d-md-none d-lg-flex">
                    <div class="banner-img wow fadeIn animated  mb-sm-0">
                        <img src="assets/imgs/banner/banner-3.png" alt="">
                        <div class="banner-text">
                            <span>New Arrivals</span>
                            <h4>Shop Today’s <br>Deals & Offers</h4>
                            <a href="shop.html">Shop Now <i class="fi-rs-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-padding" style="direction: rtl; text-align: center;">
        <div class="container wow fadeIn animated">
            <h3 class="section-title mb-20"><span>المنتجات</span> الجديدة</h3>
            <div class="carausel-6-columns-cover position-relative">
                <div class="slider-arrow slider-arrow-2 carausel-6-columns-arrow" id="carausel-6-columns-2-arrows"></div>
                <div class="carausel-6-columns carausel-arrow-center" id="carausel-6-columns-2" >
                    @foreach($newArrivalProducts as $product)
                        <div class="product-cart-wrap small hover-up">
                            <div class="product-img-action-wrap">
                                <div class="product-img product-img-zoom" style="direction: rtl; text-align: right;">
                                    <a href="">
                                        @foreach($product->getMedia('productFiles') as $media)
                                            <a href="{{ route('products.show', $product->id) }}">
                                                <img src="{{ $media->getFullUrl() }}" width="400" height="250" style="direction: rtl; text-align: right;">
                                            </a>                                       
                                        @endforeach
                                    </a>
                                </div>
                                <div class="product-action-1">
                                    <a aria-label="عرض" class="action-btn hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                    <a aria-label="إضافة إلي المفضلة" class="action-btn hover-up" href="wishlist.php"><i class="fi-rs-heart"></i></a>
                                    <a aria-label="تسوق الآن" class="action-btn hover-up" href="{{ route('products.show', $product->id) }}"><i class="fi-rs-shopping-bag-add"></i></a>
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <h2><a href="" >{{ $product->name }}</a></h2>
                                    <span>
                                        <span>تخفيض %{{ $product->offer }}</span>
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

    <section class="section-padding" >
        <div class="container">
            <h3 class="section-title mb-20 wow fadeIn animated" style="text-align: center;"><span>الماركات</span> </h3>
            <div class="carausel-6-columns-cover position-relative wow fadeIn animated">
                <div class="slider-arrow slider-arrow-2 carausel-6-columns-arrow" id="carausel-6-columns-3-arrows"></div>
                <div class="carausel-6-columns text-center" id="carausel-6-columns-3">
                    @foreach($brands as $brand)
                        <div class="brand-logo">
                            @foreach($brand->getMedia('brandFiles') as $media)
                            <img src="{{$media->getFullUrl()}}" class="img-grey-hover" alt="الماركات" style="width: 175px; height: 150px;">
                            @endforeach
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    
@endsection

