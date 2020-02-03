<div class="modal fade" id="ajaxModel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="portlet box blue">
                    <div class="portlet-title">
                        <div class="caption">
                            تایید پیش فاکتور توسط مشتری
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <div class="form-body">
                            <div class="form-group">

                                <form autocomplete="off" id="CustomerConfirm" name="CustomerConfirm" class="form-horizontal">
                                    <input type="hidden" name="invoice_id" id="invoice_id">
                                    <input type="hidden" name="id_in" id="id_in">
                                    @csrf
                                    <div class="col-md-12 form-group">


                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>تاریخ تایید مشتری
                                                    <span
                                                        style="color: red"
                                                        class="required-mark">*</span>
                                                </label>
                                                <input type="text" id="date" name="date" class="form-control example1"
                                                       required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>نام تایید کننده
                                                    <span
                                                        style="color: red"
                                                        class="required-mark">*</span>
                                                </label>
                                                <input type="text" id="name" name="name" class="form-control"
                                                       placeholder="لطفا نام تایید کننده را وارد کنید"
                                                       required>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>نحوه تایید
                                                    <span
                                                        style="color: red"
                                                        class="required-mark">*</span>
                                                </label>
                                                <select class="form-control" name="HowConfirm" id="HowConfirm">
                                                    <option value="1">شفاهی</option>
                                                    <option value="2">فکس</option>
                                                    <option value="3">واتساپ</option>
                                                    <option value="4">تلگرام</option>
                                                    <option value="5">SMS</option>
                                                    <option value="6">سایر</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>فایل پیوست
                                                </label>
                                                <input type="file" id="file" name="file" class="form-control"
                                                       placeholder="لطفا نام تایید کننده را وارد کنید"
                                                       >
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>توضیحات
                                                </label>
                                                <textarea name="description" id="description" rows="5" class="form-control" placeholder="لطفا توضیحات را وارد کنید">
                                                 </textarea>
                                            </div>
                                        </div>


                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">
                                            انصراف
                                        </button>
                                        <button type="submit" class="btn btn-primary" id="saveConfirm" value="ثبت">
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








