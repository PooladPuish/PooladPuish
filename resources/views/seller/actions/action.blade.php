<a data-toggle="modal" role="button" data-target="#modal-edit-{{$seller->id}}">
    <img src="{{url('/public/icon/icons8-edit-144.png')}}"
         width="25" title="ویرایش">
</a>
<div class="modal fade" id="modal-edit-{{$seller->id}}">
    <div class="modal-dialog col-md-12">
        <div class="modal-content">
            <div class="modal-body col-md-12">
                <div class="portlet box blue">
                    <div class="portlet-title">
                        <div class="caption">
                            تعریف فروشنده
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <div class="form-body">
                            <div class="form-group">
                                <form action="{{route('admin.seller.edit')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$seller->id}}">
                                    <div class="col-md-12 form-group">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>کد</label>
                                                <input type="text" name="code" class="form-control"
                                                       placeholder="لطفا کد فروشنده را وارد کنید"
                                                       required
                                                       value="{{$seller->code}}">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>نام شرکت</label>
                                                <input type="text" name="company" class="form-control"
                                                       placeholder="لطفا نام شرکت را وارد کنید"
                                                       required
                                                       value="{{$seller->company}}">
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>رنگ مستربچ</label>
                                                <select dir="rtl" id="select2-prod" class="form-control"
                                                        name="color_id"
                                                        required>
                                                    @foreach($colors as $color)
                                                        @if(!empty($color))
                                                            <option
                                                                value="{{$color->id}}"
                                                                @if($seller->color_id == $color->id)
                                                                selected
                                                                @endif
                                                            >{{$color->name}}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>نام شخص رابط</label>
                                                <input type="text" name="connector" class="form-control"
                                                       placeholder="لطفا نام شخص رابط را وارد کنید"
                                                       required
                                                       value="{{$seller->connector}}">
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>سمت</label>
                                                <input type="text" name="side" class="form-control"
                                                       placeholder="لطفا سمت را وارد کنید"
                                                       required
                                                       value="{{$seller->side}}">
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>شماره تلفن</label>
                                                <input type="text" name="tel" class="form-control"
                                                       placeholder="لطفا شماره تلفن را وارد کنید"
                                                       required
                                                       value="{{$seller->tel}}">
                                            </div>
                                        </div>


                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>شماره داخلی</label>
                                                <input type="text" name="inside" class="form-control"
                                                       placeholder="لطفا شماره داخلی را وارد کنید"
                                                       required
                                                       value="{{$seller->inside}}">
                                            </div>
                                        </div>


                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>شماره همراه</label>
                                                <input type="text" name="phone" class="form-control"
                                                       placeholder="لطفا شماره همراه را وارد کنید"
                                                       required
                                                       value="{{$seller->phone}}">
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
<a data-toggle="modal" role="button" data-target="#modal-delete-{{$seller->id}}">
    <img src="{{url('/public/icon/icons8-delete-bin-96.png')}}"
         width="25" title="ویرایش">
</a>
<div class="modal fade" id="modal-delete-{{$seller->id}}" tabIndex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <p><span style="color: red">توجه!</span> اطلاعات حذف شده قابل
                    بازیابی نخواهند بود</p>
                ایا از حذف مشخصات این فروشنده مطمئن هستید؟
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left"
                        data-dismiss="modal">
                    انصراف
                </button>
                <a href="{{route('admin.seller.delete',$seller->id)}}"
                   class="btn btn-primary">حذف</a>
            </div>
        </div>
    </div>
</div>
