@extends('userDashboard.layouts.master')

@section('title')
    تفاصيل المنتج
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        div.stars {

            width: 270px;

            display: inline-block;

        }

        .mt-200 {
            margin-top: 200px;
        }

        input.star {
            display: none;
        }

        label.star {

            float: right;

            padding: 10px;

            font-size: 36px;

            color: #4A148C;

            transition: all .2s;

        }

        input.star:checked~label.star:before {

            content: '\f005';

            color: #FD4;

            transition: all .25s;

        }

        input.star-5:checked~label.star:before {

            color: #FE7;

            text-shadow: 0 0 20px #952;

        }

        input.star-1:checked~label.star:before {
            color: #F62;
        }

        label.star:hover {
            transform: rotate(-15deg) scale(1.3);
        }

        label.star:before {

            content: '\f006';

            font-family: FontAwesome;

        }
    </style>
@endsection
@section('pageHeader')
    تفاصيل المنتج <span></span> {{ $product->name }}
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
                                            @foreach ($product->getMedia('productFiles') as $media)
                                                <figure class="border-radius-10">
                                                    <img src="{{ $media->getFullUrl() }}" alt="product image">
                                                </figure>
                                            @endforeach
                                        </div>
                                        <!-- Thumbnail Images -->
                                        <div class="slider-nav-thumbnails pl-15 pr-15">
                                            @foreach ($product->getMedia('productFiles') as $media)
                                                <div>
                                                    <img src="{{ $media->getFullUrl() }}" alt="product image">
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <!-- End Gallery -->

                                    {{-- share with --}}
                                    <div class="social-icons single-share" style="text-align:center">
                                        <ul class="text-grey-5 d-inline-block">
                                            <li class="social-facebook"><a class="facebook" target="blank"><img
                                                        src="{{ URL::asset('assets/imgs/theme/icons/icon-facebook.svg') }}"
                                                        alt=""></a></li>
                                            <li><a class="whatsapp" target="blank"><i class="fab fa-whatsapp"></i></a>
                                            </li>
                                            <li class="social-twitter"><a class="twitter" target="blank"><img
                                                        src="{{ URL::asset('assets/imgs/theme/icons/icon-twitter.svg') }}"
                                                        alt=""></a></li>
                                            <li><strong class="mr-10">شارك هذا المنتج علي </strong></li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <!-- Product Info -->
                                    <div class="detail-info" style="direction: rtl; text-align: right;">
                                        <!-- Product Title and Rating -->
                                        <h2 class="title-detail">{{ Str::limit($product->name, 29) }}</h2>
                                        <div class="product-detail-rating">
                                            <div class="product-rate-cover text-end">
                                                @include('userDashboard.products.review.ratingProduct2', [
                                                    'rate' => calcReview($product),
                                                ])
                                                <span class="font-small ml-5 text-muted">
                                                    ({{ $product->reviews()->where('star', '!=', null)->count() }}
                                                    التقييم)</span>
                                            </div>
                                        </div>
                                        <!-- Product Price -->
                                        <div class="clearfix product-price-cover">
                                            <div class="product-price primary-color float-left">
                                                <ins><span class="text-brand">{{ $product->price_after_offer }}</span>
                                                </ins>
                                                <ins><span class="old-price font-md ml-15">{{ $product->price }}</span>
                                                </ins>
                                                @if ($product->offer)
                                                    <span class="save-price  font-md color3 ml-15">تخفيض
                                                        %{{ $product->offer }}</span>
                                                @endif

                                            </div>
                                        </div>
                                        <div class="bt-1 border-color-1 mt-15 mb-15"></div>
                                        <!-- Additional Info -->
                                        <div class="product_sort_info font-xs mb-30"
                                            style="direction: rtl; text-align: right;">
                                            <ul>
                                                <li class="mb-10"><i class="fi-rs-refresh mr-5"></i> سياسة الإرجاع لمدة
                                                    30 يومًا
                                                </li>
                                                <li><i class="fi-rs-credit-card mr-5"></i> الدفع عند الاستلام متاح</li>
                                            </ul>
                                        </div>
                                        @if ($product->quantity !== '0')
                                            <form action="{{ route('cart.store', $product) }}" method="post">
                                                @csrf

                                                @if ($product->color !== null)
                                                    {{-- color --}}
                                                    <div class="attr-detail attr-color mb-15"
                                                        style="display: flex; margin-top: 2px; direction: rtl; text-align: right;">
                                                        <strong class="mr-10">اللون &nbsp;&nbsp;</strong>
                                                        <ul class="list-filter color-filter">
                                                            <li><a href="#"><span class="product-color-teal"
                                                                        style="width: 30px; height: 30px; border-radius: 50%; cursor: pointer; display: flex; margin-right: 6px;"></span></a>
                                                            </li>
                                                            <div class="colors">
                                                                @foreach (explode(',', $product->color) as $color)
                                                                    <span
                                                                        style="width: 30px; height: 30px; border-radius: 50%; cursor: pointer; display: inline-block; margin-right: 6px; background-color:{{ $color }}">
                                                                        <li style="display: inline-block;"><input
                                                                                type="checkbox" name="color"
                                                                                value="{{ $color }}"></li>
                                                                    </span>
                                                                @endforeach
                                                            </div>
                                                        </ul>
                                                    </div>
                                                @endif

                                                @if ($product->size !== null)
                                                    {{-- size --}}
                                                    <div class="col-md-12">
                                                        <select name="size" id="size" class="form-control">
                                                            <option value="" style="display: none">اختار مقاسك
                                                            </option>
                                                            @foreach (explode(',', $product->size) as $size)
                                                                <option value="{{ strtoupper($size) }}">
                                                                    {{ strtoupper($size) }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                @endif
                                                <div class="bt-1 border-color-1 mt-30 mb-30"></div>
                                                <div class="detail-extralink">
                                                    <br>
                                                    <div class="product-extra-link2">
                                                        <a aria-label="Add To Wishlist" class="action-btn hover-up"
                                                            onclick="addToFavorites({{ $product->id }})"><i
                                                                class="fi-rs-heart"></i></a>
                                                        <button type="submit" name="button" value="addCart"
                                                            class="button button-add-to-cart">أضف إلي السلة
                                                        </button>
                                                        <input type="number" name="quantity" id="quantity" value="1"
                                                            min="1"
                                                            style="display: inline-block; width: 70px; padding: 6px; text-align: center; border: 1px solid #ccc; border-radius: 3px;">
                                                    </div>
                                                </div>
                                                @error('quantity')
                                                    <div style="color: red">{{ $message }}</div>
                                                @enderror
                                                <br>

                                                <div class="d-grid gap-2">
                                                    <button type="submit" name="button" value="payNow"
                                                        class="btn btn-primary">اشتري الان
                                                    </button>
                                                </div>
                                            </form>
                                        @else
                                            <h4 style="color: red"> المنتج غير متوفر </h4>
                                        @endif

                                    </div>
                                    <!-- End Product Info -->
                                </div>
                            </div>
                            <!-- End Gallery and Product Info -->


                            <!-- Review and Description Product Info -->
                            @include('userDashboard.products.review.index', ['product' => $product])
                            <!-- End Review Product Info -->


                            <!-- Related Products -->
                            <div class="row mt-60" style="direction: rtl; text-align: right;">
                                <div class="col-12">
                                    <h3>منتجات مشابهة</h3>
                                </div>
                                <hr>
                                <div class="col-12">
                                    <div class="row related-products">
                                        @foreach ($product->category->products() as $relatedProduct)
                                            <div class="col-lg-3 col-md-4 col-12 col-sm-6">
                                                <div class="product-cart-wrap small hover-up">
                                                    <div class="product-img-action-wrap">
                                                        <div class="product-img product-img-zoom">
                                                            <a href="{{ route('products.show', encrypt($relatedProduct->id)) }}"
                                                                tabindex="0">
                                                                <img class="default-img"
                                                                    src="{{ $relatedProduct->getFirstMediaUrl('productFiles') }}"
                                                                    alt="{{ $relatedProduct->name }}" width="400px"
                                                                    height="250px">
                                                            </a>
                                                        </div>
                                                        <div class="product-action-1">
                                                            <a href="{{ $relatedProduct->getFirstMediaUrl('productFiles') }}"
                                                                aria-label="عرض" class="action-btn small hover-up"
                                                                data-bs-target="#quickViewModal"><i
                                                                    class="fi-rs-eye"></i></a>
                                                            <a aria-label="أضف إلى المفضلة"
                                                                class="action-btn small hover-up"
                                                                onclick="addToFavorites({{ $relatedProduct->id }})"
                                                                tabindex="0"><i class="fi-rs-heart"></i></a>

                                                        </div>
                                                    </div>
                                                    <div class="product-content-wrap">
                                                        <h2>
                                                            <a href="{{ route('products.show', encrypt($product->id)) }}">{{ $relatedProduct->name }}

                                                            </a>
                                                        </h2>
                                                        @include(
                                                            'userDashboard.products.review.ratingProduct',
                                                            ['rate' => calcReview($relatedProduct)]
                                                        )
                                                        @if ($relatedProduct->offer)
                                                            <span>تخفيض %{{ $relatedProduct->offer }}</span>
                                                        @endif

                                                        <div class="product-price">
                                                            <span> ج
                                                                {{ $relatedProduct->price_after_offer ?? $relatedProduct->price }}</span>
                                                            @if ($relatedProduct->offer)
                                                                <span class="old-price"> ج
                                                                    {{ $relatedProduct->price }}</span>
                                                            @endif
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                        <br>

                                    </div>
                                </div>
                                {{ $product->category->products() }}
                            </div>
                            <!-- End Related Products -->
                        </div>
                        <!-- Sidebar -->
                        <div class="col-lg-3 primary-sidebar sticky-sidebar">
                            <!-- Categories -->
                            <x-right-sidebar />
                        </div>
                        <!-- End Sidebar -->
                    </div>

                </div>
            </div>
        </section>
    </main>
@endsection
@section('js')
    <script>
        const link = '{{ url()->current() }}';
        const msg = 'العرض لفترة محدودة';
        const title = 'العرض لفترة محدودة';

        const fb = document.querySelector('.facebook');
        fb.href = `https://www.facebook.com/share.php?u=${link}`;

        const twitter = document.querySelector('.twitter');
        twitter.href = `http://twitter.com/share?&url=${link}&text=${msg}&hashtags=javascript,programming`;

        const whatsapp = document.querySelector('.whatsapp');
        whatsapp.href = `https://api.whatsapp.com/send?text=${msg}: ${link}`;
    </script>


@endsection
