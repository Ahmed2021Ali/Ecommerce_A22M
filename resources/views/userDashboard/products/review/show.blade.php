<div class="comments-area">
    <div class="row">
        <div class="col-lg-8">
            <h4 class="mb-30">تقيمات العملاء</h4>
            <div class="comment-list">
                @foreach($product->reviews()  as $review)
                    <div class="single-comment justify-content-between d-flex">
                        <div class="user justify-content-between d-flex">
                            <div class="thumb text-center">
                                @if($review->user->getFirstMediaUrl('userImages'))
                                    <img src="{{ $review->user->getFirstMediaUrl('userImages') }}" alt="user">
                                @else
                                    <i class="fas fa-user fa-lg"></i>
                                @endif
                                <h6>{{ $review->user->name}}</h6>
                                <p class="font-xxs">منذ {{ $review->user->created_at->toformatteddatestring()}}</p>
                            </div>
                            <div class="desc">
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
                                <p>{{$review->comment}}</p>
                                <div class="d-flex justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <p class="font-xs mr-30">{{$review->created_at->toDayDateTimeString()}}</p>

                                        @if(Auth::check() && $review->user_id === Auth::user()->id)
                                            <a href="{{route('review.edit',encrypt($review->id))}}"
                                               class="text-brand btn-reply"><i class="fi-rs-arrow-right"></i> تعديل </a>
                                            <form action="{{ route('review.destroy', $review) }}" method="post">
                                                @method('delete')
                                                @csrf
                                                <button class="btn-danger">حذف</button>
                                            </form>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            {{ $product->reviews()->links() }}
        </div>
        <div class="col-lg-4">
            <span class="mb-25">معدل تقيمات العملاء </span>
            @include('userDashboard.products.review.ratingProduct',['rate'=>calcReview($product)])
        </div>
    </div>
</div>
</div>
