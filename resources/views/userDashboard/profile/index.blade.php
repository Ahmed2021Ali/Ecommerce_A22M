@extends('userDashboard.layouts.master')
@section('title')
    اعدادات الحساب
@endsection
@section('css')
@endsection
@section('pageHeader')
    اعدادات الحساب
@endsection
@section('content')
    <section class="pt-150 pb-150" style="direction: rtl;">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 m-auto">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="dashboard-menu">
                                <ul class="nav flex-column" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="dashboard-tab" data-bs-toggle="tab" href="#dashboard"
                                            role="tab" aria-controls="dashboard" aria-selected="false"><i
                                                class="fi-rs-settings-sliders mr-10"></i> لوحة التحكم</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="orders-tab" data-bs-toggle="tab" href="#orders"
                                            role="tab" aria-controls="orders" aria-selected="false"><i
                                                class="fi-rs-shopping-bag mr-10"></i> الطلبات</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="ordersCancelled-tab" data-bs-toggle="tab" href="#ordersCancelled"
                                           role="tab" aria-controls="orders" aria-selected="false"><i
                                                class="fi-rs-shopping-bag mr-10"></i> الطلبات تم الغائها</a>
                                    </li>
                                     <li class="nav-item">
                                        <a class="nav-link" id="track-orders-tab" data-bs-toggle="tab" href="#track-orders" role="tab" aria-controls="track-orders" aria-selected="false"><i class="fi-rs-shopping-cart-check mr-10"></i> تتبع طلبك</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="address-tab" data-bs-toggle="tab" href="#address"
                                            role="tab" aria-controls="address" aria-selected="true"><i
                                                class="fi-rs-marker mr-10"></i> عنواني</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="account-detail-tab" data-bs-toggle="tab"
                                            href="#account-detail" role="tab" aria-controls="account-detail"
                                            aria-selected="true"><i class="fi-rs-user mr-10"></i> تفاصيل الحساب</a>
                                    </li>
                                    <li class="nav-item">
                                        <form action="{{ route('logout') }}" method="POST">
                                            @csrf
                                            <button type="submit"
                                                style=" align-items: center;  border: none; background-color: white;
                                                color: black; cursor: pointer; padding: 15px; font-size: 16px; margin-right: 33px;">
                                                <i class="fas fa-sign-out-alt fa-lg"></i> تسجيل خروج
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="tab-content dashboard-content">
                                <div class="tab-pane fade active show" id="dashboard" role="tabpanel"
                                    aria-labelledby="dashboard-tab">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="mb-0">مرحبًا {{ Auth::user()->name }}!</h5>
                                        </div>
                                        <div class="card-body">
                                            <p>من لوحة التحكم الخاصة بك، يمكنك بسهولة التحقق وعرض الطلبات
                                                    الأخيرة الخاصة بك و تعديل
                                                    كلمة المرور وتفاصيل الحساب.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="orders" role="tabpanel" aria-labelledby="orders-tab">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="mb-0">طلباتك</h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                    <tr>
                                                        <th>الطلب</th>
                                                        <th>التاريخ</th>
                                                        <th>الحالة</th>
                                                        <th>الإجمالي</th>
                                                        <th>الإجراءات</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach(auth::user()->orders() as $order)
                                                        <tr>
                                                            <td>#{{$order->order_number}}</td>
                                                            <td>{{$order->created_at->toformatteddatestring()}}</td>
                                                            <td> {{$order->delivery_status === 0 ? 'الطلب تحت المعالجة' : 'تم وصول الاردر بنجاح '}}</td>
                                                            <td>{{$order->total}} جينية لـ {{$order->number_of_product}}
                                                                منتج
                                                            </td>
                                                            <td><a href="{{route('order.show',$order->order_number)}}"
                                                                   class="btn-small d-block">عرض</a></td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                                {{ auth::user()->orders()->links() }}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                 <div class="tab-pane fade" id="track-orders" role="tabpanel" aria-labelledby="track-orders-tab">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="mb-0">تتبع الطلبات</h5>
                                        </div>
                                        <div class="card-body contact-from-area">
                                            <p>لتتبع طلبك، يرجى إدخال معرف الطلب الخاص بك في الصندوق أدناه والضغط على زر "تتبع". يتم توفير ذلك لك في إيصالك وفي البريد الإلكتروني للتأكيد الذي يجب أن تكون قد تلقيته.</p>
                                            <div class="row">
                                                <div class="col-lg-8">
                                                    <form class="contact-form-style mt-30 mb-50" action="{{route('order.search')}}" method="post">
                                                        @csrf
                                                        <div class="input-style mb-20">
                                                            <label>معرف الطلب</label>
                                                            <input name="order_number" placeholder="يتم العثور عليه في بريد تأكيد الطلب الخاص بك" type="text" class="square">
                                                        </div>
                                                        <button class="submit submit-auto-width" type="submit">تتبع</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="address" role="tabpanel" aria-labelledby="address-tab">
                                    <div class="row">
                                        @foreach(Auth::user()->addresses() as $address)
                                            <div class="col-lg-6">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <table class="table">
                                                            <tr>
                                                                <th>اسم صاحب الاردر</th>
                                                                <td class="product-subtotal" colspan="2">
                                                                    {{ $address->fname . $address->lname }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th> المدينة</th>
                                                                <td class="product-subtotal" colspan="2">
                                                                    {{ $address->city->name }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th> العنوان التفصيلي</th>
                                                                <td class="product-subtotal" colspan="2">
                                                                    {{ $address->address }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th> رقم هاتف</th>
                                                                <td class="product-subtotal" colspan="2">
                                                                    {{ $address->phone }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th> الاميل</th>
                                                                <td class="product-subtotal" colspan="2">
                                                                    {{ $address->email }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th> ملحوظة توصيل</th>
                                                                <td class="product-subtotal" colspan="2">
                                                                    {{ $address->note }}</td>
                                                            </tr>
                                                        </table>
                                                        <a href="{{ route('address.edit', $address) }}"
                                                            class="btn -primary">تعديل العنوان</a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    {{ auth::user()->addresses()->links() }}
                                </div>
                                <div class="tab-pane fade" id="account-detail" role="tabpanel"
                                    aria-labelledby="account-detail-tab">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>تفاصيل الحساب</h5>
                                        </div>
                                        <div class="card-body">

                                            <form method="post" name="enq" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                                                @csrf
                                                <div class="row">
                                                    <!-- User Image Display -->
                                                    <label>الصورة الشخصية</label>
                                                    <div class="form-group col-lg-14">
                                                        <div class="col-lg-6 col-md-6 col-xs-9 col-9 d-flex justify-content-center">
                                                            <div class="product-cart-wrap mb-40">
                                                                <div class="product-img-action-wrap">
                                                                    @if(auth()->user()->hasMedia('userImages'))
                                                                        <div class="product-img product-img-zoom mx-auto">
                                                                            <a href="#">
                                                                                    <img src="{{ auth()->user()->getFirstMediaUrl('userImages') }}" width="475" height="250" style="border-radius: 18%;" alt="User Image">
                                                                            </a>
                                                                        </div>
                                                    
                                                                        <div class="product-action-icons text-center" style="margin-top: 7px">
                                                                            <!-- Delete Link -->
                                                                            <a href="{{ route('profile.delete.userImage') }}" class="action-link" aria-label="حذف" onclick="return confirm('هل انت متأكد من حذف الصورة الشخصية؟')" style="font-weight: bold; font-size: large;">
                                                                                <i class="fi-rs-trash"></i> حذف
                                                                            </a>
                                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                            <!-- View Form -->
                                                                            <a href="{{ auth()->user()->getFirstMediaUrl('userImages') }}" class="d-inline action-link" aria-label="عرض" style="border: none; padding: 5; cursor: pointer; font-weight: bold; font-size: large;">
                                                                                <i class="fi-rs-eye"></i> عرض
                                                                            </a>
                                                                        </div>
                                                                    @else
                                                                        <div class="product-img-placeholder text-center" style="border: 1px dashed #ccc; padding: 20px; border-radius: 18%;">
                                                                            لا توجد صورة حاليا
                                                                        </div>
                                                                    @endif
                                                    
                                                                    <div class="product-content-wrap text-center">
                                                                        <div class="product-category">
                                                                            <a href="#">{{ auth()->user()->name }}</a>
                                                                        </div>
                                                                        <!-- Other product details go here -->
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    
                                                        <div class="custom-file">
                                                            <label class="custom-file-label" for="customfile">اختر صورة</label>
                                                            <input type="file" class="custom-file-input" id="customfile" name="files[]">
                                                        </div>
                                                    
                                                        @error('files')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    


                                                    <div class="form-group col-md-12">
                                                        <label>الأسم <span class="required">*</span></label>
                                                        <input value="{{ old('name', auth::user()->name) }}" class="form-control square" name="name" type="text">
                                                        @error('name')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>

                                                    <div class="form-group col-md-12">
                                                        <label>عنوان البريد الإلكتروني <span class="required">*</span></label>
                                                        <input value="{{ old('email', auth::user()->email) }}" class="form-control square" name="email" type="email">
                                                        @error('email')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>

                                                    <div class="form-group col-md-12">
                                                        <label>كلمة المرور الجديدة</label>
                                                        <div class="input-group">
                                                            <input class="form-control square" name="password" type="password" id="password-field">
                                                            <div class="input-group-append">
                                                                <button type="button" class="btn btn-outline-secondary toggle-password-btn" onclick="togglepasswordvisibility('password-field')">
                                                                    <i class="fas fa-eye"></i> عرض
                                                                </button>
                                                            </div>
                                                        </div>
                                                        @error('password')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>

                                                    <div class="form-group col-md-12">
                                                        <label>تأكيد كلمة المرور</label>
                                                        <div class="input-group">
                                                            <input class="form-control square" name="password_confirmation" type="password" id="confirm-password-field">
                                                            <div class="input-group-append">
                                                                <button type="button" class="btn btn-outline-secondary toggle-password-btn" onclick="togglepasswordvisibility('confirm-password-field')">
                                                                    <i class="fas fa-eye"></i> عرض
                                                                </button>
                                                            </div>
                                                        </div>
                                                        @error('password_confirmation')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>

                                                    <div class="col-md-12">
                                                        <button type="submit" class="btn btn-fill-out submit" name="submit" value="submit">حفظ</button>
                                                    </div>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script>
        function togglepasswordvisibility(fieldId) {
            var field = document.getElementById(fieldId);
            if (field.type === "password") {
                field.type = "text";
            } else {
                field.type = "password";
            }
        }
    </script>

@endsection
