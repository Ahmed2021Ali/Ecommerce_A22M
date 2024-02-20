@extends('userDashboard.layouts.master')

@section('title', '404 غير موجود')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card text-center">
                    <div class="card-header">
                        <h1 class="display-1"><i class="fas fa-exclamation-triangle text-danger"></i></h1>
                        {{ __('404 غير موجود') }}
                    </div>

                    <div class="card-body">
                        <p>{{ __('الصفحة التي تبحث عنها غير موجودة') }}</p>
                            {{-- Check if the user is an admin or manager --}}
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
