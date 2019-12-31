@extends('layouts.master')
@section('content')
    @include('message.msg')
    <div class="row">
        <div class="col-md-12">
            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption">
                        لیست کاربران
                    </div>
                    <div class="tools"></div>
                </div>
                <div class="portlet-body">
                    <table class="table table-striped table-bordered table-hover" id="sample_2">
                        <thead>
                        <tr>
                            @can('نام و نام خانوادگی')
                                <th> نام و نام خانوادگی</th>
                            @endcan
                            @can('نقش')
                                <th>نقش</th>
                            @endcan
                            @can('نام کاربری')
                                <th>نام کاربری</th>
                            @endcan
                            @can('شماره تماس')
                                <th> شماره تماس</th>
                            @endcan
                            @can('انلاین')
                                <th>انلاین</th>
                            @endcan
                            @can('تاریخ ایجاد')
                                <th>تاریخ ایجاد</th>
                            @endcan
                            @can('وضعیت')
                                <th> وضعیت</th>
                            @endcan
                            @if(Gate::check('ویرایش') || Gate::check('فعال و غیر فعال کردن'))
                                <th>عملیات</th>
                            @endif
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                @can('نام و نام خانوادگی')
                                    <td>{{$user->name}}</td>
                                @endcan
                                @can('نقش')
                                    <td>
                                        @foreach($user->roles as $role)
                                            @if(!empty($role))
                                                {{$role->name}}
                                            @else
                                                بدون دسترسی
                                            @endif
                                        @endforeach
                                    </td>
                                @endcan
                                @can('نام کاربری')
                                    <td>{{$user->email}}</td>
                                @endcan
                                @can('شماره تماس')
                                    <td>{{$user->phone}}</td>
                                @endcan
                                @can('انلاین')
                                    <td>
                                        @if(Cache::has('active' . $user->id))
                                            <img src="{{url('/public/icon/online.png')}}"
                                                 title="انلاین"
                                                 width="25">
                                        @else
                                            <img src="{{url('/public/icon/offline.png')}}"
                                                 title="افلاین"
                                                 width="25">
                                        @endif
                                    </td>
                                @endcan
                                @can('تاریخ ایجاد')
                                    <td>{{\Morilog\Jalali\Jalalian::forge($user->created_at)->format('Y/m/d')}}</td>
                                @endcan
                                @can('وضعیت')
                                    <td>
                                        @if($user->status == null)
                                            <img src="{{url('/public/icon/icons8-checked-user-male.png')}}"
                                                 width="25" title="فعال">
                                        @else
                                            <img
                                                src="{{url('/public/icon/icons8-checked-user-male-40.png')}}"
                                                width="25"
                                                title="غیر فعال">
                                        @endif
                                    </td>
                                @endcan
                                @if(Gate::check('ویرایش') || Gate::check('فعال و غیر فعال کردن'))
                                    <td>
                                        @can('ویرایش')
                                            <a href="{{route('admin.user.edit',$user->id)}}">
                                                <img src="{{url('/public/icon/icons8-edit-144.png')}}"
                                                     width="25" title="ویرایش">
                                            </a>
                                        @endcan
                                        @can('حذف')
                                            <a href="{{route('admin.user.disable',$user->id)}}">
                                                <img src="{{url('/public/icon/icons8-key-144.png')}}"
                                                     width="25" title="فعال و غیر فعال کردن کاربر">
                                            </a>
                                        @endcan
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
