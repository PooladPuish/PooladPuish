@extends('layouts.master')
@section('content')
    @include('message.msg')

    <div class="portlet box blue">
        <div class="portlet-title">
            <div class="caption">
                افزودن کاربر
            </div>
        </div>
        <div class="portlet-body form">
            <div class="form-body">
                <div class="form-group">
                    <form method="post" action="{{route('admin.user.store')}}"
                          class="mt-repeater"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>نام و نام خانوادگی</label>
                                    <input type="text" id="name" name="name" class="form-control"
                                           required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>کد ملی</label>
                                    <input type="text" id="email" name="email" class="form-control"
                                           required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>شماره تماس</label>
                                    <input type="text" id="phone" name="phone" class="form-control"
                                           required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>شماره پرسنلی</label>
                                    <input type="text" id="personnel_id" name="personnel_id" class="form-control"
                                           required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>دسترسی</label>
                                    <select id="multiple" class="js-states form-control" name="roles[]" multiple
                                            required>
                                        @foreach($roles as $role)
                                            @if(!empty($role))
                                                <option value="{{$role->id}}">{{$role->name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>تصویر پروفایل</label>
                                    <input type="file" name="avatar" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>کلمه عبور</label>
                                    <input type="text" id="password" name="password" class="form-control"
                                           required>
                                </div>
                            </div>
                        </div>
                        <hr/>
                        <div class="form-group">
                            <input type="submit" value="ثبت کاربر" class="btn btn-primary">
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
