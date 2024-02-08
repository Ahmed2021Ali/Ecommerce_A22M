@extends('adminlte::page')

@section('title',' Slider')

@section('content_header')
    <h1>عرض كل الاسليدر</h1>
@stop

@section('content')

    <x-adminlte-modal id="create" title="اضافة  اسليدر " theme="purple" icon="fas fa-bolt" size='lg' disable-animations>
        @include('adminDashboard.slider.create')
    </x-adminlte-modal>
    <x-adminlte-button label="اضافة  اسليدر " data-toggle="modal" data-target="#create" class="bg-purple"/>
    <div class="row">
        <div class="col-12">
            <br>
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>العنوان الاول</th>
                    <th>العنوان الثاني</th>
                    <th>العنوان الثالث</th>
                    <th>العنوان الرابع</th>
                    <th>الحالة</th>
                    <th>العمليات</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($sliders as $slider)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $slider->title_h1 }}</td>
                        <td>{{ $slider->title_h2 }}</td>
                        <td>{{ $slider->title_h4 }}</td>
                        <td>{{ $slider->title_p }}</td>

                        <td>{{ $slider->status === 1 ? "معروضة ":"غير معروضة" }}</td>

                        <td>
                            {{--edit--}}
                            <x-adminlte-modal id="edit_{{$slider->id}}" title="تعديل" theme="teal"
                                              icon="fas fa-bolt" size='lg' disable-animations>
                                @include('adminDashboard.slider.edit',['slider'=>$slider])

                            </x-adminlte-modal>
                            <x-adminlte-button label="تعديل" data-toggle="modal"
                                               data-target="#edit_{{$slider->id}}" class="bg-teal"/>
                            {{--end edit--}}

                            {{--  delete  --}}
                            <x-adminlte-modal id="delete_{{ $slider->id }}" title="حذف" theme="purple"
                                              icon="fas fa-bolt" size='lg' disable-animations>
                                @include('adminDashboard.slider.delete',['slider'=>$slider])
                            </x-adminlte-modal>
                            <x-adminlte-button label="حذف" data-toggle="modal"
                                               data-target="#delete_{{ $slider->id }}" class="bg-danger"/>
                            {{-- End  delete  --}}

                            {{--  images  --}}
                            <x-adminlte-modal id="images_{{ $slider->id }}" title="الصور" theme="purple"
                                              icon="fas fa-bolt" size='lg' disable-animations>
                                @include('adminDashboard.slider.images',['slider'=>$slider])
                            </x-adminlte-modal>
                            <x-adminlte-button label="عرض الصور " data-toggle="modal"
                                               data-target="#images_{{ $slider->id }}" class="bg-secondary"/>
                            {{-- End  images  --}}

                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
            {{ $sliders->links() }}

        </div>
    </div>
@stop
