@extends('layouts.master')
@section('content')
    @include('message.msg')

    <div class="row">

        <div class="col-md-12">

            <div class="portlet box blue">

                <div class="portlet-title">
                    <div class="caption">
                        گروه کالایی
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
                        @foreach($commoditys as $commodity)
                            <tr>
                                <td>{{$commodity->code}}</td>
                                <td>{{$commodity->name}}</td>
                                <td>{{\Morilog\Jalali\Jalalian::forge($commodity->created_at)->format('Y/m/d')}}</td>
                                <td>
                                    <a data-toggle="modal" role="button" data-target="#modal-edit-{{$commodity->id}}">
                                        <img src="{{url('/public/icon/icons8-edit-144.png')}}"
                                             width="25" title="ویرایش">
                                    </a>
                                    <div class="modal fade" id="modal-edit-{{$commodity->id}}" tabIndex="-1">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <div class="portlet box blue">
                                                        <div class="portlet-title">
                                                            <div class="caption">
                                                                ویرایش گروه کالایی
                                                            </div>
                                                        </div>
                                                        <div class="portlet-body form">
                                                            <div class="form-body">
                                                                <div class="form-group">
                                                                    <form action="{{route('admin.commodity.edit')}}"
                                                                          method="post">
                                                                        @csrf
                                                                        <input type="hidden" name="id"
                                                                               value="{{$commodity->id}}">
                                                                        <div class="col-md-12 form-group">
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                            <label>کد کالا</label>
                                                                            <input type="text" name="code"
                                                                                   class="form-control"
                                                                                   placeholder="لطفا کد کالا را وارد کنید"
                                                                                   value="{{$commodity->code}}"
                                                                                   required>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                            <label>نام کالا</label>
                                                                            <input type="text" name="name"
                                                                                   class="form-control"
                                                                                   placeholder="لطفا نام کالا را وارد کنید"
                                                                                   value="{{$commodity->name}}"
                                                                                   required>
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
                                    <a href="{{route('admin.commodity.delete',$commodity->id)}}">
                                        <img src="{{url('/public/icon/icons8-delete-bin-96.png')}}"
                                             width="25" title="حذف کالا">
                                    </a>

                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <a data-toggle="modal" data-target="#modal-default" class="btn btn-primary">تعریف گروه جدید</a>
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
                                تعریف گروه کالایی
                            </div>
                        </div>
                        <div class="portlet-body form">
                            <div class="form-body">
                                <div class="form-group">
                                    <form action="{{route('admin.commodity.store')}}" method="post">
                                        @csrf
                                        <div class="col-md-12 form-group">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>کد کالا</label>
                                                    <input type="text" name="code" class="form-control"
                                                           placeholder="لطفا کد کالا را وارد کنید"
                                                           required>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>نام کالا</label>
                                                    <input type="text" name="name" class="form-control"
                                                           placeholder="لطفا نام کالا را وارد کنید"
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
