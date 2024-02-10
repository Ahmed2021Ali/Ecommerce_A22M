<form method="POST" action="{{ route('city.store') }}" enctype="multipart/form-data">
    @csrf

    <div class="row mb-3">
        <label for="name"
               class="col-md-4 col-form-label text-md-end">{{ __('المحافظة') }}</label>
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
        <label for="title"
               class="col-md-4 col-form-label text-md-end">{{ __('  سعرها ') }}</label>
        <div class="col-md-6">
            <input id="price" type="number"
                   class="form-control @error('price') is-invalid @enderror" name="price"
                   value="{{ old('price') }}" required autocomplete="price" autofocus>
            @error('price')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

    </div>


    <div class="row mb-0">
        <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-primary">
                {{ __('اضافة ') }}
            </button>
        </div>
    </div>
</form>
@include('adminDashboard.layouts.footerSlot')


