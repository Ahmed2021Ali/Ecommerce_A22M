@extends('adminlte::page')

@section('title',' الاسليدر')

@section('content_header')
    <h1 style="text-align:center">عرض كل الاسليدر</h1>
@stop

@section('content')
<div style="direction: rtl; text-align: right;">
    @can('اضافة اسلايدر')
        <x-adminlte-modal id="create" title="اضافة اسلايدر" theme="purple" icon="fas fa-bolt" size='lg' disable-animations>
            @include('adminDashboard.slider.create')
        </x-adminlte-modal>
        <x-adminlte-button label="اضافة اسلايدر" data-toggle="modal" data-target="#create" class="bg-purple"/>
    @endcan
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
                            {{-- Edit Button --}}
                            @can('تعديل اسلايدر')
                                <x-adminlte-modal id="edit_{{$slider->id}}" title="تعديل" theme="teal"
                                    icon="fas fa-bolt" size='lg' disable-animations>
                                    @include('adminDashboard.slider.edit',['slider'=>$slider])
                                </x-adminlte-modal>
                                <x-adminlte-button label="تعديل" data-toggle="modal"
                                    data-target="#edit_{{$slider->id}}" class="bg-teal"/>
                            @endcan
                        
                            {{-- Delete Button --}}
                            @can('حذف اسلايدر')
                                <x-adminlte-modal id="delete_{{ $slider->id }}" title="حذف" theme="purple"
                                    icon="fas fa-bolt" size='lg' disable-animations>
                                    @include('adminDashboard.slider.delete',['slider'=>$slider])
                                </x-adminlte-modal>
                                <x-adminlte-button label="حذف" data-toggle="modal"
                                    data-target="#delete_{{ $slider->id }}" class="bg-danger"/>
                            @endcan
                        
                            {{-- Images Button --}}
                            @can('عرض صورة الاسلايدر')
                                <x-adminlte-modal id="images_{{ $slider->id }}" title="الصور" theme="purple"
                                    icon="fas fa-bolt" size='lg' disable-animations>
                                    @include('adminDashboard.images.index',['images'=>$slider,'folder'=>'sliderFiles'])
                                </x-adminlte-modal>
                                <x-adminlte-button label="عرض الصور " data-toggle="modal"
                                    data-target="#images_{{ $slider->id }}" class="bg-secondary"/>
                            @endcan
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
            {{ $sliders->links() }}

        </div>
    </div>
</div>
@stop
