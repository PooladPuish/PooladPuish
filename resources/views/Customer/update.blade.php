@extends('layouts.master')
<script src="{{asset('/public/js/1.js')}}"></script>
<script src="{{asset('/public/assets/sweetalert.js')}}"></script>
<link href="{{asset('/public/css/1.css')}}" rel="stylesheet" id="bootstrap-css">
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
@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption">
                        ویرایش اطلاعات مشتری جدید
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

                        <form autocomplete="off" id="productForm"
                              name="productForm"
                              enctype="multipart/form-data"
                              method="post"
                        >
                            @csrf
                            <input type="hidden" name="id" id="id">

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
                                                           required="required" class="form-control"
                                                           placeholder="لطفا کد مشتری را وارد کنید"
                                                           value="{{$id->code}}"
                                                    >
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
                                                           required="required" class="form-control"
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
                                                    {{$id->description}}

                                                </textarea>


                                            </div>
                                        </div>

                                        <button class="btn btn-primary nextBtn pull-right" id="nextBtn" type="button">
                                            ادامه
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
                                                                            @if(!empty($customer_personal) and $customer_personal->sex == 1) selected @endif>
                                                                        مرد
                                                                    </option>
                                                                    <option value="2"
                                                                            @if(!empty($customer_personal) and $customer_personal->sex == 2) selected @endif>
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
                                                            {{$customer_personal->adders_personel}}
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
 @if(!empty($customer_personal->text_personel))
                                                           {{$customer_personal->text_personel}}
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
                                                <div class="nav-tabs-custom">
                                                    <ul class="nav nav-tabs">
                                                        <li class="active"><a href="#activity" data-toggle="tab">مشخصات
                                                                فردی</a></li>
                                                        <li><a href="#car" data-toggle="tab">مشخصات محل کار</a></li>
                                                        <li><a href="#bank" data-toggle="tab">وضعیت بانکی و اعتباری</a>
                                                        </li>
                                                        <li><a href="#tamin" data-toggle="tab">اسامی تامیین کنندگان</a>
                                                        </li>
                                                        <li><a href="#madark" data-toggle="tab">مدارک</a></li>
                                                        <li><a href="#psh" data-toggle="tab">مشخصات پرسنل شرکت ها</a>
                                                        </li>
                                                    </ul>
                                                    <div class="tab-content">
                                                        <div class="active tab-pane" id="activity">
                                                            <div class="col-md-12">
                                                                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                                                <div class="portlet box blue">
                                                                    <div class="portlet-title">
                                                                        <div class="caption">
                                                                            مشخصات فردی
                                                                        </div>
                                                                    </div>
                                                                    <div class="portlet-body">
                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <div class="col-md-4 form-group">
                                                                                    <div class="col-md-12">
                                                                                        <div class="form-group ">
                                                                                            <label
                                                                                                class="control-label col-md-6">کد
                                                                                                اقتصادی</label>
                                                                                            <div class="col-md-6">
                                                                                                <input type="text"
                                                                                                       id="code_company"
                                                                                                       name="code_company"
                                                                                                       @if(!empty($customer_company->code_company))
                                                                                                       value="{{$customer_company->code_company}}"
                                                                                                       @endif
                                                                                                       class="form-control">
                                                                                                <div
                                                                                                    class="help-block with-errors"></div>
                                                                                            </div>
                                                                                        </div>

                                                                                        <div class="form-group">
                                                                                            <label
                                                                                                class="control-label col-md-6">تلفن
                                                                                                دفتر
                                                                                                مرکزی
                                                                                                <span
                                                                                                    style="color: red"
                                                                                                    class="required-mark">*</span>
                                                                                            </label>
                                                                                            <div class="col-md-6">
                                                                                                <input maxlength="100"
                                                                                                       minlength="3"
                                                                                                       type="text"
                                                                                                       id="tel_company"
                                                                                                       name="tel_company"
                                                                                                       @if(!empty($customer_company->tel_company))
                                                                                                       value="{{$customer_company->tel_company}}"
                                                                                                       @endif
                                                                                                       class="form-control"
                                                                                                       data-error="Minimum 3 character required">
                                                                                                <div
                                                                                                    class="help-block with-errors"></div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <label
                                                                                                class="control-label col-md-6">کد
                                                                                                پستی</label>
                                                                                            <div class="col-md-6">
                                                                                                <input type="text"
                                                                                                       id="post_company"
                                                                                                       name="post_company"
                                                                                                       @if(!empty($customer_company->post_company))
                                                                                                       value="{{$customer_company->post_company}}"
                                                                                                       @endif
                                                                                                       class="form-control"
                                                                                                       data-error="Minimum 3 character required">
                                                                                                <div
                                                                                                    class="help-block with-errors"></div>
                                                                                            </div>
                                                                                        </div>


                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-md-4 form-group">
                                                                                    <div class="col-md-12">
                                                                                        <div class="form-group">
                                                                                            <label
                                                                                                class="control-label col-md-6">سال
                                                                                                تاسیس</label>
                                                                                            <div class="col-md-6">
                                                                                                <input type="text"
                                                                                                       id="Established_company"
                                                                                                       name="Established_company"
                                                                                                       @if(!empty($customer_company->Established_company))
                                                                                                       value="{{$customer_company->Established_company}}"
                                                                                                       @endif
                                                                                                       class="form-control"
                                                                                                >
                                                                                                <div
                                                                                                    class="help-block with-errors"></div>
                                                                                            </div>
                                                                                        </div>

                                                                                        <div class="form-group">
                                                                                            <label
                                                                                                class="control-label col-md-6">فکس
                                                                                                دفتر
                                                                                                مرکزی</label>
                                                                                            <div class="col-md-6">
                                                                                                <input type="text"
                                                                                                       id="fax_company"
                                                                                                       name="fax_company"
                                                                                                       @if(!empty($customer_company->fax_company))
                                                                                                       value="{{$customer_company->fax_company}}"
                                                                                                       @endif
                                                                                                       class="form-control"
                                                                                                       data-error="Minimum 3 character required">
                                                                                                <div
                                                                                                    class="help-block with-errors"></div>
                                                                                            </div>
                                                                                        </div>

                                                                                        <div class="form-group">
                                                                                            <label
                                                                                                class="control-label col-md-6">
                                                                                                تلفن همراه
                                                                                            </label>
                                                                                            <div class="col-md-6">
                                                                                                <input type="text"
                                                                                                       id="phone_company"
                                                                                                       name="phone_company"
                                                                                                       class="form-control"
                                                                                                       @if(!empty($customer_company->phone_company))
                                                                                                       value="{{$customer_company->phone_company}}"
                                                                                                       @endif
                                                                                                       data-error="Minimum 3 character required">
                                                                                                <div
                                                                                                    class="help-block with-errors"></div>
                                                                                            </div>
                                                                                        </div>


                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-md-4 form-group">
                                                                                    <div class="col-md-12">
                                                                                        <div class="form-group">
                                                                                            <label
                                                                                                class="control-label col-md-6">
                                                                                                تاریخ تولد
                                                                                            </label>
                                                                                            <div class="col-md-6">
                                                                                                <input type="text"
                                                                                                       id="date_birth"
                                                                                                       @if(!empty($customer_company->date_birth))
                                                                                                       value="{{$customer_company->date_birth}}"
                                                                                                       @endif
                                                                                                       name="date_birth"
                                                                                                       class="form-control"
                                                                                                >
                                                                                                <div
                                                                                                    class="help-block with-errors"></div>
                                                                                            </div>
                                                                                        </div>

                                                                                        <div class="form-group">
                                                                                            <label
                                                                                                class="control-label col-md-6">
                                                                                                ایمیل
                                                                                            </label>
                                                                                            <div class="col-md-6">
                                                                                                <input type="text"
                                                                                                       id="email_company"
                                                                                                       name="email_company"
                                                                                                       @if(!empty($customer_company->email_company))
                                                                                                       value="{{$customer_company->email_company}}"
                                                                                                       @endif
                                                                                                       class="form-control"
                                                                                                       data-error="Minimum 3 character required">
                                                                                                <div
                                                                                                    class="help-block with-errors"></div>
                                                                                            </div>
                                                                                        </div>

                                                                                        <div class="form-group">
                                                                                            <label
                                                                                                class="control-label col-md-6">
                                                                                                کد ملی
                                                                                            </label>
                                                                                            <div class="col-md-6">
                                                                                                <input type="text"
                                                                                                       id="national_company"
                                                                                                       name="national_company"
                                                                                                       @if(!empty($customer_company->national_company))
                                                                                                       value="{{$customer_company->national_company}}"
                                                                                                       @endif
                                                                                                       class="form-control"
                                                                                                       data-error="Minimum 3 character required">
                                                                                                <div
                                                                                                    class="help-block with-errors"></div>
                                                                                            </div>
                                                                                        </div>


                                                                                    </div>
                                                                                </div>


                                                                                <div class="col-md-12 form-group">
                                                                                    <div class="form-group col-md-12">
                                                                                        <label
                                                                                            class="control-label col-md-2">ادرس
                                                                                            دفتر
                                                                                            مرکزی</label>
                                                                                        <div class="col-md-10">
                                                <textarea name="adders_company" id="adders_company" class="form-control"
                                                          rows="2" cols="50"
                                                          placeholder="لطفا ادرس دفتر مرکزی را وارد کنید">
                                                    @if(!empty($customer_company->adders_company))
                                                        {{$customer_company->adders_company}}
                                                    @endif
                                                 </textarea>
                                                                                            <div
                                                                                                class="help-block with-errors"></div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-md-12 form-group">
                                                                                    <div class="form-group col-md-12">
                                                                                        <label
                                                                                            class="control-label col-md-2">
                                                                                            ادرس منزل
                                                                                        </label>
                                                                                        <div class="col-md-10">
                                                <textarea name="adders_home" id="adders_home" class="form-control"
                                                          rows="2" cols="50"
                                                          placeholder="لطفا ادرس منزل را وارد کنید">
                                                    @if(!empty($customer_company->home))
                                                        {{$customer_company->home}}
                                                    @endif
                                                 </textarea>
                                                                                            <div
                                                                                                class="help-block with-errors"></div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="tab-pane" id="car">
                                                            <div class="col-md-12">
                                                                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                                                <div class="portlet box blue">
                                                                    <div class="portlet-title">
                                                                        <div class="caption">
                                                                            مشخصات محل کار
                                                                        </div>
                                                                    </div>
                                                                    <div class="portlet-body">
                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <div class="col-md-4 form-group">
                                                                                    <div class="col-md-12">
                                                                                        <div class="form-group">
                                                                                            <label
                                                                                                class="control-label col-md-6">
                                                                                                نام فروشگاه/پخش
                                                                                            </label>
                                                                                            <div class="col-md-6">
                                                                                                <input type="text"
                                                                                                       id="name_work_company"
                                                                                                       name="name_work_company"
                                                                                                       @if(!empty($customer_work->name_work_company))
                                                                                                       value="{{$customer_work->name_work_company}}"
                                                                                                       @endif
                                                                                                       class="form-control">
                                                                                                <div
                                                                                                    class="help-block with-errors"></div>
                                                                                            </div>
                                                                                        </div>

                                                                                        <div class="form-group">
                                                                                            <label
                                                                                                class="control-label col-md-6">
                                                                                                سال تاسیس
                                                                                                <span
                                                                                                    style="color: red"
                                                                                                    class="required-mark">*</span>
                                                                                            </label>
                                                                                            <div class="col-md-6">
                                                                                                <input maxlength="100"
                                                                                                       minlength="3"
                                                                                                       type="text"
                                                                                                       id="date_work_company"
                                                                                                       name="date_work_company"
                                                                                                       @if(!empty($customer_work->date_work_company))
                                                                                                       value="{{$customer_work->date_work_company}}"
                                                                                                       @endif
                                                                                                       class="form-control"
                                                                                                       data-error="Minimum 3 character required">
                                                                                                <div
                                                                                                    class="help-block with-errors"></div>
                                                                                            </div>
                                                                                        </div>

                                                                                        <div class="form-group">
                                                                                            <label
                                                                                                class="control-label col-md-6">
                                                                                                تلفن
                                                                                            </label>
                                                                                            <div class="col-md-6">
                                                                                                <input type="text"
                                                                                                       id="tel_work_company"
                                                                                                       name="tel_work_company"
                                                                                                       @if(!empty($customer_work->tel_work_company))
                                                                                                       value="{{$customer_work->tel_work_company}}"
                                                                                                       @endif
                                                                                                       class="form-control"
                                                                                                       data-error="Minimum 3 character required">
                                                                                                <div
                                                                                                    class="help-block with-errors"></div>
                                                                                            </div>
                                                                                        </div>

                                                                                        <div class="form-group">
                                                                                            <label
                                                                                                class="control-label col-md-6">
                                                                                                فکس
                                                                                            </label>
                                                                                            <div class="col-md-6">
                                                                                                <input type="text"
                                                                                                       id="fax_work_company"
                                                                                                       name="fax_work_company"
                                                                                                       @if(!empty($customer_work->fax_work_company))
                                                                                                       value="{{$customer_work->fax_work_company}}"
                                                                                                       @endif
                                                                                                       class="form-control"
                                                                                                       data-error="Minimum 3 character required">
                                                                                                <div
                                                                                                    class="help-block with-errors"></div>
                                                                                            </div>
                                                                                        </div>

                                                                                        <div class="form-group">
                                                                                            <label
                                                                                                class="control-label col-md-6">
                                                                                                تابلو فروشگاه
                                                                                            </label>
                                                                                            <div class="col-md-6">
                                                                                                <select
                                                                                                    name="panel_work_company"
                                                                                                    id="panel_work_company"
                                                                                                    class="form-control">
                                                                                                    <option value="1"
                                                                                                            @if(!empty($customer_work->panel_work_company) and $customer_work->panel_work_company == 1)
                                                                                                            selected
                                                                                                        @endif
                                                                                                    >
                                                                                                        دارد
                                                                                                    </option>
                                                                                                    <option value="2"
                                                                                                            @if(!empty($customer_work->panel_work_company) and
                                                                                                            $customer_work-> panel_work_company== 2)


                                                                                                            selected
                                                                                                        @endif
                                                                                                    >
                                                                                                        ندارد
                                                                                                    </option>
                                                                                                </select>

                                                                                                <div
                                                                                                    class="help-block with-errors"></div>
                                                                                            </div>
                                                                                        </div>

                                                                                        <div class="form-group">
                                                                                            <label
                                                                                                class="control-label col-md-6">
                                                                                                ابعاد تابلو فروشگاه
                                                                                            </label>
                                                                                            <div class="col-md-6">
                                                                                                <input type="text"
                                                                                                       id="dimensions_work_company"
                                                                                                       name="dimensions_work_company"
                                                                                                       @if(!empty($customer_work->dimensions_work_company))
                                                                                                       value="{{$customer_work->dimensions_work_company}}"
                                                                                                       @endif
                                                                                                       class="form-control"
                                                                                                >
                                                                                                <div
                                                                                                    class="help-block with-errors"></div>
                                                                                            </div>
                                                                                        </div>

                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-md-4 form-group">
                                                                                    <div class="col-md-12">
                                                                                        <div class="form-group">
                                                                                            <label
                                                                                                class="control-label col-md-6">
                                                                                                کد پستی
                                                                                            </label>
                                                                                            <div class="col-md-6">
                                                                                                <input type="text"
                                                                                                       id="post_work_company"
                                                                                                       name="post_work_company"
                                                                                                       @if(!empty($customer_work->post_work_company))
                                                                                                       value="{{$customer_work->post_work_company}}"
                                                                                                       @endif
                                                                                                       class="form-control"
                                                                                                >
                                                                                                <div
                                                                                                    class="help-block with-errors"></div>
                                                                                            </div>
                                                                                        </div>

                                                                                        <div class="form-group">
                                                                                            <label
                                                                                                class="control-label col-md-6">
                                                                                                نوع فعالیت
                                                                                            </label>
                                                                                            <div class="col-md-6">
                                                                                                <select
                                                                                                    name="type_work_company"
                                                                                                    id="type_work_company"
                                                                                                    class="form-control">
                                                                                                    <option value="1"
                                                                                                            @if(!empty($customer_work->type_work_company) and $customer_work->type_work_company == 1)
                                                                                                            selected
                                                                                                        @endif
                                                                                                    >
                                                                                                        خرده فروش
                                                                                                    </option>
                                                                                                    <option value="2"
                                                                                                            @if(!empty($customer_work->type_work_company) and $customer_work->type_work_company == 2)
                                                                                                            selected
                                                                                                        @endif
                                                                                                    >
                                                                                                        عمده فروش
                                                                                                    </option>
                                                                                                    <option value="3"
                                                                                                            @if(!empty($customer_work->type_work_company) and $customer_work->type_work_company == 3)
                                                                                                            selected
                                                                                                        @endif
                                                                                                    >
                                                                                                        واسطه
                                                                                                    </option>
                                                                                                </select>

                                                                                                <div
                                                                                                    class="help-block with-errors"></div>
                                                                                            </div>
                                                                                        </div>

                                                                                        <div class="form-group">
                                                                                            <label
                                                                                                class="control-label col-md-6">
                                                                                                وضعیت فروشگاه
                                                                                            </label>
                                                                                            <div class="col-md-6">
                                                                                                <select
                                                                                                    name="status_work_company"
                                                                                                    id="status_work_company"
                                                                                                    class="form-control">
                                                                                                    <option value="1"
                                                                                                            @if(!empty($customer_work->status_work_company) and $customer_work->status_work_company == 1)
                                                                                                            selected
                                                                                                        @endif
                                                                                                    >
                                                                                                        مالک
                                                                                                    </option>
                                                                                                    <option value="2"
                                                                                                            @if(!empty($customer_work->status_work_company) and $customer_work->status_work_company == 2)
                                                                                                            selected
                                                                                                        @endif
                                                                                                    >
                                                                                                        استیجاری
                                                                                                    </option>
                                                                                                    <option value="3"
                                                                                                            @if(!empty($customer_work->status_work_company) and $customer_work->status_work_company == 3)
                                                                                                            selected
                                                                                                        @endif
                                                                                                    >
                                                                                                        سرقفلی
                                                                                                    </option>
                                                                                                </select>

                                                                                                <div
                                                                                                    class="help-block with-errors"></div>
                                                                                            </div>
                                                                                        </div>

                                                                                        <div class="form-group">
                                                                                            <label
                                                                                                class="control-label col-md-6">
                                                                                                تلفن انبار
                                                                                            </label>
                                                                                            <div class="col-md-6">
                                                                                                <input type="text"
                                                                                                       id="telstore_work_company"
                                                                                                       name="telstore_work_company"
                                                                                                       @if(!empty($customer_work->telstore_work_company))
                                                                                                       value="{{$customer_work->telstore_work_company}}"
                                                                                                       @endif
                                                                                                       class="form-control"
                                                                                                >
                                                                                                <div
                                                                                                    class="help-block with-errors"></div>
                                                                                            </div>
                                                                                        </div>

                                                                                        <div class="form-group">
                                                                                            <label
                                                                                                class="control-label col-md-6">
                                                                                                نوع مالکیت
                                                                                            </label>
                                                                                            <div class="col-md-6">
                                                                                                <select
                                                                                                    name="owner_work_company"
                                                                                                    id="owner_work_company"
                                                                                                    class="form-control">
                                                                                                    <option value="1"
                                                                                                            @if(!empty($customer_work->owner_work_company) and $customer_work->owner_work_company == 1)
                                                                                                            selected
                                                                                                        @endif
                                                                                                    >
                                                                                                        مالک
                                                                                                    </option>
                                                                                                    <option value="2"
                                                                                                            @if(!empty($customer_work->owner_work_company) and $customer_work->owner_work_company == 2)
                                                                                                            selected
                                                                                                        @endif
                                                                                                    >
                                                                                                        استیجاری
                                                                                                    </option>
                                                                                                    <option value="3"
                                                                                                            @if(!empty($customer_work->owner_work_company) and $customer_work->owner_work_company == 3)
                                                                                                            selected
                                                                                                        @endif
                                                                                                    >
                                                                                                        سرقفلی
                                                                                                    </option>
                                                                                                </select>

                                                                                                <div
                                                                                                    class="help-block with-errors"></div>
                                                                                            </div>
                                                                                        </div>

                                                                                        <div class="form-group">
                                                                                            <label
                                                                                                class="control-label col-md-6">
                                                                                                مربوط به شرکت
                                                                                            </label>
                                                                                            <div class="col-md-6">
                                                                                                <input type="text"
                                                                                                       id="dec_work_company"
                                                                                                       name="dec_work_company"
                                                                                                       @if(!empty($customer_work->dec_work_company))
                                                                                                       value="{{$customer_work->dec_work_company}}"
                                                                                                       @endif
                                                                                                       class="form-control"
                                                                                                >
                                                                                                <div
                                                                                                    class="help-block with-errors"></div>
                                                                                            </div>
                                                                                        </div>

                                                                                    </div>
                                                                                </div>


                                                                                <div class="col-md-4 form-group">
                                                                                    <div class="col-md-12">

                                                                                        <div class="form-group">
                                                                                            <label
                                                                                                class="control-label col-md-6">
                                                                                                جواز کسب
                                                                                            </label>
                                                                                            <div class="col-md-6">
                                                                                                <select
                                                                                                    name="license_work_company"
                                                                                                    id="license_work_company"
                                                                                                    class="form-control">
                                                                                                    <option value="1"
                                                                                                            @if(!empty($customer_work->license_work_company) and $customer_work->license_work_company == 1)
                                                                                                            selected
                                                                                                        @endif
                                                                                                    >
                                                                                                        دارد
                                                                                                    </option>
                                                                                                    <option value="2"
                                                                                                            @if(!empty($customer_work->license_work_company) and $customer_work->license_work_company == 2)
                                                                                                            selected
                                                                                                        @endif
                                                                                                    >
                                                                                                        ندارد
                                                                                                    </option>
                                                                                                </select>

                                                                                                <div
                                                                                                    class="help-block with-errors"></div>
                                                                                            </div>
                                                                                        </div>

                                                                                        <div class="form-group">
                                                                                            <label
                                                                                                class="control-label col-md-6">
                                                                                                شماره جواز کسب
                                                                                            </label>
                                                                                            <div class="col-md-6">
                                                                                                <input type="text"
                                                                                                       id="numlicense_work_company"
                                                                                                       name="numlicense_work_company"
                                                                                                       @if(!empty($customer_work->numlicense_work_company))
                                                                                                       value="{{$customer_work->numlicense_work_company}}"
                                                                                                       @endif
                                                                                                       class="form-control"
                                                                                                >
                                                                                                <div
                                                                                                    class="help-block with-errors"></div>
                                                                                            </div>
                                                                                        </div>

                                                                                        <div class="form-group">
                                                                                            <label
                                                                                                class="control-label col-md-6">
                                                                                                اعتبار جواز کسب
                                                                                            </label>
                                                                                            <div class="col-md-6">
                                                                                                <input type="text"
                                                                                                       id="credibilitylicense_work_company"
                                                                                                       name="credibilitylicense_work_company"
                                                                                                       @if(!empty($customer_work->credibilitylicense_work_company))
                                                                                                       value="{{$customer_work->credibilitylicense_work_company}}"
                                                                                                       @endif
                                                                                                       class="form-control"
                                                                                                >
                                                                                                <div
                                                                                                    class="help-block with-errors"></div>
                                                                                            </div>
                                                                                        </div>

                                                                                        <div class="form-group">
                                                                                            <label
                                                                                                class="control-label col-md-6">
                                                                                                انبار
                                                                                            </label>
                                                                                            <div class="col-md-6">
                                                                                                <select
                                                                                                    name="store_work_company"
                                                                                                    id="store_work_company"
                                                                                                    class="form-control">
                                                                                                    <option value="1"
                                                                                                            @if(!empty($customer_work->store_work_company) and $customer_work->store_work_company == 1)
                                                                                                            selected
                                                                                                        @endif
                                                                                                    >
                                                                                                        دارد
                                                                                                    </option>
                                                                                                    <option value="2"

                                                                                                            @if(!empty($customer_work->store_work_company) and $customer_work->store_work_company == 2)
                                                                                                            selected
                                                                                                        @endif
                                                                                                    >
                                                                                                        ندارد
                                                                                                    </option>
                                                                                                </select>

                                                                                                <div
                                                                                                    class="help-block with-errors"></div>
                                                                                            </div>
                                                                                        </div>

                                                                                        <div class="form-group">
                                                                                            <label
                                                                                                class="control-label col-md-6">
                                                                                                ابعاد انبار
                                                                                            </label>
                                                                                            <div class="col-md-6">
                                                                                                <input type="text"
                                                                                                       id="dimensionsstore_work_company"
                                                                                                       name="dimensionsstore_work_company"
                                                                                                       @if(!empty($customer_work->dimensionsstore_work_company))
                                                                                                       value="{{$customer_work->dimensionsstore_work_company}}"
                                                                                                       @endif
                                                                                                       class="form-control"
                                                                                                >
                                                                                                <div
                                                                                                    class="help-block with-errors"></div>
                                                                                            </div>
                                                                                        </div>

                                                                                    </div>
                                                                                </div>


                                                                                <div class="col-md-12 form-group">
                                                                                    <div class="form-group col-md-12">
                                                                                        <label
                                                                                            class="control-label col-md-2">
                                                                                            ادرس محل فعالیت
                                                                                        </label>
                                                                                        <div class="col-md-10">
                                                <textarea name="activity_work_company" id="activity_work_company"
                                                          class="form-control"
                                                          rows="2" cols="50"
                                                          placeholder="لطفا ادرس محل فعالیت را وارد کنید">
                                                    @if(!empty($customer_work->activity_work_company))
                                                        {{$customer_work->activity_work_company}}
                                                    @endif
                                                 </textarea>
                                                                                            <div
                                                                                                class="help-block with-errors"></div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-md-12 form-group">
                                                                                    <div class="form-group col-md-12">
                                                                                        <label
                                                                                            class="control-label col-md-2">
                                                                                            سایر فعالیت ها
                                                                                        </label>
                                                                                        <div class="col-md-10">
                                                <textarea name="oactivity_work_company" id="oactivity_work_company"
                                                          class="form-control"
                                                          rows="2" cols="50"
                                                          placeholder="لطفا سایر فعالیت ها را وارد کنید">
                                                    @if(!empty($customer_work->oactivity_work_company))
                                                        {{$customer_work->oactivity_work_company}}
                                                    @endif
                                                 </textarea>
                                                                                            <div
                                                                                                class="help-block with-errors"></div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-md-12 form-group">
                                                                                    <div class="form-group col-md-12">
                                                                                        <label
                                                                                            class="control-label col-md-2">
                                                                                            ادرس انبار
                                                                                        </label>
                                                                                        <div class="col-md-10">
                                                <textarea name="addersstore_work_company" id="addersstore_work_company"
                                                          class="form-control"
                                                          rows="2" cols="50"
                                                          placeholder="لطفا ادرس انبار را وارد کنید">
                                                    @if(!empty($customer_work->addersstore_work_company))
                                                        {{$customer_work->addersstore_work_company}}
                                                    @endif
                                                 </textarea>
                                                                                            <div
                                                                                                class="help-block with-errors"></div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="tab-pane" id="bank">
                                                            <div class="col-md-12">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                                                        <div class="portlet box blue">
                                                                            <div class="portlet-title">
                                                                                <div class="caption">
                                                                                    وضعیت بانکی و اعتباری
                                                                                </div>
                                                                            </div>
                                                                            <div class="portlet-body">
                                                                                <div class="table table-responsive">
                                                                                    <table
                                                                                        class="table table-responsive table-striped table-bordered">
                                                                                        <thead>
                                                                                        <tr>
                                                                                            <td>نام بانک</td>
                                                                                            <td>شعبه</td>
                                                                                            <td>شماره حساب جاری</td>
                                                                                            <td>تاریخ افتتاح حساب</td>
                                                                                            <td>عملیات</td>
                                                                                        </tr>
                                                                                        </thead>

                                                                                                <tbody
                                                                                                    id="TextBoxContainerbank">
                                                                                                @if(!empty($customer_banks))
                                                                                                @foreach($customer_banks as $customer_bank)

                                                                                                <tr>

                                                                                                <td><input
                                                                                                        name="name_bank_company[]"
                                                                                                        type="text"
                                                                                                        value="{{$customer_bank->name_bank_company}}"
                                                                                                        class="form-control"/>
                                                                                                </td>
                                                                                                <td><input
                                                                                                        name="branch_bank_company[]"
                                                                                                        type="text"
                                                                                                        value="{{$customer_bank->branch_bank_company}}"
                                                                                                        class="form-control"/>
                                                                                                </td>
                                                                                                <td><input
                                                                                                        name="account_bank_company[]"
                                                                                                        type="text"
                                                                                                        value="{{$customer_bank->account_bank_company}}"
                                                                                                        class="form-control"/>
                                                                                                </td>
                                                                                                <td><input
                                                                                                        name="date_bank_company[]"
                                                                                                        type="text"
                                                                                                        value="{{$customer_bank->date_bank_company}}"
                                                                                                        class="form-control"/>
                                                                                                </td>
                                                                                                <td>
                                                                                                    <button
                                                                                                        type="button"
                                                                                                        data-original-title="حذف پرسنل"
                                                                                                        class="btn btn-danger remove">
                                                                                                        <i class="fa fa-remove"></i>
                                                                                                    </button>
                                                                                                </td>
                                                                                                </tr>

                                                                                                @endforeach
                                                                                                @endif
                                                                                                </tbody>

                                                                                        <tfoot>
                                                                                        <tr>
                                                                                            <th colspan="5">
                                                                                                <button id="btnAddbank"
                                                                                                        type="button"
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

                                                        <div class="tab-pane" id="tamin">
                                                            <div class="col-md-12">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                                                        <div class="portlet box blue">
                                                                            <div class="portlet-title">
                                                                                <div class="caption">
                                                                                    اسامی تامیین کنندگان
                                                                                </div>
                                                                            </div>
                                                                            <div class="portlet-body">
                                                                                <div class="table table-responsive">
                                                                                    <table
                                                                                        class="table table-responsive table-striped table-bordered">
                                                                                        <thead>
                                                                                        <tr>
                                                                                            <td>نام شرکت/شخص</td>
                                                                                            <td>تاریخ شروع همکاری</td>
                                                                                            <td>عملیات</td>
                                                                                        </tr>
                                                                                        </thead>

                                                                                                <tbody
                                                                                                    id="TextBoxContainertamin">
                                                                                                @if(!empty($customer_securings))
                                                                                                @foreach($customer_securings as $customer_securing)

                                                                                                        <tr>



                                                                                                <td><input
                                                                                                        name="name_securing_company[]"
                                                                                                        type="text"
                                                                                                        value="{{$customer_securing->name_securing_company}}"
                                                                                                        class="form-control"/>
                                                                                                </td>
                                                                                                <td><input
                                                                                                        name="date_securing_company[]"
                                                                                                        type="text"
                                                                                                        value="{{$customer_securing->date_securing_company}}"
                                                                                                        class="form-control"/>
                                                                                                </td>
                                                                                                <td>
                                                                                                    <button
                                                                                                        type="button"
                                                                                                        data-original-title="حذف"
                                                                                                        class="btn btn-danger remove">
                                                                                                        <i class="fa fa-remove"></i>
                                                                                                    </button>
                                                                                                </td>
                                                                                                        </tr>

                                                                                                @endforeach
                                                                                                @endif
                                                                                                </tbody>


                                                                                        <tfoot>
                                                                                        <tr>
                                                                                            <th colspan="5">
                                                                                                <button id="btnAddtamin"
                                                                                                        type="button"
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

                                                        <div class="tab-pane" id="madark">
                                                            <div class="col-md-12">
                                                                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                                                <div class="portlet box blue">
                                                                    <div class="portlet-title">
                                                                        <div class="caption">
                                                                            مدارک
                                                                        </div>
                                                                    </div>
                                                                    <div class="portlet-body">
                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <div class="col-md-4 form-group">
                                                                                    <div class="col-md-12">
                                                                                        <div class="form-group">
                                                                                            <label
                                                                                                class="control-label">
                                                                                                شناسنامه
                                                                                            </label>
                                                                                            <div class="col-md-12">
                                                                                                <input type="file"
                                                                                                       id="certificate_documents_company"
                                                                                                       name="certificate_documents_company"
                                                                                                       class="form-control">
                                                                                                <div
                                                                                                    class="help-block with-errors"></div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="form-group ">
                                                                                            <label
                                                                                                class="control-label">
                                                                                                کارت ملی
                                                                                            </label>
                                                                                            <div class="col-md-12">
                                                                                                <input type="file"
                                                                                                       id="cart_documents_company"
                                                                                                       name="cart_documents_company"
                                                                                                       class="form-control">
                                                                                                <div
                                                                                                    class="help-block with-errors"></div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="form-group ">
                                                                                            <label
                                                                                                class="control-label">
                                                                                                محل فعالیت
                                                                                            </label>
                                                                                            <div class="col-md-12">
                                                                                                <input type="file"
                                                                                                       id="activity_documents_company"
                                                                                                       name="activity_documents_company"
                                                                                                       class="form-control">
                                                                                                <div
                                                                                                    class="help-block with-errors"></div>
                                                                                            </div>
                                                                                        </div>

                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-md-4 form-group">
                                                                                    <div class="col-md-12">
                                                                                        <div class="form-group ">
                                                                                            <label
                                                                                                class="control-label">
                                                                                                مالکیت فروشگاه
                                                                                            </label>
                                                                                            <div class="col-md-12">
                                                                                                <input type="file"
                                                                                                       id="store_documents_company"
                                                                                                       name="store_documents_company"
                                                                                                       class="form-control">
                                                                                                <div
                                                                                                    class="help-block with-errors"></div>
                                                                                            </div>
                                                                                        </div>

                                                                                        <div class="form-group ">
                                                                                            <label
                                                                                                class="control-label">
                                                                                                مالکیت انبار
                                                                                            </label>
                                                                                            <div class="col-md-12">
                                                                                                <input type="file"
                                                                                                       id="ownership_documents_company"
                                                                                                       name="ownership_documents_company"
                                                                                                       class="form-control">
                                                                                                <div
                                                                                                    class="help-block with-errors"></div>
                                                                                            </div>
                                                                                        </div>

                                                                                        <div class="form-group ">
                                                                                            <label
                                                                                                class="control-label">
                                                                                                تاسیس و بهره برداری
                                                                                            </label>
                                                                                            <div class="col-md-12">
                                                                                                <input type="file"
                                                                                                       id="established_documents_company"
                                                                                                       name="established_documents_company"
                                                                                                       class="form-control">
                                                                                                <div
                                                                                                    class="help-block with-errors"></div>
                                                                                            </div>
                                                                                        </div>


                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-md-4 form-group">
                                                                                    <div class="col-md-12">
                                                                                        <div class="form-group ">
                                                                                            <label
                                                                                                class="control-label">
                                                                                                عکس فروشگاه
                                                                                            </label>
                                                                                            <div class="col-md-12">
                                                                                                <input type="file"
                                                                                                       id="sstore_documents_company"
                                                                                                       name="sstore_documents_company"
                                                                                                       class="form-control">
                                                                                                <div
                                                                                                    class="help-block with-errors"></div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="form-group ">
                                                                                            <label
                                                                                                class="control-label">
                                                                                                عکس انبار
                                                                                            </label>
                                                                                            <div class="col-md-12">
                                                                                                <input type="file"
                                                                                                       id="pstore_documents_company"
                                                                                                       name="pstore_documents_company"
                                                                                                       class="form-control">
                                                                                                <div
                                                                                                    class="help-block with-errors"></div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="form-group ">
                                                                                            <label
                                                                                                class="control-label">
                                                                                                نتیجه استعلام حسابهای
                                                                                                بانکی
                                                                                            </label>
                                                                                            <div class="col-md-12">
                                                                                                <input type="file"
                                                                                                       id="final_documents_company"
                                                                                                       name="final_documents_company"
                                                                                                       class="form-control">
                                                                                                <div
                                                                                                    class="help-block with-errors"></div>
                                                                                            </div>
                                                                                        </div>


                                                                                    </div>
                                                                                </div>


                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="tab-pane" id="psh">
                                                            <div class="col-md-12">
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
                                                                                            <th>سمت</th>
                                                                                            <th>جنسیت</th>
                                                                                            <th>عنوان</th>
                                                                                            <th>نام</th>
                                                                                            <th>تلفن</th>
                                                                                            <th>داخلی</th>
                                                                                            <th>تلفن همراه</th>
                                                                                            <th>ایمیل</th>
                                                                                            <th>عملیات</th>
                                                                                        </tr>
                                                                                        </thead>

                                                                                                <tbody
                                                                                                    id="TextBoxContainer">
                                                                                                @if(!empty($company_personals))
                                                                                                @foreach($company_personals as $company_personal)

                                                                                                <tr>


                                                                                                <td><input
                                                                                                        name="per_side_company[]"
                                                                                                        type="text"
                                                                                                        value="{{$company_personal->per_side_company}}"
                                                                                                        class="form-control"/>
                                                                                                </td>
                                                                                                <td><select
                                                                                                        name="per_sex_company[]"
                                                                                                        class="form-control">
                                                                                                        <option>انتخاب
                                                                                                            کنید
                                                                                                        </option>
                                                                                                        <option
                                                                                                            value="1"
                                                                                                            @if($company_personal->per_sex_company == 1)
                                                                                                            selected
                                                                                                            @endif
                                                                                                        >
                                                                                                            مرد
                                                                                                        </option>
                                                                                                        <option
                                                                                                            value="2"
                                                                                                            @if($company_personal->per_sex_company == 2)
                                                                                                            selected
                                                                                                            @endif
                                                                                                        >
                                                                                                            زن
                                                                                                        </option>
                                                                                                    </select></td>
                                                                                                <td><input
                                                                                                        name="per_title_company[]"
                                                                                                        type="text"
                                                                                                        value="{{$company_personal->per_title_company}}"
                                                                                                        class="form-control"/>
                                                                                                </td>
                                                                                                <td><input
                                                                                                        name="per_name_company[]"
                                                                                                        type="text"
                                                                                                        value="{{$company_personal->per_name_company}}"
                                                                                                        class="form-control"/>
                                                                                                </td>
                                                                                                <td><input
                                                                                                        name="per_phone_company[]"
                                                                                                        type="text"
                                                                                                        value="{{$company_personal->per_phone_company}}"
                                                                                                        class="form-control"/>
                                                                                                </td>
                                                                                                <td><input
                                                                                                        name="per_inside_company[]"
                                                                                                        type="text"
                                                                                                        value="{{$company_personal->per_inside_company}}"
                                                                                                        class="form-control"/>
                                                                                                </td>
                                                                                                <td><input
                                                                                                        name="per_email_company[]"
                                                                                                        type="text"
                                                                                                        value="{{$company_personal->per_email_company}}"
                                                                                                        class="form-control"/>
                                                                                                </td>
                                                                                                <td><input
                                                                                                        name="per_tel_company_company[]"
                                                                                                        type="text"
                                                                                                        value="{{$company_personal->per_tel_company_company}}"
                                                                                                        class="form-control"/>
                                                                                                </td>
                                                                                                <td>
                                                                                                    <button
                                                                                                        type="button"
                                                                                                        data-original-title="حذف پرسنل"
                                                                                                        class="btn btn-danger remove">
                                                                                                        <i class="fa fa-remove"></i>
                                                                                                    </button>
                                                                                                </td>
                                                                                                </tr>
                                                                                                @endforeach
                                                                                                @endif

                                                                                                </tbody>


                                                                                        <tfoot>
                                                                                        <tr>
                                                                                            <th colspan="5">
                                                                                                <button id="btnAdd"
                                                                                                        type="button"
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

                                                    </div>

                                                </div>

                                            </div>


                                        </div>
                                        <input type="submit" class="btn btn-primary" id="saveBtn"
                                               value="ثبت">
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
                if (type) {
                    $.ajax({
                        type: "GET",
                        url: "{{route('admin.customers.filter')}}?type=" + type,
                        success: function (res) {
                            if (res == 1) {
                                $('#company').show();
                                $('#personal').hide();
                                $('#id').val('1');
                            } else {
                                $('#company').hide();
                                $('#personal').show();
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
                var form = $('#productForm')[0];
                var data = new FormData(form);
                $.ajax({
                    type: "POST",
                    enctype: 'multipart/form-data',
                    url: "{{ route('admin.customers.edit') }}",
                    data: data,
                    cache: false,
                    contentType: false,
                    processData: false,
                    method: 'POST',
                    type: 'POST',
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
                var div = $("table tr:last");
                div.html(GetDynamicTextBox(""));
                $("#TextBoxContainer").append(div);
            });
            $("body").on("click", ".remove", function () {
                $(this).closest("tr").remove();
            });
        });

        function GetDynamicTextBox(value) {


            return '<td><input name = "per_side_company[]" type="text" value = "' + value + '" class="form-control" /></td>' +
                '<td><select name="per_sex_company[]" class="form-control"><option>انتخاب کنید</option><option value="1"> مرد</option><option  value="2"> زن</option></select></td>' +
                '<td><input name = "per_title_company[]" type="text" value = "' + value + '" class="form-control" /></td>' +
                '<td><input name = "per_name_company[]" type="text" value = "' + value + '" class="form-control" /></td>' +
                '<td><input name = "per_phone_company[]" type="text" value = "' + value + '" class="form-control" /></td>' +
                '<td><input name = "per_inside_company[]" type="text" value = "' + value + '" class="form-control" /></td>' +
                '<td><input name = "per_email_company[]" type="text" value = "' + value + '" class="form-control" /></td>' +
                '<td><input name = "per_tel_company_company[]" type="text" value = "' + value + '" class="form-control" /></td>' +
                '<td><button type="button" data-original-title="حذف پرسنل" class="btn btn-danger remove"><i class="fa fa-remove"></i></button></td>'
        }

    </script>
    <script>

        $(function () {
            $("#btnAddbank").bind("click", function () {
                var div = $("<tr />");
                div.html(GetDynamicTextBoxx(""));
                $("#TextBoxContainerbank").append(div);
            });
            $("body").on("click", ".remove", function () {
                $(this).closest("tr").remove();
            });
        });

        function GetDynamicTextBoxx(value) {


            return '<td><input name = "name_bank_company[]" type="text" value = "' + value + '" class="form-control" /></td>' +
                '<td><input name = "branch_bank_company[]" type="text" value = "' + value + '" class="form-control" /></td>' +
                '<td><input name = "account_bank_company[]" type="text" value = "' + value + '" class="form-control" /></td>' +
                '<td><input name = "date_bank_company[]" type="text" value = "' + value + '" class="form-control example1" /></td>' +
                '<td><button type="button" data-original-title="حذف پرسنل" class="btn btn-danger remove"><i class="fa fa-remove"></i></button></td>'
        }

    </script>
    <script>

        $(function () {
            $("#btnAddtamin").bind("click", function () {
                var div = $("<tr />");
                div.html(GetDynamicTextBoxxx(""));
                $("#TextBoxContainertamin").append(div);
            });
            $("body").on("click", ".remove", function () {
                $(this).closest("tr").remove();
            });
        });

        function GetDynamicTextBoxxx(value) {


            return '<td><input name = "name_securing_company[]" type="text" value = "' + value + '" class="form-control" /></td>' +
                '<td><input name = "date_securing_company[]" type="text" value = "' + value + '" class="form-control" /></td>' +
                '<td><button type="button" data-original-title="حذف پرسنل" class="btn btn-danger remove"><i class="fa fa-remove"></i></button></td>'
        }

    </script>
    <style>
        .vertical {
            border-left: 1px solid black;
            height: 470px;
            position: absolute;
            margin-top: 40px;
            left: 50%;
        }
    </style>

@endsection
