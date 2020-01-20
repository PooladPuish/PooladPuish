<script src="{{asset('/public/bower_components/jquery/dist/jquery.min.js')}}"></script>
<script src="{{asset('/public/assets/select2.js')}}"></script>

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

                                <form id="productForm" name="productForm" class="form-horizontal"
                                      autocomplete="off">
                                    <input type="hidden" name="product_id" id="product_id">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label>درخواست دهنده
                                                <span
                                                    style="color: red"
                                                    class="required-mark">*</span>
                                            </label>
                                            <select dir="rtl" id="user_id" class="itemName form-control"
                                                    name="user_id"
                                                    required>
                                                @foreach($users as $user)
                                                 <option value="{{$user->id}}">{{$user->name}}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label>جایگزین
                                                <span
                                                    style="color: red"
                                                    class="required-mark">*</span>
                                            </label>
                                            <br/>
                                            <select dir="rtl" id="alternate_id" class="itemName form-control"
                                                    name="alternate_id"
                                                    required>

                                            </select>
                                        </div>


                                        <div class="col-md-3">
                                            <label>از تاریخ
                                                <span
                                                    style="color: red"
                                                    class="required-mark">*</span>
                                            </label>
                                            <input type="text" id="from" name="from" class="form-control example1"/>

                                        </div>

                                        <div class="col-md-3">
                                            <label>تا تاریخ
                                                <span
                                                    style="color: red"
                                                    class="required-mark">*</span>
                                            </label>
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



<script type="text/javascript">
    $('#user_id').change(function () {
        var user_id = $(this).val();
        if (user_id) {
            $.ajax({
                type: "GET",
                url: "{{route('admin.alternatives.user')}}?user_id=" + user_id,
                success: function (res) {
                    if (res) {
                        $("#alternate_id").empty();
                        $.each(res, function (key, value) {
                            $("#alternate_id").append('<option value="' + key + '">' + value + '</option>');
                        });

                    } else {
                        $("#alternate_id").empty();
                    }
                }
            });
        } else {
            $("#alternate_id").empty();
        }
    });
    $('.itemName').select2({
        width: '100%',
        language: {
            noResults: function () {
                return 'پرسنل با این مشخصات یافت نشد';
            },
        }
    });
</script>


