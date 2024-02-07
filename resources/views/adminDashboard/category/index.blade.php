@extends('adminlte::page')

@section('title', ' categories')

@section('content_header')
    <h1>عرض كل الاقسام</h1>
@stop

@section('content')

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
                    <th>Id</th>
                    <th>الاسم</th>
                    <th>الحدث</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>
                            {{--  images  --}}
                            <x-adminlte-modal id="images_{{ $category->id }}" title="الصور" theme="purple"
                                              icon="fas fa-bolt" size='lg' disable-animations>
                                @include('adminDashboard.category.images',['$category'=>$category])
                            </x-adminlte-modal>
                            <x-adminlte-button label="عرض الصورة " data-toggle="modal"
                                               data-target="#images_{{ $category->id }}" class="bg-secondary"/>
                            {{-- End  images  --}}
                            {{--  edit  --}}
                            <x-adminlte-modal id="edit_{{$category->id}}" title="تعديل القسم " theme="teal"
                                              icon="fas fa-bolt" size='lg' disable-animations>
                                @include('adminDashboard.category.edit',['category'=>$category])
                            </x-adminlte-modal>
                            <x-adminlte-button label="تعديل القسم" data-toggle="modal"
                                               data-target="#edit_{{$category->id}}" class="bg-teal"/>
                            {{-- end  edit  --}}

                            {{--  delete  --}}
                            <x-adminlte-modal id="delete_{{ $category->id }}" title="حذف" theme="purple"
                                              icon="fas fa-bolt" size='lg' disable-animations>
                                @include('adminDashboard.category.delete',['category'=>$category])
                            </x-adminlte-modal>
                            <x-adminlte-button label="حذف" data-toggle="modal"
                                               data-target="#delete_{{ $category->id }}" class="bg-danger"/>
                            {{-- End  delete  --}}
                            <a href="{{ route('category.show', $category) }}" class="btn btn-info">عرض كل المنتجات خاصة هذا القسم</a>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
            {{ $categories->links() }}
        </div>
    </div>
@stop
