@extends('layouts.master')
@section('content')
    @include('message.msg')
    <div class="row">
        <div class="col-md-12">
            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption">
                        فروشنده
                    </div>
                    <div class="tools"></div>
                </div>
                <div class="portlet-body">
                    <table class="table table-striped table-bordered table-hover" id="sample_2">
                        <thead>
                        <tr>
                            <th>ردیف</th>
                            <th>کد</th>
                            <th>نام شرکت</th>
                            <th>رنگ مستربچ</th>
                            <th>نام شخص رابط</th>
                            <th>سمت</th>
                            <th>شماره تلفن</th>
                            <th>داخلی</th>
                            <th>همراه</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @include('seller.tables.tabel')
                        </tbody>
                    </table>
                    <a data-toggle="modal" data-target="#modal-default" class="btn btn-primary">تعریف فروشنده
                        جدید</a>
                </div>
            </div>
        </div>
    </div>
    @include('seller.modals.modal')
@endsection
