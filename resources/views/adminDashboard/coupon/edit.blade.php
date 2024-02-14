<form method="POST" action="{{ route('coupon.update',$coupon) }}" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <div class="row mb-3">
        <label for="status"
               class="col-md-4 col-form-label text-md-end">{{ __('الحالة ') }}</label>
        <div class="col-md-6">
            <select name="status" id="status" class="form-control" required>
                <option {{ $coupon->status === 1 ? 'selected' : '' }} value="1">تعرضها</option>
                <option {{ $coupon->status === 0 ? 'selected' : '' }} value="0">لا تعرضها</option>
            </select>
            @error('status')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('الاسم الكوبون') }}</label>
        <div class="col-md-6">
            <input id="name" type="text"
                   class="form-control @error('name') is-invalid @enderror" name="name"
                   value="{{ $coupon->name }}" required autocomplete="name" autofocus>
            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <label for="value"
               class="col-md-4 col-form-label text-md-end">{{ __('   القيمة كام في المية ') }}</label>
        <div class="col-md-6">
            <input id="value" type="text"
                   class="form-control @error('value') is-invalid @enderror" name="value"
                   value="{{ $coupon->value }}" required autocomplete="value" autofocus>
            @error('value')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

    </div>

    <div class="row mb-0">
        <div class="col-md-12 offset-md-4" style="text-align:center">
            <button type="submit" class="btn btn-primary">
                {{ __('تحديث') }}
            </button>
        </div>

    </div>
</form>
@include('adminDashboard.layouts.footerSlot')


