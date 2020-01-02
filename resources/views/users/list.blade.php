@extends('layouts.master')
@section('content')
    @include('message.msg')
    <div class="row">
        <div class="col-md-12">
            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption">
                        لیست کاربران
                    </div>
                    <div class="tools"></div>
                </div>
                <div class="portlet-body">
                    <table class="table table-striped table-bordered table-hover" id="sample_2">
                        <thead>
                        <tr>
                            @can('نام و نام خانوادگی')
                                <th> نام و نام خانوادگی</th>
                            @endcan
                            @can('نقش')
                                <th>نقش</th>
                            @endcan
                            @can('نام کاربری')
                                <th>نام کاربری</th>
                            @endcan
                            @can('شماره تماس')
                                <th> شماره تماس</th>
                            @endcan
                            @can('انلاین')
                                <th>انلاین</th>
                            @endcan
                            @can('وضعیت')
                                <th> وضعیت</th>
                            @endcan
                            @if(Gate::check('ویرایش') || Gate::check('فعال و غیر فعال کردن'))
                                <th>عملیات</th>
                            @endif
                        </tr>
                        </thead>
                        <tbody>
                        @include('users.tables.table')
                        </tbody>
                    </table>
                    <a data-toggle="modal" data-target="#modal-default" class="btn btn-primary">تعریف کاربر جدید</a>
                </div>
            </div>
        </div>
    </div>
    @include('users.modals.modal')
@endsection
