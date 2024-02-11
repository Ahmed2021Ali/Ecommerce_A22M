@extends('userDashboard.layouts.master')
    @section('title')
        إنشاء حساب
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
        إنشاء حساب    
    @endsection
    @section('content')
    <section class="pt-150 pb-150" style="direction: rtl; text-align:right">
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
                                            <input type="text" required="" name="name" placeholder="الأسم" required>
                                        </div>
                                        <div class="form-group">
                                            <input required="" type="email" name="email" placeholder="البريد الألكتروني" required>
                                        </div>
                                        <div class="form-container">
                                            <div class="form-group">
                                                <input required="" id="password" type="password" name="password" placeholder="كلمة السر" required>
                                            </div>
                                            <div class="form-group">
                                                <input required id="password_confirmation" type="password" name="password_confirmation" placeholder="تأكيد كلمة السر" required>
                                            </div>
                                            <div class="show-password-container" onclick="togglePasswordVisibility()">
                                                <label for="showPassword" class="show-password-label"><i class="fas fa-eye"></i> إظهار كلمة المرور</label>
                                            </div>
                                            <br>
                                            
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-fill-out btn-block hover-up" name="Signup">إنشاء حساب</button>
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
    <script>
        function togglePasswordVisibility() {
            var passwordField = document.getElementById('password');
            var passwordConfirmationField = document.getElementById('password_confirmation');
    
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
            } else {
                passwordField.type = 'password';
            }
    
            if (passwordConfirmationField.type === 'password') {
                passwordConfirmationField.type = 'text';
            } else {
                passwordConfirmationField.type = 'password';
            }
        }
    </script>
    @endsection

