<form method="POST" action="{{ route('banner.update',$banner) }}" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <div class="row mb-3">
        <label for="status"
               class="col-md-4 col-form-label text-md-end">{{ __('الحالة ') }}</label>
        <div class="col-md-6">
            <select name="status" id="status" class="form-control">
                <option {{ $banner->status === 1 ? 'selected' : '' }} value="1">تعرضها</option>
                <option {{ $banner->status === 0 ? 'selected' : '' }} value="0">لا تعرضها</option>
            </select>
            @error('status')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <label for="title"
               class="col-md-4 col-form-label text-md-end">{{ __('العنوان الرائيسي') }}</label>
        <div class="col-md-6">
            <input id="main_title" type="text"
                   class="form-control @error('main_title') is-invalid @enderror" name="main_title"
                   value="{{ $banner->small_title }}" autocomplete="main_title" autofocus>
            @error('main_title')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

    </div>

    <div class="row mb-3">
        <label for="title"
               class="col-md-4 col-form-label text-md-end">{{ __(' العنوان الفرعي ') }}</label>
        <div class="col-md-6">
            <input id="small_title" type="text"
                   class="form-control @error('small_title') is-invalid @enderror" name="small_title"
                   value="{{ $banner->main_title }}"  autocomplete="small_title" autofocus>
            @error('small_title')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

    </div>

    <div class="row mb-3">
        <label for="product_name" class="col-md-4 col-form-label text-md-end">{{ __('اختر المنتج') }}</label>
        <div class="col-md-6">
            <select id="product_id" class="form-control @error('product_id') is-invalid @enderror" name="product_id"
                    required>
                <option value="" disabled selected>أختر المنتج</option>
                @foreach($products as $product)
                    <option
                        {{ $banner->product_id === $product->id ? 'selected' : '' }} value="{{ $product->id }}">{{ $product->name }}</option>
                @endforeach
            </select>
            @error('product_id')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="row mb-0">
        <div class="col-md-12 offset-md-4" style="text-align:center">
            <button type="submit" class="btn btn-primary">
                {{ __('تحديث  بانر ') }}
            </button>
        </div>
    </div>
</form>
@include('adminDashboard.layouts.footerSlot')


