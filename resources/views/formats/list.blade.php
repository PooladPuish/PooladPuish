@extends('layouts.master')
@section('content')
    @include('message.msg')
    <div class="row">
        <div class="col-md-12">
            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption">
                        قالب ها
                    </div>
                    <div class="tools"></div>
                </div>
                <div class="portlet-body">
                    <table class="table table-striped table-bordered table-hover" id="sample_2">
                        <thead>
                        <tr>
                            <th>ردیف</th>
                            <th>کد</th>
                            <th>نام قالب ساز</th>
                            <th>گروه کالایی</th>
                            <th>مشخصه محصول</th>
                            <th>نام محصول</th>
                            <th>وزن محصول</th>
                            <th>تعداد کویته</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @include('formats.tabels.tabel')
                        </tbody>
                    </table>
                    <a data-toggle="modal" data-target="#modal-default" class="btn btn-primary">تعریف قالب جدید</a>
                </div>
            </div>
        </div>
    </div>
    @include('formats.modal.modal')
@endsection
