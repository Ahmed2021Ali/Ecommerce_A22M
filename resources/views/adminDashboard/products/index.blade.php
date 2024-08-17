@extends('adminlte::page')

@section('title', 'عرض كل المنتجات')

@section('content_header')
    <h2 style="text-align:center">@if(isset($subCategory)) عرض  المنتجات   بالقسم {{$subCategory->name}}    @else عرض كل المنتجات @endif</h2>
@stop
@section('cs')
@endsection

@section('content')
    <div class="row" style="direction: rtl; text-align: right;">
        <div class="col-12">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>الاسم</th>
                        <th>الالوان</th>
                        <th>المقاس</th>
                        <th>السعر</th>
                        <th>حالة المنتج</th>
                        <th>الكمية</th>
                        <th>القسم</th>
                        <th>العمليات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $product->name }}</td>
                            <td>
                                @foreach (explode(',', $product->color) as $color)
                                    {{ optional(\App\Models\Color::where('value', $color)->first())->name ?? '' }} ,
                                @endforeach
                            </td>

                            <td>{{ $product->size }}</td>
                            <td>{{ calcPriceProduct($product->price, $product->offer, $product->price_after_offer, null) }}
                            </td>

                            <td>{{ $product->status === '1' ? 'معروض ' : 'غير معروض ' }}</td>
                            <td>{{ $product->quantity }}</td>
                            <td>{{ $product->subCategory->name }}</td>
                            <td>
                                {{-- Show Product Reviews Button --}}
                                @can('تقييمات المنتج')
                                    <a href="{{ route('product.show', $product) }}" class="btn btn-info">تقييمات المنتج</a>
                                @endcan

                                {{-- Edit Product Button --}}
                                @can('تعديل منتج')
                                    <a href="{{ route('product.edit', $product) }}" class="btn btn-warning">تعديل</a>
                                @endcan

                                {{-- Delete Product Button --}}
                                @can('حذف منتج')
                                    <x-adminlte-modal id="delete_{{ $product->id }}" title="Delete" theme="purple"
                                        icon="fas fa-bolt" size='lg' disable-animations>
                                        @include('adminDashboard.products.delete', ['product' => $product])
                                    </x-adminlte-modal>
                                    <x-adminlte-button label="حذف" data-toggle="modal"
                                        data-target="#delete_{{ $product->id }}" class="bg-danger" />
                                @endcan

                                @can('عرض صورة المنتج') {{-- Adjust this permission based on your actual permission --}}
                                {{-- Show Product Images Button --}}
                                <x-adminlte-modal id="images_{{ $product->id }}" title="الصور" theme="purple"
                                    icon="fas fa-bolt" size='lg' disable-animations>
                                    @include('adminDashboard.images.index', [
                                        'images' => $product,
                                        'folder' => 'productFiles',
                                    ])
                                </x-adminlte-modal>
                                    <x-adminlte-button label="عرض صور المنتج" data-toggle="modal"
                                        data-target="#images_{{ $product->id }}" class="bg-secondary" />
                                @endcan
                                {{-- End  images  --}}
                            </td>

                        </tr>
                    @endforeach

                </tbody>
            </table>

        </div>
        {{ $products->links() }}
    </div>

@stop
