@extends('adminlte::page')

@section('title', 'إضافة مستخدم جديد')

@section('content_header')
    <h2 style="text-align:center">إضافة مستخدم جديد</h2>
@stop

@section('content')
    <div style="direction: rtl; text-align: right;">
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

        <form action="{{ route('users.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">الأسم</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="الأسم" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email">الإلكتروني</label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="الإلكتروني"
                               required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="password">كلمة السر</label>
                        <input type="password" name="password" class="form-control" id="password"
                               placeholder="كلمة السر" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="confirm-password">تأكيد كلمة السر</label>
                        <input type="password" name="confirm-password" class="form-control" id="confirm-password"
                               placeholder="تأكيد كلمة السر" required>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="roles">نوع المستخدم</label>
                        <select class="form-control select2" multiple name="roles[]" id="roles" required>
                            @foreach ($roles as $role)
                                <option value="{{ $role }}">{{ $role }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">تأكيد</button>
                </div>
            </div>
        </form>
    </div>
@stop
