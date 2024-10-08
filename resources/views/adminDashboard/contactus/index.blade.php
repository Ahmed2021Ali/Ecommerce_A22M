@extends('adminlte::page')

@section('title',' رض كل العملاء يردون عن نتواصل  معاهم لحل مشاكلهم')

@section('content_header')
    <h1 style="text-align:center">عرض كل العملاء يردون عن نتواصل  معاهم لحل مشاكلهم  </h1>
@stop

@section('content')
    <div style="direction: rtl; text-align: right;">
    <div class="row">
        <div class="col-12">
            <br>
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th> الاسم </th>
                    <th> الاميل</th>
                    <th>رقم التليفون</th>
                    <th>الموضوع</th>
                    <th>الرسالة </th>
                    <th>المستخدم الذي ارسل الرسالة </th>
                    <th>العمليات</th>


                </tr>
                </thead>
                <tbody>
                @foreach ($contacts as $contact)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $contact->name }}</td>
                        <td>{{ $contact->email }}</td>
                        <td>{{ $contact->phone }}</td>
                        <td>{{ $contact->subject }}</td>
                        <td>{{ $contact->message }}</td>
                        <td>{{ $contact->user->name }}</td>
                        <td>

                            @can('حذف الإستفسارات')
                                {{--  delete  --}}
                                <x-adminlte-modal id="delete_{{ $contact->id }}" title="حذف" theme="purple"
                                            icon="fas fa-bolt" size='lg' disable-animations>
                                    @include('adminDashboard.contactus.delete',['contact'=>$contact])
                                </x-adminlte-modal>
                                <x-adminlte-button label="حذف" data-toggle="modal"
                                    data-target="#delete_{{ $contact->id }}" class="bg-danger"/>
                                {{-- End  delete  --}}
                            @endcan

                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
            {{ $contacts->links() }}

        </div>
    </div>
    </div>
@stop
