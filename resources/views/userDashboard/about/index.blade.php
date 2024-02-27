@extends('userDashboard.layouts.master')
@section('title')
    تعرف علينا
@endsection
@section('css')
@endsection
@section('pageHeader')
    تعرف علينا
@endsection
@section('content')
    <main class="main single-page" style="direction: rtl; text-align: right;">
        <section class="section-padding">
            <div class="container pt-25">
                <div class="row">
                    <div class="col-lg-6 align-self-center mb-lg-0 mb-4">
                        <h6 class="mt-0 mb-15 text-uppercase font-sm text-brand wow fadeIn animated">حول شركتنا </h6>
                        <h1 class="font-heading mb-40">
                            كل ما تحبه في مكان واحد !
                        </h1>
                        <p>نقدم مجموعة متنوعة من المنتجات لتلبية جميع احتياجاتك،من الملابس والساعات والإكسسوارات.</p>
                        <p> أسعارًا تنافسية على جميع منتجاتنا، ونضمن لك أفضل قيمة مقابل أموالك. </p>
                        <p> نلتزم بتقديم منتجات عالية الجودة تلبي جميع معايير السلامة والجودة. </p>
                        <p> خدمة عملاء ممتازة قبل وبعد البيع، ونحن دائمًا على استعداد لمساعدتك في أي وقت. </p>

                    </div>
                    <div class="col-lg-6">
                        <img src="{{URL::asset('assets/about.png')}}" alt="">
                    </div>
                </div>
            </div>
        </section>

        <section id="testimonials" class="section-padding">
            <div class="container pt-25">
                <div class="row mb-50">
                    <div class="col-lg-12 col-md-12 text-center">
                        <h4 class="mt-0 mb-10 text-uppercase  text-brand font-sm wow fadeIn animated"> بعض الحقائق حول
                            موقعنا </h4>
                        <h3 class="mb-15 text-grey-1 wow fadeIn animated">انظر ماذا <br> يقول عملاءنا حولنا منتجاتنا
                        </h3>
                    </div>
                </div>
                <div class="row align-items-center">
                    @if(isset($reviews))
                        @foreach($reviews as $review)
                            <div class="col-md-6 col-lg-4">
                                <div class="hero-card box-shadow-outer-6 wow fadeIn animated mb-30 hover-up d-flex">
                                    @if($review->user->getFirstMediaUrl('userImages'))
                                        <img class="btn-shadow-brand hover-up border-radius-5 bg-brand-muted" src="{{$review->user->getFirstMediaUrl('userImages') }}" width="75" height="90" alt="">
                                    @else
                                        <i class="fas fa-user fa-lg"></i>
                                    @endif
                                    <div class="pl-30">
                                        <div class="container">
                                            <h5 class="mb-5 fw-500">{{$review->user->name}}</h5>
                                            @if($review->star)
                                                @for ($i = 1; $i <= $review->star ; $i++)
                                                    <i class="fa fa-star rating-color"></i>
                                                @endfor
                                            @endif
                                            <p class="text-grey-3">{{$review->comment}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        {{$reviews->links()}}
                    @endif
                </div>
                <div class="row mt-30">
                    <div class="col-12 text-center">
                        <p class="wow fadeIn animated">
                            <a href="{{route('products.index')}}"
                               class="btn btn-brand text-white btn-shadow-brand hover-up btn-lg">اذهب للتسوق </a>
                        </p>
                    </div>
                </div>
            </div>
        </section>


        @if(!$brands->isEmpty())
            @include('userDashboard.brands.index')
        @endif</main>

@endsection
