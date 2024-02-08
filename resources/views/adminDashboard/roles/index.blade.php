@extends('adminlte::page')

@section('title', ' عرض نوع المستخدمين')

@section('content_header')
    <h1>عرض نوع المستخدمين</h1>
@stop

@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb mb-4">
        <div class="pull-right">
        <div class="float-end">
            <a class="btn btn-success" href="{{ route('roles.create') }}"> إضافة نوع مستخدم </a>
        </div>

        </div>
    </div>
</div>

@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif

<table class="table table-striped table-hover">
    <tr>
        <th>الأسم</th>
        <th width="280px">العمليات</th>
    </tr>
    @foreach ($roles as $key => $role)
        <tr>
            <td>{{ $role->name }}</td>
            <td>
                <a class="btn btn-info" href="{{ route('roles.show', $role->id) }}">عرض</a>
                @if($role->name !== 'المدير')

                <a class="btn btn-primary" href="{{ route('roles.edit', $role->id) }}">تعديل</a>

                <!-- Delete Button with Modal -->
                <x-adminlte-modal id="deleteModal_{{ $role->id }}" title="تأكيد الحذف" theme="danger" icon="fas fa-trash" size='sm' disable-animations>
                    <x-slot name="header">
                        <h4 class="modal-title text-danger"></h4>
                    </x-slot>
                    <div class="modal-body">
                        <p>هل أنت متأكد أنك تريد حذف هذا الدور؟</p>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">إلغاء</button>
                        <form action="{{ route('roles.destroy', $role->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">حذف</button>
                        </form>

                    </div>
                </x-adminlte-modal>
                    <x-adminlte-button label="حذف" data-toggle="modal" data-target="#deleteModal_{{ $role->id }}" class="bg-danger"/>
                @endif
                </td>

        </tr>
    @endforeach
</table>

{!! $roles->render() !!}
@stop
