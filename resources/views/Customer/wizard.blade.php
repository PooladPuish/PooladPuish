@extends('layouts.master')
<style>
    .registercontpage {
        position: relative;
        z-index: 0;
        background: #fff;
        padding-top: 15px;
        padding-bottom: 15px;
    }

    .btn-circle {
        width: 30px;
        height: 30px;
        text-align: center;
        padding: 10px;
        font-size: 12px;
        border-radius: 50px;
    }

    .btn-circle {
        background: #000;
    }

    .btn-default[disabled] {
        background-color: #FFFFFF;
        border-color: #cccccc;
    }

    .stepwizard-step p {
        margin-top: 10px;
    }

    .stepwizard-row {
        display: table-row;
    }

    .stepwizard {
        display: table;
        width: 50%;
        position: relative;
    }

    .stepwizard-step button[disabled] {
        opacity: 1 !important;
        filter: alpha(opacity=100) !important;
    }

    .stepwizard-row:before {
        top: 14px;
        bottom: 0;
        position: absolute;
        content: " ";
        width: 100%;
        height: 1px;
        background-color: #ccc;
        z-order: 0;
    }

    .stepwizard-step {
        display: table-cell;
        text-align: center;
        position: relative;
    }

    .btn-circle {
        width: 50px;
        height: 30px;
        text-align: center;
        padding: 6px 0;
        font-size: 12px;
        line-height: 1.428571429;
        border-radius: 15px;
    }

    .field {
        position: relative;
        float: left;
        clear: both;
        margin: .35em 0;
        width: 100%;
    }


</style>
<style>
    .pt-3-half {
        padding-top: 1.4rem;
    }
