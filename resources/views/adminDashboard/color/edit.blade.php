<form method="POST" action="{{ route('color.update',$color) }}" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <div class="row mb-3">
        <label for="title" class="col-md-4 col-form-label text-md-end">{{ __(' الاسم') }}</label>
        <div class="col-md-6">
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                   value="{{$color->name}}" required autocomplete="name" autofocus>
            @error('name')
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

    </div>

    <div class="row mb-3">
        <label for="title" class="col-md-4 col-form-label text-md-end">{{ __(' القيمة ') }}</label>
        <div class="col-md-6">
            <input id="title_h2" type="text" class="form-control @error('value') is-invalid @enderror"
                   name="value" value="{{$color->value}}" required autocomplete="value" autofocus>
            @error('value')
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

    </div>

    <div class="row mb-0" style="text-align:center">
        <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-primary">
                {{ __('تحديث') }}
            </button>
        </div>

    </div>
</form>
@include('adminDashboard.layouts.footerSlot')


