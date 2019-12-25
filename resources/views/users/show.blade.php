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
                            @foreach ($detail_users as $detail_user)
                                @foreach ($permissions as $permission)
                                    @if($detail_user == $permission->id)
                                        @if ($permission->name == "نام و نام خانوادگی")
                                            <th> نام و نام خانوادگی</th>
                                        @endif
                                        @if ($permission->name == "دسترسی")
                                            <th>نقش</th>
                                        @endif
                                        @if ($permission->name == "نام کاربری")
                                            <th>نام کاربری</th>
                                        @endif
                                        @if ($permission->name  == "شماره تماس")
                                            <th> شماره تماس</th>
                                        @endif
                                        @if ($permission->name == "انلاین")
                                            <th>انلاین</th>
                                        @endif
                                        @if ($permission->name == "تاریخ ایجاد")
                                            <th>تاریخ ایجاد</th>
                                        @endif
                                        @if ($permission->name == "وضعیت")
                                            <th> وضعیت</th>
                                        @endif
                                        @if ($permission->name == "عملیات")
                                            <th>عملیات</th>
                                        @endif
                                    @endif
                                @endforeach
                            @endforeach
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                @foreach ($detail_users as $detail_user)
                                    @foreach ($permissions as $permission)
                                        @if($detail_user == $permission->id)
                                            @if ($permission->name == "نام و نام خانوادگی")
                                                <td>{{$user->name}}</td>
                                            @endif
                                            @if ($permission->name == "دسترسی")
                                                <td>
                                                    @foreach($user->roles as $role)
                                                        @if(!empty($role))
                                                            {{$role->name}}
                                                        @else
                                                            بدون دسترسی
                                                        @endif
                                                    @endforeach
                                                </td>
                                            @endif
                                            @if ($permission->name == "نام کاربری")
                                                <td>{{$user->email}}</td>
                                            @endif
                                            @if ($permission->name == "شماره تماس")
                                                <td>{{$user->phone}}</td>
                                            @endif
                                            @if ($permission->name == "انلاین")
                                                @if(Cache::has('active' . $user->id))
                                                    <img href="{{url('/public/icon/online.png')}}" width="25">
                                                @else
                                                    <img href="{{url('/public/icon/offline.png')}}" width="25">
                                                @endif
                                            @endif
                                            @if ($permission->name == "تاریخ ایجاد")
                                                <td>{{\Morilog\Jalali\Jalalian::forge($user->created_at)->format('Y/m/d')}}</td>
                                            @endif
                                            @if ($permission->name == "وضعیت")
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
                                            @endif
                                            @if ($permission->name == "عملیات")
                                                <td>
                                                    <a href="{{route('admin.user.edit',$user->id)}}">
                                                        <img src="{{url('/public/icon/icons8-edit-144.png')}}"
                                                             width="25" title="ویرایش">
                                                    </a>
                                                    <a href="{{route('admin.user.disable',$user->id)}}">
                                                        <img src="{{url('/public/icon/icons8-key-144.png')}}"
                                                             width="25" title="فعال و غیر فعال کردن کاربر">
                                                    </a>
                                                    <a href="{{route('admin.detail.wizard',$user->id)}}">
                                                        <img src="{{url('/public/icon/icons8-view-details-96.png')}}"
                                                             width="25" title="فعال و غیر فعال کردن کاربر">
                                                    </a>
                                                </td>
                                            @endif
                                        @endif
                                    @endforeach
                                @endforeach
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
