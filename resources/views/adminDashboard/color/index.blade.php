@extends('adminlte::page')

@section('title', ' الالون')

@section('content_header')
    <h1 style="text-align:center">عرض كل الالون المنتجات</h1>
@stop

@section('content')
    <div style="direction: rtl; text-align: right;">
        @can('اضافة الوان')
            <x-adminlte-modal id="create" title="اضافة  لون " theme="purple" icon="fas fa-bolt" size='lg' disable-animations>
            @include('adminDashboard.color.create')
            </x-adminlte-modal>
            <x-adminlte-button label="اضافة  لون " data-toggle="modal" data-target="#create" class="bg-purple" />
        @endcan

        <div class="row">
            <div class="col-12">
                <br>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>الاسم</th>
                        <th>اللون</th>
                        <th> القيمة</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($colors as $color)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $color->name }}</td>
                            <td>
                                <h3 style="background-color:{{ $color->value }}">color</h3>
                            </td>
                            <td>{{ $color->value }}</td>
                            <td>
                                {{-- Edit Button --}}
                                @can('تعديل الوان')
                                    <x-adminlte-modal id="edit_{{$color->id}}" title="تعديل" theme="teal"
                                        icon="fas fa-bolt" size='lg' disable-animations>
                                        @include('adminDashboard.color.edit',['color'=>$color])
                                    </x-adminlte-modal>
                                    <x-adminlte-button label="تعديل" data-toggle="modal"
                                        data-target="#edit_{{$color->id}}" class="bg-teal"/>
                                @endcan
                            
                                {{-- Delete Button --}}
                                @can('حذف الوان')
                                    <x-adminlte-modal id="delete_{{ $color->id }}" title="حذف" theme="purple"
                                        icon="fas fa-bolt" size='lg' disable-animations>
                                        @include('adminDashboard.color.delete', ['color' => $color])
                                    </x-adminlte-modal>
                                    <x-adminlte-button label="حذف" data-toggle="modal"
                                        data-target="#delete_{{ $color->id }}" class="bg-danger" />
                                @endcan
                            </td>
                            
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $colors->links() }}
            </div>
        </div>
    </div>
@stop
