@extends('userDashboard.layouts.master')
@section('title')
    تواصل معنا
@endsection
@section('css')
@endsection
@section('pageHeader')
    تواصل معنا
@endsection
@section('content')
<section class="pt-50 pb-50">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-lg-10 m-auto">
                <div class="contact-from-area padding-20-row-col wow FadeInUp">
                    <h3 class="mb-10 text-center">يسعدنا تواصلك معنا</h3>
                    <p class="text-muted mb-30 text-center font-sm">بإمكانك ابداء رأيك او الأستفسار عن اي شئ في اي وقت</p>
                    <form class="contact-form-style text-center" id="contact-form" action="{{url('contact-us/store')}}" method="POST" style="direction: rtl; ">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="input-style mb-20">
                                    <input name="name" placeholder="الأسم" type="text">
                                </div>
                            </div>
                        </form>
                        <p class="form-messege"></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
