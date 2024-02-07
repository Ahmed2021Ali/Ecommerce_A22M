@extends('adminlte::page')

@section('title', 'لوحة تحكم المسؤلين')

@section('content_header')
    <h1>لوحة تحكم المسؤلين</h1>
@stop

@section('content')
<div style="text-align: left;">
    <p style="font-size: 18px; color: #333; margin-bottom: 10px; display: inline;">مرحبًا بك مرة أخرى،</p>
    <h2 style="font-size: 24px; font-weight: bold; color: #007bff; display: inline; margin-right: 5px;">{{ auth()->user()->name }}</h2>
</div>


@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
