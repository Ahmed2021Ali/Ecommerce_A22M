<div class="tab-pane fade" id="tab-three" role="tabpanel" aria-labelledby="tab-three">
    <div class="row product-grid-4" style="direction: rtl; text-align: center;">
        @foreach($newProducts as $newProduct)
            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 col-6">
                <div class="product-cart-wrap mb-30">
                    <div class="product-img-action-wrap">
                        <div class="product-img product-img-zoom">
                                <a href="{{route('products.show', encrypt($newProduct->id))}}">
                                    <img src="{{$newProduct->getFirstMediaUrl('productFiles')}}"
                                         alt="{{$newProduct->name}}">
                                </a>

                        </div>
                        <div class="product-action-1">
                            <a href="{{ $newProduct->getFirstMediaUrl('productFiles') }}" aria-label="عرض"
                               class="action-btn hover-up"
                               data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                            <a aria-label="أضف إلي المفضلة" class="action-btn hover-up"
                               onclick="addToFavorites({{ $newProduct->id }})"><i class="fi-rs-heart"></i></a>
                        </div>
                    </div>
                    <div class="product-content-wrap">
                        <h2><a href="{{route('products.show', encrypt($newProduct->id))}}">{{  $newProduct->name }}</a>
                        </h2>
                        <span>
                            @include('userDashboard.products.review.ratingProduct',['rate'=>calcReview($newProduct)])
                            @if($newProduct->offer)
                                <span>تخفيض %{{ $newProduct->offer }}</span>
                            @endif
                        </span>
                        <div class="product-price">
                            <span>  {{ $newProduct->price_after_offer ?? $newProduct->price }} جينية</span>
                            <br>

                        @if($newProduct->offer)
                                <span class="old-price">  {{ $newProduct->price }} جينية </span>
                            @endif
                        </div>
                        <div class="product-action-1 show d-none d-lg-block">
                            <a aria-label="تسوق الآن" class="action-btn hover-up"
                               href="{{route('products.show', encrypt($newProduct->id))}}">
                                <i class="fi-rs-shopping-bag-add"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
