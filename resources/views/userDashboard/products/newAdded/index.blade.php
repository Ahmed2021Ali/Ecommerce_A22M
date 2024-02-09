<div class="tab-pane fade" id="tab-three" role="tabpanel" aria-labelledby="tab-three">
    <div class="row product-grid-4" style="direction: rtl; text-align: center;">
        @foreach($newAddedProducts as $product)
            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 col-6">
                <div class="product-cart-wrap mb-30">
                    <div class="product-img-action-wrap">
                        <div class="product-img product-img-zoom">
                            @foreach($product->getMedia('productFiles') as $media)
                                <a href="{{route('products.show', $product->id)}}"><img  src="{{$media->getFullUrl()}}" width="400" height="250" style="direction: rtl; text-align: right;"></a>
                                @break
                            @endforeach
                        </div>
                        <div class="product-action-1">
                            <a aria-label="عرض" class="action-btn hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                            <a aria-label="أضف إلي المفضلة" class="action-btn hover-up" href="{{route('fav.store', $product)}}"><i class="fi-rs-heart"></i></a>
                        </div>
                    </div>
                    <div class="product-content-wrap">
                        <div class="product-category">
                            <a href="">{{ $product->name }}</a>

                        </div>
                        <h2><a href="">{{ $product->description }}</a></h2>
                        <span>
                            <span>تخفيض %{{ $product->offer }}</span>
                        </span>
                        <div class="product-price">
                            <span>${{ $product->price_after_offer ?? $product->price }}</span>
                            @if($product->offer)
                                <span class="old-price">${{ $product->price }}</span>
                            @endif
                        </div>
                        <div class="product-action-1 show">
                            <a aria-label="تسوق الآن" class="action-btn hover-up" href="{{route('products.show', $product->id)}}"><i class="fi-rs-shopping-bag-add"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <!--End product-grid-4-->
</div>

