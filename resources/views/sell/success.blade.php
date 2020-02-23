@extends('layouts.master')
@section('content')
    @include('message.msg')


    <div class="row">
        <div class="col-md-12">
            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption">
                        لیست فاکتورهای تایید شده
                    </div>
                </div>
                <div class="portlet-body">
                    <form autocomplete="off" id="productForm"
                          name="productForm" class="form-horizontal">
                        @csrf
                    </form>
                    <table class="table table-striped table-bordered data-table" id="data-table">
                        <thead style="background-color: #e8ecff">
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
                            <th>جمع کل</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
    @include('sell.scripts.success')
@endsection
