@extends('layouts.master')
@include('Customer.scripts.layout')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption">
                        اطلاعات مشتری
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="row">
                        <div class="col-md-6">
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="caption">
                                اطلاعات پایه
                            </div>
                            <div class="form-group">

                                <form autocomplete="off" id="productForm" name="productForm"
                                      class="form-horizontal">
                                    <input type="hidden" name="pr" id="pr">
                                    @csrf

                                    <div class="col-md-12 form-group">
                                        <div class="col-md-6">


                                            <label> کد مشتری </label>
                                            <div class="col-md-12">
                                                <input type="text" id="code"
                                                       name="code"
                                                       required="required" class="form-control"
                                                       value="{{$id->code}}"
                                                       disabled>
                                                <div class="help-block with-errors"></div>
                                            </div>

                                        </div>
                                        <div class="col-md-6">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label> نام مشتری</label>
                                                    <div class="col-md-12">
                                                        <input type="text" id="name"
                                                               name="name"
                                                               value="{{$id->name}}"
                                                               required="required" class="form-control"
                                                               disabled>
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>نحوه اشنایی</label>
                                                    <div class="col-md-12">
                                                        <input type="text" id="name"
                                                               name="name"
                                                               value="{{$id->method}}"
                                                               required="required" class="form-control"
                                                               disabled>
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>تاریخ اشنایی</label>
                                                    <div class="col-md-12">
                                                        <input type="text" id="name"
                                                               name="name"
                                                               value="{{$id->date}}"
                                                               required="required" class="form-control"
                                                               disabled>
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>استان/کشور</label>
                                                    <div class="col-md-12">
                                                        <input type="text" id="name"
                                                               name="name"
                                                               value="{{$id->state}}"
                                                               required="required" class="form-control"
                                                               disabled>
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>کارشناس</label>
                                                    <div class="col-md-12">
                                                        <input type="text" id="name"
                                                               name="name"
                                                               value="{{$id->expert}}"
                                                               required="required" class="form-control"
                                                               disabled>
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>نوع مشتری</label>
                                                    <div class="col-md-12">
                                                        <select disabled class="form-control" name="type"
                                                                id="type"
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
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>توضیحات</label>
                                                    <div class="col-md-12">
                                            <textarea disabled name="description" id="description" class="form-control"
                                                      rows="2"
                                                      cols="50"
                                                      placeholder="توضیحات در مورد مشتری">
                                                   {!! $id->description !!}
                                                </textarea>
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>


                                    <div class="modal-footer">

                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="vertical"></div>
                        <div class="col-md-6">
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->

                            <div class="caption">
                                اطلاعات تکمیلی
                            </div>
                            <div class="form-group">

                                <form autocomplete="off" id="productForm" name="productForm"
                                      class="form-horizontal">
                                    <input type="hidden" name="pr" id="pr">
                                    @csrf

                                    <div class="col-md-12 form-group">
                                        <div class="col-md-6">


                                            <label> جنسیت </label>
                                            <div class="col-md-12">
                                                <select disabled class="form-control" name="sex_personel"
                                                        id="sex_personel">
                                                    <option>انتخاب کنید</option>
                                                    <option value="1"
                                                            @if(!empty($customer_personal->sex) and  $customer_personal->sex == 1) selected @endif>
                                                        مرد
                                                    </option>
                                                    <option value="2"
                                                            @if(!empty($customer_personal->sex) and $customer_personal->sex == 2) selected @endif>
                                                        زن
                                                    </option>
                                                </select>
                                                <div class="help-block with-errors"></div>
                                            </div>

                                        </div>

                                        <div class="col-md-6">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>کد ملی</label>
                                                    <div class="col-md-12">
                                                        <input disabled type="text"
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

                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>تاریخ تولد</label>
                                                    <div class="col-md-12">
                                                        <input disabled type="text"
                                                               id="date_personel"
                                                               name="date_personel"
                                                               @if(!empty($customer_personal->date_personel))
                                                               value="{{$customer_personal->date_personel}}"
                                                               @endif
                                                               required="required"
                                                               class="form-control"
                                                               placeholder="لطفا تاریخ تولد را وارد کنید">
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>فکس</label>
                                                    <div class="col-md-12">
                                                        <input disabled type="text"
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

                                        <div class="col-md-6">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>شماره تلفن ثابت</label>
                                                    <div class="col-md-12">
                                                        <input disabled type="text"
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

                                            </div>
                                        </div>


                                        <div class="col-md-12">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>ادرس</label>
                                                    <div class="col-md-12">
                                            <textarea disabled name="description" id="description" class="form-control"
                                                      rows="2"
                                                      cols="50"
                                                      placeholder="توضیحات در مورد مشتری">
                                                @if(!empty($customer_personal->adders_personel))
                                                    {!! $customer_personal->adders_personel !!}
                                                @endif
                                                </textarea>
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>توضیحات</label>
                                                    <div class="col-md-12">
                                            <textarea disabled name="description" id="description" class="form-control"
                                                      rows="2"
                                                      cols="50"
                                                      placeholder="توضیحات در مورد مشتری">
                                                @if(empty($customer_personal->text_personel))
                                                    {!! $customer_personal->text_personel !!}
                                                @endif
                                            </textarea>
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>


                                    </div>


                                    <div class="modal-footer">

                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $('#customer').addClass('active');

    </script>
@endsection
