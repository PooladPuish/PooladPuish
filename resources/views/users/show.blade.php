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
                            <th> نام و نام خانوادگی</th>
                            <th>دسترسی</th>
                            <th> کد ملی</th>
                            <th> شماره تماس</th>
                            <th> کد پرسنلی</th>
                            <th>تاریخ ایجاد</th>
                            <th> وضعیت</th>
                            @if(Gate::check('ویرایش کاربران') || Gate::check('فعال و غیر فعال کردن کاربران'))
                                <th>عملیات</th>
                            @endif
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{$user->name}}</td>
                                <td>
                                    @foreach($user->roles as $role)
                                        @if(!empty($role))
                                            <span class="btn btn-danger">{{$role->name}}</span>
                                        @else
                                            <span class="btn btn-info">بدون دسترسی</span>
                                        @endif
                                    @endforeach
                                </td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->phone}}</td>
                                <td>{{$user->personnel_id}}</td>
                                <td>{{\Morilog\Jalali\Jalalian::forge($user->created_at)->format('Y/m/d')}}</td>
                                <td>
                                    @if($user->status == null)
                                        <img src="{{url('/public/icon/icons8-checked-user-male-40 (1).png')}}"
                                             width="25" title="فعال">
                                    @else
                                        <img src="{{url('/public/icon/icons8-checked-user-male-40.png')}}" width="25"
                                             title="غیر فعال">
                                    @endif
                                </td>
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
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
