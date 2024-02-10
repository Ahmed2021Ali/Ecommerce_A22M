<form method="POST" action="{{ route('banner.update',$banner) }}" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <div class="row mb-3">
        <label for="status"
               class="col-md-4 col-form-label text-md-end">{{ __('الحالة ') }}</label>
        <div class="col-md-6">
            <select name="status" id="status" class="form-control">
                <option {{ $banner->status == 1 ? 'selected' : '' }} value="1">تعرضها</option>
                <option {{ $banner->status == 0 ? 'selected' : '' }} value="0">لا تعرضها</option>
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
                   value="{{ $banner->small_title }}" required autocomplete="main_title" autofocus>
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
            <input id="title_h2" type="text"
                   class="form-control @error('small_title') is-invalid @enderror" name="small_title"
                   value="{{ $banner->main_title }}" required autocomplete="small_title" autofocus>
            @error('small_title')
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
            <input type="file" name="files[]" id="files" class="form-control" multiple accept="image/*">
            @error('files')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            @foreach($banner->getMedia('bannerFiles') as $media)
                <img src="{{$media->getFullUrl()}}" width="200px" height="100px">
            @endforeach
        </div>
    </div>

    <div class="row mb-0">
        <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-primary">
                {{ __('تحديث') }}
            </button>
        </div>

    </div>
</form>
@include('adminDashboard.layouts.footerSlot')


