@extends('adminlte::page')

@section('title',' عرض كل الكوبونات')

@section('content_header')
    <h1 style="text-align:center">عرض كل الكوبونات</h1>
@stop

@section('content')
<div style="direction: rtl; text-align: right;">
    @can('اضافة كوبون')
        <x-adminlte-modal id="create" title="اضافة كوبون" theme="purple" icon="fas fa-bolt" size='lg' disable-animations>
            @include('adminDashboard.coupon.create')
        </x-adminlte-modal>
        <x-adminlte-button label="اضافة كوبون" data-toggle="modal" data-target="#create" class="bg-purple"/>
    @endcan
    <div class="row">
        <div class="col-12">
            <br>
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th> اسم الكوبون</th>
                    <th>قيمته</th>
                    <th>العمليات</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($coupons as $coupon)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $coupon->name }}</td>
                        <td>{{ $coupon->value }} %</td>
                        <td>{{ $coupon->status === 1 ? "متاح ":"غير متاح" }}</td>

                        <td>
                            {{-- Edit Button --}}
                            @can('تعديل كوبون')
                                <x-adminlte-modal id="edit_{{$coupon->id}}" title="تعديل" theme="teal"
                                    icon="fas fa-bolt" size='lg' disable-animations>
                                    @include('adminDashboard.coupon.edit',['coupon'=>$coupon])
                                </x-adminlte-modal>
                                <x-adminlte-button label="تعديل" data-toggle="modal"
                                    data-target="#edit_{{$coupon->id}}" class="bg-teal"/>
                            @endcan

                            {{-- Delete Button --}}
                            @can('حذف كوبون')
                                <x-adminlte-modal id="delete_{{ $coupon->id }}" title="حذف" theme="purple"
                                    icon="fas fa-bolt" size='lg' disable-animations>
                                    @include('adminDashboard.coupon.delete',['coupon'=>$coupon])
                                </x-adminlte-modal>
                                <x-adminlte-button label="حذف" data-toggle="modal"
                                    data-target="#delete_{{ $coupon->id }}" class="bg-danger"/>
                            @endcan
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
            {{ $coupons->links() }}

        </div>
    </div>
</div>

@stop
