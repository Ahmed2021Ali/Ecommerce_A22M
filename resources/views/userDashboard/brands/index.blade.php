<section class="section-padding">
    <div class="container">
        <h3 class="section-title mb-20 wow fadeIn animated" style="text-align: center;"><span>الماركات</span>
        </h3>
        <div class="carausel-6-columns-cover position-relative wow fadeIn animated">
            <div class="slider-arrow slider-arrow-2 carausel-6-columns-arrow"
                 id="carausel-6-columns-3-arrows"></div>
            <div class="carausel-6-columns text-center" id="carausel-6-columns-3">
                @foreach($brands as $brand)
                    <div class="brand-logo">
                        <img src="{{ $brand->getFirstMediaUrl('brandFiles') }}" class="img-grey-hover"
                             alt="الماركات" style="width: 175px; height: 150px;">
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
