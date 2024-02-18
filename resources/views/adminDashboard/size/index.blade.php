@extends('adminlte::page')

@section('title',' عرض كل المقاسات')

@section('content_header')
    <h1 style="text-align:center">عرض كل المقاسات</h1>
@stop

@section('content')
<div style="direction: rtl; text-align: right;">
    @can('اضافة مقاسات')
        <x-adminlte-modal id="create" title="اضافة مقاس " theme="purple" icon="fas fa-bolt" size='lg' disable-animations>
            @include('adminDashboard.size.create')
        </x-adminlte-modal>
        <x-adminlte-button label="اضافة مقاس " data-toggle="modal" data-target="#create" class="bg-purple"/>
    @endcan
    <div class="row">
        <div class="col-12">
            <br>
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>الاسم</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($sizes as $size)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $size->name }}</td>

                        <td>
                            {{-- Edit Button --}}
                            @can('تعديل مقاسات')
                                <x-adminlte-modal id="edit_{{$size->id}}" title="تعديل" theme="teal"
                                    icon="fas fa-bolt" size='lg' disable-animations>
                                    @include('adminDashboard.size.edit',['size'=>$size])
                                </x-adminlte-modal>
                                <x-adminlte-button label="تعديل" data-toggle="modal"
                                    data-target="#edit_{{$size->id}}" class="bg-teal"/>
                            @endcan
                        
                            {{-- Delete Button --}}
                            @can('حذف مقاسات')
                                <x-adminlte-modal id="delete_{{ $size->id }}" title="حذف" theme="purple"
                                    icon="fas fa-bolt" size='lg' disable-animations>
                                    @include('adminDashboard.size.delete',['size'=>$size])
                                </x-adminlte-modal>
                                <x-adminlte-button label="حذف" data-toggle="modal"
                                    data-target="#delete_{{ $size->id }}" class="bg-danger"/>
                            @endcan
                        </td>                        
                    </tr>
                @endforeach

                </tbody>
            </table>
            {{ $sizes->links() }}

        </div>
    </div>
</div>

@stop
