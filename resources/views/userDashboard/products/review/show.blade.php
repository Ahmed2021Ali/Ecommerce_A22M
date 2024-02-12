<div class="comments-area">
    <div class="row">
        <div class="col-lg-8">
            <h4 class="mb-30">تقيمات العملاء</h4>
            <div class="comment-list">
                @foreach($product->reviews as $review)
                    <div class="single-comment justify-content-between d-flex">
                        <div class="user justify-content-between d-flex">
                            <div class="thumb text-center">
                                @if($review->user->getFirstMediaUrl('userImages'))
                                    <img src="{{ $review->user->getFirstMediaUrl('userImages') }}" alt="user">
                                @else
                                    <img src="{{ URL::asset('assets/imgs/page/avatar-8.jpg')}}" alt="user">
                                @endif
                                <h6>{{ $review->user->name}}</h6>
                                <p class="font-xxs">since {{ $review->user->created_at->toformatteddatestring()}}</p>
                            </div>
                            <div class="desc">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="ratings">
                                        @if($review->star)
                                            @for ($i = 1; $i <= $review->star ; $i++)
                                                <i class="fa fa-star rating-color"></i>
                                            @endfor
                                        @endif
                                        @if($review->star < 5 )
                                            @for ($i = 1; $i <= (5-$review->star); $i++)
                                                <i class="fa fa-star"></i>
                                            @endfor
                                        @endif
                                    </div>
                                </div>
                                <p>{{$review->comment}}</p>
                                <div class="d-flex justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <p class="font-xs mr-30">{{$review->created_at->toDayDateTimeString()}}</p>
                                        <a href="#" class="text-brand btn-reply"><i class="fi-rs-arrow-right"></i> تعديل </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <!--single-comment -->
            </div>
        </div>

        <div class="col-lg-4">
            <h4 class="mb-30">تقيمات العملاء</h4>
            <div class="d-flex mb-30">
                <h6>4.8 out of 5</h6>
                <div class="product-rate d-inline-block mr-15">
                    <div class="product-rating" style="width:90%">
                    </div>
                </div>
            </div>
            <div class="progress">
                <span>5 star</span>
                <div class="progress-bar" role="progressbar" style="width: 50%;"
                     aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
                    50%
                </div>
            </div>
            <div class="progress">
                <span>4 star</span>
                <div class="progress-bar" role="progressbar" style="width: 25%;"
                     aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                    25%
                </div>
            </div>
            <div class="progress">
                <span>3 star</span>
                <div class="progress-bar" role="progressbar" style="width: 45%;"
                     aria-valuenow="45" aria-valuemin="0" aria-valuemax="100">
                    45%
                </div>
            </div>
            <div class="progress">
                <span>2 star</span>
                <div class="progress-bar" role="progressbar" style="width: 65%;"
                     aria-valuenow="65" aria-valuemin="0" aria-valuemax="100">
                    65%
                </div>
            </div>
            <div class="progress mb-30">
                <span>1 star</span>
                <div class="progress-bar" role="progressbar" style="width: 85%;"
                     aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">
                    85%
                </div>
            </div>
        </div>
    </div>
</div>
