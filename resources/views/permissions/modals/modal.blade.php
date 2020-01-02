<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="portlet box blue">
                    <div class="portlet-title">
                        <div class="caption">
                            افزودن دسترسی
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <div class="form-body">
                            <div class="form-group">
                                <form method="post" action="{{route('admin.permission.store')}}"
                                      class="mt-repeater"
                                      enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>دسترسی</label>
                                                <input type="text" id="name" name="name" class="form-control"
                                                       required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>قسمت</label>
                                                <input type="text" id="label" name="label" class="form-control"
                                                       required>
                                            </div>
                                        </div>

                                    </div>
                                    <hr/>
                                    <div class="form-group">
                                        <input type="submit" value="ثبت"
                                               class="btn btn-primary">
                                        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">
                                            انصراف
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
