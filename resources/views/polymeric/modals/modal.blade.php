<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="portlet box blue">
                    <div class="portlet-title">
                        <div class="caption">
                            تعریف مواد پلیمیری
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <div class="form-body">
                            <div class="form-group">
                                <form action="{{route('admin.polymeric.store')}}" method="post">
                                    @csrf
                                    <div class="col-md-12 form-group">

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>کد</label>
                                                <input type="text" name="code" class="form-control"
                                                       placeholder="لطفا کد مواد را وارد کنید"
                                                       required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>نوع مواد</label>
                                                <input type="text" name="type" class="form-control"
                                                       placeholder="لطفا نوع مواد را وارد کنید"
                                                       required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>نام گرید مواد</label>
                                                <input type="text" name="grid" class="form-control"
                                                       placeholder="لطفا نام گرید مواد را وارد کنید"
                                                       required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>نام سازنده</label>
                                                <input type="text" name="name" class="form-control"
                                                       placeholder="لطفا نام سازنده را وارد کنید"
                                                       required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>نام محصول</label>
                                                <select dir="rtl" id="select2-cc" class="form-control"
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
                                                <label>توضیحات</label>
                                                <textarea name="description" class="form-control" rows="4" cols="50" placeholder="متن خود را وارد کنید">
                                                </textarea>

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
