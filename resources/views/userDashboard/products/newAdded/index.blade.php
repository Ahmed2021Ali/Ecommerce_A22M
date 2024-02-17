<div class="tab-pane fade" id="tab-three" role="tabpanel" aria-labelledby="tab-three">
    <div class="row product-grid-4" style="direction: rtl; text-align: center;">
        @forelse($newAddedProducts as $product)
            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 col-6">
                <div class="product-cart-wrap mb-30">
                    <div class="product-img-action-wrap">
                        <div class="product-img product-img-zoom">
                            <a href="{{route('products.show', encrypt($newAddedProduct->id))}}">
                                <img src="{{$newAddedProduct->getFirstMediaUrl('productFiles')}}" width="400" height="250" style="direction: rtl; text-align: right;" alt="{{$newAddedProduct->name}}">
                            </a>
                        </div>
                        <div class="product-action-1">
                            <a href="{{ $product->getFirstMediaUrl('productFiles') }}" aria-label="عرض" class="action-btn hover-up" 
                               data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                            <a aria-label="أضف إلي المفضلة" class="action-btn hover-up"
                               onclick="addToFavorites({{ $newAddedProduct->id }})"><i class="fi-rs-heart"></i></a>
                        </div>
                    </div>
                    <div class="product-content-wrap">
                        <div class="product-category">
                            <a href="{{route('products.show', encrypt($newAddedProduct->id))}}">{{ $newAddedProduct->name }}</a>
                        </div>
                        <h2><a href="{{route('products.show', encrypt($newAddedProduct->id))}}">{{ Str::limit($newAddedProduct->description, 50) }}</a></h2>
                        <span>
                            @include('userDashboard.products.review.ratingProduct',['rate'=>calcReview($newAddedProduct)])
                            @if($newAddedProduct->offer)
                                <span>تخفيض %{{ $newAddedProduct->offer }}</span>
                            @endif
                        </span>
                        <div class="product-price">
                            <span>${{ $newAddedProduct->price_after_offer ?? $newAddedProduct->price }}</span>
                            @if($newAddedProduct->offer)
                                <span class="old-price">${{ $newAddedProduct->price }}</span>
                            @endif
                        </div>
                        <div class="product-action-1 show">
                            <a aria-label="تسوق الآن" class="action-btn hover-up" href="{{route('products.show', encrypt($newAddedProduct->id))}}">
                                <i class="fi-rs-shopping-bag-add"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <!--End product-grid-4-->
</div>
