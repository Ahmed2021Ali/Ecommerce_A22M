@extends('adminlte::page')

@section('title',' بانر')

@section('content_header')
    <h1 style="text-align:center" >عرض كل بانر</h1>
@stop

@section('content')
<div style="direction: rtl; text-align: right;">
    @can('اضافة بانر')
        <x-adminlte-modal id="create" title="اضافة بانر" theme="purple" icon="fas fa-bolt" size='lg' disable-animations>
            @include('adminDashboard.banner.create')
        </x-adminlte-modal>
        <x-adminlte-button label="اضافة بانر" data-toggle="modal" data-target="#create" class="bg-purple"/>
    @endcan
    <div class="row">
        <div class="col-12">
            <br>
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>العنوان الرائيسي</th>
                    <th>العنوان الفرعي</th>
                    <th>اسم المنتج</th>
                    <th>الحالة</th>
                    <th>العمليات</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($banners as $banner)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $banner->main_title }}</td>
                        <td>{{ $banner->small_title }}</td>
                        <td>{{ $banner->product->name }}</td>
                        <td>{{ $banner->status === 1 ? "معروضة ":"غير معروضة" }}</td>

                        <td>
                            {{-- Edit Button --}}
                            @can('تعديل بانر')
                                <x-adminlte-modal id="edit_{{$banner->id}}" title="تعديل" theme="teal"
                                    icon="fas fa-bolt" size='lg' disable-animations>
                                    @include('adminDashboard.banner.edit',['products'=>$products])
                                </x-adminlte-modal>
                                <x-adminlte-button label="تعديل" data-toggle="modal"
                                    data-target="#edit_{{$banner->id}}" class="bg-teal"/>
                            @endcan
                        
                            {{-- Delete Button --}}
                            @can('حذف بانر')
                                <x-adminlte-modal id="delete_{{ $banner->id }}" title="حذف" theme="purple"
                                    icon="fas fa-bolt" size='lg' disable-animations>
                                    @include('adminDashboard.banner.delete',['banner'=>$banner])
                                </x-adminlte-modal>
                                <x-adminlte-button label="حذف" data-toggle="modal"
                                    data-target="#delete_{{ $banner->id }}" class="bg-danger"/>
                            @endcan
                        
                            {{-- Images Button --}}
                            @can('عرض صورة البانر')
                                <x-adminlte-modal id="images_{{ $banner->id }}" title="الصور" theme="purple"
                                    icon="fas fa-bolt" size='lg' disable-animations>
                                    @include('adminDashboard.images.index',['images'=>$banner->product,'folder'=>'productFiles'])
                                </x-adminlte-modal>
                                <x-adminlte-button label="عرض الصور " data-toggle="modal"
                                    data-target="#images_{{ $banner->id }}" class="bg-secondary"/>
                            @endcan
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
            {{ $banners->links() }}

        </div>
    </div>
</div>
@stop