</style>
<link href="{{asset('/public/css/1.css')}}" rel="stylesheet" id="bootstrap-css">
<script src="{{asset('/public/js/1.js')}}"></script>
<script src="{{asset('/public/assets/sweetalert.js')}}"></script>
@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption">
                        مشتریان
                    </div>
                    <div class="tools"></div>
                </div>
                <div class="portlet-body">
                    <div class="registercontpage">
                        <div class="stepwizard col-md-offset-3">
                            <div class="stepwizard-row setup-panel">
                                <div class="stepwizard-step">
                                    <a href="#step-1" type="button"
                                       class="btn btn-circle btn-default1 btn-primary">1</a>
                                    <p>اطلاعات پایه</p>
                                </div>

                                <div class="stepwizard-step">
                                    <a href="#step-2" type="button" class="btn btn-default1 btn-circle"
                                       disabled="disabled">2</a>
                                    <p>اطلاعات تکمیلی</p>
                                </div>

                            </div>
                        </div>

                        <form data-toggle="validator" id="productForm"
                              name="productForm" class="form-horizontal">
                            @csrf
                            <input type="hidden" name="id" id="id">

                            <div class="row setup-content" id="step-1" style="display: block;">
                                <br/>
                                <hr/>
                                <div class="col-md-6">
                                    <div class="col-md-12">
                                        <div class="form-group field ">
                                            <label class="control-label main col-md-4">کد مشتری</label>
                                            <div class="col-md-8">
                                                <input maxlength="100" minlength="3" type="text" id="code"
                                                       name="code"
                                                       required="required" class="form-control"
                                                       placeholder="لطفا کد مشتری را وارد کنید">
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>

                                        <div class="form-group field ">
                                            <label class="control-label main col-md-4">نام مشتری</label>
                                            <div class="col-md-8">
                                                <input maxlength="100" minlength="3" type="text" id="name"
                                                       name="name"
                                                       required="required" class="form-control"
                                                       placeholder="لطفا نام مشتری را وارد کنید">
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                        <div class="form-group field ">
                                            <label class="control-label main col-md-4">استان/کشور</label>
                                            <div class="col-md-8">
                                                <input maxlength="100" minlength="3" type="text" id="state"
                                                       name="state"
                                                       required="required" class="form-control"
                                                       placeholder="استان یا کشور مشتری را وارد کنید"
                                                       data-error="Minimum 3 character required">
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>

                                        <div class="form-group field ">
                                            <label for="sel1" class="control-label main col-md-4">نوع مشتری</label>
                                            <div class="col-md-8">
                                                <select class="form-control" name="type" id="type"
                                                        style="background: #fff none repeat scroll 0 0;border-color: #999999;width:100px;">
                                                    @foreach($typeCustomers as $typeCustomer)
                                                        <option value="{{$typeCustomer->type}}">{{$typeCustomer->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>


                                    </div>
                                    <button class="btn btn-primary nextBtn" id="nextBtn" type="button">ادامه
                                    </button>
                                </div>
                                <div class="col-md-6">
                                    <div class="col-md-12">
                                        <div class="form-group field ">
                                            <label class="control-label main col-md-4">نحوه اشنایی</label>
                                            <div class="col-md-8">
                                                <input maxlength="100" minlength="3" type="text" id="methodd"
                                                       name="methodd"
                                                       required="required" class="form-control"
                                                       placeholder="لطفا نحوه اشنایی مشتری را وارد کنید">
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>

                                        <div class="form-group field ">
                                            <label class="control-label main col-md-4">تاریخ اشنایی</label>
                                            <div class="col-md-8">
                                                <input maxlength="100" minlength="3" type="text" id="date"
                                                       name="date"
                                                       required="required" class="form-control"
                                                       placeholder="لطفا تاریخ اشنایی مشتری را وارد کنید">
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                        <div class="form-group field ">
                                            <label class="control-label main col-md-4">کارشناس</label>
                                            <div class="col-md-8">
                                                <input maxlength="100" minlength="3" type="text" id="expert"
                                                       name="expert"
                                                       required="required" class="form-control"
                                                       placeholder="لطفا نام کارشناس را وارد کنید">
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>


                                    </div>
                                </div>


                            </div>


                            <div class="row setup-content" id="step-2" style="display: block;">
                                <br/>
                                <hr/>
                                <div class="col-md-12">
                                    <div class="col-md-12">
                                        <div id="personal" style="display: none">
                                            <div class="col-md-6">
                                                <div class="col-md-12">
                                                    <div class="form-group field ">
                                                        <label class="control-label main col-md-4">تاریخ
                                                            تولد</label>
                                                        <div class="col-md-8">
                                                            <input maxlength="100" minlength="3" type="text"
                                                                   id="date_personel"
                                                                   name="date_personel"
                                                                   required="required" class="form-control"
                                                                   placeholder="لطفا تاریخ تولد را وارد کنید">
                                                            <div class="help-block with-errors"></div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group field ">
                                                        <label class="control-label main col-md-4">کد ملی</label>
                                                        <div class="col-md-8">
                                                            <input maxlength="100" minlength="3" type="text"
                                                                   id="codemeli_personel"
                                                                   name="codemeli_personel"
                                                                   required="required" class="form-control"
                                                                   placeholder="لطفا کد ملی را وارد کنید">
                                                            <div class="help-block with-errors"></div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group field ">
                                                        <label class="control-label main col-md-4">تلفن ثابت</label>
                                                        <div class="col-md-8">
                                                            <input maxlength="100" minlength="3" type="text"
                                                                   id="tel_personel"
                                                                   name="tel_personel"
                                                                   required="required" class="form-control"
                                                                   placeholder="لطفا شماره تلفن ثابت را وارد کنید"
                                                                   data-error="Minimum 3 character required">
                                                            <div class="help-block with-errors"></div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group field ">
                                                        <label for="sel1"
                                                               class="control-label main col-md-4">جنسیت</label>
                                                        <div class="col-md-8">
                                                            <select class="form-control" name="sex_personel"
                                                                    id="sex_personel"
                                                                    style="background: #fff none repeat scroll 0 0;border-color: #999999;width:100px;">
                                                                <option value="1">مرد</option>
                                                                <option value="2">زن</option>
                                                            </select>
                                                        </div>
                                                    </div>


                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="col-md-12">
                                                    <div class="form-group field ">
                                                        <label class="control-label main col-md-4">تلفن همره</label>
                                                        <div class="col-md-8">
                                                            <input maxlength="100" minlength="3" type="text"
                                                                   id="phone_personel"
                                                                   name="phone_personel"
                                                                   required="required" class="form-control"
                                                                   placeholder="لطفا شماره تلفن همره را وارد کنید"
                                                                   data-error="Minimum 3 character required">
                                                            <div class="help-block with-errors"></div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group field ">
                                                        <label class="control-label main col-md-4">ایمیل</label>
                                                        <div class="col-md-8">
                                                            <input maxlength="100" minlength="3" type="text"
                                                                   id="email_personel"
                                                                   name="email_personel"
                                                                   required="required" class="form-control"
                                                                   placeholder="لطفا ایمیل را وارد کنید"
                                                                   data-error="Minimum 3 character required">
                                                            <div class="help-block with-errors"></div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group field ">
                                                        <label class="control-label main col-md-4">ادرس</label>
                                                        <div class="col-md-8">
                                                            <input maxlength="100" minlength="3" type="text"
                                                                   id="adders_personel"
                                                                   name="adders_personel"
                                                                   required="required" class="form-control"
                                                                   placeholder="لطفا ادرس وارد کنید"
                                                                   data-error="Minimum 3 character required">
                                                            <div class="help-block with-errors"></div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group field ">
                                                        <label class="control-label main col-md-4">توضیحات</label>
                                                        <div class="col-md-8">
                                                            <input maxlength="100" minlength="3" type="text"
                                                                   id="text_personel"
                                                                   name="text_personel"
                                                                   required="required" class="form-control"
                                                                   placeholder="لطفا توضیحات را وارد کنید"
                                                                   data-error="Minimum 3 character required">
                                                            <div class="help-block with-errors"></div>
                                                        </div>
                                                    </div>


                                                </div>
                                            </div>

                                        </div>


                                        <div id="company" style="display: none">
                                            <div class="col-md-6">
                                                <div class="col-md-12">
                                                    <div class="form-group field ">
                                                        <label class="control-label main col-md-4">کد</label>
                                                        <div class="col-md-8">
                                                            <input maxlength="100" minlength="3" type="text"
                                                                   id="code_company"
                                                                   name="code_company"
                                                                   required="required" class="form-control"
                                                                   placeholder="لطفا کد مشتری را وارد کنید">
                                                            <div class="help-block with-errors"></div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group field ">
                                                        <label class="control-label main col-md-4">سال تاسیس</label>
                                                        <div class="col-md-8">
                                                            <input maxlength="100" minlength="3" type="text"
                                                                   id="Established_company"
                                                                   name="Established_company"
                                                                   required="required" class="form-control"
                                                                   placeholder="لطفا سال تاسیس را وارد کنید">
                                                            <div class="help-block with-errors"></div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group field ">
                                                        <label class="control-label main col-md-4">تلفن دفتر
                                                            مرکزی</label>
                                                        <div class="col-md-8">
                                                            <input maxlength="100" minlength="3" type="text"
                                                                   id="tel_company"
                                                                   name="tel_company"
                                                                   required="required" class="form-control"
                                                                   placeholder="لطفا شماره تلفن دفتر کار را وارد کنید"
                                                                   data-error="Minimum 3 character required">
                                                            <div class="help-block with-errors"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-md-6">
                                                <div class="col-md-12">
                                                    <div class="form-group field ">
                                                        <label class="control-label main col-md-4">فکس</label>
                                                        <div class="col-md-8">
                                                            <input maxlength="100" minlength="3" type="text"
                                                                   id="fax_company"
                                                                   name="fax_company"
                                                                   required="required" class="form-control"
                                                                   placeholder="لطفا شماره فکس را وارد کنید"
                                                                   data-error="Minimum 3 character required">
                                                            <div class="help-block with-errors"></div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group field ">
                                                        <label class="control-label main col-md-4">ادرس</label>
                                                        <div class="col-md-8">
                                                            <input maxlength="100" minlength="3" type="text"
                                                                   id="adders_company"
                                                                   name="adders_company"
                                                                   required="required" class="form-control"
                                                                   placeholder="لطفا ادرس را وارد کنید"
                                                                   data-error="Minimum 3 character required">
                                                            <div class="help-block with-errors"></div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group field ">
                                                        <label class="control-label main col-md-4">کد پستی</label>
                                                        <div class="col-md-8">
                                                            <input maxlength="100" minlength="3" type="text"
                                                                   id="post_company"
                                                                   name="post_company"
                                                                   required="required" class="form-control"
                                                                   placeholder="لطفا کد پستی وارد کنید"
                                                                   data-error="Minimum 3 character required">
                                                            <div class="help-block with-errors"></div>
                                                        </div>
                                                    </div>


                                                </div>
                                            </div>


                                            <div class="row">
                                                <div class="col-md-12">
                                                    <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                                    <div class="portlet box blue">
                                                        <div class="portlet-title">
                                                            <div class="caption">
                                                                مشخصات پرسنل های شرکت
                                                            </div>
                                                        </div>
                                                        <div class="portlet-body">
                                                            <div class="table table-responsive">
                                                                <table
                                                                    class="table table-responsive table-striped table-bordered">
                                                                    <thead>
                                                                    <tr>
                                                                        <td>سمت</td>
                                                                        <td>جنسیت</td>
                                                                        <td>عنوان</td>
                                                                        <td>نام</td>
                                                                        <td>تلفن</td>
                                                                        <td>داخلی</td>
                                                                        <td>تلفن همراه</td>
                                                                        <td>ایمیل</td>
                                                                        <td>عملیات</td>
                                                                    </tr>
                                                                    </thead>
                                                                    <tbody id="TextBoxContainer">
                                                                    </tbody>
                                                                    <tfoot>
                                                                    <tr>
                                                                        <th colspan="5">
                                                                            <button id="btnAdd" type="button"
                                                                                    class="btn btn-primary"
                                                                                    data-toggle="tooltip"
                                                                                    data-original-title="Add more controls">
                                                                                <i class="glyphicon glyphicon-plus-sign"></i>&nbsp;
                                                                                افزودن&nbsp;
                                                                            </button>
                                                                        </th>
                                                                    </tr>
                                                                    </tfoot>
                                                                </table>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <button type="submit" class="btn btn-primary" id="saveBtn" value="ثبت">
                                            ثبت
                                        </button>
                                    </div>

                                </div>

                            </div>


                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>



    <script src="{{asset('/public/js/2.js')}}"></script>
    <script>
        $(document).ready(function () {
            $('#nextBtn').click(function () {
                var type = $('#type').val();
                if (type == 1) {
                    $('#company').show();
                    $('#personal').hide();
                    $('#date_personel').val('');
                    $('#codemeli_personel').val('');
                    $('#tel_personel').val('');
                    $('#sex_personel').val('');
                    $('#phone_personel').val('');
                    $('#email_personel').val('');
                    $('#adders_personel').val('');
                    $('#text_personel').val('');
                    $('#id').val('1');
                } else {
                    $('#company').hide();
                    $('#personal').show();
                    $('#Established_company').val('');
                    $('#tel_company').val('');
                    $('#fax_company').val('');
                    $('#adders_company').val('');
                    $('#post_company').val('');
                    $('#side_company').val('');
                    $('#sex_company').val('');
                    $('#title_company').val('');
                    $('#name_company').val('');
                    $('#phone_company').val('');
                    $('#inside_company').val('');
                    $('#tel_company_company').val('');
                    $('#email_company').val('');
                    $('#id').val('2');

                }


            });
        });
    </script>
    <script>
        function numberOnly(input) {
            var regex = /[^0-9]/gi;
            input.value = input.value.replace(regex, "");
        }

        $(document).ready(function () {
            var navListItems = $('div.setup-panel div a'),
                allWells = $('.setup-content'),
                allNextBtn = $('.nextBtn');

            allWells.hide();

            navListItems.click(function (e) {
                e.preventDefault();
                var $target = $($(this).attr('href')),
                    $item = $(this);
                if (!$item.hasClass('disabled')) {
                    navListItems.removeClass('btn-primary').addClass('btn-default');
                    $item.addClass('btn-primary');
                    allWells.hide();
                    $target.show();
                    $target.find('input:eq(0)').focus();
                }
            });

            allNextBtn.click(function () {
                var curStep = $(this).closest(".setup-content"),
                    curStepBtn = curStep.attr("id"),
                    nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
                    curInputs = curStep.find("input[type='text'],input[type='url'],textarea[textarea]"),
                    isValid = true;
                console.log(curStepBtn);
                $(".form-group").removeClass("has-error");
                for (var i = 0; i < curInputs.length; i++) {
                    console.log(curInputs);
                    if (!curInputs[i].validity.valid) {
                        isValid = false;
                        $(curInputs[i]).closest(".form-group").addClass("has-error");
                    }
                }

                if (isValid)
                    nextStepWizard.removeAttr('disabled').trigger('click');
            });

            $('div.setup-panel div a.btn-primary').trigger('click');
        });
    </script>
    <script type="text/javascript">
        $(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#saveBtn').click(function (e) {
                e.preventDefault();
                $.ajax({
                    data: $('#productForm').serialize(),
                    url: "{{ route('admin.customers.store') }}",
                    type: "POST",
                    dataType: 'json',
                    success: function (data) {
                        if (data.errors) {
                            $('#ajaxModel').modal('hide');
                            jQuery.each(data.errors, function (key, value) {
                                Swal.fire({
                                    title: 'خطا!',
                                    text: value,
                                    icon: 'error',
                                    confirmButtonText: 'تایید'
                                })
                            });
                        }
                        if (data.success) {
                            Swal.fire({
                                title: 'موفق',
                                text: data.success,
                                icon: 'success',
                                confirmButtonText: 'تایید'
                            }).then((result) => {

                                location.reload();

                            });

                        }
                    }
                });
            });
        });
    </script>
    <script>

        $(function () {
            $("#btnAdd").bind("click", function () {
                var div = $("<tr />");
                div.html(GetDynamicTextBox(""));
                $("#TextBoxContainer").append(div);
            });
            $("body").on("click", ".remove", function () {
                $(this).closest("tr").remove();
            });
        });

        function GetDynamicTextBox(value) {


            return '<td><input name = "side_company[]" type="text" value = "' + value + '" class="form-control" /></td>' +
                '<td><select name="sex_company[]" class="form-control"><option>انتخاب کنید</option><option value="1"> مرد</option><option  value="2"> زن</option></select></td>' +
                '<td><input name = "title_company[]" type="text" value = "' + value + '" class="form-control" /></td>' +
                '<td><input name = "name_company[]" type="text" value = "' + value + '" class="form-control" /></td>' +
                '<td><input name = "phone_company[]" type="text" value = "' + value + '" class="form-control" /></td>' +
                '<td><input name = "inside_company[]" type="text" value = "' + value + '" class="form-control" /></td>' +
                '<td><input name = "email_company[]" type="text" value = "' + value + '" class="form-control" /></td>' +
                '<td><input name = "tel_company_company[]" type="text" value = "' + value + '" class="form-control" /></td>' +
                '<td><button type="button" class="btn btn-danger remove"><i class="glyphicon glyphicon-remove-sign"></i></button></td>'
        }
    </script>


@endsection
