@extends('adminlte::page')

@section('title', 'عرض كل المنتجات')

@section('content_header')
    <h1>عرض كل المنتجات</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>الاسم</th>
                        <th>اللون</th>
                        <th>المقاس</th>
                        <th>السعر</th>
                        <th>حالة المنتج</th>
                        <th>الكمبة</th>
                        <th>القسم</th>
                        <th>العمليات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->color }}</td>
                            <td>{{ $product->size }}</td>

                            <td>{{$product->price_after_offer ? $product->price_after_offer : $product->price  }}</td>
                            <td>{{ $product->status == '1'? 'معروض ' : 'غير معروض ' }}</td>
                            <td>{{ $product->quantity }}</td>
                            <td>{{ $product->category->name }}</td>
                            <td>
                                <a href="{{ route('product.show', $product) }}" class="btn btn-info">اراء العملاء</a>
                                <a href="{{ route('product.edit', $product) }}" class="btn btn-warning">تعديل</a>

                                {{--  delete  --}}
                                <x-adminlte-modal id="delete_{{ $product->id }}" title="Delete" theme="purple"
                                                  icon="fas fa-bolt" size='lg' disable-animations>
                                    @include('adminDashboard.products.delete',['product'=>$product])
                                </x-adminlte-modal>
                                <x-adminlte-button label="حذف" data-toggle="modal"
                                                   data-target="#delete_{{ $product->id }}" class="bg-danger"/>
                                {{-- End  delete  --}}

                                {{--  images  --}}
                                <x-adminlte-modal id="images_{{ $product->id }}" title="الصور" theme="purple"
                                                  icon="fas fa-bolt" size='lg' disable-animations>
                                    @include('adminDashboard.products.images',['product'=>$product])
                                </x-adminlte-modal>
                                <x-adminlte-button label="عرض صور المنتج" data-toggle="modal"
                                                   data-target="#images_{{ $product->id }}" class="bg-secondary"/>
                                {{-- End  images  --}}

                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>

        </div>
{{--        {{ $products->links() }}--}}
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
        $(function() {
            $("#example1").DataTable({
                "responsive": false,
                "lengthChange": false,
                "autoWidth": true,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
    </script>
@stop
