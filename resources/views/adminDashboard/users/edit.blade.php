@extends('adminlte::page')

@section('title', 'تعديل مستخدم ')

@section('content_header')
<h2>تعديل مستخدم </h2>
@stop

@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb mb-4">
        <div class="pull-left">
            <h4>
                <div class="float-end">
                    <a class="btn btn-primary" href="{{ route('users.index') }}"> رجوع</a>
                </div>
            </h4>
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

<form action="{{ route('users.update', $user->id) }}" method="POST">
    @csrf
    @method('PATCH')
    <input type="hidden" value="{{ $user->id}}" name="id">
    <div class="row">
        <div class="col-md-6 mb-3">
            <div class="form-group">
                <label for="name"><strong>الأسم</strong></label>
                <input type="text" value="{{ $user->name }}" name="name" class="form-control" placeholder="Name" required>
            </div>
        </div>

        <div class="col-md-6 mb-3">
            <div class="form-group">
                <label for="email"><strong>البريد الألكتروني</strong></label>
                <input type="email" name="email" value="{{ $user->email }}" class="form-control" placeholder="Email" required>
            </div>
        </div>

        <div class="col-md-6 mb-3">
            <div class="form-group">
                <label for="password"><strong>كلمة السر</strong></label>
                <input type="password" name="password" class="form-control" placeholder="Password" required>
            </div>
        </div>

        <div class="col-md-6 mb-3">
            <div class="form-group">
                <label for="confirm-password"><strong>تأكيد كلمة السر</strong></label>
                <input type="password" name="confirm-password" class="form-control" placeholder="Confirm Password" required>
            </div>
        </div>

        <div class="col-md-12 mb-3">
            <div class="form-group">
                <label for="roles"><strong>نوع المستخدم</strong></label>
                <select class="form-control select2" multiple name="roles[]" required>
                    @foreach ($roles as $role)
                        <option value="{{ $role }}" {{ in_array($role, $userRole) ? 'selected' : '' }}>
                            {{ $role }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-md-12 text-center">
            <button type="submit" class="btn btn-primary">تأكيد</button>
        </div>
    </div>
</form>

@stop
