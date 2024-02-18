@extends('adminlte::page')

@section('title',' عرض كل البرندات')

@section('content_header')
    <h1 style="text-align:center">عرض كل البرندات</h1>
@stop

@section('content')
<div style="direction: rtl; text-align: right;">
    @can('اضافة براند')
        <x-adminlte-modal id="create" title="اضافة برند" theme="purple" icon="fas fa-bolt" size='lg' disable-animations>
            @include('adminDashboard.brand.create')
        </x-adminlte-modal>
        <x-adminlte-button label="اضافة برند" data-toggle="modal" data-target="#create" class="bg-purple"/>
    @endcan
    <div class="row">
        <div class="col-12">
            <br>
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>الحالة</th>
                    <th>العمليات</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($brands as $brand)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $brand->status === 1 ? "معروضة ":"غير معروضة" }}</td>

                        <td>
                            {{-- Edit Button --}}
                            @can('تعديل براند')
                                <x-adminlte-modal id="edit_{{$brand->id}}" title="تعديل" theme="teal"
                                    icon="fas fa-bolt" size='lg' disable-animations>
                                    @include('adminDashboard.brand.edit',['banner'=>$brand])
                                </x-adminlte-modal>
                                <x-adminlte-button label="تعديل" data-toggle="modal"
                                    data-target="#edit_{{$brand->id}}" class="bg-teal"/>
                            @endcan
                        
                            {{-- Delete Button --}}
                            @can('حذف براند')
                                <x-adminlte-modal id="delete_{{ $brand->id }}" title="حذف" theme="purple"
                                    icon="fas fa-bolt" size='lg' disable-animations>
                                    @include('adminDashboard.brand.delete',['banner'=>$brand])
                                </x-adminlte-modal>
                                <x-adminlte-button label="حذف" data-toggle="modal"
                                    data-target="#delete_{{ $brand->id }}" class="bg-danger"/>
                            @endcan
                        
                            {{-- Show Images Button --}}
                            @can('عرض صورة براند')
                                <x-adminlte-modal id="images_{{ $brand->id }}" title="الصور" theme="purple"
                                    icon="fas fa-bolt" size='lg' disable-animations>
                                    @include('adminDashboard.images.index',['images'=>$brand,'folder'=>'brandFiles'])
                                </x-adminlte-modal>
                                <x-adminlte-button label="عرض الصور" data-toggle="modal"
                                    data-target="#images_{{ $brand->id }}" class="bg-secondary"/>
                            @endcan
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
            {{ $brands->links() }}

        </div>
    </div>
</div>

@stop
