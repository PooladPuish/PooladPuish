@extends('layouts.master')
@section('content')
    @include('message.msg')
    <div class="row">
        <div class="col-md-12">
            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption">
                        لیست موجودی انبار کالاهای ساخته شده
                    </div>
                    <div class="tools"></div>
                </div>
                <div class="portlet-body">
                    <table class="table table-striped table-bordered data-table" id="data-table">
                        <thead style="background-color: #e8ecff">
                        <tr>
                            <th>ردیف</th>
                            <th>محصول</th>
                            <th>رنگ</th>
                            <th>موجودی فزیکی</th>
                            <th>تعداد فروخته شده</th>
                            <th>تعداد تایید نشده</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @include('barnproduct.modals.modal')
    @include('barnproduct.scripts.script')
@endsection
