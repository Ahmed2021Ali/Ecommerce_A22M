@extends('adminlte::page')

@section('title', ' Order')

@section('content_header')
    <h1>عرض كل الارادرات العميل التي لم يتم توصيلها حتي الان</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>المنتج</th>
                    <th>اسم المنتج</th>
                    <th>الكمية</th>
                    <th>اجمالي السعر</th>
                    <th>اسم العميل</th>
                    <th>العنوان</th>
                    <th>رقم التليفون</th>
                    <th>حالة الدفع</th>
                    <th>حذف</th>
                    <th>هل تم توصيل ؟</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>
                            <a href="{{ route('product', $order) }}" class="btn btn-primary">عرض</a>
                        </td>
                        <td>{{ $order->product->title }}</td>
                        <td>{{ $order->quantity }}</td>
                        <td>{{ $order->total_price }}</td>
                        <td>{{ $order->address->fname." ".$order->address->lname }}</td>
                        <td>{{ $order->address->address }}</td>
                        <td>{{ $order->address->phone }}</td>
{{--                        <td>
                            @if($order->delivery_status_of_orders === null)
                                <form action="{{ route('order.force.delete', $order) }}" method="post" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button class=" btn btn-danger"> حذف</button>
                                </form>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('order.status.delivery', $order) }}" class="btn btn-warning">تم
                                التوصيل</a>
                        </td>--}}
                    </tr>
                @endforeach

                </tbody>
            </table>

        </div>
        {{ $orders->links() }}
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
