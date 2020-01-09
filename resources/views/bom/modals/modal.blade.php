<div class="modal fade" id="ajaxModel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="portlet box blue">
                    <div class="portlet-title">
                        <div class="caption">
                            Bom
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
                                                <label for="title">محصول</label>
                                                <select name="product_id" id="product_id"
                                                        class="form-control">
                                                    @foreach($products as $product)
                                                        <option value="{{$product->id}}">{{$product->label}}</option>
                                                    @endforeach
                                                </select>
                                            </div>


                                            <div class="form-group">
                                                <label for="title">زیر مجموعه</label>
                                                <select name="bom_id" id="bom_id"
                                                        class="form-control">
                                                    @foreach($products as $product)
                                                        <option value="{{$product->id}}">{{$product->label}}</option>
                                                    @endforeach
                                                </select>
                                            </div>


                                            <div class="form-group">
                                                <label>تعداد</label>
                                                <input type="text" id="number" name="number" class="form-control"
                                                       placeholder="لطفا تعداد را وارد کنید"
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



{{--<div class="modal fade" id="details" aria-hidden="true">--}}
{{--    <div class="modal-dialog col-md-12">--}}
{{--        <div class="modal-content">--}}
{{--            <div class="modal-body col-md-12">--}}
{{--                <div class="portlet box blue">--}}
{{--                    <div class="portlet-title">--}}
{{--                        <div class="caption">--}}
{{--                            اجزاء محصول--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="portlet-body">--}}
{{--                        <table class="table table-striped table-bordered detail-table" id="detail-table">--}}
{{--                            <thead>--}}
{{--                            <tr>--}}
{{--                                <th>ردیف</th>--}}
{{--                                <th>اجزاء</th>--}}
{{--                                <th>تعداد</th>--}}
{{--                                <th>عملیات</th>--}}
{{--                            </tr>--}}
{{--                            </thead>--}}
{{--                            <tbody>--}}
{{--                            </tbody>--}}
{{--                        </table>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
