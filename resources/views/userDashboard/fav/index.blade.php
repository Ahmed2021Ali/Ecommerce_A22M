@extends('userDashboard.layouts.master')
@section('title')
    الصفحة الرئيسية
@endsection
@section('css')

@endsection

@section('content')
    <div class="tab-pane fade" id="tab-three" role="tabpanel" aria-labelledby="tab-three">
        <div class="row product-grid-4">
            @foreach($favs as $fav)
                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 col-6">
                    <div class="product-cart-wrap mb-30">
                        <div class="product-img-action-wrap">
                            <div class="product-img product-img-zoom">
                                @foreach($fav->product->getMedia('productFiles') as $media)
                                    <a href="{{route('products.show', $fav->id)}}"><img  src="{{$media->getFullUrl()}}" width="400" height="250" style="direction: rtl; text-align: right;"></a>
                                @endforeach
                            </div>
                            <div class="product-action-1">
                                <a aria-label="عرض" class="action-btn hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                <a aria-label="أضف إلي المفضلة" class="action-btn hover-up" href="{{route('fav.store',$fav)}}"><i class="fi-rs-heart"></i></a>
                            </div>
                        </div>
                        <div class="product-content-wrap">
                            <div class="product-category">
                                <a href="">{{ $fav->product->name }}</a>

                            </div>
                            <h2><a href="">{{ $fav->product->description }}</a></h2>
                            <span>
                            <span>تخفيض %{{ $fav->product->offer }}</span>
                        </span>
                            <div class="product-price">
                                <span>${{ $fav->product->price_after_offer ?? $fav->price }}</span>
                                @if($fav->product->offer)
                                    <span class="old-price">${{ $fav->price }}</span>
                                @endif
                            </div>
                            <div class="product-action-1 show">
                                <a aria-label="تسوق الآن" class="action-btn hover-up" href="{{route('products.show', $fav->id)}}"><i class="fi-rs-shopping-bag-add"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
