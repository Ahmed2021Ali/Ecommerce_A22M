@extends('userDashboard.layouts.master')
    @section('title')
        إنشاء حساب
    @endsection
    @section('css')
        
    @endsection

    @section('content')
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="index.html" rel="nofollow">Home</a>                    
                <span></span> إنشاء حساب
            </div>
        </div>
    </div>
    <section class="pt-150 pb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 m-auto">
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="login_wrap widget-taber-content p-30 background-white border-radius-10 mb-md-5 mb-lg-0 mb-sm-5">
                                <div class="padding_eight_all bg-white">
                                    <div class="heading_s1">
                                        <h3 class="mb-30">إنشاء حساب</h3>
                                    </div>
                                    <form method="POST" action="{{route('signup.submit.form')}}">
                                        @csrf
                                        <div class="form-group">
                                            <input type="text" required="" name="name" placeholder="الأسم">
                                        </div>
                                        <div class="form-group">
                                            <input required="" type="email" name="email" placeholder="البريد الألكتروني">
                                        </div>
                                        <div class="form-group">
                                            <input required="" type="password" name="password" placeholder="كلمة السر">
                                        </div>
                                        <div class="form-group">
                                            <input required type="password" name="password_confirmation" placeholder="تأكيد كلمة السر">
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-fill-out btn-block hover-up" name="Signup">إنشاء حساب</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-1"></div>
                        <div class="col-lg-6">
                            <img src="assets/imgs/login.png">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endsection


    @section('js')

    @endsection

