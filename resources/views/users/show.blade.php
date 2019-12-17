@extends('layouts.master')
@section('content')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    @include('message.msg')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">لیست کاربران</h3>
                </div>
                <div class="box-body">
                    <table class="table table-bordered table-striped data-table">
                        <thead>
                        <tr>
                            <th>نام و نام خانوادگی</th>
                            <th>دسترسی</th>
                            <th>کد ملی</th>
                            <th>شماره تماس</th>
                            <th>شماره پرسنلی</th>
                            <th>تاریخ ثبت در سیستم</th>
                            <th>وضعیت</th>
                            @if(Gate::check('ویرایش کاربران') || Gate::check('فعال و غیر فعال کردن کاربران'))
                                <th>عملیات</th>
                            @endif
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @include('users.scripts.scripts-datatable')
@endsection
