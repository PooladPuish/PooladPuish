@extends('layouts.master')
@section('content')
    @include('message.msg')
    <div class="row">
        <div class="col-md-12">
            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption">
                        دستگاه IM1
                    </div>
                    <div class="tools"></div>
                </div>
                <div class="portlet-body">
                    <table class="table table-striped table-bordered device1" id="device1">
                        <thead style="background-color: #e8ecff">
                        <tr>
                            <th>اولویت</th>
                            <th>محصول</th>
                            <th>رنگ</th>
                            <th>تعداد</th>
                            <th>قالب</th>
                            <th>Insert</th>
                            <th>وزن</th>
                            <th>تعداد تولید شده</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption">
                        دستگاه IM2
                    </div>
                    <div class="tools"></div>
                </div>
                <div class="portlet-body">
                    <table class="table table-striped table-bordered device2" id="device2">
                        <thead style="background-color: #e8ecff">
                        <tr>
                            <th>اولویت</th>
                            <th>محصول</th>
                            <th>رنگ</th>
                            <th>تعداد</th>
                            <th>قالب</th>
                            <th>Insert</th>
                            <th>وزن</th>
                            <th>تعداد تولید شده</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption">
                        دستگاه IM3
                    </div>
                    <div class="tools"></div>
                </div>
                <div class="portlet-body">
                    <table class="table table-striped table-bordered device3" id="device3">
                        <thead style="background-color: #e8ecff">
                        <tr>
                            <th>اولویت</th>
                            <th>محصول</th>
                            <th>رنگ</th>
                            <th>تعداد</th>
                            <th>قالب</th>
                            <th>Insert</th>
                            <th>وزن</th>
                            <th>تعداد تولید شده</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>


        </div>
    </div>
    @include('manufacturing.scripts.script')
@endsection
