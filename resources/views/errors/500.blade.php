@extends('userDashboard.layouts.master')

@section('title', 'خطأ في الخادم')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card text-center">
                    <div class="card-header">
                        <h1 class="display-1"><i class="fas fa-exclamation-triangle text-danger"></i></h1>
                        {{ __('خطأ في الخادم') }}
                    </div>

                    <div class="card-body">
                        <p>{{ __('حدث خطأ في الخادم. يرجى المحاولة مرة أخرى في وقت لاحق.') }}</p>
                        <a href="{{ route('home') }}" class="btn btn-primary">{{ __('الانتقال إلى الصفحة الرئيسية') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
