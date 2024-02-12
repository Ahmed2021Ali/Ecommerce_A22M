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

        input.star:checked ~ label.star:before {

            content: '\f005';

            color: #FD4;

            transition: all .25s;

        }

        input.star-5:checked ~ label.star:before {

            color: #FE7;

            text-shadow: 0 0 20px #952;

        }

        input.star-1:checked ~ label.star:before {
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
                                                    <img src="{{$product->getFirstMediaUrl('productFiles')}}"
                                                         alt="product image">
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
                                    <div class="social-icons single-share">
                                        <ul class="text-grey-5 d-inline-block">
                                            <li><strong class="mr-10">Share this:</strong></li>
                                            <li class="social-facebook"><a href="#"><img
                                                        src="{{ URL::asset('assets/imgs/theme/icons/icon-facebook.svg') }}"
                                                        alt=""></a></li>
                                            <li class="social-twitter"><a href="#"><img
                                                        src="{{ URL::asset('assets/imgs/theme/icons/icon-twitter.svg') }}"
                                                        alt=""></a></li>
                                            <li class="social-instagram"><a href="#"><img
                                                        src="{{ URL::asset('assets/imgs/theme/icons/icon-instagram.svg') }}"
                                                        alt=""></a></li>
                                            <li class="social-linkedin"><a href="#"><img
                                                        src="{{ URL::asset('assets/imgs/theme/icons/icon-pinterest.svg"') }}"
                                                        alt=""></a></li>
                                        </ul>
                                    </div>
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
                                                <ins><span class="text-brand">{{$product->price_after_offer}}</span>
                                                </ins>
                                                <ins><span class="old-price font-md ml-15">{{$product->price}}</span>
                                                </ins>
                                                <span
                                                    class="save-price  font-md color3 ml-15">تخفيض %{{ $product->offer }}</span>
                                            </div>
                                        </div>
                                        <div class="bt-1 border-color-1 mt-15 mb-15"></div>
                                        <!-- Product Description -->
                                        <div class="short-desc mb-30">
                                            <p>{{$product->description}}</p>
                                        </div>
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
                                        <form action="{{route('cart.store',$product) }}" method="post">
                                            @csrf
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
                                                                style="width: 30px; height: 30px; border-radius: 50%; cursor: pointer; display: inline-block; margin-right: 6px; background-color:{{ $color }}"><li
                                                                    style="display: inline-block;"><input
                                                                        type="checkbox" name="color"
                                                                        value="{{ $color }}"></li></span>
                                                        @endforeach
                                                    </div>
                                                </ul>
                                            </div>

                                            <div class="attr-detail attr-size">
                                                <strong class="mr-10"> المقاس &nbsp;&nbsp;</strong>
                                                <ul class="list-filter size-filter font-small">
                                                    @foreach (explode(',', $product->size) as $size)
                                                        <li><a href="#">{{ strtoupper($size) }}</a><input
                                                                type="checkbox" name="size"
                                                                value="{{strtoupper($size)}}"></li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                            <div class="bt-1 border-color-1 mt-30 mb-30"></div>
                                            <div class="detail-extralink">
                                                <div class="product-extra-link2">
                                                    <a aria-label="Add To Wishlist" class="action-btn hover-up"
                                                       href="{{route('fav.store',$product)}}"><i
                                                            class="fi-rs-heart"></i></a>
                                                    <button type="submit" class="button button-add-to-cart">أضف إلي
                                                        السلة
                                                    </button>
                                                    <input type="number" name="quantity" id="quantity" value="1" min="1"
                                                           style="display: inline-block; width: 70px; padding: 6px; text-align: center; border: 1px solid #ccc; border-radius: 3px;">
                                                </div>
                                            </div>
                                        </form>

                                    </div>
                                    <!-- End Product Info -->
                                </div>
                            </div>
                            <!-- End Gallery and Product Info -->


                            <!-- Review Product Info -->
                            <div class="tab-style3" style="direction: rtl; text-align: right;">
                                <ul class="nav nav-tabs text-uppercase">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="Description-tab" data-bs-toggle="tab"
                                           href="#Description">الوصف</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="Reviews-tab" data-bs-toggle="tab" href="#Reviews">مراجعات
                                            المستخدمين </a>
                                    </li>
                                </ul>
                                <div class="tab-content shop_info_tab entry-main-content">
                                    <div class="tab-pane fade show active" id="Description">
                                        <div class="">
                                            <p>Uninhibited carnally hired played in whimpered dear gorilla koala
                                                depending and much yikes off far quetzal goodness and from for grimaced
                                                goodness unaccountably and meadowlark near unblushingly crucial scallop
                                                tightly neurotic hungrily some and dear furiously this apart.</p>
                                            <p>Spluttered narrowly yikes left moth in yikes bowed this that grizzly much
                                                hello on spoon-fed that alas rethought much decently richly and wow
                                                against the frequent fluidly at formidable acceptably flapped
                                                besides and much circa far over the bucolically hey precarious goldfinch
                                                mastodon goodness gnashed a jellyfish and one however because.
                                            </p>
                                            <ul class="product-more-infor mt-30">
                                                <li><span>Type Of Packing</span> Bottle</li>
                                                <li><span>Color</span> Green, Pink, Powder Blue, Purple</li>
                                                <li><span>Quantity Per Case</span> 100ml</li>
                                                <li><span>Ethyl Alcohol</span> 70%</li>
                                                <li><span>Piece In One</span> Carton</li>
                                            </ul>
                                            <hr class="wp-block-separator is-style-dots">
                                            <p>Laconic overheard dear woodchuck wow this outrageously taut beaver hey
                                                hello far meadowlark imitatively egregiously hugged that yikes minimally
                                                unanimous pouted flirtatiously as beaver beheld above forward
                                                energetic across this jeepers beneficently cockily less a the raucously
                                                that magic upheld far so the this where crud then below after jeez
                                                enchanting drunkenly more much wow callously irrespective limpet.</p>
                                            <h4 class="mt-30">Packaging & Delivery</h4>
                                            <hr class="wp-block-separator is-style-wide">
                                            <p>Less lion goodness that euphemistically robin expeditiously bluebird
                                                smugly scratched far while thus cackled sheepishly rigid after due one
                                                assenting regarding censorious while occasional or this more crane
                                                went more as this less much amid overhung anathematic because much held
                                                one exuberantly sheep goodness so where rat wry well concomitantly.
                                            </p>
                                            <p>Scallop or far crud plain remarkably far by thus far iguana lewd
                                                precociously and and less rattlesnake contrary caustic wow this near
                                                alas and next and pled the yikes articulate about as less cackled
                                                dalmatian
                                                in much less well jeering for the thanks blindly sentimental whimpered
                                                less across objectively fanciful grimaced wildly some wow and rose
                                                jeepers outgrew lugubrious luridly irrationally attractively
                                                dachshund.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="Reviews">
                                        <!--Comments-->
                                        @include('userDashboard.products.review.show',['product'=>$product])
                                        <!--comment form-->

                                        <!-- store review form-->
                                        @include('userDashboard.products.review.store',['product'=>$product])
                                        <!-- end store review form-->
                                    </div>
                                </div>
                            </div>
                            <!-- End Review Product Info -->


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
                                                            <a href="{{route('products.show', $relatedProduct->id)}}"
                                                               tabindex="0">
                                                                <img class="default-img"
                                                                     src="{{ $relatedProduct->getFirstMediaUrl('productFiles') }}"
                                                                     alt="{{ $relatedProduct->name }}" width="400px"
                                                                     height="250px">
                                                            </a>
                                                        </div>
                                                        <div class="product-action-1">
                                                            <a aria-label="عرض" class="action-btn small hover-up"
                                                               data-bs-toggle="modal"
                                                               data-bs-target="#quickViewModal"><i
                                                                    class="fi-rs-search"></i></a>
                                                            <a aria-label="أضف إلى المفضلة"
                                                               class="action-btn small hover-up" href="wishlist.php"
                                                               tabindex="0"><i class="fi-rs-heart"></i></a>
                                                            <a aria-label="تسوق الآن" class="action-btn hover-up"
                                                               href="{{route('products.show', $product->id)}}"><i
                                                                    class="fi-rs-shopping-bag-add"></i></a>
                                                        </div>
                                                    </div>
                                                    <div class="product-content-wrap">
                                                        <h2><a href="{{route('products.show',$relatedProduct)}}"
                                                               tabindex="0">{{$relatedProduct->name}}</a></h2>
                                                        <div class="rating-result" title="90%">
                                                        <span>
                                                        </span>
                                                        </div>
                                                        <div class="product-price">
                                                            <span>$238.85 </span>
                                                            <span class="old-price">$245.8</span>
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
                            <h5>الأقسام</h5>
                            <hr>
                            <ul class="categories">
                                @foreach($categories as $category)
                                    <li><a href="{{route('category.products', $category->id)}}">{{$category->name}}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>


                        <!-- Price Range Filter -->
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
                                                <span style="width: 30px; height: 30px;margin-bottom: 10px; border-radius: 50%; cursor: pointer; display: flex; margin-right: 6px; background-color:{{ $color->value }}"><li><input type="checkbox" name="color[]" value="{{ $color->value }}"></li></span>
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
                </div>
                <!-- End Sidebar -->
            </div>
            </div>
        </section>
    </main>
@endsection
