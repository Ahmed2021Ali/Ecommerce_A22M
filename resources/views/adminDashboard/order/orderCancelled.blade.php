@extends('adminlte::page')

@section('title', ' الارادرات العميل تم  الغاوها')

@section('content_header')
    <h1>عرض كل الارادرات العميل تم  الغاوها </h1>
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
                    <th>عدد المنتجات الاردر</th>
                    <th>سعر المنتجات</th>
                    <th>سعر التوصيل</th>
                    <th>كوبون خصم </th>
                    <th>الاجمالي الكلي</th>
                    <th> اسم صاحب الاردر</th>
                    <th>المحافظة</th>
                    <th>العنوان</th>
                    <th>رقم الهاتف</th>
                    <th>المستخدم </th>
                </tr>
                </thead>
                <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            <a href="{{ route('order.show', $order->order_number) }}" class="btn btn-primary"> عرض الاردر</a>
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
                    </tr>
                @endforeach

                </tbody>
            </table>

        </div>
        {{ $orders->links() }}
    </div>
    </div>
@stop

@section('js')
    <!-- DataTables  & Plugins -->
    <script src="{{ url('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ url('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ url('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ url('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ url('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ url('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ url('plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ url('plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ url('plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ url('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ url('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ url('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    <script>
        $(function () {
            $("#example1").DataTable({
                "responsive": false,
                "lengthChange": false,
                "autoWidth": true,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
    </script>
@stop
