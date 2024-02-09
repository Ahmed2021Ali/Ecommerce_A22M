@extends('userDashboard.layouts.master')
@section('title')
    تفاصيل المنتج
@endsection
@section('css')

@endsection

@section('content')
    <main class="main">
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="product-detail accordion-detail">
                            <div class="row mb-50">
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="detail-gallery">
                                        <span class="zoom-icon"><i class="fi-rs-search"></i></span>
                                        <!-- MAIN SLIDES -->
                                        <div class="product-image-slider">
                                            @foreach($product->getMedia('productFiles') as $media)
                                                <figure class="border-radius-10">
                                                    <img src="{{$media->getFullUrl()}}" alt="product image">
                                                </figure>
                                            @endforeach
                                        </div>
                                        <!-- THUMBNAILS -->
                                        <div class="slider-nav-thumbnails pl-15 pr-15">
                                            @foreach($product->getMedia('productFiles') as $media)
                                                <div>
                                                    <img src="{{$media->getFullUrl()}}" alt="product image">
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <!-- End Gallery -->
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="detail-info" style="direction: rtl; text-align: right;">
                                        <h2 class="title-detail">{{$product->name}}</h2>
                                        <div class="product-detail-rating">
                                            <div class="product-rate-cover text-end">
                                                <div class="product-rate d-inline-block">
                                                    <div class="product-rating" style="width:90%">
                                                    </div>
                                                </div>
                                                <span class="font-small ml-5 text-muted"> (25 التقييم)</span>
                                            </div>
                                        </div>
                                        <div class="clearfix product-price-cover">
                                            <div class="product-price primary-color float-left">
                                                <ins><span class="text-brand">{{$product->price}}</span></ins>
                                                <ins><span class="old-price font-md ml-15">{{$product->price_after_offer}}</span></ins>
                                                <span class="save-price  font-md color3 ml-15">تخفيض %{{ $product->offer }}</span>
                                            </div>
                                        </div>
                                        <div class="bt-1 border-color-1 mt-15 mb-15"></div>
                                        <div class="short-desc mb-30">
                                            <p>{{$product->description}}</p>
                                        </div>
                                        <div class="product_sort_info font-xs mb-30" style="direction: rtl; text-align: right;">
                                            <ul>
                                                <li class="mb-10"><i class="fi-rs-refresh mr-5"></i> سياسة الإرجاع لمدة 30 يومًا </li>
                                                <li><i class="fi-rs-credit-card mr-5"></i> الدفع عند الاستلام متاح </li>
                                            </ul>
                                        </div>
                                        <form action="{{route('cart.store',$product) }}" method="post">
                                            @csrf
                                            <div class="attr-detail attr-color mb-15">
                                                <strong class="mr-10">اللون &nbsp;&nbsp;</strong>
                                                <ul class="list-filter color-filter">
                                                    @foreach (explode(',', $product->color) as $color)
                                                        <li><a href="#" data-color="{{$color}}"><span class="product-color-{{$color}}"></span></a><input type="checkbox" name="color" value="{{$color}}"></li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                            <div class="attr-detail attr-size">
                                                <strong class="mr-10"> المقاس &nbsp;&nbsp;</strong>
                                                <ul class="list-filter size-filter font-small">
                                                    @foreach (explode(',', $product->size) as $size)
                                                        <li><a href="#">{{ strtoupper($size) }}</a><input type="checkbox" name="size" value="{{strtoupper($size)}}"></li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                            <div class="bt-1 border-color-1 mt-30 mb-30"></div>
                                            <div class="detail-extralink">
                                                <div class="product-extra-link2">
                                                    <a aria-label="Add To Wishlist" class="action-btn hover-up" href="{{route('fav.store',$product)}}"><i class="fi-rs-heart"></i></a>
                                                    <button type="submit" class="button button-add-to-cart">أضف إلي السلة</button>
                                                    <input type="number" name="quantity" id="quantity" value="1" min="1" style="display: inline-block; width: 70px; padding: 6px; text-align: center; border: 1px solid #ccc; border-radius: 3px;">
                                                </div>
                                            </div>
                                        </form>

                                    </div>
                                    <!-- Detail Info -->
                                </div>
                            </div>

                            <div class="row mt-60" style="direction: rtl; text-align: right;">
                                <div class="col-12">
                                    <h3>منتجات مشابهة</h3>
                                </div>
                                <hr>
                                <div class="col-12">
                                    <div class="row related-products">
                                        @foreach($relatedProducts as $relatedProduct)
                                            <div class="col-lg-3 col-md-4 col-12 col-sm-6">
                                                <div class="product-cart-wrap small hover-up">
                                                    <div class="product-img-action-wrap">
                                                        <div class="product-img product-img-zoom">
                                                            <a href="{{route('products.show', $relatedProduct->id)}}" tabindex="0">
                                                                @foreach($relatedProduct->getMedia('productFiles') as $media)
                                                                    <img class="default-img" src="{{ $media->getFullUrl() }}" alt="{{ $relatedProduct->name }}" width="400px" height="250px">
                                                                    @break
                                                                @endforeach
                                                            </a>
                                                        </div>
                                                        <div class="product-action-1">
                                                            <a aria-label="عرض" class="action-btn small hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-search"></i></a>
                                                            <a aria-label="أضف إالي المفضلة" class="action-btn small hover-up" href="wishlist.php" tabindex="0"><i class="fi-rs-heart"></i></a>
                                                            <a aria-label="تسوق الآن" class="action-btn hover-up" href="{{route('products.show', $product->id)}}"><i class="fi-rs-shopping-bag-add"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 primary-sidebar sticky-sidebar">
                        <div class="widget-category mb-30" style="direction: rtl; text-align: right;">
                            <h5 >الأقسام</h5>
                            <hr>
                            <ul class="categories">
                                @foreach($categories as $category)
                                    <li><a href="">{{$category->name}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        <!-- Fillter By Price -->
                        <div class="sidebar-widget price_range range mb-30" style="direction: rtl; text-align: right;">
                            <div class="widget-header position-relative mb-20 pb-10">
                                <h5 class="widget-title mb-10">ملء حسب السعر</h5>
                                <div class="bt-1 border-color-1"></div>
                            </div>
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
                            <div class="list-group">
                                <div class="list-group-item mb-10 mt-10">
                                    <label class="fw-900">اللون</label>
                                    <div class="custome-checkbox">
                                        @foreach (explode(',', $product->color) as $color)
                                            <input class="form-check-input" type="checkbox" name="color" id="exampleCheckbox{{ $loop->iteration }}" value="{{ $color }}">
                                            <label class="form-check-label" for="exampleCheckbox{{ $loop->iteration }}">&nbsp;&nbsp;<span>{{ ucfirst($color) }}</span></label>
                                            <br>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <a href="shop.html" class="btn btn-sm btn-default"><i class="fi-rs-filter mr-5"></i> ابحث</a>
                        </div>
                        <!-- Product sidebar Widget -->
                        <div class="sidebar-widget product-sidebar  mb-30 p-30 bg-grey border-radius-10" style="direction: rtl; text-align: right;">
                            <div class="widget-header position-relative mb-20 pb-10">
                                <h5 class="widget-title mb-10">المنتجات الجديدة</h5>
                                <div class="bt-1 border-color-1"></div>
                            </div>
                            @foreach($newProducts as $newProduct)
                                <div class="single-post clearfix">
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
    </main>
@endsection
