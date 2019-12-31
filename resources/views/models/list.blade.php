@extends('layouts.master')
@section('content')
    @include('message.msg')

    <div class="row">

        <div class="col-md-12">

            <div class="portlet box blue">

                <div class="portlet-title">
                    <div class="caption">
                       قالب سازها
                    </div>
                    <div class="tools"></div>
                </div>

                <div class="portlet-body">

                    <table class="table table-striped table-bordered table-hover" id="sample_2">
                        <thead>
                        <tr>
                            <th>کد</th>
                            <th>نام</th>
                            <th>تاریخ ایجاد</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($models as $model)
                            <tr>
                                <td>{{$model->code}}</td>
                                <td>{{$model->name}}</td>
                                <td>{{\Morilog\Jalali\Jalalian::forge($model->created_at)->format('Y/m/d')}}</td>
                                <td>
                                    <a data-toggle="modal" role="button" data-target="#modal-edit-{{$model->id}}">
                                        <img src="{{url('/public/icon/icons8-edit-144.png')}}"
                                             width="25" title="ویرایش">
                                    </a>


                                    <div class="modal fade" id="modal-edit-{{$model->id}}">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <div class="portlet box blue">
                                                        <div class="portlet-title">
                                                            <div class="caption">
                                                                ویرایش مشخصه محصول
                                                            </div>
                                                        </div>
                                                        <div class="portlet-body form">
                                                            <div class="form-body">
                                                                <div class="form-group">
                                                                    <form
                                                                        action="{{route('admin.model.edit')}}"
                                                                        method="post">
                                                                        @csrf
                                                                        <input type="hidden" name="id"
                                                                               value="{{$model->id}}">
                                                                        <div class="col-md-12 form-group">
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <label>کد مشخصه</label>
                                                                                    <input type="text" name="code"
                                                                                           class="form-control"
                                                                                           placeholder="لطفا کد مشخصه را وارد کنید"
                                                                                           required
                                                                                           value="{{$model->code}}">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <label>نام مشخصه</label>
                                                                                    <input type="text" name="name"
                                                                                           class="form-control"
                                                                                           placeholder="لطفا نام مشخصه را وارد کنید"
                                                                                           required
                                                                                           value="{{$model->name}}">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button"
                                                                                    class="btn btn-danger pull-left"
                                                                                    data-dismiss="modal">
                                                                                انصراف
                                                                            </button>
                                                                            <input type="submit" class="btn btn-primary"
                                                                                   value="ثبت">
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <a href="{{route('admin.model.delete',$model->id)}}">
                                        <img src="{{url('/public/icon/icons8-delete-bin-96.png')}}"
                                             width="25" title="حذف قالب ساز">
                                    </a>

                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <a data-toggle="modal" data-target="#modal-default" class="btn btn-primary">تعریف قالب ساز
                        جدید</a>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="portlet box blue">
                        <div class="portlet-title">
                            <div class="caption">
                                تعریف قالب ساز
                            </div>
                        </div>
                        <div class="portlet-body form">
                            <div class="form-body">
                                <div class="form-group">
                                    <form action="{{route('admin.model.store')}}" method="post">
                                        @csrf
                                        <div class="col-md-12 form-group">

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>کد قالب ساز</label>
                                                    <input type="text" name="code" class="form-control"
                                                           placeholder="لطفا کد قالب ساز را وارد کنید"
                                                           required>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>نام قالب ساز</label>
                                                    <input type="text" name="name" class="form-control"
                                                           placeholder="لطفا نام قالب ساز را وارد کنید"
                                                           required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">
                                                انصراف
                                            </button>
                                            <input type="submit" class="btn btn-primary" value="ثبت">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>




@endsection
