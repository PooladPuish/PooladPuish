@extends('layouts.master')
@section('content')
    @include('message.msg')
    <div class="row">
        <div class="col-md-12">
            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption">
                        لیست پیش فاکتور های لغو شده
                    </div>
                    <div class="tools"></div>
                </div>
                <div class="portlet-body">
                    <table class="table table-striped table-bordered data-table" id="data-table">
                        <thead>
                        <tr>
                            <th>شماره فاکتور</th>
                            <th>تاریخ صدور</th>
                            <th>نام فروشنده</th>
                            <th>نام خریدار</th>
                            <th>تعداد</th>
                            <th>مبلغ محصولات</th>
                            <th>نحوه پرداخت</th>
                            <th>نوع فاکتور</th>
                            <th>جمع کل پیش فاکتور</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @include('sell.modals.trash')
    @include('sell.scripts.trash')
@endsection
