<section class="home-slider position-relative pt-50">
    <div class="hero-slider-1 dot-style-1 dot-style-1-position-1">
        @forelse($sliders as $slider)
            <div class="single-hero-slider single-animation-wrap">
                <div class="container" style="direction: rtl; text-align: right;">
                    <div class="row align-items-center slider-animated-1">
                        <div class="col-lg-5 col-md-6">
                            <div class="hero-slider-content-2">
                                <h4 class="animated">{{ Str::limit($slider->title_h4 , 37) }}</h4>
                                <h2 class="animated fw-900">{{ Str::limit($slider->title_h2 , 18) }}</h2>
                                <h1 class="animated fw-900 text-brand">{{ Str::limit($slider->title_h1 , 15) }}</h1>
                                <p class="animated">{{ Str::limit($slider->title_p , 55) }}</p>
                                <a class="animated btn btn-brush btn-brush-3" href="{{ route('products.index') }}"> تسوق الأن </a>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-6">
                            <div class="single-slider-img single-slider-img-1">
                                @forelse($slider->getMedia('sliderFiles') as $media)
                                    <img class="mySlides" src="{{ $media->getFullUrl() }}" width="700" height="450">
                                @empty
                                    <!-- This will be displayed if there are no images in the slider -->
                                    <p style="color: #F15412;">لا يوجد اي صور لهذا الأسلادير حاليا</p>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @empty

        @endforelse
    </div>
    <div class="slider-arrow hero-slider-1-arrow"></div>
</section>
