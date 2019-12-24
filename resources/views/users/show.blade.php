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
                            @if($check_detail->name != "نام و نام خانوادگی")
                                <th> نام و نام خانوادگی</th>
                            @endif
                            @if($check_detail->name != "دسترسی")
                                <th>دسترسی</th>
                            @endif
                            @if($check_detail->name != "نام کاربری")
                                <th>نام کاربری</th>
                            @endif
                            @if($check_detail->name != "شماره تماس")
                                <th> شماره تماس</th>
                            @endif
                            @if($check_detail->name != "انلاین")
                                <th>انلاین</th>
                            @endif
                            @if($check_detail->name != "تاریخ ایجاد")
                                <th>تاریخ ایجاد</th>
                            @endif
                            @if($check_detail->name != "وضعیت")
                                <th> وضعیت</th>
                            @endif
                            @if($check_detail->name != "عملیات")
                                @if(Gate::check('ویرایش کاربران') || Gate::check('فعال و غیر فعال کردن کاربران'))
                                    <th>عملیات</th>
                                @endif
                            @endif
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                @if($check_detail->name != "نام و نام خانوادگی")
                                    <td>{{$user->name}}</td>
                                @endif
                                @if($check_detail->name != "دسترسی")
                                    <td>
                                        @foreach($user->roles as $role)
                                            @if(!empty($role))
                                                <span class="btn btn-danger">{{$role->name}}</span>
                                            @else
                                                <span class="btn btn-info">بدون دسترسی</span>
                                            @endif
                                        @endforeach
                                    </td>
                                @endif
                                @if($check_detail->name != "نام کاربری")
                                    <td>{{$user->email}}</td>
                                @endif
                                @if($check_detail->name != "شماره تماس")
                                    <td>{{$user->phone}}</td>
                                @endif
                                @if($check_detail->name != "انلاین")
                                    <td>{{$user->personnel_id}}</td>
                                @endif
                                @if($check_detail->name != "تاریخ ایجاد")
                                    <td>{{\Morilog\Jalali\Jalalian::forge($user->created_at)->format('Y/m/d')}}</td>
                                @endif
                                @if($check_detail->name != "وضعیت")
                                    <td>
                                        @if($user->status == null)
                                            <img src="{{url('/public/icon/icons8-checked-user-male.png')}}"
                                                 width="25" title="فعال">
                                        @else
                                            <img src="{{url('/public/icon/icons8-checked-user-male-40.png')}}"
                                                 width="25"
                                                 title="غیر فعال">
                                        @endif
                                    </td>
                                @endif
                                @if($check_detail->name != "عملیات")
                                    <td>
                                        @can('ویرایش کاربران')
                                            <a href="{{route('admin.user.edit',$user->id)}}">
                                                <img src="{{url('/public/icon/icons8-update-64.png')}}"
                                                     width="25" title="ویرایش">
                                            </a>
                                        @endcan
                                        @can('فعال و غیر فعال کردن کاربران')
                                            <a href="{{route('admin.user.disable',$user->id)}}">
                                                <img src="{{url('/public/icon/icons8-user-rights-50.png')}}"
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
