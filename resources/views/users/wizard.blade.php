@extends('layouts.master')
@section('content')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    @include('message.msg')
    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title">افزودن کاربر</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <form method="post" action="{{route('admin.user.store')}}">
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

                            <select id="multiple" class="js-states form-control" name="roles[]" multiple required>

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
                <div class="form-group">
                    <input type="submit" value="ثبت" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
@endsection
