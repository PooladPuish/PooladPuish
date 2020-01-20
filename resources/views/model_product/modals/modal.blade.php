<div class="modal fade" id="ajaxModel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="portlet box blue">
                    <div class="portlet-title">
                        <div class="caption">
                            انتصاب محصول به قالب
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <div class="form-body">
                            <div class="form-group">

                                <form autocomplete="off" id="productForm" name="productForm" class="form-horizontal">
                                    <input type="hidden" name="product" id="product">
                                    @csrf
                                    <div class="col-md-12 form-group">
                                        <div class="col-md-12">

                                            <div class="form-group">
                                                <label for="title">قالب
                                                    <span
                                                        style="color: red"
                                                        class="required-mark">*</span>
                                                </label>
                                                <select name="format_id" id="format_id"
                                                        class="form-control">
                                                    @foreach($formats as $format)
                                                        <option value="{{$format->id}}">{{$format->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="title">insert
                                                    <span
                                                        style="color: red"
                                                        class="required-mark">*</span>
                                                </label>
                                                <select name="insert_id" id="insert_id"
                                                        class="form-control">
                                                    @foreach($inserts as $insert)
                                                        <option value="{{$insert->id}}">{{$insert->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>


                                            <div class="form-group">
                                                <label for="title">محصول
                                                    <span
                                                        style="color: red"
                                                        class="required-mark">*</span>
                                                </label>
                                                <select name="product_id" id="product_id"
                                                        class="form-control">
                                                    @foreach($products as $product)
                                                        <option value="{{$product->id}}">{{$product->label}}</option>
                                                    @endforeach
                                                </select>
                                            </div>


                                            <div class="form-group">
                                                <label>وزن
                                                    <span
                                                        style="color: red"
                                                        class="required-mark">*</span>
                                                </label>
                                                <input type="text" id="size" name="size" class="form-control"
                                                       placeholder="لطفا وزن را وارد کنید"
                                                       required>
                                            </div>

                                            <div class="form-group">
                                                <label>سایکل تایم
                                                    <span
                                                        style="color: red"
                                                        class="required-mark">*</span>
                                                </label>
                                                <input type="text" id="cycletime" name="cycletime" class="form-control"
                                                       placeholder="لطفا سایکل تایم را وارد کنید"
                                                       required>
                                            </div>



                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">
                                            انصراف
                                        </button>
                                        <button type="submit" class="btn btn-primary" id="saveBtn" value="ثبت">
                                            ثبت
                                        </button>
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
