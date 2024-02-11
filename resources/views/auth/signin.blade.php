@extends('userDashboard.layouts.master')
    @section('title')
        تسجيل دخول
    @endsection
    @section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
        }
    
        .social-login {
            margin-top: 20px;
            display: flex;
            flex-direction: column;
        }
    
        .loginBtn {
            background-color: #ffffff;
            border: 1px solid #dddddd;
            padding: 10px;
            text-align: center;
            margin-bottom: 10px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
        }
    
        .loginBtn a {
        color: #ffffff;
        text-decoration: none;
        display: flex;
        align-items: center;
        font-size: bold;
        font-size: medium;
        font-weight: bold;
        }
    
    
    
        .loginBtn span {
            margin-right: 10px;
        }
    
        /* Facebook */
        .loginBtn--facebook {
            border-color: #3b5998;
            color: #3b5998;
            background-color: #3b5998;
            border-radius: 7px;
    
        }
    
        /* Google */
        .loginBtn--google {
            border-color: #dd4b39;
            color: #dd4b39;
            background-color: #dd4b39;
            border-radius: 7px;
        }
    </style>
    @endsection
        @section('pageHeader')
            تسجيل دخول
        @endsection
    @section('content')
        <section class="pt-150 pb-150"  style="direction: rtl; text-align:right">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 m-auto">
                        <div class="row">
                            <div class="col-lg-5">
                                <div
                                    class="login_wrap widget-taber-content p-30 background-white border-radius-10 mb-md-5 mb-lg-0 mb-sm-5">
                                    <div class="padding_eight_all bg-white">
                                        <div class="heading_s1">
                                            <h3 class="mb-30">تسجيل دخول</h3>
                                        </div>
                                        <form method="POST" action="{{ route('signin.submit.form') }}">
                                            @csrf
                                            <div class="form-container">
                                                <div class="form-group">
                                                    <label for="email">البريد الإلكتروني:</label>
                                                    <input type="text" id="email" name="email" required placeholder="البريد الإلكتروني">
                                                </div>
                                                <div class="form-group">
                                                    <label for="password">كلمة المرور:</label>
                                                    <input type="password" id="password" name="password" required placeholder="كلمة المرور">
                                                </div>
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-fill-out btn-block hover-up" name="login">تسجيل دخول</button>
                                                </div>
                                            </div>
                                            @include('auth.socialite')
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

