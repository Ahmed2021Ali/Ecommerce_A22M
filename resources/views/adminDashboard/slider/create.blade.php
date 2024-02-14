<form method="POST" action="{{ route('slider.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="row mb-3">
        <label for="status"
               class="col-md-4 col-form-label text-md-end">{{ __('الحالة ') }}</label>
        <div class="col-md-6">
            <select name="status" id="status" class="form-control">
                <option value="1">تعرضها</option>
                <option value="0">لا تعرضها</option>
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
               class="col-md-4 col-form-label text-md-end">{{ __('العنوان الاول') }}</label>
        <div class="col-md-6">
            <input id="title_h1" type="text"
                   class="form-control @error('title_h1') is-invalid @enderror" name="title_h1"
                   value="{{ old('title_h1') }}" required autocomplete="title_h1" autofocus>
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
                   value="{{ old('title_h2') }}" required autocomplete="title_h2" autofocus>
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
                   value="{{ old('title_h4') }}" required autocomplete="title_h4" autofocus>
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
                   value="{{ old('title_p') }}" required autocomplete="title_p" autofocus>
            @error('name')
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
            <input type="file" name="files[]" id="files" class="form-control" >
            @error('files')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="row mb-0">
        <div class="col-md-12 offset-md-4" style="text-align:center">
            <button type="submit" class="btn btn-primary">
                {{ __('اضافة ') }}
            </button>
        </div>
    </div>
</form>
@include('adminDashboard.layouts.footerSlot')


