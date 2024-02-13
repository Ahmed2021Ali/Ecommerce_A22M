@extends('userDashboard.layouts.master')
    @section('title')
    {{ $categoryName->name }} - المنتجات
    @endsection
    @section('css')

    @endsection
    @section('pageHeader')
        {{ $categoryName->name }} <span></span> المنتجات
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
                                        <div class="col-lg-4 col-md-6 col-sm-10 col-xs-10 col-10" >
                                            <div class="product-cart-wrap mb-30" >
                                                <div class="product-img-action-wrap">
                                                    <div class="product-img product-img-zoom" >
                                                        @foreach($product->getMedia('productFiles') as $media)
                                                            <a href="{{route('products.show', encrypt($product->id))}}"><img  src="{{$media->getFullUrl()}}" width="600" height="300"></a>
                                                            @break
                                                        @endforeach
                                                    </div>
                                                    <div class="product-action-1">
                                                        <a aria-label="عرض" class="action-btn hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                                        <a aria-label="أضف إلي المفضلة" class="action-btn hover-up" onclick="addToFavorites({{ $product->id }})"><i class="fi-rs-heart"></i></a>
                                                    </div>
                                                </div>
                                                <div class="product-content-wrap">
                                                    <div class="product-category">
                                                        <a href="{{route('products.show', encrypt($product->id))}}">{{ $product->name }}</a>

                                                    </div>
                                                    <h2><a href="{{route('products.show', encrypt($product->id))}}">{{ $product->description }}</a></h2>
                                                    <span>
                                                        <span>تخفيض %{{ $product->offer }}</span>
                                                    </span>
                                                    <div class="product-price">
                                                        <span>${{ $product->price_after_offer ?? $product->price }}</span>
                                                        @if($product->offer)
                                                            <span class="old-price">${{ $product->price }}</span>
                                                        @endif
                                                    </div>
                                                    <div class="product-action-1 show">
                                                        <a aria-label="تسوق الآن" class="action-btn hover-up" href="{{route('products.show', encrypt($product->id))}}"><i class="fi-rs-shopping-bag-add"></i></a>
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
                        <div class="widget-category mb-30" style="direction: rtl; text-align: right;">
                            <h5 >الأقسام</h5>
                            <hr>
                            <ul class="categories">
                                @foreach($categories as $category)
                                    <li><a href="{{route('category.products', $category->id)}}">{{$category->name}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        <!-- Fillter By Price -->
                        <form method="GET" action="{{ route('search.filter') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="sidebar-widget price_range range mb-30" style="direction: rtl; text-align: right;">
                                <!-- Price Range Header -->
                                <div class="widget-header position-relative mb-20 pb-10">
                                    <h5 class="widget-title mb-10">ملء حسب السعر</h5>
                                    <div class="bt-1 border-color-1"></div>
                                </div>
                                <!-- Price Slider and Input -->
                                @include('userDashboard.layouts.rightSidebar')

                        <!-- Product sidebar Widget -->
                    </div>
                </div>
            </div>
        </section>
    </main>
    @endsection


    @section('js')

    @endsection

