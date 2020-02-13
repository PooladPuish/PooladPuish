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
                        <thead>
                        <tr>
                            <th>شماره<br/> فاکتور</th>
                            <th>تاریخ <br/>صدور</th>
                            <th>نام<br/> فروشنده</th>
                            <th>نام <br/>خریدار</th>
                            <th>تعداد</th>
                            <th>مبلغ<br/> محصولات</th>
                            <th>نحوه<br/> پرداخت</th>
                            <th>نوع <br/>فاکتور</th>
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
