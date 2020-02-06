@extends('layouts.master')
@section('content')
    @include('message.msg')
    <div class="row">
        <div class="col-md-12">
            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption">
                        لیست پیش فاکتور ها
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
                            <th>وضعیت</th>
                            <th>جمع کل پیش فاکتور</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                    <a class="btn btn-primary" href="{{route('admin.invoice.wizard')}}" id="createNewProduct">تعریف پیش
                        فاکتور جدید</a>
                </div>
            </div>
        </div>
    </div>
    @include('sell.modals.modal')
    @include('sell.scripts.script')
@endsection
