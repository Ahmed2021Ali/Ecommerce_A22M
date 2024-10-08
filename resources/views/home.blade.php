@extends('userDashboard.layouts.master')
@section('title')
    الصفحة الرئيسية
@endsection
@section('content')
    @if(!$sliders->isEmpty())
        @include('userDashboard.slider.index')
    @endif

    @if(!$services->isEmpty())
        @include('userDashboard.services.index')
    @endif

    <section class="product-tabs section-padding position-relative wow fadeIn animated">
        <div class="bg-square"></div>
        <div class="container">
            <div class="tab-header" style="direction: rtl; text-align: right;">
                <ul class="nav nav-tabs" id="myTab" role="tablist" style="direction: rtl; text-align: right;">
                    @if(!$featuredProducts->isEmpty())
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="nav-tab-one" data-bs-toggle="tab"
                                    data-bs-target="#tab-one" type="button" role="tab" aria-controls="tab-one"
                                    aria-selected="true"> خصومات خاصة
                            </button>
                        </li>
                    @endif
                    @if(!$bestsellersProduct->isEmpty())
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="nav-tab-two" data-bs-toggle="tab" data-bs-target="#tab-two"
                                    type="button" role="tab" aria-controls="tab-two" aria-selected="false">الأكثر مبيعا
                            </button>
                        </li>
                    @endif
                    @if(!$newProducts->isEmpty())
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="nav-tab-three" data-bs-toggle="tab" data-bs-target="#tab-three"
                                    type="button" role="tab" aria-controls="tab-three" aria-selected="false">جديد
                            </button>
                        </li>
                    @endif
                </ul>
                @if(!$products->isEmpty())
                    <a href="{{route('products.index')}}" class="view-more d-none d-md-flex">عرض الكل<i
                            class="fi-rs-angle-double-small-left"></i></a>
                @endif
            </div>
            <!--End nav-tabs-->
            <div class="tab-content wow fadeIn animated" id="myTabContent">

                @if(!$featuredProducts->isEmpty())
                    @include('userDashboard.products.featured.index')
                @endif

                @if(!$bestsellersProduct->isEmpty())
                    @include('userDashboard.products.popular.index')
                @endif

                @if(!$newProducts->isEmpty())
                    @include('userDashboard.products.newAdded.index')
                @endif

            </div>
        </div>
    </section>

    {{-- Categories --}}
    @if(!$subCategories->isEmpty())
        <section class="popular-categories section-padding mt-15 mb-25" style="text-align: right;">
            <div class="container wow fadeIn animated">
                <h3 class="section-title mb-20" style="text-align:center;"><span>الأقسام</span></h3>
                <div class="carausel-6-columns-cover position-relative">
                    <div class="slider-arrow slider-arrow-2 carausel-6-columns-arrow"
                         id="carausel-6-columns-arrows"></div>
                    <div class="carausel-6-columns" id="carausel-6-columns">
                        @foreach($subCategories as $subCategory)
                            <div class="card-1">
                                <figure class="img-hover-scale overflow-hidden">
                                    <a href="{{ route('subCategory.products', encrypt($subCategory->id)) }}">
                                        <img src="{{ $subCategory->getFirstMediaUrl('subCategoryFiles') }}" alt="{{ $subCategory->name }}" style="width: 100%; height: 150px; object-fit: cover;">
                                    </a>
                                </figure>
                                <h5>
                                    <a href="{{ route('products.show', encrypt($subCategory->id)) }}">{{ $subCategory->name }}</a>
                                </h5>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    @endif
    {{--End Categories --}}

    @if(!$banners->isEmpty())
        @include('userDashboard.banners.index')
    @endif

    @if($lastCategoryProducts)
        @include('userDashboard.products.productsCategory.index')
    @endif



    @if(!$brands->isEmpty())
        @include('userDashboard.brands.index')
    @endif
@endsection


