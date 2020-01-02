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
                    <table class="table table-striped table-bordered table-hover" id="sample_2">
                        <thead>
                        <tr>
                            <th>ردیف</th>
                            <th>کد</th>
                            <th>نام</th>
                            <th>نام سازنده</th>
                            <th>درصد ترکیب</th>
                            <th>کد مستربچ</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @include('colors.tabels.tabel')
                        </tbody>
                    </table>
                    <a data-toggle="modal" data-target="#modal-default" class="btn btn-primary">تعریف رنگ جدید</a>
                </div>
            </div>
        </div>
    </div>
    @include('colors.modals.modal')
@endsection
