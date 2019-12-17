@extends('layouts.master')
@php
    $users = DB::table('role_user')->where('user_id',auth()->user()->id)->get();
    foreach ($users as $user)
    $roles = \App\Role::where('id',$user->role_id)->get();
    foreach ($roles as $role)
@endphp
@section('content')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    @include('message.msg')
    <div class="row">
        <div class="col-md-3">
            <!-- Profile Image -->
            <div class="box box-primary">
                <div class="box-body box-profile">
                    @if(!empty(auth()->user()->avatar))
                        <img class="profile-user-img img-responsive img-circle"
                             src="{{url(auth()->user()->avatar)}}" alt="User profile picture">

                    @else

                        <img class="profile-user-img img-responsive img-circle"
                             src="{{url('/public/icon/male-user.png')}}" alt="User profile picture">

                    @endif

                    <h3 class="profile-username text-center">{{auth()->user()->name}}</h3>

                    <p class="text-muted text-center">{{$role->name}}</p>

                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            <b>شماره پرسنلی</b> <a class="pull-left">{{auth()->user()->personnel_id}}</a>
                        </li>
                    </ul>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
        <!-- /.col -->
        <div class="col-md-9">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#activity" data-toggle="tab">مشخصات کاربری</a></li>
                    <li><a href="#avatar" data-toggle="tab">تصویر کاربری</a></li>
                    <li><a href="#settings" data-toggle="tab">عملیات رمز</a></li>
                </ul>
                <div class="tab-content">
                    <div class="active tab-pane" id="activity">
                        <form class="form-horizontal" method="post" action="{{route('admin.user.update')}}">
                            @csrf
                            <input type="hidden" name="id" value="{{auth()->user()->id}}">
                            <div class="form-group">
                                <label for="inputName" class="col-sm-2 control-label">نام و نام خانوادگی</label>

                                <div class="col-sm-10">
                                    <input type="text" name="name" class="form-control" id="name"
                                           value="{{auth()->user()->name}}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail" class="col-sm-2 control-label">شماره تماس</label>

                                <div class="col-sm-10">
                                    <input type="text" name="phone" class="form-control" id="phone"
                                           value="{{auth()->user()->phone}}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputName" class="col-sm-2 control-label">کد ملی</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="email" id="email"
                                           value="{{auth()->user()->email}}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-primary">ثبت</button>
                                </div>
                            </div>
                        </form>

                    </div>
                    <!-- /.tab-pane -->
                    <!-- /.tab-pane -->

                    <div class="tab-pane" id="avatar">
                        <form class="form-horizontal" method="post" action="{{route('admin.user.avatar')}}">
                            @csrf
                            <input type="hidden" name="id" value="{{auth()->user()->id}}">
                            <div class="form-group">
                                <label for="inputName" class="col-sm-2 control-label">تصویر کاربر</label>

                                <div class="col-sm-10">
                                    <input type="file" class="form-control" name="avatar" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-primary">ثبت</button>
                                </div>
                            </div>
                        </form>
                    </div>


                    <div class="tab-pane" id="settings">
                        <form class="form-horizontal" method="post" action="{{route('admin.user.reset.pass')}}">
                            @csrf
                            <input type="hidden" name="id" value="{{auth()->user()->id}}">
                            <div class="form-group">
                                <label for="inputName" class="col-sm-2 control-label">کلمه عبور قبلی</label>

                                <div class="col-sm-10">
                                    <input type="password" class="form-control" name="old_pass"
                                           placeholder="کلمه عبور قبلی" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputName" class="col-sm-2 control-label">کلمه عبور جدید</label>

                                <div class="col-sm-10">
                                    <input type="password" class="form-control" name="new_pass" id="new_pass"
                                           placeholder="کلمه عبور جدید" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-primary">ثبت</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
            </div>
            <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
    </div>
@endsection
