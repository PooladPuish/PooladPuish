@extends('layouts.master')
@section('content')
    @include('message.msg')
    <div class="row">
        <div class="col-md-12">
            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption">
                        لیست جابجایی ها
                    </div>
                    <div class="tools"></div>
                </div>
                <div class="portlet-body">
                    <table class="table table-striped table-bordered table-hover" id="sample_2">
                        <thead>
                        <tr>
                            <th>ردیف</th>
                            <th>نام درخواست دهنده</th>
                            <th>نام جانشین</th>
                            <th>از تاریخ</th>
                            <th>تا تاریخ</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @include('alternatives.tables.table')
                        </tbody>
                    </table>
                    <a data-toggle="modal" data-target="#modal-default" class="btn btn-primary">تعریف جابجایی جدید</a>
                </div>
            </div>
        </div>
    </div>
    @include('alternatives.modals.modal')
@endsection
