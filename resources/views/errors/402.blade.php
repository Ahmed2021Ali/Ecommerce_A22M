@extends('userDashboard.layouts.master')

@section('title', '402 يتطلب الدفع')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card text-center">
                    <div class="card-header">
                        <h1 class="display-1"><i class="fas fa-exclamation-triangle text-warning"></i></h1>
                        {{ __('402 يتطلب الدفع') }}
                    </div>

                    <div class="card-body">
                        <p>{{ __('يتعين عليك دفع رسوم معينة قبل الوصول إلى المورد المطلوب') }}</p>
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
