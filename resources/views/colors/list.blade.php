@extends('layouts.master')
@section('content')
    @include('message.msg')
    <div class="row">
        <div class="col-md-12">
            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption">
                        رنگ ها
                    </div>
                    <div class="tools"></div>
                </div>
                <div class="portlet-body">
                    <table class="table table-striped table-bordered data-table" id="data-table">
                        <thead style="background-color: #e8ecff">
                        <tr>
                            <th>ردیف</th>
                            <th>کد</th>
                            <th>نام</th>
                            <th>نام سازنده</th>
                            <th>درصد ترکیب</th>
                            <th>کد مستربچ</th>
                            <th>قیمت(ریال)</th>
                            <th>زمان تغیر رنگ(ساعت)</th>
                            <th>حداقل</th>
                            <th>حداکثر</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                    <a class="btn btn-primary" href="javascript:void(0)" id="createNewProduct">تعریف رنگ جدید</a>
                </div>
            </div>
        </div>
    </div>
    @include('colors.modals.modal')
    @include('colors.scripts.script')
@endsection
