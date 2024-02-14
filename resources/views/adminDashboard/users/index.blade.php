@extends('adminlte::page')

@section('title', ' عرض كل المستخدمين')

@section('content_header')
    <h1 style="text-align:center">عرض كل المستخدمين</h1>
@stop

@section('content')
<div style="direction: rtl; text-align: right;">
    <div class="row">
        <div class="col-lg-12 margin-tb mb-4">
            <div class="pull-right">
                <div class="float-end">
                    <a class="btn btn-success" href="{{ route('users.create') }}"> إضافة مستخدم جديد</a>
                </div>
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success my-2">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered table-hover table-striped">
        <tr>
            <th>الأسم</th>
            <th>البريد الإلكتروني</th>
            <th>نوع المستخددم</th>
            <th width="280px">عمليات</th>
        </tr>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    @if(!empty($user->getRoleNames()))
                        @foreach($user->getRoleNames() as $v)
                            <label class="badge badge-secondary text-dark">{{ $v }}</label>
                        @endforeach
                    @endif
                </td>
                <td>
                    @if($user->email !== 'owner@gmail.com')
                        <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">تعديل</a>
                        <x-adminlte-modal id="deleteModal_{{ $user->id }}" title="تأكيد الحذف" theme="danger" icon="fas fa-trash" size='sm' disable-animations>
                            <x-slot name="header">
                                <h4 class="modal-title text-danger"></h4>
                            </x-slot>
                            <div class="modal-body">
                                <p>هل أنت متأكد أنك تريد حذف هذا المستخدم؟</p>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-default" data-dismiss="modal">إلغاء</button>
                                <form id="deleteForm_{{ $user->id }}" action="{{ route('users.destroy', $user->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">حذف</button>
                                </form>
                            </div>
                        </x-adminlte-modal>

                        <x-adminlte-button label="حذف" data-toggle="modal" data-target="#deleteModal_{{ $user->id }}" class="bg-danger"/>
                    @endif
                </td>
            </tr>
        @endforeach
    </table>
</div>
@stop
