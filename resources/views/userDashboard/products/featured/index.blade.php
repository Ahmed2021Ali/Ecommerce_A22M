<div class="tab-pane fade show active" id="tab-one" role="tabpanel" aria-labelledby="tab-one">
    <div class="row product-grid-4" style="direction: rtl; text-align: center;">
        @foreach($featuredProducts as $featuredProduct)
            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 col-6">
                <div class="product-cart-wrap mb-30">
                    <div class="product-img-action-wrap">
                        <div class="product-img product-img-zoom">
                                <a href="{{route('products.show', encrypt($featuredProduct->id))}}">
                                    <img src="{{$featuredProduct->getFirstMediaUrl('productFiles')}}"  alt="{{$featuredProduct->name}}">
                                </a>
                        </div>
                        <div class="product-action-1">
                            <a href="{{ $featuredProduct->getFirstMediaUrl('productFiles') }}" aria-label="عرض"
                               class="action-btn hover-up" data-bs-target="#quickViewModal"><i
                                    class="fi-rs-eye"></i></a>
                            <a aria-label="أضف إلي المفضلة" class="action-btn hover-up"
                               onclick="addToFavorites({{ $featuredProduct->id }})"><i class="fi-rs-heart"></i></a>
                        </div>
                    </div>
                    <div class="product-content-wrap">
                        <h2>
                            <a href="{{route('products.show', encrypt($featuredProduct->id))}}">{{ Str::limit($featuredProduct->name, 20) }}</a>
                        </h2>
                        <span>
                            @include('userDashboard.products.review.ratingProduct',['rate'=>calcReview($featuredProduct)])
                            @if($featuredProduct->offer)
                                <span>تخفيض %{{ $featuredProduct->offer }}</span>
                            @endif
                        </span>
                        <div class="product-price" style="text-align: center;">
                            <span>  {{ $featuredProduct->price_after_offer ?? $featuredProduct->price }} جينية  </span>
                            <br>
                            @if($featuredProduct->offer)
                                <span class="old-price"> {{ $featuredProduct->price }} جينية</span>
                            @endif
                        </div>
                        <br>
                        <div class="d-none d-lg-block">
                            <div class="product-action-1 show">
                                <a aria-label="تسوق الآن" class="action-btn hover-up" href="{{route('products.show', encrypt($featuredProduct->id))}}"><i class="fi-rs-shopping-bag-add"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
