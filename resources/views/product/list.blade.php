@extends('layouts.master')
@section('content')
    @include('message.msg')

    <div class="row">
        <div class="col-md-12">
            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption">
                        محصولات
                    </div>
                    <div class="tools"></div>
                </div>
                <div class="portlet-body">
                    <table class="table table-striped table-bordered table-hover" id="sample_2">
                        <thead>
                        <tr>
                            <th>کد</th>
                            <th>گروه کالایی</th>
                            <th>مشخصه محصول</th>
                            <th>نام محصول</th>
                            <th>تاریخ ایجاد</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @include('product.tabels.tabel')
                        </tbody>
                    </table>
                    <a data-toggle="modal" data-target="#modal-default" class="btn btn-primary">تعریف محصول
                        جدید</a>
                </div>
            </div>
        </div>
    </div>
    @include('product.modals.modal')
   @include('product.scripts.script')
@endsection
