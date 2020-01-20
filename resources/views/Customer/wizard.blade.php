@extends('layouts.master')
@include('Customer.scripts.layout')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption">
                        ثبت اطلاعات مشتری جدید
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
                              name="productForm" class="form-horizontal">
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
                                                            <option value="{{$method->method}}">{{$method->method}}</option>
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
                                                            <option value="{{$state->state}}">{{$state->state}}</option>
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
                                                                value="{{$typeCustomer->id}}">{{$typeCustomer->name}}</option>
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
                                                                    <option value="1">مرد</option>
                                                                    <option value="2">زن</option>
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
@endsection
