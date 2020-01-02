@extends('layouts.master')
@section('content')
    @include('message.msg')
    <div class="row">
        <div class="col-md-12">
            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption">
                        لیست دسترسی ها
                    </div>
                    <div class="tools"></div>
                </div>
                <div class="portlet-body">
                    <table class="table table-striped table-bordered table-hover" id="sample_2">
                        <thead>
                        <tr>
                            <th>نام دسترسی</th>
                            <th>قسمت</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @include('permissions.tables.table')
                        </tbody>
                    </table>
                    <a data-toggle="modal" data-target="#modal-default" class="btn btn-primary">تعریف دسترسی جدید</a>
                </div>
            </div>
        </div>

    </div>
@include('permissions.modals.modal')
@endsection
