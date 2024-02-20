@extends('userDashboard.layouts.master')

@section('title', '429 طلب كثير جدًا')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card text-center">
                    <div class="card-header">
                        <h1 class="display-1"><i class="fas fa-exclamation-triangle text-warning"></i></h1>
                        {{ __('429 طلب كثير جدًا') }}
                    </div>

                    <div class="card-body">
                        <p>{{ __('تم رفض الوصول إلى هذه الصفحة بسبب العديد من الطلبات في وقت قصير') }}</p>
                        @if(Auth::check() && Auth::user()->hasRole(['المدير', 'ادمن']))
                        <a href="{{ route('admin.dashboard') }}" class="btn btn-primary">{{ __('الانتقال إلى لوحة التحكم') }}</a>
                        @else
                        <a href="{{ route('home') }}" class="btn btn-primary">{{ __('الانتقال إلى الصفحة الرئيسية') }}</a>
                        @endif                       
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
