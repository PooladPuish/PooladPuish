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
                            <th>نقش</th>
                            <th>نام کاربری</th>
                            <th> شماره تماس</th>
                            <th>انلاین</th>
                            <th>تاریخ ایجاد</th>
                            <th> وضعیت</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{$user->name}}</td>
                                <td>
                                    @foreach($user->roles as $role)
                                        @if(!empty($role))
                                            {{$role->name}}
                                        @else
                                            بدون دسترسی
                                        @endif
                                    @endforeach
                                </td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->phone}}</td>
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
                                <td>{{\Morilog\Jalali\Jalalian::forge($user->created_at)->format('Y/m/d')}}</td>
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
                                <td>
                                    <a href="{{route('admin.user.edit',$user->id)}}">
                                        <img src="{{url('/public/icon/icons8-edit-144.png')}}"
                                             width="25" title="ویرایش">
                                    </a>
                                    <a href="{{route('admin.user.disable',$user->id)}}">
                                        <img src="{{url('/public/icon/icons8-key-144.png')}}"
                                             width="25" title="فعال و غیر فعال کردن کاربر">
                                        <a href="{{route('admin.detail.wizard',$user->id)}}">
                                            <img src="{{url('/public/icon/icons8-view-details-96.png')}}"
                                                 width="25" title="جزییات">
                                        </a>

                                    </a>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
