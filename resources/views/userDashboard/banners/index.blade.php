<section class="banners mb-15">
    <div class="container">
        <div class="row">
            @foreach ($banners as $banner)
            @foreach($banner->getMedia('bannerFiles') as $media)
                <div class="col-lg-4 col-md-6">
                    <div class="banner-img wow fadeIn animated" style="direction: rtl; text-align: center;">
                        <img src="{{ $media->getFullUrl() }}" width="400" height="250" alt="{{ $banner['main_title'] }}">
                        <div class="banner-text" style="text-align: center; padding: 10px; border-radius: 8px; color: #fff; margin-top: 18px; ">
                            <div class="banner-titles" style="background-color: #F15412; padding: 2px; border-radius: 6px; margin-bottom: 6px;">
                                <span class="main-title" style="font-size: 16px; color: #fff; font-weight: bold;">{{ $banner['main_title'] }}</span>
                                <h4 class="small-title" style="font-size: 14px; color: #fff;">{{ $banner['small_title'] }}</h4>
                            </div>
                            <a href="{{ $banner['link'] }}" class="btn-shop-now" style="display: block; margin-top: 8px; padding: 8px 16px; background-color: #fff; color: #F15412; text-decoration: none; border-radius: 5px; transition: background-color 0.3s;">
                                تسوق الآن<i class="fi-rs-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
            @endforeach
        </div>
    </div>
</section>
