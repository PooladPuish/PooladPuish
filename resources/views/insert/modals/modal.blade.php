<div class="modal fade" id="ajaxModel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="portlet box blue">
                    <div class="portlet-title">
                        <div class="caption">
                            Insert
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
                                                       placeholder="لطفا کد را وارد کنید"
                                                       required>
                                            </div>

                                            <div class="form-group">
                                                <label>نام سازنده</label>
                                                <input type="text" id="manufacturer" name="manufacturer" class="form-control"
                                                       placeholder="لطفا نام سازنده را وارد کنید"
                                                       required>
                                            </div>
                                            <div class="form-group">
                                                <label>نام insert</label>
                                                <input type="text" id="name" name="name" class="form-control"
                                                       placeholder="لطفا نام insert سازنده را وارد کنید"
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