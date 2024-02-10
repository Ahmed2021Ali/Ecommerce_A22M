@extends('userDashboard.layouts.master')
@section('title')
    اضافة عنوان
@endsection
@section('css')
@endsection

@section('content')
    <main class="main" style="direction: rtl; text-align: right;">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="index.html" rel="nofollow">الصفحة الرائيسية</a>
                    <span></span> سلة المشتريات
                    <span></span> اضافة عنوان
                </div>
            </div>
        </div>
        <section class="pt-50 pb-50">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 col-lg-10 m-auto">
                        <div class="contact-from-area padding-20-row-col wow FadeInUp">
                            <h3 class="mb-10 text-center">اضافة عنوان</h3>
                            <form action="{{ route('address.store') }}" method="post">
                                @csrf

                                <div class="d-flex gap-3 mb-3">
                                    <div class="w-50">
                                        <label for="fname">الاسم الأول <span class="required">*</span></label>
                                        <input class="form__input" type="text" id="fname" name="fname" required>
                                        @error('fname')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="w-50">
                                        <label for="lname">الاسم الأخير <span class="required">*</span></label>
                                        <input class="form__input" type="text" id="lname" name="lname" required/>
                                        @error('lname')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-6">
                                    <label for="city">المدينة / المحافظة<span class="required">*</span></label>
                                    <select class="form-control" id="city" name="city">
                                        <option>المنيا</option>
                                        <option>المنوفية</option>
                                        <option>الإسكندرية</option>
                                        <option>الإسماعيلية</option>
                                        <option>كفر الشيخ</option>
                                        <option>أسوان</option>
                                        <option>أسيوط</option>
                                        <option>الأقصر</option>
                                        <option>الوادي الجديد</option>
                                        <option>شمال سيناء</option>
                                        <option>البحيرة</option>
                                        <option>بني سويف</option>
                                        <option>بورسعيد</option>
                                        <option>البحر الأحمر</option>
                                        <option>الجيزة</option>
                                        <option>الدقهلية</option>
                                        <option>جنوب سيناء</option>
                                        <option>دمياط</option>
                                        <option>سوهاج</option>
                                        <option>السويس</option>
                                        <option>الشرقية</option>
                                        <option>الغربية</option>
                                        <option>الفيوم</option>
                                        <option>القاهرة</option>
                                        <option>القليوبية</option>
                                        <option>قنا</option>
                                        <option>مطروح</option>
                                    </select>
                                    @error('city')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="address">العنوان بالكامل ( المنطقة -الشارع - رقم المنزل)<span
                                            class="required">*</span></label>
                                    <input class="form__input" name="address" placeholder="رقم المنزل او الشارع / الحي"
                                           type="text"
                                           id="address" required/>
                                    @error('address')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="phone">رقم الهاتف<span class="required">*</span></label>
                                    <input class="form__input" type="text" id="phone" name="phone" required/>
                                    @error('phone')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="email">البريد الإلكتروني (اختياري)<span
                                            class="required">*</span></label>
                                    <input class="form__input" type="email" id="email" name="email" required/>

                                    @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <h2>معلومات اضافية</h2>
                                    <label for="note">ملاحظات الطلب (اختياري)<span class="required">*</span></label>
                                    <input class="form__input"
                                              placeholder="ملاحظات حول الطلب, مثال: ملحوظة خاصة بتسليم الطلب."
                                              type="text"
                                              id="note" name="note"></input>
                                    @error('note')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <button class="btn btn-danger w-100 py-2">تاكيد الطلب</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
