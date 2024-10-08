<section class="home-slider position-relative pt-50">
    <div class="hero-slider-1 dot-style-1 dot-style-1-position-1">
        @foreach($sliders as $slider)
            <div class="single-hero-slider single-animation-wrap">
                <div class="container" style="direction: rtl; text-align: right;">
                    <div class="row align-items-center slider-animated-1">
                        <div class="col-lg-5 col-md-6">
                            <div class="hero-slider-content-2">
                                <h4 class="animated">{{ $slider->title_h4  }}</h4>
                                <h2 class="animated fw-900">{{ $slider->title_h2  }}</h2>
                                <h1 class="animated fw-900 text-brand">{{ $slider->title_h1 }}</h1>
                                <p class="animated">{{ $slider->title_p  }}</p>
                                <a class="animated btn btn-brush btn-brush-3" href="{{ route('products.index') }}"> تسوق الأن </a>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-6">
                            <div class="single-slider-img single-slider-img-1">
                                @foreach($slider->getMedia('sliderFiles') as $media)
                                    <img class="mySlides" src="{{ $media->getFullUrl() }}" width="550" height="350">
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="slider-arrow hero-slider-1-arrow"></div>
</section>
