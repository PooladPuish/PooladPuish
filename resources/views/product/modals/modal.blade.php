<div class="modal fade" id="ajaxModel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="portlet box blue">
                    <div class="portlet-title">
                        <div class="caption">
                            گروه کالایی
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <div class="form-body">
                            <div class="form-group">

                                <form id="productForm" name="productForm" class="form-horizontal">
                                    <input type="hidden" name="product_id" id="product_id">
                                    @csrf
                                    <div class="col-md-12 form-group">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>کد محصول</label>
                                                <input type="text" id="code" name="code" class="form-control"
                                                       placeholder="لطفا کد محصول را وارد کنید"
                                                       required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>گروه کالا</label>
                                                <select class="form-control"
                                                        name="commodity_id"
                                                        id="commodity"
                                                        required>
                                                    <option>لطفا گروه کالا را انتخاب کنید</option>
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
                                                <label for="title">مشخصه محصول</label>
                                                <select name="characteristic" id="characteristic"
                                                        class="form-control">
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>نام محصول</label>
                                                <input type="text" id="name" name="name" class="form-control"
                                                       placeholder="لطفا نام محصول را وارد کنید"
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
