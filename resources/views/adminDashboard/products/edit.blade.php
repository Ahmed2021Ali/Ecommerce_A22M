@extends('adminlte::page')
@section('content_header')
    <a href="{{ route('product.index') }}" class="btn btn-info">Show All Products</a>
    <h1>تحديث المنتج</h1>
@stop

@section('content')
    <div class="col-12">
        <form action="{{ route('product.update', $product) }}" method="post" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-row">
                <div class="col-4">
                    <label for="name">اسم المنتج</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder=""
                           aria-describedby="helpId" value="{{ $product->name }}">
                    @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-4">
                    <label for="Quantity">الكمية</label>
                    <input type="number" name="quantity" id="quantity" class="form-control" placeholder=""
                           aria-describedby="helpId" value="{{ $product->quantity }}">
                    @error('quantity')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-4">
                    <label for="color">المقاسات المتاحة </label>
                    <input type="text" name="size" id="size" class="form-control" placeholder=""
                           aria-describedby="helpId" value="{{ $product->size }}" multiple>
                    @error('size')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-row">
                <div class="col-4">
                    <label for="price">السعر</label>
                    <input type="number" name="price" id="price" class="form-control" placeholder=""
                           aria-describedby="helpId" value="{{ $product->price }}">
                    @error('price')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-4">
                    <label for="offer">هل يوجد خصم ع هذا المنتج % </label>
                    <input type="number" name="offer" id="offer" class="form-control" placeholder="%"
                           aria-describedby="helpId" value="{{ $product->offer }}">
                    @error('offer')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-4">
                    <label for="color">الالوان المتوفرة </label>
                    <input type="text" name="color" id="quantity" class="form-control" placeholder=""
                           aria-describedby="helpId" value="{{ $product->color }}" multiple>
                    @error('color')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-row">
                <div class="col-3">
                    <label for="status">الحالة</label>
                    <select name="status" id="status" class="form-control">
                        <option {{ $product->status == 1 ? 'selected' : '' }} value="1">متاح</option>
                        <option {{ $product->status == 0 ? 'selected' : '' }} value="0">غير متاح</option>
                    </select>
                    @error('status')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-3">
                    <label for="category_id"> اسم القسم التابع لة هذا المنتج</label>
                    <select name="category_id" id="category_id" class="form-control">
                        @foreach ($categories as $category)
                            <option {{ $category->id == $product->category_id ? 'selected' : '' }}
                                    value="{{ $category->id }}">{{ $category->title }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-row">
                <div class="col-6">
                    <label for="description">الوصف</label>
                    <textarea name="description" id="description" cols="10" rows="3"
                              class="form-control">{{ $product->description }}</textarea>
                    @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-row">
                <div class="col-12">
                    <label for="image">الصور </label>
                    <input type="file" name="files[]" id="files" class="form-control" multiple accept="image/*">
                    @foreach($product->getMedia('productFiles') as $media)
                        <img src="{{$media->getFullUrl()}}" width="150px" height="180px">
                    @endforeach
                </div>
            </div>
            <div class="form-row my-3">
                <div class="d-grid gap-2 col-2 mx-auto">
                    <button class="btn btn-success btn-lg" value="back"> تحديث</button>
                </div>
            </div>
        </form>
    </div>
@stop
