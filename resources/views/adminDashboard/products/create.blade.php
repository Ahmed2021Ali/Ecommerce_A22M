@extends('adminlte::page')
@section('title', 'إضافة منتج جديد')

@section('content_header')
    <a href="{{ route('product.index') }}" class="btn btn-info">عرض كل المنتجات </a>
    <h3 class="text-center" style="color:red;">اضافة منتج جديد </h3>
@stop

@section('content')
    <div class="col-12" style="direction: rtl; text-align: right;">
        <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-row">
                <div class="col-4">
                    <label for="name">اسم المنتج</label>
                    <input type="text" name="name" id="title" class="form-control" placeholder=""
                        aria-describedby="helpId" value="{{ old('name') }}" required>
                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-4">
                    <label for="Quantity">الكمية المتاحة لديك</label>
                    <input type="number" name="quantity" id="quantity" class="form-control" placeholder=""
                        aria-describedby="helpId" value="{{ old('quantity') }}" required>
                    @error('quantity')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-4">
                    <label for="color">الالوان المتاحة </label>
                    <select name="color[]" id="color" class="form-control" MULTIPLE>
                        @foreach ($colors as $color)
                            <option value="{{ $color->value }}">{{ $color->name }}</option>
                        @endforeach
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
                        @foreach ($sizes as $size)
                            <option value="{{ $size->name }}">{{ $size->name }}</option>
                        @endforeach
                    </select>
                    @error('size')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-4">
                    <label for="price">السعر</label>
                    <input type="number" name="price" id="price" class="form-control" placeholder=""
                        aria-describedby="helpId" value="{{ old('price') }}" required>
                    @error('price')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-4">
                    <label for="offer">الخصم كام في المية </label>
                    <input type="number" name="offer" id="offer" class="form-control" placeholder="%"
                        aria-describedby="helpId" value="{{ old('offer') }}">
                </div>
            </div>
            <div class="form-row">
                <div class="col-3">
                    <label for="status">حالة المنتج </label>
                    <select name="status" id="status" class="form-control" required>
                        <option style="display: none">اختار حالة المنتج</option>
                        <option {{ old('status') === 1 ? 'selected' : '' }} value="1">متاح</option>
                        <option {{ old('status') === 0 ? 'selected' : '' }} value="0">غير متاح</option>
                    </select>
                    @error('status')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-3">
                    <label for="category_id"> القسم التابع لهذا المنتج</label>
                    <select name="sub_category_id" id="sub_category_id" class="form-control" required>
                        <option style="display: none">اختار القسم</option>
                        @foreach ($subCategories as $subCategory)
                            <option value="{{ $subCategory->id }}">{{ $subCategory->name }}</option>
                        @endforeach
                    </select>
                    @error('sub_category_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-row">
                <div class="col-6">
                    <label for="description"> وصف المنتج </label>
                    <textarea name="description" id="description" cols="10" rows="3" class="form-control" required>{{ old('description') }}</textarea>
                    @error('description')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-row">
                <div class="col-12">
                    <label for="files">الصور</label>
                    <input type="file" name="files[]" id="files" class="form-control" multiple accept="image/*"
                        required>
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
