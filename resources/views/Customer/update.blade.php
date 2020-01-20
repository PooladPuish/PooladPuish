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
        background-color: #cccccc;
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
                        ویرایش اطلاعات مشتری
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

                        <form autocomplete="off" data-toggle="validator" id="productForm"
                              name="productForm" class="form-horizontal">
                            @csrf
                            <input type="hidden" name="id" id="id">
                            <input type="hidden" name="id_customer" id="id_customer" value="{{$id->id}}">
                            <input type="hidden" name="type_id" id="type_id" value="{{$id->type}}">


                            <div class="row setup-content" id="step-1" style="display: block;">
                                <br/>
                                <hr/>

                                <div class="col-md-12">
                                    <div class="col-md-6 form-group">
                                        <div class="col-md-12">
                                            <div class="form-group field ">
                                                <label class="control-label main col-md-4"> کد مشتری <span
                                                        style="color: red" class="required-mark">*</span></label>
                                                <div class="col-md-8">
                                                    <input type="text" id="code"
                                                           name="code"
                                                           value="{{$id->code}}"
                                                           required="required" class="form-control"
                                                           placeholder="لطفا کد مشتری را وارد کنید">
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>

                                            <div class="form-group field ">
                                                <label class="control-label main col-md-4"> نحوه اشنایی <span
                                                        style="color: red" class="required-mark">*</span></label>
                                                <div class="col-md-8">
                                                    <select dir="rtl" id="select2-eapl" class="form-control"
                                                            name="methodd" multiple
                                                            required>
                                                        @foreach($methods as $method)
                                                            <option
                                                                value="{{$method->method}}"
                                                                @if($id->method == $method->method)
                                                                selected
                                                                @endif
                                                            >{{$method->method}}</option>
                                                        @endforeach

                                                    </select>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>


                                            <div class="form-group field ">
                                                <label class="control-label main col-md-4"> استان/کشور <span
                                                        style="color: red" class="required-mark">*</span></label>
                                                <div class="col-md-8">
                                                    <select dir="rtl" id="select2-exapl" class="form-control"
                                                            name="state" multiple
                                                            required>
                                                        @foreach($states as $state)
                                                            <option value="{{$state->state}}"

                                                                    @if($id->state == $state->state)
                                                                    selected
                                                                @endif
                                                            >{{$state->state}}</option>
                                                        @endforeach

                                                    </select>

                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>

                                            <div class="form-group field ">
                                                <label for="sel1" class="control-label main col-md-4"> نوع مشتری <span
                                                        style="color: red" class="required-mark">*</span></label>
                                                <div class="col-md-8">
                                                    <select class="form-control" name="type" id="type"
                                                    >
                                                        @foreach($typeCustomers as $typeCustomer)
                                                            <option
                                                                value="{{$typeCustomer->id}}"
                                                                @if($id->type == $typeCustomer->id)
                                                                selected
                                                                @endif

                                                            >{{$typeCustomer->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>


                                        </div>

                                    </div>


                                    <div class="col-md-6 form-group">
                                        <div class="col-md-12">
                                            <div class="form-group field ">
                                                <label class="control-label main col-md-4"> نام مشتری <span
                                                        style="color: red" class="required-mark">*</span></label>
                                                <div class="col-md-8">
                                                    <input type="text" id="name"
                                                           name="name"
                                                           value="{{$id->name}}"
                                                           required="required" class="form-control"
                                                           placeholder="لطفا نام مشتری را وارد کنید">
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>

                                            <div class="form-group field ">
                                                <label class="control-label main col-md-4"> تاریخ اشنایی <span
                                                        style="color: red" class="required-mark">*</span></label>
                                                <div class="col-md-8">
                                                    <input type="text" id="date"
                                                           name="date"
                                                           value="{{$id->date}}"
                                                           required="required" class="form-control example1"
                                                           placeholder="لطفا تاریخ اشنایی مشتری را وارد کنید">
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>


                                            <div class="form-group field ">
                                                <label class="control-label main col-md-4"> کارشناس <span
                                                        style="color: red"
                                                        class="required-mark">*</span></label>
                                                <div class="col-md-8">
                                                    <input type="text" id="expert"
                                                           name="expert"
                                                           value="{{$id->expert}}"
                                                           required="required" class="form-control"
                                                           placeholder="لطفا نام کارشناس را وارد کنید">
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>


                                        </div>
                                    </div>


                                    <div class="col-md-12">
                                        <div class="form-group col-md-12">
                                            <label class="control-label col-md-2">توضیحات</label>
                                            <div class="col-md-10">
                                                <div class="help-block with-errors"></div>
                                                <textarea name="description" id="description" class="form-control"
                                                          rows="2" cols="50"
                                                          placeholder="توضیحات در مورد مشتری">
                                                            @if(!empty($id->description))
                                                        {{$id->description}}
                                                    @endif
                                                </textarea>


                                            </div>
                                        </div>

                                        <button class="btn btn-primary nextBtn" id="nextBtn" type="button">ادامه
                                        </button>


                                    </div>
                                </div>


                            </div>


                            <div class="row setup-content" id="step-2" style="display: block;">
                                <br/>
                                <hr/>
                                <div class="col-md-12">
                                    <div class="col-md-12">
                                        <div id="personal" style="display: none">
                                            <div class="col-md-12">
                                                <div class="col-md-6 form-group">
                                                    <div class="col-md-12">
                                                        <div class="form-group field ">
                                                            <label for="sel1"
                                                                   class="control-label main col-md-4"> جنسیت <span
                                                                    style="color: red"
                                                                    class="required-mark">*</span></label>
                                                            <div class="col-md-8">
                                                                <select class="form-control" name="sex_personel"
                                                                        id="sex_personel">
                                                                    <option value="1"
                                                                            @if(!empty($customer_personal->sex) and $customer_personal->sex) selected @endif>
                                                                        مرد
                                                                    </option>
                                                                    <option value="2"
                                                                            @if(!empty($customer_personal->sex) and $customer_personal->sex) selected @endif>
                                                                        زن
                                                                    </option>
                                                                </select>
                                                            </div>
                                                        </div>


                                                        <div class="form-group field ">
                                                            <label class="control-label main col-md-4">تاریخ
                                                                تولد</label>
                                                            <div class="col-md-8">
                                                                <input type="text"
                                                                       id="date_personel"
                                                                       name="date_personel"
                                                                       @if(!empty($customer_personal->date_personel))
                                                                       value="{{$customer_personal->date_personel}}"
                                                                       @endif
                                                                       required="required" class="form-control example1"
                                                                       placeholder="لطفا تاریخ تولد را وارد کنید">
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                        </div>


                                                        <div class="form-group field ">
                                                            <label class="control-label main col-md-4">تلفن ثابت</label>
                                                            <div class="col-md-8">
                                                                <input type="text"
                                                                       id="tel_personel"
                                                                       name="tel_personel"
                                                                       @if(!empty($customer_personal->tel_personel))
                                                                       value="{{$customer_personal->tel_personel}}"
                                                                       @endif
                                                                       required="required" class="form-control"
                                                                       placeholder="لطفا شماره تلفن ثابت را وارد کنید"
                                                                       data-error="Minimum 3 character required">
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group field ">
                                                            <label class="control-label main col-md-4">فکس</label>
                                                            <div class="col-md-8">
                                                                <input type="text"
                                                                       id="fax_personel"
                                                                       name="fax_personel"
                                                                       @if(!empty($customer_personal->fax_personel))
                                                                       value="{{$customer_personal->fax_personel}}"
                                                                       @endif
                                                                       required="required" class="form-control"
                                                                       placeholder="لطفا فکس را وارد کنید">
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                        </div>


                                                    </div>
                                                </div>

                                                <div class="col-md-6 form-group">
                                                    <div class="col-md-12">
                                                        <div class="form-group field ">
                                                            <label class="control-label main col-md-4">کد ملی</label>
                                                            <div class="col-md-8">
                                                                <input type="text"
                                                                       id="codemeli_personel"
                                                                       name="codemeli_personel"
                                                                       @if(!empty($customer_personal->codemeli_personel))
                                                                       value="{{$customer_personal->codemeli_personel}}"
                                                                       @endif
                                                                       required="required" class="form-control"
                                                                       placeholder="لطفا کد ملی را وارد کنید">
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group field ">
                                                            <label class="control-label main col-md-4">تلفن
                                                                همراه

                                                                <span
                                                                    style="color: red"
                                                                    class="required-mark">*</span>
                                                            </label>
                                                            <div class="col-md-8">
                                                                <input type="text"
                                                                       id="phone_personel"
                                                                       name="phone_personel"
                                                                       @if(!empty($customer_personal->phone_personel))
                                                                       value="{{$customer_personal->phone_personel}}"
                                                                       @endif
                                                                       required="required" class="form-control"
                                                                       placeholder="لطفا شماره تلفن همراه را وارد کنید"
                                                                       data-error="Minimum 3 character required">
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group field ">
                                                            <label class="control-label main col-md-4">ایمیل</label>
                                                            <div class="col-md-8">
                                                                <input type="text"
                                                                       id="email_personel"
                                                                       name="email_personel"
                                                                       @if(!empty($customer_personal->email_personel))
                                                                       value="{{$customer_personal->email_personel}}"
                                                                       @endif
                                                                       required="required" class="form-control"
                                                                       placeholder="لطفا ایمیل را وارد کنید"
                                                                       data-error="Minimum 3 character required">
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                        </div>


                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="form-group col-md-12">
                                                        <label class="control-label col-md-2">ادرس</label>
                                                        <div class="col-md-10">
                                                    <textarea name="adders_personel" id="adders_personel"
                                                              placeholder="لطفا ادرس را وارد کنید" class="form-control"
                                                              rows="2" cols="50">
 @if(!empty($customer_personal->adders_personel))
                                                            {!! $customer_personal->adders_personel !!}
                                                        @endif
                                                    </textarea>
                                                            <div class="help-block with-errors"></div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label class="control-label col-md-2">توضیحات</label>
                                                        <div class="col-md-10">
                                                   <textarea name="text_personel" id="text_personel"
                                                             placeholder="لطفا توضیحات را وارد کنید"
                                                             class="form-control" rows="2" cols="50">
 @if(!empty($customer_personal->email_personel))
                                                           {!! $customer_personal->text_personel !!}
                                                       @endif
                                                    </textarea>
                                                            <div class="help-block with-errors"></div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>


                                        </div>


                                        <div id="company" style="display: none">


                                            <div class="col-md-12">
                                                <div class="col-md-6 form-group">
                                                    <div class="col-md-12">
                                                        <div class="form-group field ">
                                                            <label class="control-label main col-md-4">کد
                                                                اقتصادی</label>
                                                            <div class="col-md-8">
                                                                <input type="text"
                                                                       id="code_company"
                                                                       name="code_company"
                                                                       @if(!empty($customer_company->code_company))

                                                                       value="{{$customer_company->code_company}}"
                                                                       @endif
                                                                       required="required" class="form-control"
                                                                       placeholder="لطفا کد اقتصادی را وارد کنید">
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group field ">
                                                            <label class="control-label main col-md-4">تلفن دفتر
                                                                مرکزی
                                                                <span
                                                                    style="color: red" class="required-mark">*</span>
                                                            </label>
                                                            <div class="col-md-8">
                                                                <input maxlength="100" minlength="3" type="text"
                                                                       id="tel_company"
                                                                       name="tel_company"
                                                                       @if(!empty($customer_company->tel_company))

                                                                       value="{{$customer_company->tel_company}}"
                                                                       @endif
                                                                       required="required" class="form-control"
                                                                       placeholder="لطفا شماره تلفن دفتر مرکزی را وارد کنید"
                                                                       data-error="Minimum 3 character required">
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group field ">
                                                            <label class="control-label main col-md-4">کد پستی</label>
                                                            <div class="col-md-8">
                                                                <input type="text"
                                                                       id="post_company"
                                                                       name="post_company"
                                                                       @if(!empty($customer_company->post_company))

                                                                       value="{{$customer_company->post_company}}"
                                                                       @endif
                                                                       required="required" class="form-control"
                                                                       placeholder="لطفا کد پستی وارد کنید"
                                                                       data-error="Minimum 3 character required">
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                        </div>


                                                    </div>
                                                </div>
                                                <div class="col-md-6 form-group">
                                                    <div class="col-md-12">
                                                        <div class="form-group field ">
                                                            <label class="control-label main col-md-4">سال تاسیس</label>
                                                            <div class="col-md-8">
                                                                <input type="text"
                                                                       id="Established_company"
                                                                       name="Established_company"
                                                                       @if(!empty($customer_company->Established_company))

                                                                       value="{{$customer_company->Established_company}}"
                                                                       @endif
                                                                       required="required" class="form-control example1"
                                                                       placeholder="لطفا سال تاسیس را وارد کنید">
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group field ">
                                                            <label class="control-label main col-md-4">فکس دفتر
                                                                مرکزی</label>
                                                            <div class="col-md-8">
                                                                <input type="text"
                                                                       id="fax_company"
                                                                       name="fax_company"
                                                                       @if(!empty($customer_company->fax_company))

                                                                       value="{{$customer_company->fax_company}}"
                                                                       @endif
                                                                       required="required" class="form-control"
                                                                       placeholder="لطفا فکس دفتر مرکزی را وارد کنید"
                                                                       data-error="Minimum 3 character required">
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                        </div>


                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group col-md-12">
                                                        <label class="control-label col-md-2">ادرس دفتر مرکزی</label>
                                                        <div class="col-md-10">
                                                <textarea name="adders_company" id="adders_company" class="form-control"
                                                          rows="2" cols="50"
                                                          placeholder="لطفا ادرس دفتر مرکزی را وارد کنید">
 @if(!empty($customer_company->adders_company))

                                                        {{$customer_company->adders_company}}
                                                    @endif
                                                 </textarea>
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
                                                                    @if(!empty($company_personal))

                                                                        @foreach($company_personal as $company_persona)
                                                                            <tr>
                                                                                <td><input name="side_company[]"
                                                                                           type="text"
                                                                                           value="{{$company_persona->side_company}}"
                                                                                           class="form-control"/></td>
                                                                                <td>
                                                                                    <select name="sex_company[]">
                                                                                        <option>انتخاب کنید</option>
                                                                                        <option value="1"
                                                                                                @if($company_persona->sex_company == 1)  selected @endif>
                                                                                            مرد
                                                                                        </option>
                                                                                        <option value="2"
                                                                                                @if($company_persona->sex_company == 2)  selected @endif>
                                                                                            زن
                                                                                        </option>
                                                                                    </select>
                                                                                </td>
                                                                                <td><input name="title_company[]"
                                                                                           type="text"
                                                                                           value="{{$company_persona->title_company}}"
                                                                                           class="form-control"/></td>
                                                                                <td><input name="name_company[]"
                                                                                           type="text"
                                                                                           value="{{$company_persona->name_company}}"
                                                                                           class="form-control"/></td>
                                                                                <td><input name="phone_company[]"
                                                                                           type="text"
                                                                                           value="{{$company_persona->phone_company}}"
                                                                                           class="form-control"/></td>
                                                                                <td><input name="inside_company[]"
                                                                                           type="text"
                                                                                           value="{{$company_persona->inside_company}}"
                                                                                           class="form-control"/></td>
                                                                                <td><input name="email_company[]"
                                                                                           type="text"
                                                                                           value="{{$company_persona->email_company}}"
                                                                                           class="form-control"/></td>
                                                                                <td><input name="tel_company_company[]"
                                                                                           type="text"
                                                                                           value="{{$company_persona->tel_company_company}}"
                                                                                           class="form-control"/></td>

                                                                                <td>
                                                                                    <button type="button"
                                                                                            class="btn btn-danger remove">
                                                                                        <i
                                                                                            class="fa fa-remove"></i>
                                                                                    </button>
                                                                                </td>
                                                                            </tr>
                                                                        @endforeach
                                                                    @endif
                                                                    </tbody>
                                                                    <tfoot>
                                                                    <tr>
                                                                        <th colspan="5">
                                                                            <button id="btnAdd" type="button"
                                                                                    class="btn btn-primary"
                                                                                    data-toggle="tooltip">
                                                                                <i class="fa fa-plus"></i>

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


                                    </div>
                                    <input type="submit" class="btn btn-primary" id="saveBtn" value="ثبت">

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
                if (type) {
                    $.ajax({
                        type: "GET",
                        url: "{{route('admin.customers.filter')}}?type=" + type,
                        success: function (res) {
                            if (res == 1) {
                                $('#company').show();
                                $('#personal').hide();
                                $('#codemeli_personel').val('');
                                $('#tel_personel').val('');
                                $('#date_personel').val('');
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
                        }
                    });
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
                    url: "{{ route('admin.customers.edit') }}",
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
                '<td><select name="sex_company[]"><option>انتخاب کنید</option><option value="1"> مرد</option><option  value="2"> زن</option></select></td>' +
                '<td><input name = "title_company[]" type="text" value = "' + value + '" class="form-control" /></td>' +
                '<td><input name = "name_company[]" type="text" value = "' + value + '" class="form-control" /></td>' +
                '<td><input name = "phone_company[]" type="text" value = "' + value + '" class="form-control" /></td>' +
                '<td><input name = "inside_company[]" type="text" value = "' + value + '" class="form-control" /></td>' +
                '<td><input name = "email_company[]" type="text" value = "' + value + '" class="form-control" /></td>' +
                '<td><input name = "tel_company_company[]" type="text" value = "' + value + '" class="form-control" /></td>' +
                '<td><button type="button" data-original-title="حذف پرسنل" class="btn btn-danger remove"><i class="fa fa-remove"></i></button></td>'
        }

    </script>
    <style>
        .vertical {
            border-left: 1px solid black;
            height: 470px;
            position:absolute;
            margin-top: 40px;
            left: 50%;
        }
    </style>

@endsection
