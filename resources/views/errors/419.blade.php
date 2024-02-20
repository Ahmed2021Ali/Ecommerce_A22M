@extends('userDashboard.layouts.master')

@section('title', '419 تم انتهاء الصفحة')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card text-center">
                    <div class="card-header">
                        <h1 class="display-1"><i class="fas fa-hourglass-end text-warning"></i></h1>
                        {{ __('419 تم انتهاء الصفحة') }}
                    </div>

                    <div class="card-body">
                        <p>{{ __('تم انتهاء صلاحية الصفحة التي كنت تتصفحها') }}</p>
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
