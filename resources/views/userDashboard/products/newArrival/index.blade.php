<section class="section-padding">
    <div class="container wow fadeIn animated">
        <h3 class="section-title mb-20" style="direction: rtl; text-align: center;"><span>المنتجات</span> الجديدة</h3>
        <div class="carausel-6-columns-cover position-relative">
            <div class="slider-arrow slider-arrow-2 carausel-6-columns-arrow"
                 id="carausel-6-columns-2-arrows"></div>
            <div class="carausel-6-columns carausel-arrow-center" id="carausel-6-columns-2">
                @foreach($newProducts as $newProduct)
                    <div class="product-cart-wrap small hover-up">
                        <div class="product-img-action-wrap">
                            <div class="product-img product-img-zoom" style="direction: rtl; text-align: right;">
                                <a href="{{ route('products.show', encrypt($newProduct->id)) }}">
                                    <img src="{{ $newProduct->getFirstMediaUrl('productFiles') }}" width="400"
                                         height="250" style="direction: rtl; text-align: right;"
                                         alt="{{$newProduct->name}}">
                                </a>
                            </div>
                            <div class="product-action-1">
                                <a href="{{ $newProduct->getFirstMediaUrl('productFiles') }}" aria-label="عرض"
                                   class="action-btn hover-up" data-bs-target="#quickViewModal"><i
                                        class="fi-rs-eye"></i></a>
                                <a id="addToFavoritesBtn" aria-label="إضافة إلي المفضلة"
                                   onclick="addToFavorites({{ $newProduct->id }})"><i class="fi-rs-heart"></i></a>
                                <a aria-label="تسوق الآن" class="action-btn hover-up"
                                   href="{{ route('products.show', encrypt($newProduct->id)) }}"><i
                                        class="fi-rs-shopping-bag-add"></i></a>
                                <a aria-label="تسوق الآن" class="action-btn hover-up"
                                   href="{{route('products.show', encrypt($newProduct->id))}}"><i
                                        class="fi-rs-shopping-bag-add"></i></a>
                            </div>
                        </div>
                        <div class="product-content-wrap">
                            <h2>
                                <a href="{{ route('products.show', encrypt($newProduct->id)) }}">{{ Str::limit($newProduct->name, 25) }}</a>
                            </h2>
                            {{ Str::limit($newProduct->description, 35) }}
                            <span>
                                    @include('userDashboard.products.review.ratingProduct',['rate'=>calcReview($newProduct)])
                                @if($newProduct->offer)
                                    <span>تخفيض %{{ $newProduct->offer }}</span>
                                @endif
                                </span>
                            <div class="product-price">
                                <span>{{ $newProduct->price_after_offer ?? $newProduct->price }}</span>
                                @if($newProduct->offer)
                                    <span class="old-price">${{ $newProduct->price }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <!-- End product-cart-wrap-2 -->
                @endforeach
            </div>
        </div>
    </div>
</section>
