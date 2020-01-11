@extends('layouts.master')
@section('content')
    @include('message.msg')
    <div class="row">
        <div class="col-md-12">
            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption">
                        انتصاب محصول به قالب
                    </div>
                    <div class="tools"></div>
                </div>
                <div class="portlet-body">
                    <table class="table table-striped table-bordered data-table" id="data-table">
                        <thead>
                        <tr>
                            <th>ردیف</th>
                            <th>قالب</th>
                            <th>insert</th>
                            <th>محصول</th>
                            <th>وزن</th>
                            <th>سایکل تایم</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                    <a class="btn btn-primary" href="javascript:void(0)" id="createNewProduct">انتصاب محصول به قالب</a>
                </div>
            </div>
        </div>
    </div>
    @include('model_product.modals.modal')
    @include('model_product.scripts.script')
@endsection