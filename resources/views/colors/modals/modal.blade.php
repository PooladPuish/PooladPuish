<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="portlet box blue">
                    <div class="portlet-title">
                        <div class="caption">
                            تعریف رنگ
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <div class="form-body">
                            <div class="form-group">
                                <form action="{{route('admin.color.store')}}" method="post">
                                    @csrf
                                    <div class="col-md-12 form-group">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>کد رنگ</label>
                                                <input type="text" name="code" class="form-control"
                                                       placeholder="لطفا کد رنگ را وارد کنید"
                                                       required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>نام رنگ</label>
                                                <input type="text" name="name" class="form-control"
                                                       placeholder="لطفا نام رنگ را وارد کنید"
                                                       required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>نام سازنده رنگ</label>
                                                <input type="text" name="manufacturer" class="form-control"
                                                       placeholder="لطفا نام سازنده رنگ را وارد کنید"
                                                       required>
                                            </div>
                                        </div>


                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>درصد ترکیب مواد</label>
                                                <input type="text" name="combination" class="form-control"
                                                       placeholder="لطفا درصد ترکیب مواد را وارد کنید"
                                                       required>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>کد مستربچ</label>
                                                <input type="text" name="masterbatch" class="form-control"
                                                       placeholder="لطفا کد مستربچ را وارد کنید"
                                                       required>
                                            </div>
                                        </div>


                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">
                                            انصراف
                                        </button>
                                        <input type="submit" class="btn btn-primary" value="ثبت">
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
