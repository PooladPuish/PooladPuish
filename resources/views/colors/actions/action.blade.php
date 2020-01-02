<a data-toggle="modal" role="button" data-target="#modal-edit-{{$color->id}}">
    <img src="{{url('/public/icon/icons8-edit-144.png')}}"
         width="25" title="ویرایش">
</a>
<div class="modal fade" id="modal-edit-{{$color->id}}" tabIndex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="portlet box blue">
                    <div class="portlet-title">
                        <div class="caption">
                            ویرایش رنگ
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <div class="form-body">
                            <div class="form-group">
                                <form action="{{route('admin.color.edit')}}"
                                      method="post">
                                    @csrf
                                    <input type="hidden" name="id"
                                           value="{{$color->id}}">
                                    <div class="col-md-12 form-group">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>کد رنگ</label>
                                                <input type="text" name="code" class="form-control"
                                                       placeholder="لطفا کد رنگ را وارد کنید"
                                                       required
                                                value="{{$color->code}}">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>نام رنگ</label>
                                                <input type="text" name="name" class="form-control"
                                                       placeholder="لطفا نام رنگ را وارد کنید"
                                                       required
                                                       value="{{$color->name}}">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>نام سازنده رنگ</label>
                                                <input type="text" name="manufacturer" class="form-control"
                                                       placeholder="لطفا نام سازنده رنگ را وارد کنید"
                                                       required
                                                       value="{{$color->manufacturer}}">
                                            </div>
                                        </div>


                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>درصد ترکیب مواد</label>
                                                <input type="text" name="combination" class="form-control"
                                                       placeholder="لطفا درصد ترکیب مواد را وارد کنید"
                                                       required
                                                       value="{{$color->combination}}">
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>کد مستربچ</label>
                                                <input type="text" name="masterbatch" class="form-control"
                                                       placeholder="لطفا کد مستربچ را وارد کنید"
                                                       required
                                                       value="{{$color->masterbatch}}">
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
<a data-toggle="modal" role="button" data-target="#modal-delete-{{$color->id}}">
    <img src="{{url('/public/icon/icons8-delete-bin-96.png')}}"
         width="25" title="ویرایش">
</a>
<div class="modal fade" id="modal-delete-{{$color->id}}" tabIndex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <p><span style="color: red">توجه!</span> اطلاعات حذف شده قابل
                    بازیابی نخواهند بود</p>
                ایا از حذف مشخصات این رنگ مطمئن هستید؟
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left"
                        data-dismiss="modal">
                    انصراف
                </button>
                <a href="{{route('admin.color.delete',$color->id)}}"
                   class="btn btn-primary">حذف</a>
            </div>
        </div>
    </div>
</div>
