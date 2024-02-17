<section class="mt-50 mb-50">
    <div class="container">
        <div class="row">
            <h3 class="section-title mb-20" style="direction: rtl; text-align: center;"><span>المنتجات</span> الجديدة</h3>
            <div class="col-lg-12">
                <div class="row product-grid-4">
                    <div class="row product-grid-4" style="direction: rtl; text-align: center;">
                        @foreach($newProducts as $product)
                            <div class="col-lg-4 col-md-6 col-sm-10 col-xs-10 col-10">
                                <div class="product-cart-wrap mb-30">
                                    <div class="product-img-action-wrap">
                                        <div class="product-img product-img-zoom">
                                            <a href="{{route('products.show', encrypt($product->id))}}"><img
                                                    src="{{$product->getFirstMediaUrl('productFiles')}}"
                                                    width="600" height="300"></a>
                                        </div>
                                        <div class="product-action-1">
                                            <a href="{{ $product->getFirstMediaUrl('productFiles') }}" aria-label="عرض"
                                               class="action-btn hover-up"
                                               data-bs-target="#quickViewModal"><i
                                                    class="fi-rs-eye"></i></a>
                                            <a aria-label="أضف إلي المفضلة" class="action-btn hover-up"
                                               onclick="addToFavorites({{ $product->id }})"><i
                                                    class="fi-rs-heart"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-content-wrap">
                                        <div class="product-category">
                                            <a href="{{route('products.show', encrypt($product->id))}}">{{ $product->name }}</a>

                                        </div>
                                        <h2>
                                            <a href="{{route('products.show', encrypt($product->id))}}">{{ Str::limit($product->description, 50) }}

                                            </a>
                                        </h2>
                                        <span>
                                                    @include('userDashboard.products.review.ratingProduct',['rate'=>calcReview($product)])
                                            @if($product->offer)
                                                <span>تخفيض %{{ $product->offer }}</span>
                                            @endif
                                                                                                </span>
                                        <div class="product-price">
                                            <span>${{ $product->price_after_offer ?? $product->price }}</span>
                                            @if($product->offer)
                                                <span class="old-price">${{ $product->price }}</span>
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
            </div>
        </div>
    </div>
</section>

