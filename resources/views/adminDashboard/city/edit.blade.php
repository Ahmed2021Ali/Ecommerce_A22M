<form method="POST" action="{{ route('city.update',$city) }}" enctype="multipart/form-data">
    @csrf
    @method('put')

    <div class="row mb-3">
        <label for="name"
               class="col-md-4 col-form-label text-md-end">{{ __('المحافظة') }}</label>
        <div class="col-md-6">
            <input id="main_title" type="text"
                   class="form-control @error('name') is-invalid @enderror" name="name"
                   value="{{ $city->name }}" required autocomplete="name" autofocus>
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
            <input id="title_h2" type="number"
                   class="form-control @error('price') is-invalid @enderror" name="price"
                   value="{{ $city->price }}" required autocomplete="price" autofocus>
            @error('price')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

    </div>


    <div class="row mb-0">
        <div class="col-md-12 offset-md-4" style="text-align:center">
            <button type="submit" class="btn btn-primary">
                {{ __('تحديث ') }}
            </button>
        </div>
    </div>
</form>
@include('adminDashboard.layouts.footerSlot')


