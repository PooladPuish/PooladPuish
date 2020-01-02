<div class="modal fade" id="modal-default">
    <div class="modal-dialog col-md-12">
        <div class="modal-content">
            <div class="modal-body col-md-12">
                <div class="portlet box blue">
                    <div class="portlet-title">
                        <div class="caption">
                            تعریف فروشنده
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <div class="form-body">
                            <div class="form-group">
                                <form action="{{route('admin.seller.store')}}" method="post">
                                    @csrf
                                    <div class="col-md-12 form-group">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>کد</label>
                                                <input type="text" name="code" class="form-control"
                                                       placeholder="لطفا کد فروشنده را وارد کنید"
                                                       required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>نام شرکت</label>
                                                <input type="text" name="company" class="form-control"
                                                       placeholder="لطفا نام شرکت را وارد کنید"
                                                       required>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>رنگ مستربچ</label>
                                                <select dir="rtl" id="select2-prod" class="form-control"
                                                        name="color_id"
                                                        required>
                                                    @foreach($colors as $color)
                                                        @if(!empty($color))
                                                            <option
                                                                value="{{$color->id}}">{{$color->name}}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>نام شخص رابط</label>
                                                <input type="text" name="connector" class="form-control"
                                                       placeholder="لطفا نام شخص رابط را وارد کنید"
                                                       required>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>سمت</label>
                                                <input type="text" name="side" class="form-control"
                                                       placeholder="لطفا سمت را وارد کنید"
                                                       required>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>شماره تلفن</label>
                                                <input type="text" name="tel" class="form-control"
                                                       placeholder="لطفا شماره تلفن را وارد کنید"
                                                       required>
                                            </div>
                                        </div>


                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>شماره داخلی</label>
                                                <input type="text" name="inside" class="form-control"
                                                       placeholder="لطفا شماره داخلی را وارد کنید"
                                                       required>
                                            </div>
                                        </div>



                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>شماره همراه</label>
                                                <input type="text" name="phone" class="form-control"
                                                       placeholder="لطفا شماره همراه را وارد کنید"
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
