@extends('layouts.master')
@section('content')
    @include('message.msg')
    <div class="row">
        <div class="col-md-12">
            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption">
                        مواد پلیمیری
                    </div>
                    <div class="tools"></div>
                </div>
                <div class="portlet-body">
                    <table class="table table-striped table-bordered table-hover" id="sample_2">
                        <thead>
                        <tr>
                            <th>ردیف</th>
                            <th>کد</th>
                            <th>نوع مواد</th>
                            <th>نام گرید مواد</th>
                            <th>نام سازنده</th>
                            <th>کد محصول</th>
                            <th>توضیحات</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @include('polymeric.tabels.tabel')
                        </tbody>
                    </table>
                    <a data-toggle="modal" data-target="#modal-default" class="btn btn-primary">تعریف قالب ساز جدید</a>
                </div>
            </div>
        </div>
    </div>
    @include('polymeric.modals.modal')
@endsection
