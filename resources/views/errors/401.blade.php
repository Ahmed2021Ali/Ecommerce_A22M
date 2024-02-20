@extends('userDashboard.layouts.master')

@section('title', '401 غير مصرح')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card text-center">
                    <div class="card-header">
                        <h1 class="display-1"><i class="fas fa-ban text-danger"></i></h1>
                        {{ __('401 غير مصرح') }}
                    </div>

                    <div class="card-body">
                        <p>{{ __('ليس لديك الإذن اللازم للوصول إلى هذه الصفحة.') }}</p>
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
