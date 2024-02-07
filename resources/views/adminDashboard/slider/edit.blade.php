<form method="POST" action="{{ route('slider.update',$slider) }}" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <div class="row mb-3">
        <label for="status"
               class="col-md-4 col-form-label text-md-end">{{ __('الحالة ') }}</label>
        <div class="col-md-6">
            <select name="status" id="status" class="form-control">
                <option {{ $slider->status == 1 ? 'selected' : '' }} value="1">تعرضها</option>
                <option {{ $slider->status == 0 ? 'selected' : '' }} value="0">لا تعرضها</option>
            </select>
            @error('type')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <label for="title"
               class="col-md-4 col-form-label text-md-end">{{ __('العنوان الاول') }}</label>
        <div class="col-md-6">
            <input id="title_h1" type="text"
                   class="form-control @error('title_h1') is-invalid @enderror" name="title_h1"
                   value="{{ $slider->title_h1 }}" required autocomplete="title_h1" autofocus>
            @error('title_h1')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

    </div>

    <div class="row mb-3">
        <label for="title"
               class="col-md-4 col-form-label text-md-end">{{ __(' العنوان الثاني ') }}</label>
        <div class="col-md-6">
            <input id="title_h2" type="text"
                   class="form-control @error('title_h2') is-invalid @enderror" name="title_h2"
                   value="{{ $slider->title_h2 }}" required autocomplete="title_h2" autofocus>
            @error('title_h2')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

    </div>

    <div class="row mb-3">
        <label for="title"
               class="col-md-4 col-form-label text-md-end">{{ __('العنوان الثالث ') }}</label>
        <div class="col-md-6">
            <input id="title_h4" type="text"
                   class="form-control @error('title_h4') is-invalid @enderror" name="title_h4"
                   value="{{ $slider->title_h4 }}" required autocomplete="title_h4" autofocus>
            @error('title_h4')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

    </div>

    <div class="row mb-3">
        <label for="title"
               class="col-md-4 col-form-label text-md-end">{{ __('العنوان  الرابع ') }}</label>
        <div class="col-md-6">
            <input id="title_p" type="text"
                   class="form-control @error('title_p') is-invalid @enderror" name="title_p"
                   value="{{ $slider->title_p }}" required autocomplete="title_p" autofocus>
            @error('title_p')
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
            @foreach($slider->getMedia('sliderFiles') as $media)
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


