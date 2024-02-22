@extends('adminlte::page')

@section('title', 'اوردارات غير موصلة')

@section('content_header')
    <h1 style="direction: rtl; text-align: right;">اوردارات لم يتم توصيلها حتي الان</h1>
@stop

@section('content')
    <div style="direction: rtl; text-align: right;">
        <div class="row">
            <div class="col-12">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>كود الطلب </th>
                        <th>عدد المنتجات الأوردر</th>
                        <th>سعر المنتجات</th>
                        <th>سعر التوصيل</th>
                        <th>كوبون خصم </th>
                        <th>الاجمالي الكلي</th>
                        <th> اسم صاحب الاردر</th>
                        <th>المحافظة</th>
                        <th>العنوان</th>
                        <th>رقم الهاتف</th>
                        <th>المستخدم </th>
                        <th>هل تم توصيل ؟</th>
                        <th> حذف</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <a href="{{ route('orders.show', encrypt($order->id)) }}" class="btn btn-primary"> عرض الاردر</a>
                            </td>
                            <td>{{ $order->number_of_product }}</td>
                            <td>{{ $order->subtotal }}</td>
                            <td>{{ $order->delivery_price }}</td>
                            <td>{{ $order->coupon_value }}</td>
                            <td>{{ $order->total }}</td>
                            <td>{{ $order->address->fname." ".$order->address->lname }}</td>
                            <td>{{ $order->address->city->name }}</td>
                            <td>{{ $order->address->address }}</td>
                            <td>{{ $order->address->phone }}</td>
                            <td>{{ $order->user->name }}</td>
                            @can('تأكيد توصيل الأوردر')
                                <td>
                                    <x-adminlte-modal id="status_{{ $order->id }}" title="توصيل" theme="purple"
                                                      icon="fas fa-bolt" size='lg' disable-animations>
                                        @include('adminDashboard.order.status',['order'=>$order])
                                    </x-adminlte-modal>
                                    <x-adminlte-button label="حالة التوصيل" data-toggle="modal" data-target="#status_{{ $order->id }}" class="bg-success"/>
                                </td>
                                <td>
                                    <x-adminlte-modal id="delete_{{ $order->id }}" title="حذف" theme="purple" icon="fas fa-bolt" size='lg' disable-animations>
                                        @include('adminDashboard.order.delete',['order'=>$order])
                                    </x-adminlte-modal>
                                    <x-adminlte-button label="حذف" data-toggle="modal" data-target="#delete_{{ $order->id }}" class="bg-danger"/>
                                </td>
                                </tr>
                            @endcan
                    @endforeach
                    </tbody>
                </table>
            </div>
            {{ $orders->links() }}
        </div>
    </div>
@stop

@section('js')
    @include('adminDashboard.DataTables.index')
@stop
