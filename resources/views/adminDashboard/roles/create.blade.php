@extends('adminlte::page')

@section('title', 'إضافة نوع مستخدم')

@section('content_header')
    <h2 style="text-align:center">إضافة نوع مستخدم</h2>
@stop

@section('content')
    <div style="direction: rtl; text-align: right;">

        <div class="row">
            <div class="col-lg-12 margin-tb mb-4">
                <div class="pull-left">
                    <h2>
                        <div class="float-end">
                            <a class="btn btn-primary" href="{{ route('roles.index') }}"> رجوع</a>
                        </div>
                    </h2>
                </div>
            </div>
        </div>


        <form action="{{ route('roles.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>الأسم</strong>
                        <input type="text" name="name" class="form-control" placeholder="اسم نوع المستخدم" required>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>الأذونات</strong>
                        <div class="row mt-2">
                            @foreach ($permission as $value)
                                <div class="col-md-3">
                                    <div class="form-check">
                                        <input type="checkbox" name="permission[]" value="{{ $value->name }}"
                                            class="form-check-input" id="permission_{{ $value->name }}">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <label class="form-check-label"
                                            for="permission_{{ $value->id }}">{{ $value->name }}</label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>


                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">تأكيد</button>
                </div>
            </div>
        </form>
    </div>
@stop
