<form method="POST" action="{{ route('brand.update',$brand) }}" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <div class="row mb-3">
        <label for="status"
               class="col-md-4 col-form-label text-md-end">{{ __('الحالة ') }}</label>
        <div class="col-md-6">
            <select name="status" id="status" class="form-control" required>
                <option {{ $brand->status == 1 ? 'selected' : '' }} value="1">تعرضها</option>
                <option {{ $brand->status == 0 ? 'selected' : '' }} value="0">لا تعرضها</option>
            </select>
            @error('status')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>


    <div class="row mb-3">
        <label for="image"
               class="col-md-4 col-form-label text-md-end">{{ __('الصورة') }}</label>

        <div class="col-md-6">
            <input type="file" name="files[]" id="files" class="form-control" required>
            @error('files')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            @foreach($brand->getMedia('bannerFiles') as $media)
                <img src="{{$media->getFullUrl()}}" width="200px" height="100px">
            @endforeach
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


