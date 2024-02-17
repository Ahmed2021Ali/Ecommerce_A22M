<div class="tab-pane fade show active" id="tab-one" role="tabpanel" aria-labelledby="tab-one">
    <div class="row product-grid-4" style="direction: rtl; text-align: center;">
        @forelse($featuredProducts as $featuredProduct)
            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 col-6">
                <div class="product-cart-wrap mb-30">
                    <div class="product-img-action-wrap">
                        <div class="product-img product-img-zoom">
                            <a href="{{route('products.show', encrypt($featuredProduct->id))}}">
                                <img src="{{$featuredProduct->getFirstMediaUrl('productFiles')}}" width="400" height="250" style="direction: rtl; text-align: right;" alt="{{$featuredProduct->name}}">
                            </a>
                        </div>
                        <div class="product-action-1">
                            <a href="{{ $featuredProduct->getFirstMediaUrl('productFiles') }}" aria-label="عرض" class="action-btn hover-up"
                               data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                            <a aria-label="أضف إلي المفضلة" class="action-btn hover-up"
                               onclick="addToFavorites({{ $featuredProduct->id }})"><i class="fi-rs-heart"></i></a>
                        </div>
                    </div>
                    <div class="product-content-wrap">
                        <div class="product-category">
                            <a href="{{route('products.show', encrypt($featuredProduct->id))}}">{{ $featuredProduct->name }}</a>
                        </div>
                        <h2><a href="{{route('products.show', encrypt($featuredProduct->id))}}">{{ Str::limit($featuredProduct->description, 50) }}</a></h2>
                        <span>
                            @include('userDashboard.products.review.ratingProduct',['rate'=>calcReview($featuredProduct)])
                            @if($featuredProduct->offer)
                                <span>تخفيض %{{ $featuredProduct->offer }}</span>
                            @endif
                        </span>
                        <div class="product-price">
                            <span>${{ $featuredProduct->price_after_offer ?? $product->price }}</span>
                            @if($featuredProduct->offer)
                                <span class="old-price">${{ $featuredProduct->price }}</span>
                            @endif
                        </div>
                        <div class="product-action-1 show">
                            <a aria-label="تسوق الآن" class="action-btn hover-up" href="{{route('products.show', encrypt($featuredProduct->id))}}">
                                <i class="fi-rs-shopping-bag-add"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @empty

        @endforelse
    </div>
</div>

