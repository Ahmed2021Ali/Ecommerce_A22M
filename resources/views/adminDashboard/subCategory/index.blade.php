@extends('adminlte::page')

@section('title', ' عرض كل الأقسام  الفرعية')

@section('content_header')
    <h2 style="text-align:center">@if(isset($category)) عرض الاقسام الفرعية بالقسم {{$category->name}}    @else عرض كل الاقسام الفرعية   @endif</h2>
@stop

@section('content')
<div style="direction: rtl; text-align: right;">

@can('اضافة قسم فرعي')
    <x-adminlte-modal id="create" title="اضاقة قسم " theme="purple" icon="fas fa-bolt" size='lg' disable-animations>
        @include('adminDashboard.subCategory.create')
    </x-adminlte-modal>
    <x-adminlte-button label="اضاقة قسم" data-toggle="modal" data-target="#create" class="bg-purple"/>
    @endcan
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
                @foreach ($subCategories as $subCategory)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{ $subCategory->name }}</td>
                        <td>
                            {{--  images  --}}
                            @can('عرض صورة القسم')
                                <x-adminlte-modal id="images_{{ $subCategory->id }}" title="الصور" theme="purple"
                                                  icon="fas fa-bolt" size='lg' disable-animations>
                                    @include('adminDashboard.images.index',['images'=>$subCategory,'folder'=>'subCategoryFiles'])
                                </x-adminlte-modal>
                                <x-adminlte-button label="عرض الصورة " data-toggle="modal" data-target="#images_{{ $subCategory->id }}" class="bg-secondary"/>
                            @endcan
                            {{-- End  images  --}}


                            {{--  edit  --}}
                            @can('تعديل قسم فرعي')
                                <x-adminlte-modal id="edit_{{$subCategory->id}}" title="تعديل القسم " theme="teal"
                                    icon="fas fa-bolt" size='lg' disable-animations>
                                    @include('adminDashboard.subCategory.edit',['category'=>$subCategory])
                                </x-adminlte-modal>
                                <x-adminlte-button label="تعديل القسم" data-toggle="modal"
                                    data-target="#edit_{{$subCategory->id}}" class="bg-teal"/>
                            @endcan
                            {{-- end  edit  --}}

                            {{--  delete  --}}
                            @can('حذف قسم فرعي')
                                <x-adminlte-modal id="delete_{{ $subCategory->id }}" title="حذف" theme="purple"
                                    icon="fas fa-bolt" size='lg' disable-animations>
                                    @include('adminDashboard.subCategory.delete',['category'=>$subCategory])
                                </x-adminlte-modal>
                                <x-adminlte-button label="حذف" data-toggle="modal"
                                    data-target="#delete_{{ $subCategory->id }}" class="bg-danger"/>
                            @endcan
                            {{-- End  delete  --}}

                            @can('عرض المنتجات الخاصة بالقسم')
                                <a href="{{ route('sub-category.show', $subCategory) }}" class="btn btn-info">عرض كل المنتجات هذا القسم</a>
                            @endcan
                        </td>

                    </tr>
                @endforeach

                </tbody>
            </table>
            {{ $subCategories->links() }}
        </div>
    </div>
</div>

@stop
