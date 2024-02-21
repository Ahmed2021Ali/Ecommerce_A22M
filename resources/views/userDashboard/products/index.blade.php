@extends('userDashboard.layouts.master')
@section('title')
    @if(isset($category))
        {{ $category->name }} - المنتجات
    @else
        المنتجات
    @endif
@endsection
@section('css')

@endsection
@section('pageHeader')
    @if(isset($category))
        {{ $category->name }} <span></span> المنتجات
    @else
        المنتجات
    @endif
@endsection
@section('content')
    <main class="main">
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="row product-grid-3">
                            <div class="row product-grid-4" style="direction: rtl; text-align: center;">
                                @foreach($products as $product)
                                    <div class="col-lg-4 col-md-6 col-sm-10 col-xs-10 col-10">
                                        <div class="product-cart-wrap mb-30">
                                            <div class="product-img-action-wrap">
                                                <div class="product-img product-img-zoom">
                                                    <a href="{{route('products.show', encrypt($product->id))}}"><img
                                                            src="{{$product->getFirstMediaUrl('productFiles')}}"
                                                            width="600" height="300"></a>
                                                </div>
                                                <div class="product-action-1">
                                                    <a href="{{ $product->getFirstMediaUrl('productFiles') }}"
                                                       aria-label="عرض" class="action-btn hover-up"
                                                       data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a><a
                                                        aria-label="أضف إلي المفضلة" class="action-btn hover-up"
                                                        onclick="addToFavorites({{ $product->id }})"><i
                                                            class="fi-rs-heart"></i></a>
                                                </div>
                                            </div>
                                            <div class="product-content-wrap">
                                                <h2>
                                                    <a href="{{route('products.show', encrypt($product->id))}}">{{ $product->name }}</a>
                                                </h2>
                                                <span>
                                                    @include('userDashboard.products.review.ratingProduct',['rate'=>calcReview($product)])
                                                    @if($product->offer)
                                                        <span>تخفيض %{{ $product->offer }}</span>
                                                    @endif
                                                </span>
                                                <div class="product-price">
                                                    <span> ج {{ $product->price_after_offer ?? $product->price }}</span>
                                                    @if($product->offer)
                                                        <span class="old-price"> ج {{ $product->price }}</span>
                                                    @endif
                                                </div>
                                                <div class="product-action-1 show">
                                                    <a aria-label="تسوق الآن" class="action-btn hover-up"
                                                       href="{{route('products.show', encrypt($product->id))}}"><i
                                                            class="fi-rs-shopping-bag-add"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                <!--End product-grid-4-->
                            </div>
                        </div>
                        <!--pagination-->
                        <div class="pagination-area mt-15 mb-sm-5 mb-lg-0" style="direction: rtl;">
                            <nav aria-label="Page navigation example">
                                {{ $products->links() }}
                            </nav>
                        </div>
                    </div>
                    <div class="col-lg-3 primary-sidebar sticky-sidebar">
                        <!-- Fillter By Price -->
                        <x-right-sidebar/>
                        <!-- Product sidebar Widget -->
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection


@section('js')

@endsection

