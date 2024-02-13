@if(Auth::check() && !Auth::user()->reviews->where('product_id', $product->id)->first())
    <div class="comment-form">
        <h4 class="mb-15">اضافة تقييم </h4>
        <div class="row">
            <div class="col-lg-8 col-md-12">
                <form class="form-contact comment_form"
                      action="{{route('review.store',$product)}}" method="post" id="commentForm">
                    @csrf
                    <div class="col-md-12">
                        <div class="stars">
                            <input class="star star-5" id="star-5" type="radio"
                                   name="star" value="5"/>
                            <label class="star star-5" for="star-5"></label>
                            <input class="star star-4" id="star-4" type="radio"
                                   name="star" value="4"/>
                            <label class="star star-4" for="star-4"></label>
                            <input class="star star-3" id="star-3" type="radio"
                                   name="star" value="3"/>
                            <label class="star star-3" for="star-3"></label>
                            <input class="star star-2" id="star-2" type="radio"
                                   name="star" value="2"/>
                            <label class="star star-2" for="star-2"></label>
                            <input class="star star-1" id="star-1" type="radio"
                                   name="star" value="1"/>
                            <label class="star star-1" for="star-1"></label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                            <textarea class="form-control w-100" name="comment" id="comment" cols="30" rows="9"
                                      placeholder="Write Comment" required></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="button button-contactForm">
                            تأكيد التقييم
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endif

