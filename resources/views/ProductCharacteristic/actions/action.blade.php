<a data-toggle="modal" role="button" data-target="#modal-edit-{{$product->id}}">
    <img src="{{url('/public/icon/icons8-edit-144.png')}}"
         width="25" title="ویرایش">
</a>
<div class="modal fade" id="modal-edit-{{$product->id}}">
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
                                    action="{{route('admin.ProductCharacteristic.edit')}}"
                                    method="post">
                                    @csrf
                                    <input type="hidden" name="id"
                                           value="{{$product->id}}">
                                    <div class="col-md-12 form-group">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>گروه کالا</label>
                                                <select dir="rtl"
                                                        id="select2-pro"
                                                        class="form-control"
                                                        name="commodity_id"
                                                        required>
                                                    @foreach($products as $produc)
                                                        @foreach($commoditys as $commodity)
                                                            @if($produc->id == $product->id)
                                                                <option
                                                                    value="{{$commodity->id}}"
                                                                    @if($produc->commodity_id == $commodity->id)
                                                                    selected
                                                                    @endif
                                                                >{{$commodity->name}}</option>
                                                            @endif
                                                        @endforeach
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>کد مشخصه</label>
                                                <input type="text" name="code"
                                                       class="form-control"
                                                       placeholder="لطفا کد مشخصه را وارد کنید"
                                                       required
                                                       value="{{$product->code}}">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>نام مشخصه</label>
                                                <input type="text" name="name"
                                                       class="form-control"
                                                       placeholder="لطفا نام مشخصه را وارد کنید"
                                                       required
                                                       value="{{$product->name}}">
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
<a data-toggle="modal" role="button" data-target="#modal-delete-{{$product->id}}">
    <img src="{{url('/public/icon/icons8-delete-bin-96.png')}}"
         width="25" title="ویرایش">
</a>
<div class="modal fade" id="modal-delete-{{$product->id}}" tabIndex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <p><span style="color: red">توجه!</span> اطلاعات حذف شده قابل
                    بازیابی نخواهند بود</p>
                ایا از حذف مشخصات این مشخصه محصول مطمئن هستید؟
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left"
                        data-dismiss="modal">
                    انصراف
                </button>
                <a href="{{route('admin.ProductCharacteristic.delete',$product->id)}}"
                   class="btn btn-primary">حذف</a>
            </div>
        </div>
    </div>
</div>
