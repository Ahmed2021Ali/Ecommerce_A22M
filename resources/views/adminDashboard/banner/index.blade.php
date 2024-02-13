@extends('adminlte::page')

@section('title',' بانر')

@section('content_header')
    <h1>عرض كل بانر</h1>
@stop

@section('content')

    <x-adminlte-modal id="create" title="اضافة  بانر " theme="purple" icon="fas fa-bolt" size='lg' disable-animations>
        @include('adminDashboard.banner.create')
    </x-adminlte-modal>
    <x-adminlte-button label="اضافة  بانر " data-toggle="modal" data-target="#create" class="bg-purple"/>
    <div class="row">
        <div class="col-12">
            <br>
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>العنوان الرائيسي</th>
                    <th>العنوان الفرعي</th>
                    <th>أسم المنتج</th>
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
                            {{--edit--}}
                            <x-adminlte-modal id="edit_{{$banner->id}}" title="تعديل" theme="teal"
                                              icon="fas fa-bolt" size='lg' disable-animations>
                                @include('adminDashboard.banner.edit',['products'=>$products])

                            </x-adminlte-modal>
                            <x-adminlte-button label="تعديل" data-toggle="modal"
                                               data-target="#edit_{{$banner->id}}" class="bg-teal"/>
                            {{--end edit--}}

                            {{--  delete  --}}
                            <x-adminlte-modal id="delete_{{ $banner->id }}" title="حذف" theme="purple"
                                              icon="fas fa-bolt" size='lg' disable-animations>
                                @include('adminDashboard.banner.delete',['banner'=>$banner])
                            </x-adminlte-modal>
                            <x-adminlte-button label="حذف" data-toggle="modal"
                                               data-target="#delete_{{ $banner->id }}" class="bg-danger"/>
                            {{-- End  delete  --}}

                            {{--  images  --}}
                            <x-adminlte-modal id="images_{{ $banner->id }}" title="الصور" theme="purple"
                                              icon="fas fa-bolt" size='lg' disable-animations>
                                @include('adminDashboard.banner.images',['banner'=>$banner])
                            </x-adminlte-modal>
                            <x-adminlte-button label="عرض الصور " data-toggle="modal"
                                               data-target="#images_{{ $banner->id }}" class="bg-secondary"/>
                            {{-- End  images  --}}

                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
            {{ $banners->links() }}

        </div>
    </div>
@stop
