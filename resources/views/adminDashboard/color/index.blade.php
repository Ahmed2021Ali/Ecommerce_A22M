@extends('adminlte::page')

@section('title',' بانر')

@section('content_header')
    <h1>عرض كل الالون المنتجات</h1>
@stop

@section('content')

    <x-adminlte-modal id="create" title="اضافة  بانر " theme="purple" icon="fas fa-bolt" size='lg' disable-animations>
        @include('adminDashboard.color.create')
    </x-adminlte-modal>
    <x-adminlte-button label="اضافة  لون " data-toggle="modal" data-target="#create" class="bg-purple"/>
    <div class="row">
        <div class="col-12">
            <br>
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>الاسم</th>
                    <th>اللون</th>
                    <th> القيمنة</th>

                </tr>
                </thead>
                <tbody>
                @foreach ($colors as $color)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $color->name }}</td>
                        <td>
                            <h3 style="background-color:{{$color->value}}">color</h3>
                        </td>

                        <td>{{ $color->value }}</td>

                        <td>
                            {{--  delete  --}}
                            <x-adminlte-modal id="delete_{{ $color->id }}" title="حذف" theme="purple"
                                              icon="fas fa-bolt" size='lg' disable-animations>
                                @include('adminDashboard.color.delete',['color'=>$color])
                            </x-adminlte-modal>
                            <x-adminlte-button label="حذف" data-toggle="modal"
                                               data-target="#delete_{{ $color->id }}" class="bg-danger"/>
                            {{-- End  delete  --}}

                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
            {{ $colors->links() }}

        </div>
    </div>
@stop
