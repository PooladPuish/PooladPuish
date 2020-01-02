<a data-toggle="modal" role="button" data-target="#modal-edit-{{$polymeric->id}}">
    <img src="{{url('/public/icon/icons8-edit-144.png')}}"
         width="25" title="ویرایش">
</a>
<div class="modal fade" id="modal-edit-{{$polymeric->id}}" tabIndex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="portlet box blue">
                    <div class="portlet-title">
                        <div class="caption">
                            ویرایش مواد پلیمیری
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <div class="form-body">
                            <div class="form-group">
                                <form action="{{route('admin.polymeric.edit')}}"
                                      method="post">
                                    @csrf
                                    <input type="hidden" name="id"
                                           value="{{$polymeric->id}}">
                                    <div class="col-md-12 form-group">

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>کد</label>
                                                <input type="text" name="code" class="form-control"
                                                       placeholder="لطفا کد مواد را وارد کنید"
                                                       required
                                                       value="{{$polymeric->code}}">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>نوع مواد</label>
                                                <input type="text" name="type" class="form-control"
                                                       placeholder="لطفا نوع مواد را وارد کنید"
                                                       required
                                                       value="{{$polymeric->type}}">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>نام گرید مواد</label>
                                                <input type="text" name="grid" class="form-control"
                                                       placeholder="لطفا نام گرید مواد را وارد کنید"
                                                       required
                                                       value="{{$polymeric->grid}}">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>نام سازنده</label>
                                                <input type="text" name="name" class="form-control"
                                                       placeholder="لطفا نام سازنده را وارد کنید"
                                                       required
                                                       value="{{$polymeric->name}}">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>نام محصول</label>
                                                <select dir="rtl" id="select2-cc" class="form-control"
                                                        name="product_id"
                                                        required>
                                                    @foreach($products as $product)
                                                        @if(!empty($product))
                                                            <option
                                                                value="{{$product->id}}"
                                                                @if($polymeric->product_id == $product->id)
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
                                                <label>توضیحات</label>
                                                <textarea name="description" class="form-control" rows="4" cols="50"
                                                          placeholder="متن خود را وارد کنید">
                                                    {!! $polymeric->description !!}
                                                </textarea>

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
<a data-toggle="modal" role="button" data-target="#modal-delete-{{$polymeric->id}}">
    <img src="{{url('/public/icon/icons8-delete-bin-96.png')}}"
         width="25" title="ویرایش">
</a>
<div class="modal fade" id="modal-delete-{{$polymeric->id}}" tabIndex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <p><span style="color: red">توجه!</span> اطلاعات حذف شده قابل
                    بازیابی نخواهند بود</p>
                ایا از حذف مشخصات این مواد پلیمیری مطمئن هستید؟
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left"
                        data-dismiss="modal">
                    انصراف
                </button>
                <a href="{{route('admin.polymeric.delete',$polymeric->id)}}"
                   class="btn btn-primary">حذف</a>
            </div>
        </div>
    </div>
</div>
