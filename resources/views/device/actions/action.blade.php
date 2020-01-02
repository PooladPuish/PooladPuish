<a data-toggle="modal" role="button" data-target="#modal-edit-{{$device->id}}">
    <img src="{{url('/public/icon/icons8-edit-144.png')}}"
         width="25" title="ویرایش">
</a>
<div class="modal fade" id="modal-edit-{{$device->id}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="portlet box blue">
                    <div class="portlet-title">
                        <div class="caption">
                            ویرایش مشخصات دستگاه
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <div class="form-body">
                            <div class="form-group">
                                <form action="{{route('admin.device.edit')}}"
                                      method="post">
                                    @csrf
                                    <input type="hidden" name="id"
                                           value="{{$device->id}}">
                                    <div class="col-md-12 form-group">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>کد دستگاه</label>
                                                <input type="text" name="code"
                                                       class="form-control"
                                                       placeholder="لطفا کد دستگاه را وارد کنید"
                                                       required
                                                       value="{{$device->code}}">
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>نام دستگاه</label>
                                                <input type="text" name="name"
                                                       class="form-control"
                                                       placeholder="لطفا نام دستگاه را وارد کنید"
                                                       required
                                                       value="{{$device->name}}">
                                            </div>
                                        </div>


                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>مدل دستگاه</label>
                                                <input type="text" name="model"
                                                       class="form-control"
                                                       placeholder="لطفا مدل دستگاه را وارد کنید"
                                                       required
                                                       value="{{$device->model}}">
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
<a data-toggle="modal" role="button" data-target="#modal-delete-{{$device->id}}">
    <img src="{{url('/public/icon/icons8-delete-bin-96.png')}}"
         width="25" title="ویرایش">
</a>
<div class="modal fade" id="modal-delete-{{$device->id}}" tabIndex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <p><span style="color: red">توجه!</span> اطلاعات حذف شده قابل
                    بازیابی نخواهند بود</p>
                ایا از حذف مشخصات این دستگاه مطمئن هستید؟
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left"
                        data-dismiss="modal">
                    انصراف
                </button>
                <a href="{{route('admin.device.delete',$device->id)}}"
                   class="btn btn-primary">حذف</a>
            </div>
        </div>
    </div>
</div>
