@extends('layouts.master')
@section('content')
    @include('message.msg')

    <div class="row">

        <div class="col-md-12">

            <div class="portlet box blue">

                <div class="portlet-title">
                    <div class="caption">
                        مشخصه محصول
                    </div>
                    <div class="tools"></div>
                </div>

                <div class="portlet-body">

                    <table class="table table-striped table-bordered table-hover" id="sample_2">
                        <thead>
                        <tr>
                            <th>کد</th>
                            <th>گروه کالایی</th>
                            <th>نام</th>
                            <th>تاریخ ایجاد</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                      @include('ProductCharacteristic.tabels.tabel')
                        </tbody>
                    </table>
                    <a data-toggle="modal" data-target="#modal-default" class="btn btn-primary">تعریف مشخصه محصول
                        جدید</a>
                </div>
            </div>
        </div>
    </div>
    @include('ProductCharacteristic.modals.modal')



@endsection
