@extends('adminlte::page')

@section('title', ' عرض كل المستخدمين')

@section('content_header')
    <h1 style="text-align:center">عرض كل المستخدمين</h1>
@stop

@section('content')
<div style="direction: rtl; text-align: right;">
    @can('اضافة مستخدم')                            
        <div class="row">
            <div class="col-lg-12 margin-tb mb-4">
                <div class="pull-right">
                    <div class="float-end">
                        <a class="btn btn-success" href="{{ route('users.create') }}"> إضافة مستخدم جديد</a>
                    </div>
                </div>
            </div>
        </div>
    @endcan
    @if ($message = Session::get('success'))
        <div class="alert alert-success my-2">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered table-hover table-striped">
        <tr>
            <th>الأسم</th>
            <th>البريد الإلكتروني</th>
            <th>نوع المستخددم</th>
            <th>أخر تسجيل دخول</th>
            <th width="280px">عمليات</th>
        </tr>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    @forelse($user->getRoleNames() as $v)
                        <label class="badge badge-secondary text-dark">{{ $v }}</label>
                    @empty
                        مستخدم عادي
                    @endforelse

                </td>
                <td>
                    @if($user->last_login_at)
                    <div style="margin-bottom: 8px">التاريخ: {{ \Carbon\Carbon::parse($user->last_login_at)->setTimezone('Africa/Cairo')->format('Y/m/d') }}</div>
                    <div>الساعة: {{ \Carbon\Carbon::parse($user->last_login_at)->setTimezone('Africa/Cairo')->format('h:i A') }}</div>                    @else
                        المستخدم لم يسجل دخول حتي الآن
                    @endif
                </td>
                                <td>
                    @if($user->email !== 'owner@gmail.com')
                    @can('تعديل مستخدم')                            
                        <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">تعديل</a>
                    @endcan

                        {{--  delete  --}}
                        <x-adminlte-modal id="delete_{{ $user->id }}" title="حذف" theme="purple"
                                        icon="fas fa-bolt" size='lg' disable-animations>
                            <form action="{{ route('users.destroy', $user) }}" method="post"
                                class="d-inline">
                                @method('delete')
                                @csrf
                                <h3> هل تريد حذف المستخدم بالفعل ؟  </h3>
                                <button class="btn btn-danger btn-lg btn-block"> نعم</button>
                            </form>
                            @include('adminDashboard.layouts.footerSlot')
                        </x-adminlte-modal>
                        @can('حذف مستخدم')
                            <x-adminlte-button label="حذف" data-toggle="modal"
                                data-target="#delete_{{ $user->id }}" class="bg-danger"/>
                        @endcan

                        {{-- End  delete  --}}
                    @endif
                </td>
            </tr>
        @endforeach
    </table>
</div>
@stop
