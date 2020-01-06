<div class="modal fade" id="ajaxModel" aria-hidden="true">
    <div class="modal-dialog col-md-12">
        <div class="modal-content">
            <div class="modal-body col-md-12">
                <div class="portlet box blue">
                    <div class="portlet-title">
                        <div class="caption">
                            جابجایی
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <div class="form-body">
                            <div class="form-group">

                                <form id="productForm" name="productForm" class="form-horizontal">
                                    <input type="hidden" name="product_id" id="product_id">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-3">
                                                <label>درخواست دهنده</label>
                                                <select dir="rtl" id="user_id" class="form-control"
                                                        name="user_id"
                                                        required>
                                                    @foreach($users as $user)
                                                        @if(!empty($user))
                                                            <option value="{{$user->id}}">{{$user->name}}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                        </div>
                                        <div class="col-md-3">
                                                <label>جایگزین</label>
                                                <br/>
                                                <select dir="rtl" id="alternate_id" class="form-control"
                                                        name="alternate_id"
                                                        required>
                                                    @foreach($users as $user)
                                                        @if(!empty($user))
                                                            <option value="{{$user->id}}">{{$user->name}}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                        </div>


                                        <div class="col-md-3">
                                                <label>از تاریخ</label>
                                                <input type="text" id="from" name="from" class="form-control example1"/>

                                        </div>

                                        <div class="col-md-3">
                                                <label>تا تاریخ</label>
                                                <input type="text" id="ToDate" name="ToDate" class="form-control example1"/>

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

