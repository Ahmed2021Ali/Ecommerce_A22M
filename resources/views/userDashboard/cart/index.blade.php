@extends('userDashboard.layouts.master')
@section('title')
    سلة المشتريات
@endsection


@section('pageHeader')
    سلة مشترياتك
@endsection

@section('content')

    {{-- desktop design--}}
    @include('userDashboard.cart.desktop')

    {{-- Mobile design--}}
    @include('userDashboard.cart.mobile')

@endsection
