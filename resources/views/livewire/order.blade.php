<div>
    @if ($subTotal)
        <form wire:submit="store">

            <div class="row mb-50">
                <div class="col-lg-6 col-md-12">
                    <div class="border p-md-4 p-30 border-radius cart-totals">
                        <div class="heading_s1 mb-3">
                            <h4>اجمالي سلة المشتريات</h4>
                        </div>
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                <tr>
                                    <td class="cart_total_label">الاجمالي المنتجات</td>
                                    <td class="cart_total_amount"><span
                                            class="font-lg fw-900 text-brand">{{$subTotal}} جينية</span></td>
                                </tr>
                                <tr>
                                    <td class="cart_total_label">سعر التوصيل</td>
                                    <td class="cart_total_amount"><i class="ti-gift mr-5"></i>
                                        <span class="font-lg fw-900 text-brand">
                                        @if($deliveryPrice)
                                                {{$deliveryPrice}} جينية
                                            @endif
                                    </span>

                                    </td>
                                </tr>
                                <tr>
                                    <td class="cart_total_label">الاجمالي</td>
                                    <td class="cart_total_amount"><strong><span class="font-xl fw-900 text-brand">
                                                {{calcTotalPriceOrder($subTotal, $deliveryPrice, $discount->value ?? null)}}
                                        </span></strong>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="mb-30 mt-50">
                            <div class="heading_s1 mb-3">
                                <h4>لديك كوبون خصم </h4>
                            </div>
                            <div class="total-amount">
                                <div class="left">
                                    <div class="coupon">
                                        <div class="form-row row justify-content-center">
                                            <div class="form-group col-lg-6">
                                                <input type="text" name="couponCode" class="font-medium"
                                                       wire:model="form.coupon" wire:change="coupon"/>
                                            </div>
                                            <div class="form-group col-lg-6">
                                                @if ($discount)
                                                    <td class="cart_total_amount"><span
                                                            class="font-lg fw-900 text-brand">{{$discount->value}} %</span>
                                                    </td>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-12">
                    <h4 class="mt-15 mb-30 text-center" style="color: red">توصيل اوردارات من 3 الي 5 ايام
                        <span class="font-xl text-brand fw-900"></span></h4>
                    <div class="mb-3">
                        <div class="cart-action text-end">
                            <a href="{{route('address.create')}}" class="btn"><i class="fi-rs-shopping-bag mr-10"></i>
                                اضافة
                                عنوان توصيل اخر</a>
                        </div>
                        <br>
                        <label for="status" style="color:blue"> اختار عنوان التوصيل <span
                                class="required">*</span></label>
                        <select wire:model="form.address_id" id="form.address_id"
                                class="form-control" wire:change="changeAddress" class="form-control" required>
                            <option style="display: none" value=""> اختار عنوان التوصيل</option>
                            @if($addresses)
                                <option style="display: none">اختار عنوان التوصيل</option>
                                @foreach($addresses as $address)
                                    <option
                                        value="{{$address->id}}">{{ Str::limit($address->city->name." - ".$address->address, 100) }} </option>
                                @endforeach
                            @endif
                            <div>
                                @error('form.address_id') <span class="error">{{ $message }}</span> @enderror
                            </div>
                        </select>
                    </div>
                </div>
            </div>

            <div style="text-align:center">
                <div wire:loading><h4>جاري حفظ الاردر - برجاء الانتظار بعض الثواني</h4></div>
                <div wire:loading.remove>
                    <button type="submit" class="btn "><i class="fi-rs-box-alt mr-10"></i> تاكيد الطلب</button>
                </div>
            </div>

        </form>
    @endif
</div>
