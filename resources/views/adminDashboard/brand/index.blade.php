@extends('adminlte::page')

@section('title',' بانر')

@section('content_header')
    <h1>عرض كل البرندات</h1>
@stop

@section('content')

    <x-adminlte-modal id="create" title="اضافة  برند " theme="purple" icon="fas fa-bolt" size='lg' disable-animations>
        @include('adminDashboard.brand.create')
    </x-adminlte-modal>
    <x-adminlte-button label="اضافة  برند " data-toggle="modal" data-target="#create" class="bg-purple"/>
    <div class="row">
        <div class="col-12">
            <br>
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>الحالة</th>
                    <th>الحدث</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($brands as $brand)
                    <tr>
                        <td>{{ $brand->id }}</td>
                        <td>{{ $brand->status === 1 ? "معروضة ":"غير معروضة" }}</td>

                        <td>
                            {{--edit--}}
                            <x-adminlte-modal id="edit_{{$brand->id}}" title="تعديل" theme="teal"
                                              icon="fas fa-bolt" size='lg' disable-animations>
                                @include('adminDashboard.brand.edit',['banner'=>$brand])

                            </x-adminlte-modal>
                            <x-adminlte-button label="تعديل" data-toggle="modal"
                                               data-target="#edit_{{$brand->id}}" class="bg-teal"/>
                            {{--end edit--}}

                            {{--  delete  --}}
                            <x-adminlte-modal id="delete_{{ $brand->id }}" title="حذف" theme="purple"
                                              icon="fas fa-bolt" size='lg' disable-animations>
                                @include('adminDashboard.brand.delete',['banner'=>$brand])
                            </x-adminlte-modal>
                            <x-adminlte-button label="حذف" data-toggle="modal"
                                               data-target="#delete_{{ $brand->id }}" class="bg-danger"/>
                            {{-- End  delete  --}}

                            {{--  images  --}}
                            <x-adminlte-modal id="images_{{ $brand->id }}" title="الصور" theme="purple"
                                              icon="fas fa-bolt" size='lg' disable-animations>
                                @include('adminDashboard.brand.images',['banner'=>$brand])
                            </x-adminlte-modal>
                            <x-adminlte-button label="عرض الصور " data-toggle="modal"
                                               data-target="#images_{{ $brand->id }}" class="bg-secondary"/>
                            {{-- End  images  --}}

                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
            {{ $brands->links() }}

        </div>
    </div>
@stop
