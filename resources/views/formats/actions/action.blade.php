<a data-toggle="modal" role="button" data-target="#modal-edit-{{$format->id}}">
    <img src="{{url('/public/icon/icons8-edit-144.png')}}"
         width="25" title="ویرایش">
</a>
<div class="modal fade" id="modal-edit-{{$format->id}}" tabIndex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="portlet box blue">
                    <div class="portlet-title">
                        <div class="caption">
                            ویرایش قالب
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <div class="form-body">
                            <div class="form-group">
                                <form action="{{route('admin.format.edit')}}"
                                      method="post">
                                    @csrf
                                    <input type="hidden" name="id"
                                           value="{{$format->id}}">
                                    <div class="col-md-12 form-group">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>کد</label>
                                                <input type="text" name="code" class="form-control"
                                                       placeholder="لطفا کد قالب را وارد کنید"
                                                       required
                                                       value="{{$format->code}}">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>قالب ساز</label>
                                                <select dir="rtl" id="select2-a" class="form-control"
                                                        name="model_id"
                                                        required>
                                                    @foreach($models as $model)
                                                        @if(!empty($model))
                                                            <option
                                                                value="{{$model->id}}"
                                                                @if($format->model_id == $model->id)
                                                                selected
                                                                @endif
                                                            >{{$model->name}}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>گروه کالایی</label>
                                                <select dir="rtl" id="select2-prod" class="form-control"
                                                        name="commodity_id"
                                                        required>
                                                    @foreach($commoditys as $commodity)
                                                        @if(!empty($commodity))
                                                            <option
                                                                value="{{$commodity->id}}"
                                                                @if($format->commodity_id == $commodity->id)
                                                                selected
                                                                @endif
                                                            >{{$commodity->name}}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>مشخصه محصول</label>
                                                <select dir="rtl" id="select2-b" class="form-control"
                                                        name="characteristics_id"
                                                        required>
                                                    @foreach($characteristics as $characteristic)
                                                        @if(!empty($characteristic))
                                                            <option
                                                                value="{{$characteristic->id}}"
                                                                @if($format->characteristics_id == $characteristic->id)
                                                                selected
                                                                @endif
                                                            >{{$characteristic->name}}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>نام محصول</label>
                                                <select dir="rtl" id="select2-c" class="form-control"
                                                        name="product_id"
                                                        required>
                                                    @foreach($products as $product)
                                                        @if(!empty($product))
                                                            <option
                                                                value="{{$product->id}}"
                                                                @if($format->product_id == $product->id)
                                                                selected
                                                                @endif
                                                            >{{$product->name}}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>وزن محصول</label>
                                                <input type="text" name="size" class="form-control"
                                                       placeholder="لطفا وزن محصول را وارد کنید"
                                                       required
                                                       value="{{$format->size}}">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>تعداد کویته</label>
                                                <input type="text" name="quetta" class="form-control"
                                                       placeholder="لطفا تعداد کویته را وارد کنید"
                                                       required
                                                       value="{{$format->quetta}}">
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
<a data-toggle="modal" role="button" data-target="#modal-delete-{{$format->id}}">
    <img src="{{url('/public/icon/icons8-delete-bin-96.png')}}"
         width="25" title="ویرایش">
</a>
<div class="modal fade" id="modal-delete-{{$format->id}}" tabIndex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <p><span style="color: red">توجه!</span> اطلاعات حذف شده قابل
                    بازیابی نخواهند بود</p>
                ایا از حذف مشخصات این قالب مطمئن هستید؟
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left"
                        data-dismiss="modal">
                    انصراف
                </button>
                <a href="{{route('admin.format.delete',$format->id)}}"
                   class="btn btn-primary">حذف</a>
            </div>
        </div>
    </div>
</div>
