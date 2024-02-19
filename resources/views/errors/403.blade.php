<!-- resources/views/errors/403.blade.php -->

@extends('userDashboard.layouts.master')

@section('title', '403 ممنوع')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card text-center">
                    <div class="card-header">
                        <h1 class="display-1"><i class="fas fa-ban text-danger"></i></h1>
                        {{ __('403 ممنوع') }}
                    </div>

                    <div class="card-body">
                        <p>{{ __('الصفحة التي تحاول الوصول إليها ممنوعة') }}</p>
                        
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
