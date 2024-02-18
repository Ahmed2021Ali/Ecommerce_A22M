@extends('adminlte::page')

@section('title', 'تعديل نوع المستخدم')

@section('content_header')
    <h1 style="text-align:center">تعديل نوع المستخدم</h1>
@stop

@section('content')
    <div style="direction: rtl; text-align: right;">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>
                        <div class="float-end">
                            <a class="btn btn-primary" href="{{ route('roles.index') }}"> رجوع</a>
                        </div>
                    </h2>
                </div>
            </div>
        </div>

        <form action="{{ route('roles.update', $role->id) }}" method="POST">
            @csrf
            @method('PATCH')
            <input type="hidden" name="id" value="{{$role->id}}">
            <div class="row">
                <div class="col-xs-12 mb-3">
                    <div class="form-group">
                        <strong>نوع المستخدم</strong>
                        <input type="text" value="{{ $role->name }}" name="name" class="form-control"
                            placeholder="اسم نوع المستخدم">
                    </div>
                </div>
                <div class="col-xs-12 mb-3">
                    <div class="form-group">
                        <strong>الأذونات</strong>
                        <div class="row mt-2">
                            @foreach ($permission as $value)
                                <div class="col-md-3">
                                    <div class="form-check">
                                        <input type="checkbox" @if (in_array($value->id, $rolePermissions)) checked
                                                @endif
                                                name="permission[]" value="{{ $value->name }}" class="form-check-input"
                                                id="permission_{{ $value->id }}"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <label class="form-check-label"
                                                for="permission_{{ $value->id }}">{{ $value->name }}</label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 mb-3 text-center">
                    <button type="submit" class="btn btn-primary">تأكيد</button>
                </div>
            </div>
        </form>
    </div>

@stop
