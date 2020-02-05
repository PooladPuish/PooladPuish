<div class="modal fade" id="ajaxModelQuestion" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="portlet box blue">
                    <div class="portlet-title">
                        <div class="caption">
                            ثبت نهایی پیش فاکتور
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <div class="form-body">
                            <div class="form-group">

                                <form autocomplete="off" id="question" name="question" class="form-horizontal">
                                    <input type="hidden" name="id_trash" id="id_trash">
                                    @csrf
                                    <div class="col-md-12 form-group">


                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>دلیل لغو
                                                    <span
                                                        style="color: red"
                                                        class="required-mark">*</span>
                                                </label>
                                                <select disabled class="form-control" name="cancellation"
                                                        id="cancellation">
                                                    <option value="1">ثبت فروش تکراری</option>
                                                    <option value="2">بالا بودن قیمت</option>
                                                    <option value="3">تغییر در سفارش</option>
                                                    <option value="4">عدم پرداخت بدهی قبلی</option>
                                                    <option value="5">کم بودن سقف اعتباری</option>
                                                    <option value="6">مشکل تولید</option>
                                                    <option value="7">عدم تایید نمونه ارسال شده</option>
                                                    <option value="8">تعطیل شده</option>
                                                    <option value="9">بد حساب</option>
                                                    <option value="10">زمان تحویل طولانی</option>
                                                    <option value="11">ضایعات زیاد تولید</option>
                                                    <option value="12">عدم توانایی پرداخت فاکتور</option>
                                                    <option value="13">گذشت مدت زمان طولانی از زمان ثبت فاکتور</option>
                                                    <option value="14">بالا رفتن قیمت مواد</option>
                                                    <option value="15">عدم تحویل بار مشتری</option>
                                                    <option value="16">سایر</option>


                                                </select>
                                            </div>
                                        </div>


                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>توضیحات
                                                </label>
                                                <textarea disabled name="description" id="description_c" rows="5"
                                                          class="form-control" placeholder="لطفا توضیحات را وارد کنید">
                                                 </textarea>
                                            </div>
                                        </div>


                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger pull-left" id="saveDelete" data-dismiss="modal">
                                            حذف
                                        </button>

                                        <button type="button" class="btn btn-primary" id="saveRestore" data-dismiss="modal">
                                            بازگردانی
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









