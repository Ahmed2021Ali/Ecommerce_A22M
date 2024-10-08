@extends('userDashboard.layouts.master')
@section('title')
    تعديل التقييم
@endsection
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        div.stars {

            width: 270px;

            display: inline-block;

        }

        .mt-200 {
            margin-top: 200px;
        }

        input.star {
            display: none;
        }

        label.star {

            float: right;

            padding: 10px;

            font-size: 36px;

            color: #4A148C;

            transition: all .2s;

        }

        input.star:checked ~ label.star:before {

            content: '\f005';

            color: #FD4;

            transition: all .25s;

        }

        input.star-5:checked ~ label.star:before {

            color: #FE7;

            text-shadow: 0 0 20px #952;

        }

        input.star-1:checked ~ label.star:before {
            color: #F62;
        }

        label.star:hover {
            transform: rotate(-15deg) scale(1.3);
        }

        label.star:before {

            content: '\f006';

            font-family: FontAwesome;

        }
    </style>
@endsection
@section('pageHeader')
    عدل تقييمك
@endsection
@section('content')
    @if(Auth::check())
        <div class="comment-form" >
            <h2 class="text-center">تحديث التقييم </h2>
            <br>
            <div class="container">
                <div class="row">
                    <div class="col-12 align-content-center" style="direction: rtl; text-align: center;">
                        <form class="form-contact comment_form" action="{{route('review.update',$review)}}" method="post" id="commentForm">
                            @method('put')
                            @csrf
                                <div class="stars">
                                    <input class="star star-5" id="star-5" type="radio" name="star" value="5" {{$review->star === 5 ? 'checked' :null }} />
                                    <label class="star star-5" for="star-5"></label>
                                    <input class="star star-4" id="star-4" type="radio" name="star" value="4" {{$review->star === 4 ? 'checked' :null }} />
                                    <label class="star star-4" for="star-4"></label>
                                    <input class="star star-3" id="star-3" type="radio" name="star" value="3" {{$review->star === 3 ? 'checked' :null }}/>
                                    <label class="star star-3" for="star-3"></label>
                                    <input class="star star-2" id="star-2" type="radio" name="star" value="2" {{$review->star === 2 ? 'checked' :null }}/>
                                    <label class="star star-2" for="star-2"></label>
                                    <input class="star star-1" id="star-1" type="radio" name="star" value="1" {{$review->star === 1 ? 'checked':null }}/>
                                    <label class="star star-1" for="star-1"></label>
                                </div>
                            @error('star')<div style="color: red">{{ $message }}</div>@enderror

                            <textarea class="form-control w-100" name="comment" id="comment" placeholder="Write Comment" required>{{ $review->comment }}</textarea>
                            @error('comment')<div style="color: red">{{ $message }}</div>@enderror
                            <br>
                                <button type="submit" class="button button-contactForm">
                                    تأكيد التقييم
                                </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection

@section('js')

@endsection

