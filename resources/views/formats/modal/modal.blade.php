<div class="modal fade" id="ajaxModel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="portlet box blue">
                    <div class="portlet-title">
                        <div class="caption">
                            تعریف قالب
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <div class="form-body">
                            <div class="form-group">

                                <form id="productForm" name="productForm" class="form-horizontal">
                                    <input type="hidden" name="product" id="product">
                                    @csrf
                                    <div class="col-md-12 form-group">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>کد</label>
                                                <input type="text" id="code" name="code" class="form-control"
                                                       placeholder="لطفا کد قالب را وارد کنید"
                                                       required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>قالب ساز</label>
                                                <select dir="rtl" id="model_id" class="form-control"
                                                        name="model_id"
                                                        required>
                                                    @foreach($models as $model)
                                                        @if(!empty($model))
                                                            <option
                                                                value="{{$model->id}}">{{$model->name}}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>گروه کالایی</label>
                                                <select dir="rtl" id="commodity_id" class="form-control"
                                                        name="commodity_id"
                                                        required>
                                                    @foreach($commoditys as $commodity)
                                                        @if(!empty($commodity))
                                                            <option
                                                                value="{{$commodity->id}}">{{$commodity->name}}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>مشخصه محصول</label>
                                                <select dir="rtl" id="characteristics_id" class="form-control"
                                                        name="characteristics_id"
                                                        required>
                                                    @foreach($characteristics as $characteristic)
                                                        @if(!empty($characteristic))
                                                            <option
                                                                value="{{$characteristic->id}}">{{$characteristic->name}}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>نام محصول</label>
                                                <select dir="rtl" id="product_id" class="form-control"
                                                        name="product_id"
                                                        required>
                                                    @foreach($products as $product)
                                                        @if(!empty($product))
                                                            <option
                                                                value="{{$product->id}}">{{$product->name}}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>وزن محصول</label>
                                                <input type="text" id="size" name="size" class="form-control"
                                                       placeholder="لطفا وزن محصول را وارد کنید"
                                                       required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>تعداد کویته</label>
                                                <input type="text" id="quetta" name="quetta" class="form-control"
                                                       placeholder="لطفا تعداد کویته را وارد کنید"
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

