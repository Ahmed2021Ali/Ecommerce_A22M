@extends('adminlte::page')

@section('title', 'عرض نوع المستخدم')

@section('content_header')
    <h1>عرض نوع المستخدم</h1>
@stop

@section('content')
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
    <div class="row">
        <div class="col-xs-12 mb-3">
            <div class="form-group">
                <strong>نوع المستخدم:</strong>
                @if (!empty($role->name))
                    <strong style="color: red">{{ $role->name }}</strong><br>
                @else
                    <span style="color: red">لا يوجد نوع مستخدم</span>
                @endif
            </div>
        </div>
    
        <div class="col-xs-12 mb-3">
            <div class="form-group">
                <strong>:الأذونات</strong>
                @if (!empty($rolePermissions))
                    <div class="row mt-2">
                        @foreach ($rolePermissions as $v)
                            <div class="col-md-3">
                                <label class="label label-secondary text-dark">{{ $v->name }}</label>
                            </div>
                        @endforeach
                    </div>
                @else
                    <span style="color: red">لا توجد أذونات متاحة</span>
                @endif
            </div>
        </div>
    </div>
    
    
    
    
    
@stop
