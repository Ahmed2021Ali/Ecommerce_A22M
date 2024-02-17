    <section class="featured section-padding position-relative">
        <div class="container">
            <div class="row">
                <div class="row">
                    <div class="row" style="direction: rtl; text-align: center;">
                        <div class="col-12 text-right mb-4">
                            <h4 style="font-weight: bold; color: #F15412">الخدمات</h4>
                        </div>
                        @foreach($services as $service)
                            <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0 text-center">
                                <img src="{{ $service->getFirstMediaUrl('serviceFiles') }}" width="100" height="100">
                                <h4 style="margin-bottom:20px">{{ $service->name }}</h4>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
