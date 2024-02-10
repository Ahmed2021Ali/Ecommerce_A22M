@extends('adminlte::page')

@section('title',' بانر')

@section('content_header')
    <h1>عرض كل المحافظات و اسعار توصيلها </h1>
@stop

@section('content')

    <x-adminlte-modal id="create" title="اضافة  محافظة " theme="purple" icon="fas fa-bolt" size='lg' disable-animations>
        @include('adminDashboard.city.create')
    </x-adminlte-modal>
    <x-adminlte-button label="اضافة  محافظة " data-toggle="modal" data-target="#create" class="bg-purple"/>
    <div class="row">
        <div class="col-12">
            <br>
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>المحافظة </th>
                    <th> سعرها </th>
                    <th>العمليات</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($cities as $city)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $city->name }}</td>
                        <td>{{ $city->price }}</td>
                        <td>
                            {{--edit--}}
                            <x-adminlte-modal id="edit_{{$city->id}}" title="تعديل" theme="teal"
                                              icon="fas fa-bolt" size='lg' disable-animations>
                                @include('adminDashboard.city.edit',['$city'=>$city])

                            </x-adminlte-modal>
                            <x-adminlte-button label="تعديل" data-toggle="modal"
                                               data-target="#edit_{{$city->id}}" class="bg-teal"/>
                            {{--end edit--}}

                            {{--  delete  --}}
                            <x-adminlte-modal id="delete_{{ $city->id }}" title="حذف" theme="purple"
                                              icon="fas fa-bolt" size='lg' disable-animations>
                                @include('adminDashboard.city.delete',['banner'=>$city])
                            </x-adminlte-modal>
                            <x-adminlte-button label="حذف" data-toggle="modal"
                                               data-target="#delete_{{ $city->id }}" class="bg-danger"/>
                            {{-- End  delete  --}}


                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
            {{ $cities->links() }}

        </div>
    </div>
@stop
