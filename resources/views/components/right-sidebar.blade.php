<div>
    {{--categories--}}
    <div class="widget-category mb-30" style="direction: rtl; text-align: right;">
        <h5>الأقسام</h5>
        <hr>
        <ul class="categories">
            @foreach($categories as $category)
                <li>
                    <a href="{{ route('category.products', encrypt($category->id)) }}">
                        {{ $category->name }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>

    {{-- filter --}}
    <form method="GET" action="{{ route('search.filter') }}" enctype="multipart/form-data">
        @csrf
        <div class="sidebar-widget price_range range mb-30" style="direction: rtl; text-align: right;">
            <!-- Price Range Header -->
            <div class="widget-header position-relative mb-20 pb-10">
                <h5 class="widget-title mb-10">ابحث حسب السعر أو السعر واللون معا</h5>
                <div class="bt-1 border-color-1"></div>
            </div>
            <!-- Price Slider and Input -->
            <div class="price-filter">
                <div class="price-filter-inner">
                    <div id="slider-range"></div>
                    <div class="price_slider_amount">
                        <div class="label-input">
                            <span>يتراوح</span><input type="text" id="amount" name="price" placeholder="Add Your Price">
                        </div>
                    </div>
                </div>
            </div>
            <!-- Color Filter -->
            <br>
            <strong class="mr-10">اللون &nbsp;&nbsp;</strong>
            <br>
            <br>

            <div class="attr-detail attr-color mb-15"
                style="display: flex; margin-top: 2px; direction: rtl; text-align: right;">
                <ul class="list-filter color-filter">
                    <div class="colors">
                        @foreach ($colors as $color)
                            <span
                                style="width: 30px; height: 30px;margin-bottom: 10px; border-radius: 50%; cursor: pointer; display: flex; margin-right: 6px; background-color:{{ $color->value }}"><li><input
                                        type="checkbox" name="color[]" value="{{ $color->value }}"></li></span>
                        @endforeach
                    </div>
                </ul>
            </div>
            <!-- Filter Button -->
            <button type="submit" class="btn btn-sm btn-default">
                <i class="fi-rs-filter mr-5"></i> ابحث
            </button>
        </div>
    </form>

    {{-- newProducts--}}
    <div class="sidebar-widget product-sidebar  mb-30 p-30 bg-grey border-radius-10"
         style="direction: rtl; text-align: right;">
        <div class="widget-header position-relative mb-20 pb-10" style="direction: rtl; text-align: right;">
            <h5 class="widget-title mb-10">المنتجات الجديدة</h5>
            <div class="bt-1 border-color-1"></div>
        </div>
        @foreach($newProducts as $newProduct)
            <div class="single-post clearfix" style="direction: rtl; text-align: right;">
                <div class="image"><a href="{{route('products.show', encrypt($newProduct->id))}}"><img
                            src="{{$newProduct->getFirstMediaUrl('productFiles')}}" alt="product image"></a></div>
                <div class="content pt-10">
                    <h5><a href="{{route('products.show', encrypt($newProduct->id))}}">{{ Str::limit($newProduct->name, 20) }}</a></h5>
                    <p class="price mb-0 mt-5">{{$newProduct->price}} ج </p>
                    @include('userDashboard.products.review.ratingProduct2',['rate'=>calcReview($newProduct)])
                </div>
            </div>
        @endforeach
    </div>
</div>
