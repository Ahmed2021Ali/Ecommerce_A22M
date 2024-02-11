@extends('userDashboard.layouts.master')

@section('title')
    تفاصيل المنتج
@endsection

@section('css')


@endsection
@section('pageHeader')
    تفاصيل المنتج 
@endsection
@section('content')
    <main class="main">
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <!-- Product Details -->
                        <div class="product-detail accordion-detail">
                            <!-- Gallery and Product Info -->
                            <div class="row mb-50">
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <!-- Product Gallery -->
                                    <div class="detail-gallery">
                                        <!-- Gallery Images -->
                                        <div class="product-image-slider">
                                            @foreach($product->getMedia('productFiles') as $media)
                                                <figure class="border-radius-10">
                                                    <img src="{{$product->getFirstMediaUrl('productFiles')}}" alt="product image">
                                                </figure>
                                            @endforeach
                                        </div>
                                        <!-- Thumbnail Images -->
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
                                    <!-- Product Info -->
                                    <div class="detail-info" style="direction: rtl; text-align: right;">
                                        <!-- Product Title and Rating -->
                                        <h2 class="title-detail">{{$product->name}}</h2>
                                        <div class="product-detail-rating">
                                            <div class="product-rate-cover text-end">
                                                <div class="product-rate d-inline-block">
                                                    <div class="product-rating" style="width:90%"></div>
                                                </div>
                                                <span class="font-small ml-5 text-muted"> (25 التقييم)</span>
                                            </div>
                                        </div>
                                        <!-- Product Price -->
                                        <div class="clearfix product-price-cover">
                                            <div class="product-price primary-color float-left">
                                                <ins><span class="text-brand">{{$product->price_after_offer}}</span></ins>
                                                <ins><span class="old-price font-md ml-15">{{$product->price}}</span></ins>
                                                <span class="save-price  font-md color3 ml-15">تخفيض %{{ $product->offer }}</span>
                                            </div>
                                        </div>
                                        <div class="bt-1 border-color-1 mt-15 mb-15"></div>
                                        <!-- Product Description -->
                                        <div class="short-desc mb-30">
                                            <p>{{$product->description}}</p>
                                        </div>
                                        <!-- Additional Info -->
                                        <div class="product_sort_info font-xs mb-30" style="direction: rtl; text-align: right;">
                                            <ul>
                                                <li class="mb-10"><i class="fi-rs-refresh mr-5"></i> سياسة الإرجاع لمدة 30 يومًا </li>
                                                <li><i class="fi-rs-credit-card mr-5"></i> الدفع عند الاستلام متاح </li>
                                            </ul>
                                        </div>
                                        <form action="{{route('cart.store',$product) }}" method="post">
                                            @csrf
                                            <div class="attr-detail attr-color mb-15" style="display: flex; margin-top: 2px; direction: rtl; text-align: right;">
                                                <strong class="mr-10">اللون &nbsp;&nbsp;</strong>
                                                <ul class="list-filter color-filter">
                                                    <li><a href="#"><span class="product-color-teal" style="width: 30px; height: 30px; border-radius: 50%; cursor: pointer; display: flex; margin-right: 6px;"></span></a></li>
                                                    <div class="colors">
                                                        @foreach (explode(',', $product->color) as $color)
                                                            <span style="width: 30px; height: 30px; border-radius: 50%; cursor: pointer; display: inline-block; margin-right: 6px; background-color:{{ $color }}"><li style="display: inline-block;"><input type="checkbox" name="color" value="{{ $color }}"></li></span>
                                                        @endforeach
                                                    </div>
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
                                    <!-- End Product Info -->
                                </div>
                            </div>
                            <!-- End Gallery and Product Info -->

                            <!-- Related Products -->
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
                                                            <a aria-label="أضف إلى المفضلة" class="action-btn small hover-up" href="wishlist.php" tabindex="0"><i class="fi-rs-heart"></i></a>
                                                            <a aria-label="تسوق الآن" class="action-btn hover-up" href="{{route('products.show', $product->id)}}"><i class="fi-rs-shopping-bag-add"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <!-- End Related Products -->
                        </div>
                    </div>

                    <!-- Sidebar -->
                    <div class="col-lg-3 primary-sidebar sticky-sidebar">
                        <!-- Categories -->
                        <div class="widget-category mb-30" style="direction: rtl; text-align: right;">
                            <h5 >الأقسام</h5>
                            <hr>
                            <ul class="categories">
                                @foreach($categories as $category)
                                    <li><a href="{{route('category.products', $category->id)}}">{{$category->name}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        <!-- Price Range Filter -->
                        <form method="POST" action="{{ route('search.filter') }}" enctype="multipart/form-data">
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
                        <!-- New Products Widget -->
                        <div class="sidebar-widget product-sidebar  mb-30 p-30 bg-grey border-radius-10" style="direction: rtl; text-align: right;">
                            <!-- New Products Header -->
                            <div class="widget-header position-relative mb-20 pb-10" style="direction: rtl; text-align: right;">
                                <h5 class="widget-title mb-10">المنتجات الجديدة</h5>
                                <div class="bt-1 border-color-1"></div>
                            </div>
                            <!-- New Products List -->
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
                                        <p class="price mb-0 mt-5">{{$newProduct->price_after_offer}} ج</p>
                                        <div class="product-rate">
                                            <div class="product-rating" style="width:90%"></div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- End Sidebar -->
                </div>
            </div>
        </section>
    </main>
@endsection
