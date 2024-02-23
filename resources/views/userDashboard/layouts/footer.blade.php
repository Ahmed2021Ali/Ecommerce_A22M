<footer class="main">
     <section class="newsletter p-30 text-white wow fadeIn animated" style="direction: rtl; text-align: right;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7 mb-md-3 mb-lg-0">
                    <div class="row align-items-center">
                        <div class="col flex-horizontal-center">
                            <h4 class="font-size-20 mb-0 ml-3">اشترك في النشرة الإخبارية</h4>
                            <img class="icon-email" src="{{URL::asset('assets/imgs/theme/icons/icon-email.sv')}}g" alt="">

                        </div>
                        <div class="col my-4 my-md-0 des">
                            <h5 class="font-size-15 ml-4 mb-0"> <strong>هيوصلك كل جديد علي اميلك</strong></h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <!-- Subscribe Form -->
                    <form action="{{route('subscribe.email')}}" method="post" class="form-subcriber d-flex wow fadeIn animated">
                        @csrf
                        <input type="email" name="email" class="form-control bg-white font-small" placeholder="ادخل الاميل ">
                        @error('email')<div style="color: red">{{ $message }}</div>@enderror
                        <button class="btn bg-dark text-white" type="submit">الاشتراك</button>
                    </form>
                    <!-- End Subscribe Form -->
                </div>
            </div>
        </div>
    </section>
    <section class="section-padding footer-mid" id="about-us" style="direction: rtl; text-align: right;">
        <div class="container pt-15 pb-20">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="widget-about font-md mb-md-5 mb-lg-0">
                            <a href="{{route('home')}}"><img src="{{URL::asset('assets/imgs/logo/Picsart_24-02-16_18-01-27-786.png')}}" alt="A22M Logo" style="width: 50px"></a>
                        <h5 class="mt-20 mb-10 fw-600 text-grey-4"><i class="fas fa-comments"></i> تواصل معنا</h5>
                        <p>
                            <i class="fas fa-map-marker-alt float-right"></i>
                            <strong>العنوان: مركز مغاغة - المنيا </strong>

                        </p>
                        <p>
                            <i class="fas fa-phone float-right"></i>
                            <strong>رقم الهاتف: </strong><a href="tel:+201063462072">01063462072 2+</a>
                        </p>
                        <p>
                            <i class="fas fa-envelope float-right"></i>
                            <strong> البريد الألكتروني: a22mcompany@gmail.com</strong>
                        </p>

                        <h5 class="mb-10 mt-30 fw-600 text-grey-4"><i class="fas fa-share-alt"></i> تابعنا علي</h5>
                        <div class="mobile-social-icon">
                            <a href="https://www.facebook.com/profile.php?id=100095016672467&mibextid=ZbWKwL"><i class="fab fa-facebook-f"></i></a>
                            <a href="https://www.instagram.com/a22m3_8/"><i class="fab fa-instagram"></i></a>
                            <a href="https://www.tiktok.com/@am801237?_t=8jxvsw05DkL&_r=1"><i class="fab fa-tiktok"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3">
                    <h5 class="widget-title float-right"><i class="fas fa-info-circle"></i> حول</h5>
                    <ul class="footer-list text-right">
                        <li><a href="{{route('privacyPolicy')}}"><i class="fas fa-info-circle"></i> حولنا</a></li>
                        <li><a href="{{route('privacyPolicy')}}"><i class="fas fa-shield-alt"></i> سياسة الخصوصية</a></li>
                        <li><a href="{{route('privacyPolicy')}}"> <i class="fas fa-file-contract"></i> الشروط والأحكام</a></li>
                        <li><a href="tel:+201004297302"> <i class="fas fa-phone"></i> اتصل بنا</a></li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-3">
                    <h5 class="widget-title float-right"> <i class="fas fa-user"></i> حسابي</h5>
                    <ul class="footer-list text-right">
                        <li><a href="{{route('profile.index')}}"> <i class="fas fa-user"></i> حسابي</a></li>
                        <li><a href="{{route('cart.index')}}"> <i class="fas fa-shopping-cart"></i> عرض السلة</a></li>
                        <li><a href="{{ route('fav.index') }}"> <i class="fas fa-heart"></i> قائمة المفضلة</a></li>
                        <li><a href="{{ route('cart.index') }}"> <i class="fas fa-shopping-bag"></i> طلباتي</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <div class="container pb-20 wow fadeIn animated mob-center">
        <div class="row">
            <div class="col-12 mb-20">
                <div class="footer-bottom"></div>
            </div>
            <div class="col-lg-6">
                <p class="float-md-left font-sm text-muted mb-0">
                    <a href="{{route('privacyPolicy')}}"> سياسة الخصوصية  | <i class="fas fa-lock"></i></a>  <a href="{{route('privacyPolicy')}}">الشروط والأحكام<i class="fas fa-gavel"></i></a>
                </p>
            </div>
            <div class="col-lg-6">
                <p class="text-lg-end text-start font-sm text-muted mb-0">
                    <strong class="text-brand"><a target="_blank" href="https://www.facebook.com/Eng.AhmedMaghraby"> Ahmed Maghraby </a> & <a target="_blank" href="https://www.facebook.com/ahmed.abdellatif.mohammed/" >Ahmed Abd Ellatif</a> </strong> جميع الحقوق محفوظة لدي  <i class="fas fa-copyright"></i> <?php echo date("Y"); ?>
                </p>
            </div>
        </div>
    </div>

</footer>
