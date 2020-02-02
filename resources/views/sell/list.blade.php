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
                            <th>شماره پیش <br/> فاکتور</th>
                            <th>تاریخ صدور<br/> پیش فاکتور</th>
                            <th>نام <br/>فروشنده</th>
                            <th>نام <br/>خریدار</th>
                            <th>تعداد<br/> محصول</th>
                            <th>مبلغ <br/>محصولات</th>
                            <th>نحوه <br/>پرداخت</th>
                            <th>نوع <br/>فاکتور</th>
                            <th>جمع کل <br/>پیش فاکتور</th>
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
    @include('sell.scripts.script')
@endsection
