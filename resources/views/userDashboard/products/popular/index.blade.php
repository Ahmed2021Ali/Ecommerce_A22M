<div class="tab-pane fade" id="tab-two" role="tabpanel" aria-labelledby="tab-two">
    <div class="row product-grid-4" style="direction: rtl; text-align: center;">
        @foreach($bestsellersProduct as $bestsellerProduct)
            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 col-6">
                <div class="product-cart-wrap mb-30">
                    <div class="product-img-action-wrap">
                        <div class="product-img product-img-zoom">
                            <a href="{{route('products.show', encrypt($bestsellerProduct->id))}}"><img src="{{$bestsellerProduct->getFirstMediaUrl('productFiles')}}" width="400" height="250" style="direction: rtl; text-align: right;"></a>
                        </div>
                        <div class="product-action-1">
                            <a aria-label="عرض" class="action-btn hover-up" data-bs-toggle="modal"
                                data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                            <a aria-label="أضف إلي المفضلة" class="action-btn hover-up"
                                onclick="addToFavorites({{ $bestsellerProduct->id }})"><i class="fi-rs-heart"></i></a>
                        </div>
                    </div>
                    <div class="product-content-wrap">
                        <h2>
                            <a href="{{route('products.show', encrypt($bestsellerProduct->id))}}">{{ Str::limit($bestsellerProduct->name, 50) }}</a>
                        </h2>
                        <span>
                            @include('userDashboard.products.review.ratingProduct',['rate'=>calcReview($bestsellerProduct)])
                            @if($bestsellerProduct->offer)
                                <span>تخفيض %{{ $bestsellerProduct->offer }}</span>
                            @endif
                        </span>
                        <div class="product-price">
                            <span> ج {{ $bestsellerProduct->price_after_offer ?? $bestsellerProduct->price }}</span>
                            @if($bestsellerProduct->offer)
                                <span class="old-price"> ج {{ $bestsellerProduct->price }}</span>
                            @endif
                        </div>
                        <div class="product-action-1 show">
                            <a aria-label="تسوق الآن" class="action-btn hover-up"
                                href="{{route('products.show', encrypt($bestsellerProduct->id))}}"><i class="fi-rs-shopping-bag-add"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <!--End product-grid-4-->
</div>
