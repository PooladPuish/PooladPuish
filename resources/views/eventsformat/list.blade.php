@extends('layouts.master')
@section('content')
    @include('message.msg')
    <div class="row">
        <div class="col-md-12">
            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption">
                        اتفاقات قالب
                    </div>
                    <div class="tools"></div>
                </div>
                <div class="portlet-body">
                    <table class="table table-striped table-bordered data-table" id="data-table">
                        <thead style="background-color: #e8ecff">
                        <tr>
                            <th>ردیف</th>
                            <th>قالب</th>
                            <th>تاریخ</th>
                            <th>زمان</th>
                            <th>شیفت</th>
                            <th>علت</th>
                            <th>تاریخ ثبت</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                    <a class="btn btn-primary" href="javascript:void(0)" id="createNewProduct">ثبت اتفاق جدید</a>
                </div>
            </div>
        </div>
    </div>
    @include('eventsformat.modals.modal')
    @include('eventsformat.scripts.script')
@endsection
