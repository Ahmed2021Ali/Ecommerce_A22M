@extends('adminlte::page')

@section('title', ' تقييمات')

@section('content_header')
    <h1>اراء العملاء</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>اسم صاحب التقييم</th>
                        <th>تعليق</th>
                        <th>التقييم</th>
                        <th>حدث</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reviews as $review)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $review->user->name }}</td>
                            <td>{{ $review->comment }}</td>
                            <td>{{ $review->star }}</td>

                            <td>
                                <form action="{{ route('review.destroy', $review) }}" method="post" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button class=" btn btn-danger"> حذف </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
            {{$reviews->links()}}

        </div>
{{--        {{ $products->links() }}--}}
   </div>

@stop

