@extends('userDashboard.layouts.master')
@section('title')
    المفضلة
@endsection
@section('css')

@endsection

@section('content')
    <section class="mt-50 mb-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="shop-product-fillter">
                        <div class="totall-product">
                            <p> لديك <strong class="text-brand">{{$count}}</strong> في الممفضلة </p>
                        </div>
                    </div>
                    <div class="row product-grid-4">
                        @foreach($favs as $fav)
                            <div class="col-lg-5 col-md-4 col-sm-6 col-xs-6 col-6">
                                <div class="product-cart-wrap mb-30">
                                    <div class="product-img-action-wrap">
                                        <div class="product-img product-img-zoom">
                                            @foreach($fav->product->getMedia('productFiles') as $media)
                                                <a href="{{route('products.show', $fav->product->id)}}"><img
                                                        src="{{$media->getFullUrl()}}" width="400" height="250"
                                                        style="direction: rtl; text-align: right;"></a>
                                            @endforeach
                                        </div>
                                        <div class="product-action-1">
                                            <a aria-label="عرض" class="action-btn hover-up" data-bs-toggle="modal"
                                               data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                            <a aria-label=" حذف من  المفضلة" class="action-btn hover-up"
                                               href="{{route('fav.destroy',$fav->id)}}"><i
                                                    class="fi-rs-heart"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-content-wrap">
                                        <div class="product-category">
                                            <a href="">{{ $fav->product->name }}</a>

                                        </div>
                                        <h2><a href="">{{ $fav->product->description }}</a></h2>
                                        <span>
                            <span>تخفيض %{{ $fav->product->offer }}</span>
                        </span>
                                        <div class="product-price">
                                            <span>${{ $fav->product->price_after_offer ?? $fav->product->price }}</span>
                                            @if($fav->product->offer)
                                                <span class="old-price">${{ $fav->product->price }}</span>
                                            @endif
                                        </div>
                                        <div class="product-action-1 show">
                                            <a aria-label="تسوق الآن" class="action-btn hover-up"
                                               href="{{route('products.show', $fav->product->id)}}"><i
                                                    class="fi-rs-shopping-bag-add"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-3 primary-sidebar sticky-sidebar">
                    <div class="row">
                        <div class="col-lg-12 col-mg-6"></div>
                        <div class="col-lg-12 col-mg-6"></div>
                    </div>
                    <div class="widget-category mb-30">
                        <h5 class="section-title style-1 mb-30 wow fadeIn animated">الاقسام</h5>
                        <ul class="categories">
                            @foreach($categories as $category)
                                <li><a href="shop.html">{{$category->name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
