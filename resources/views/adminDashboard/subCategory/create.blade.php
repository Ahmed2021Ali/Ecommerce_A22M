<form method="POST" action="{{ route('sub-category.store') }}" enctype="multipart/form-data">
    @csrf

    <div class="row mb-3">
        <label for="title"
               class="col-md-4 col-form-label text-md-end">{{ __('اسم القسم ') }}</label>
        <div class="col-md-6">
            <input id="name" type="text"
                   class="form-control @error('name') is-invalid @enderror" name="name"
                   value="{{ old('name') }}" required autocomplete="name" autofocus>
            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <label for="category_id"
               class="col-md-4 col-form-label text-md-end">{{ __('القسم التابع لهذا المنتج ') }}</label>
        <div class="col-md-6">
            <select name="category_id" id="category_id" class="form-control" required>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category_id')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <label for="image" class="col-md-4 col-form-label text-md-end">{{ __('الصورة') }}</label>
        <div class="col-md-6">
            <input type="file" name="files[]" id="files" class="form-control" required>
            @error('files')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>


    <div class="row mb-0">
        <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-primary">
                {{ __('اضاقة') }}
            </button>
        </div>
    </div>
</form>
@include('adminDashboard.layouts.footerSlot')

