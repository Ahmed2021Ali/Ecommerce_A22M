@extends('userDashboard.layouts.master')
@section('title')
    المفضلة
@endsection
@section('css')
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
                                <p> لديك <strong class="text-brand">{{ $count }}</strong> في الممفضلة </p>
                            </div>
                        </div>
                        <div class="row product-grid-4" style="direction: rtl; text-align: center;">
                            @foreach ($favs as $fav)
                                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 col-6">
                                    <div class="product-cart-wrap mb-30">
                                        <div class="product-img-action-wrap">
                                            <div class="product-img product-img-zoom">
                                                <a href="{{ route('products.show', $fav->product->id) }}"><img
                                                        src="{{ $fav->product->getFirstMediaUrl('productFiles') }}"
                                                        width="400" height="250"
                                                        style="direction: rtl; text-align: right;"></a>
                                            </div>
                                            <div class="product-action-1">
                                                <a aria-label="عرض" class="action-btn hover-up" data-bs-toggle="modal"
                                                    data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                                <a aria-label=" حذف من  المفضلة" class="action-btn hover-up"
                                                    href="{{ route('fav.destroy', $fav->id) }}"><i
                                                        class="fi-rs-trash"></i></a>

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
                                                @if ($fav->product->offer)
                                                    <span class="old-price">${{ $fav->product->price }}</span>
                                                @endif
                                            </div>
                                            <div class="product-action-1 show" style="text-align: left;">
                                                <a aria-label="تسوق الآن" class="action-btn hover-up" href="{{ route('products.show', $fav->product->id) }}">
                                                    <i class="fi-rs-shopping-bag-add"></i>
                                                </a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="pagination-area mt-15 mb-sm-5 mb-lg-0" style="direction: rtl;">
                            <nav aria-label="Page navigation example">
                                {{ $favs->links() }}
                            </nav>
                        </div>
                    </div>
                    <div class="col-lg-3 primary-sidebar sticky-sidebar">
                        <div class="row">
                            <div class="col-lg-12 col-mg-6"></div>
                            <div class="col-lg-12 col-mg-6"></div>
                        </div>
                        <div class="widget-category mb-30" style="direction: rtl;">
                            <h5 >الاقسام</h5>
                            <hr>
                            <ul class="categories">
                                @foreach ($categories as $category)
                                    <li><a href="{{route('category.products', $category->id)}}">{{ $category->name }}</a></li>
                                @endforeach
                            </ul>
                            {{ $categories->links() }}
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
                                <div class="price-filter">
                                    <div class="price-filter-inner">
                                        <div id="slider-range"></div>
                                        <div class="price_slider_amount">
                                            <div class="label-input">
                                                <span>يتراوح</span><input type="text" id="amount" name="price" placeholder="Add Your Price">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Color Filter -->
                                <br>
                                <strong class="mr-10">اللون &nbsp;&nbsp;</strong>
                                <br>
                                <br>
                                <div class="attr-detail attr-color mb-15" style="display: flex; margin-top: 2px; direction: rtl; text-align: right;">
                                    <ul class="list-filter color-filter">
                                        <div class="colors">
                                            @foreach (\App\Models\Color::all() as $color)
                                                <span style="width: 30px; height: 30px; border-radius: 50%; cursor: pointer; display: flex; margin-right: 6px; background-color:{{ $color->value }}"><li><input type="checkbox" name="color[]" value="{{ $color->value }}"></li></span>
                                            @endforeach
                                        </div>
                                    </ul>
                                </div>
                                <!-- Filter Button -->
                                <button type="submit" class="btn btn-sm btn-default">
                                    <i class="fi-rs-filter mr-5"></i> ابحث
                                </button>
                            </div>
                        </form>
                        <!-- Product sidebar Widget -->
                        <div class="sidebar-widget product-sidebar  mb-30 p-30 bg-grey border-radius-10" style="direction: rtl; text-align: right;">
                            <div class="widget-header position-relative mb-20 pb-10" style="direction: rtl; text-align: right;">
                                <h5 class="widget-title mb-10">المنتجات الجديدة</h5>
                                <div class="bt-1 border-color-1"></div>
                            </div>
                            @foreach($newProducts as $newProduct)
                                <div class="single-post clearfix" style="direction: rtl; text-align: right;">
                                    <div class="image">
                                        @foreach($newProduct->getMedia('productFiles') as $media)
                                            <a href="{{route('products.show', $newProduct->id)}}"><img src="{{$media->getFullUrl()}}" alt="product image"></a>
                                            @break
                                        @endforeach
                                    </div>
                                    <div class="content pt-10">
                                        <h5><a href="product-details.html">{{$newProduct->name}}</a></h5>
                                        <p class="price mb-0 mt-5">{{$newProduct->price}} ج</p>
                                        <div class="product-rate">
                                            <div class="product-rating" style="width:90%"></div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </section>


        @endsection
