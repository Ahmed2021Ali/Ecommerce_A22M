<section class="section-padding">
    <div class="container wow fadeIn animated">
        <h3 class="section-title mb-20" style="direction: rtl; text-align: center;"><span>المنتجات</span>
            {{$lastCategoryProducts->name }}</h3>
        <div class="carausel-6-columns-cover position-relative">
            <div class="slider-arrow slider-arrow-2 carausel-6-columns-arrow"
                 id="carausel-6-columns-2-arrows"></div>
            <div class="carausel-6-columns carausel-arrow-center" id="carausel-6-columns-2">
                @foreach($lastCategoryProducts->products2 as $lastCategoryProduct)
                    <div class="product-cart-wrap small hover-up">
                        <div class="product-img-action-wrap">
                            <div class="product-img product-img-zoom" style="direction: rtl; text-align: right;">
                                <div class="d-none d-lg-block">
                                <a href="{{ route('products.show', encrypt($lastCategoryProduct->id)) }}">
                                    <img src="{{ $lastCategoryProduct->getFirstMediaUrl('productFiles') }}" width="400" height="300" style="direction: rtl; text-align: right;" alt="{{$lastCategoryProduct->name}}">
                                </a>
                                </div>
                                <div class="d-block d-lg-block">
                                    <a href="{{ route('products.show', encrypt($lastCategoryProduct->id)) }}">
                                        <img src="{{ $lastCategoryProduct->getFirstMediaUrl('productFiles') }}" width="400" height="170" style="direction: rtl; text-align: right;" alt="{{$lastCategoryProduct->name}}">
                                    </a>
                                </div>
                                </div>
                            <div class="product-action-1">
                                <a href="{{ $lastCategoryProduct->getFirstMediaUrl('productFiles') }}" aria-label="عرض"
                                   class="action-btn hover-up" data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                <a aria-label="أضف إلي المفضلة" class="action-btn hover-up" onclick="addToFavorites({{ $lastCategoryProduct->id }})"><i class="fi-rs-heart"></i></a>
                            </div>
                        </div>
                        <div class="product-content-wrap">
                            <h2>
                                <a href="{{ route('products.show', encrypt($lastCategoryProduct->id)) }}">{{ $lastCategoryProduct->name }}</a>
                            </h2>
                            <span>
                                @if($lastCategoryProduct->offer)
                                    <span>تخفيض %{{ $lastCategoryProduct->offer }}</span>
                                @endif
                                </span>
                            @include('userDashboard.products.review.ratingProduct2',['rate'=>calcReview($lastCategoryProduct)])

                            <div class="product-price">
                                <span> ج {{ $lastCategoryProduct->price_after_offer ?? $lastCategoryProduct->price }} جينية </span>
                                <br>

                            @if($lastCategoryProduct->offer)
                                    <span class="old-price">  {{ $lastCategoryProduct->price }} جينية</span>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
