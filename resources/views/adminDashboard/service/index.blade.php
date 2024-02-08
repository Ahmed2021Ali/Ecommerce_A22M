@extends('adminlte::page')

@section('title',' Slider')

@section('content_header')
    <h1>عرض كل الخدمات</h1>
@stop

@section('content')

    <x-adminlte-modal id="create" title="اضافة  الخدمة " theme="purple" icon="fas fa-bolt" size='lg' disable-animations>
        @include('adminDashboard.service.create')
    </x-adminlte-modal>
    <x-adminlte-button label="اضافة  الخدمة " data-toggle="modal" data-target="#create" class="bg-purple"/>
    <div class="row">
        <div class="col-12">
            <br>
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>الاسم </th>
                    <th>الحالة</th>
                    <th>الحدث</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($services as $service)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $service->name }}</td>
                        <td>{{ $service->status === 1 ? "معروضة ":"غير معروضة" }}</td>

                        <td>
                            {{--edit--}}
                            <x-adminlte-modal id="edit_{{$service->id}}" title="تعديل" theme="teal"
                                              icon="fas fa-bolt" size='lg' disable-animations>
                                @include('adminDashboard.service.edit',['slider'=>$service])

                            </x-adminlte-modal>
                            <x-adminlte-button label="تعديل" data-toggle="modal"
                                               data-target="#edit_{{$service->id}}" class="bg-teal"/>
                            {{--end edit--}}

                            {{--  delete  --}}
                            <x-adminlte-modal id="delete_{{ $service->id }}" title="حذف" theme="purple"
                                              icon="fas fa-bolt" size='lg' disable-animations>
                                @include('adminDashboard.service.delete',['slider'=>$service])
                            </x-adminlte-modal>
                            <x-adminlte-button label="حذف" data-toggle="modal"
                                               data-target="#delete_{{ $service->id }}" class="bg-danger"/>
                            {{-- End  delete  --}}

                            {{--  images  --}}
                            <x-adminlte-modal id="images_{{ $service->id }}" title="الصور" theme="purple"
                                              icon="fas fa-bolt" size='lg' disable-animations>
                                @include('adminDashboard.service.images',['slider'=>$service])
                            </x-adminlte-modal>
                            <x-adminlte-button label="عرض الصور " data-toggle="modal"
                                               data-target="#images_{{ $service->id }}" class="bg-secondary"/>
                            {{-- End  images  --}}

                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
            {{ $services->links() }}

        </div>
    </div>
@stop
