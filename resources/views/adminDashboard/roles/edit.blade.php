@extends('adminlte::page')

@section('title', 'تعديل نوع المستخدم')

@section('content_header')
    <h1>تعديل نوع المستخدم</h1>
@stop

@section('content')
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


    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('roles.update', $role->id) }}" method="POST">
        @csrf
        @method('PATCH')    
        <div class="row">
            <div class="col-xs-12 mb-3">
                <div class="form-group">
                    <strong>نوع المستخدم</strong>
                    <input type="text" value="{{ $role->name }}" name="name" class="form-control" placeholder="Name">
                </div>
            </div>
            <div class="col-xs-12 mb-3">
                <div class="form-group">
                    <strong>الأذونات</strong>
                    <div class="row mt-2">
                        @foreach ($permission as $value)
                            <div class="col-md-3">
                                <div class="form-check">
                                    <input type="checkbox" @if (in_array($value->id, $rolePermissions)) checked @endif
                                        name="permission[]" value="{{ $value->name }}" class="form-check-input"
                                        id="permission_{{ $value->id }}">
                                    <label class="form-check-label" for="permission_{{ $value->id }}">{{ $value->name }}</label>
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
    
@stop
