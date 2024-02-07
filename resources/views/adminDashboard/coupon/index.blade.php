@extends('adminlte::page')

@section('title',' بانر')

@section('content_header')
    <h1>عرض كل الكوبونات</h1>
@stop

@section('content')

    <x-adminlte-modal id="create" title="اضافة  كوبون " theme="purple" icon="fas fa-bolt" size='lg' disable-animations>
        @include('adminDashboard.coupon.create')
    </x-adminlte-modal>
    <x-adminlte-button label="اضافة  كوبون " data-toggle="modal" data-target="#create" class="bg-purple"/>
    <div class="row">
        <div class="col-12">
            <br>
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Id</th>
                    <th> اسم الكوبون</th>
                    <th>قيمته</th>
                    <th>الحدث</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($coupons as $coupon)
                    <tr>
                        <td>{{ $coupon->id }}</td>
                        <td>{{ $coupon->name }}</td>
                        <td>{{ $coupon->value }} %</td>
                        <td>{{ $coupon->status === 1 ? "متاح ":"غير متاح" }}</td>

                        <td>
                            {{--edit--}}
                            <x-adminlte-modal id="edit_{{$coupon->id}}" title="تعديل" theme="teal"
                                              icon="fas fa-bolt" size='lg' disable-animations>
                                @include('adminDashboard.coupon.edit',['coupon'=>$coupon])

                            </x-adminlte-modal>
                            <x-adminlte-button label="تعديل" data-toggle="modal"
                                               data-target="#edit_{{$coupon->id}}" class="bg-teal"/>
                            {{--end edit--}}

                            {{--  delete  --}}
                            <x-adminlte-modal id="delete_{{ $coupon->id }}" title="حذف" theme="purple"
                                              icon="fas fa-bolt" size='lg' disable-animations>
                                @include('adminDashboard.coupon.delete',['coupon'=>$coupon])
                            </x-adminlte-modal>
                            <x-adminlte-button label="حذف" data-toggle="modal"
                                               data-target="#delete_{{ $coupon->id }}" class="bg-danger"/>
                            {{-- End  delete  --}}


                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
            {{ $coupons->links() }}

        </div>
    </div>
@stop
