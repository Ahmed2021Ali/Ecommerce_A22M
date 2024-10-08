@extends('userDashboard.layouts.master')
@section('title')
    المفضلة
@endsection

@section('pageHeader')
    المفضلة
@endsection
@section('content')
    <section class="mt-50 mb-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="shop-product-fillter" style="direction: rtl; text-align: center;">
                        <div class="totall-product">
                            <p> لديك <strong class="text-brand">{{ Auth::user()->favs()->count() }}</strong> في الممفضلة
                            </p>
                        </div>
                    </div>
                    <div class="row product-grid-4" style="direction: rtl; text-align: center;">
                        @foreach (Auth::user()->favs() as $fav)
                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 col-6">
                                <div class="product-cart-wrap mb-30">
                                    <div class="product-img-action-wrap">
                                        <div class="product-img product-img-zoom">
                                            <a href="{{ route('products.show', encrypt($fav->product->id)) }}">
                                                <img src="{{ $fav->product->getFirstMediaUrl('productFiles') }}">
                                            </a></div>
                                        <div class="product-action-1">
                                            <a href="{{ $fav->product->getFirstMediaUrl('productFiles') }}" aria-label="عرض" class="action-btn hover-up" data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                            <a aria-label=" حذف من  المفضلة" class="action-btn hover-up" href="{{ route('fav.destroy', $fav->id) }}"><i class="fi-rs-trash"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-content-wrap">
                                        <div class="product-category">
                                            <a href="">{{ $fav->product->name }}</a>
                                        </div>
                                        <h2>
                                            <a href="{{ route('products.show', encrypt($fav->product->id)) }}">{{ Str::limit($fav->product->description, 50) }}

                                            </a>
                                        </h2>
                                        <span>
                                            @if($fav->product->offer)
                                                <span>تخفيض %{{ $fav->product->offer }}</span>
                                            @endif
                                            </span>
                                        <div class="product-price">
                                            <span>{{ $fav->product->price_after_offer ?? $fav->product->price }} جينية</span>
                                            @if ($fav->product->offer)
                                                <span class="old-price">{{ $fav->product->price }} جينية </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="pagination-area mt-15 mb-sm-5 mb-lg-0" style="direction: rtl;">
                        <nav aria-label="Page navigation example">
                            {{ Auth::user()->favs()->links() }}
                        </nav>
                    </div>
                </div>
                <div class="col-lg-3 primary-sidebar sticky-sidebar">
                    <div class="row">
                        <div class="col-lg-12 col-mg-6"></div>
                        <div class="col-lg-12 col-mg-6"></div>
                    </div>
                    <!-- Fillter By Price -->
                    <x-right-sidebar/>
                    <!-- Product sidebar Widget -->

                </div>
            </div>
        </div>
    </section>

@endsection
