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
                    <table class="table table-striped table-bordered data-table" id="data-table">
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
                        </tbody>
                    </table>
                    <a class="btn btn-primary" href="javascript:void(0)" id="createNewProduct">تعریف قالب جدید</a>
                </div>
            </div>
        </div>
    </div>
    @include('formats.modal.modal')
    @include('formats.scripts.script')
@endsection
