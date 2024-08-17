@extends('adminlte::page')

@section('title', ' عرض كل الأقسام')

@section('content_header')
    <h1 style="text-align:center">عرض كل الأقسام</h1>
@stop

@section('content')
<div style="direction: rtl; text-align: right;">
    <x-adminlte-modal id="create" title="اضاقة قسم " theme="purple" icon="fas fa-bolt" size='lg' disable-animations>
        @include('adminDashboard.category.create')
    </x-adminlte-modal>
    <x-adminlte-button label="اضاقة قسم" data-toggle="modal" data-target="#create" class="bg-purple"/>

    <div class="row">
        <div class="col-12">
            <br>
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>الاسم</th>
                    <th>العمليات</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{ $category->name }}</td>
                        <td>

                            {{--  edit  --}}
                            @can('تعديل قسم')
                                <x-adminlte-modal id="edit_{{$category->id}}" title="تعديل القسم " theme="teal"
                                    icon="fas fa-bolt" size='lg' disable-animations>
                                    @include('adminDashboard.category.edit',['category'=>$category])
                                </x-adminlte-modal>
                                <x-adminlte-button label="تعديل القسم" data-toggle="modal"
                                    data-target="#edit_{{$category->id}}" class="bg-teal"/>
                            @endcan
                            {{-- end  edit  --}}

                            {{--  delete  --}}
                            @can('حذف قسم')
                                <x-adminlte-modal id="delete_{{ $category->id }}" title="حذف" theme="purple"
                                    icon="fas fa-bolt" size='lg' disable-animations>
                                    @include('adminDashboard.category.delete',['category'=>$category])
                                </x-adminlte-modal>
                                <x-adminlte-button label="حذف" data-toggle="modal"
                                    data-target="#delete_{{ $category->id }}" class="bg-danger"/>
                            @endcan
                            {{-- End  delete  --}}

                            @can('عرض المنتجات الخاصة بالقسم')
                                <a href="{{ route('category.show', $category) }}" class="btn btn-info">عرض الاقسام الفرعية الخاصة بهذا القسم</a>
                            @endcan
                        </td>

                    </tr>
                @endforeach

                </tbody>
            </table>
            {{ $categories->links() }}
        </div>
    </div>
</div>

@stop
