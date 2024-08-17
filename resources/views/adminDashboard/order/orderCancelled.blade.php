@extends('adminlte::page')

@section('title', 'اوردارات ملغية')

@section('content_header')
    <h1 style="direction: rtl; text-align: right;">اورادرات  تم الغاوها </h1>
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
                        <td>
                            {{--
                            @can('حذف اوردر')
--}}
                            <x-adminlte-modal id="delete_{{ $order->id }}" title="حذف" theme="purple"
                                              icon="fas fa-bolt" size='lg' disable-animations>
                                @include('adminDashboard.order.delete',['order'=>$order])
                            </x-adminlte-modal>
                            <x-adminlte-button label="حذف" data-toggle="modal"
                                               data-target="#delete_{{ $order->id }}" class="bg-danger"/>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>

        </div>
        {{ $orders->links() }}
    </div>
    </div>
@stop
