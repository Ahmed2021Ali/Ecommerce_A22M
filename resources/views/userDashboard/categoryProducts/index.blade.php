<section class="section-padding">
    <div class="container wow fadeIn animated">
        <h3 class="section-title mb-20" style="direction: rtl; text-align: center;">
            <span>  المنتجات </span> {{$category->name}}</h3>
        <div class="carausel-6-columns-cover position-relative">
            <div class="slider-arrow slider-arrow-2 carausel-6-columns-arrow" id="carausel-6-columns-2-arrows"></div>
            <div class="carausel-6-columns carausel-arrow-center" id="carausel-6-columns-2">
                @foreach($featuredProducts as $product)
                    <div class="product-cart-wrap small hover-up">
                        <div class="product-img-action-wrap">
                            <div class="product-img product-img-zoom" style="direction: rtl; text-align: right;">
                                <a href="{{ route('products.show', encrypt($product->id)) }}">
                                    <img src="{{ $product->getFirstMediaUrl('productFiles') }}" width="400" height="250"
                                         style="direction: rtl; text-align: right;" alt="{{$product->name}}">
                                </a>
                            </div>
                            <div class="product-action-1">
                                <a href="{{ $product->getFirstMediaUrl('productFiles') }}" aria-label="عرض"
                                   class="action-btn hover-up" data-bs-target="#quickViewModal"><i
                                        class="fi-rs-eye"></i></a>
                                <a aria-label="أضف إلي المفضلة" class="action-btn hover-up"
                                   onclick="addToFavorites({{ $product->id }})"><i class="fi-rs-heart"></i></a>
                            </div>
                        </div>
                        <div class="product-content-wrap">
                            <h2>
                                <a href="{{ route('products.show', encrypt($product->id)) }}">{{ $product->name }}</a>
                            </h2>
                            <span>
                                @if($product->offer)
                                    <span>تخفيض %{{ $product->offer }}</span>
                                @endif
                                </span>
                            @include('userDashboard.products.review.ratingProduct2',['rate'=>calcReview($product)])

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
                @endforeach
            </div>
        </div>
    </div>
</section>

