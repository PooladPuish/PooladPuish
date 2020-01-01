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
                            ویرایش محصول
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <div class="form-body">
                            <div class="form-group">
                                <form action="{{route('admin.Product.edit')}}"
                                      method="post">
                                    @csrf
                                    <input type="hidden" name="id"
                                           value="{{$product->id}}">
                                    <div class="col-md-12 form-group">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>کد محصول</label>
                                                <input type="text" name="code"
                                                       class="form-control"
                                                       placeholder="لطفا کد محصول را وارد کنید"
                                                       required
                                                       value="{{$product->code}}">
                                            </div>
                                        </div>


                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>گروه کالا</label>
                                                <select class="form-control"
                                                        name="commodity_id"
                                                        id="commodity_i"
                                                        required>
                                                    <option>لطفا گروه کالا را انتخاب
                                                        کنید
                                                    </option>
                                                    @foreach($products as $produc)
                                                        @foreach($commoditys as $commodity)
                                                            @if($produc->id == $product->id)
                                                                <option
                                                                    value="{{$commodity->id}}"
                                                                    @if($produc->commodity_id == $commodity->id)
                                                                    selected
                                                                    @endif>
                                                                    {{$commodity->name}}
                                                                </option>
                                                            @endif
                                                        @endforeach
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        @php
                                            $states = \DB::table("product_characteristics")
                                                        ->where("commodity_id", $product->commodity_id)
                                                        ->get();

                                        @endphp
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="title">مشخصه
                                                    محصول</label>
                                                <select name="characteristic"
                                                        id="characteristic_i"
                                                        class="form-control">
                                                    @foreach ($states as $s)
                                                        <option
                                                            value="{{$s->id}}">{{$s->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>نام محصول</label>
                                                <input type="text" name="name"
                                                       class="form-control"
                                                       placeholder="لطفا نام محصول را وارد کنید"
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
                ایا از حذف مشخصات این محصول مطمئن هستید؟
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left"
                        data-dismiss="modal">
                    انصراف
                </button>
                <a href="{{route('admin.Product.delete',$product->id)}}"
                   class="btn btn-primary">حذف</a>
            </div>
        </div>
    </div>
</div>
