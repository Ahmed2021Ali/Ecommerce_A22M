@extends('adminlte::page', 'إضافة منتج جديد')
@section('content_header')
    <a href="{{ route('product.index') }}" class="btn btn-info">عرض كل المنتجات </a>
    <h3 class="text-center" style="color:red;">اضافة منتج جديد </h3>
@stop

@section('content')

    <div class="col-12">
        <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-row">
                <div class="col-4">
                    <label for="name">اسم المنتج</label>
                    <input type="text" name="name" id="title" class="form-control" placeholder=""
                           aria-describedby="helpId" value="{{ old('name') }}">
                    @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-4">
                    <label for="Quantity">الكمية المتوفر لديك</label>
                    <input type="number" name="quantity" id="quantity" class="form-control" placeholder=""
                           aria-describedby="helpId" value="{{ old('quantity') }}" multiple>
                    @error('quantity')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-4">
                    <label for="color">الالوان المتوفرة </label>
                    <select name="color[]" id="color" class="form-control" MULTIPLE>
                        <option  value="احمر">احمر</option>
                        <option  value="اصفر"> اصفر</option>
                        <option  value="اخضر"> اخضر</option>
                        <option  value="ازرق"> ازرق</option>
                        <option  value="بنفسجي"> بنفسجي </option>
                        <option  value="نبيتي"> نبيتي </option>
                        <option  value="لبني"> لبني </option>
                        <option  value="اسود"> اسود </option>
                        <option  value="ابيض"> ابيض </option>
                        <option  value="ذهبي"> ذهبي </option>
                        <option  value="فضي"> فضي </option>
                        <option  value="بني"> بني </option>
                    </select>
                    @error('color')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-row">
                <div class="col-4">
                    <label for="color">المقاسات المتاحة </label>
                    <select name="size[]" id="size" class="form-control" MULTIPLE>
                        <option value="x">x</option>
                        <option value="l">l</option>
                        <option value="xl">xl</option>
                        <option value="m">m</option>
                        <option value="s">s</option>
                        <option value="xxl">xxl</option>
                    </select>
                    @error('size')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-4">
                    <label for="price">السعر</label>
                    <input type="number" name="price" id="price" class="form-control" placeholder=""
                           aria-describedby="helpId" value="{{ old('price') }}">
                    @error('price')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-4">
                    <label for="offer">الخصم كام في المية </label>
                    <input type="number" name="offer" id="offer" class="form-control" placeholder="%"
                           aria-describedby="helpId" value="{{ old('offer') }}">
                    @error('offer')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-row">
                <div class="col-3">
                    <label for="status">حالة المنتج </label>
                    <select name="status" id="status" class="form-control">
                        <option {{ old('status') == 1 ? 'selected' : '' }} value="1">متاح</option>
                        <option {{ old('status') == 0 ? 'selected' : '' }} value="0">غير متاح</option>
                    </select>
                    @error('status')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-3">
                    <label for="category_id"> القسم التابع لة هذا المنتج</label>
                    <select name="category_id" id="category_id" class="form-control" required>
                        <option style="display: none">اختار القسم</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-row">
                <div class="col-6">
                    <label for="description"> الوصف المنتج </label>
                    <textarea name="description" id="description" cols="10" rows="3"
                              class="form-control">{{ old('description') }}</textarea>
                    @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-row">
                <div class="col-12">
                    <label for="image">الصور</label>
                    <input type="file" name="files[]" id="files" class="form-control" multiple accept="image/*">
                    @error('files')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <br>
            <div class="form-row my-3">
                <div class="d-grid gap-2 col-2 mx-auto">
                    <button class="btn btn-success btn-lg" value="back">حفظ المنتج</button>
                </div>
            </div>
        </form>
    </div>
@stop
