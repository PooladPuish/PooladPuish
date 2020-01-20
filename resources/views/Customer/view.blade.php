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
                            <div class="col-md-12">
                                <div class="caption">
                                    اطلاعات پایه
                                </div>
                                <!-- BEGIN EXAMPLE TABLE PORTLET-->
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
                                                                   required="required"
                                                                   class="form-control" disabled>
                                                            <div
                                                                class="help-block with-errors"></div>
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
                                                                   required="required"
                                                                   class="form-control" disabled>
                                                            <div
                                                                class="help-block with-errors"></div>
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
                                                                   required="required"
                                                                   class="form-control" disabled>
                                                            <div
                                                                class="help-block with-errors"></div>
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
                                                                   required="required"
                                                                   class="form-control" disabled>
                                                            <div
                                                                class="help-block with-errors"></div>
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
                                                                   required="required"
                                                                   class="form-control" disabled>
                                                            <div
                                                                class="help-block with-errors"></div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>نوع مشتری</label>
                                                        <div class="col-md-12">
                                                            <select disabled class="form-control"
                                                                    name="type" id="type"
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
                                                            <div
                                                                class="help-block with-errors"></div>
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
                                                            <div
                                                                class="help-block with-errors"></div>
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
                        <div class="vertical"></div>
                        <div class="col-md-6">
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="caption">
                                        اطلاعات تکمیلی
                                    </div>
                                    <div class="portlet-body form">
                                        <div class="form-group">

                                            <form autocomplete="off" id="productForm" name="productForm"
                                                  class="form-horizontal">
                                                <input type="hidden" name="pr" id="pr">
                                                @csrf

                                                <div class="col-md-12 form-group">
                                                    <div class="col-md-6">


                                                        <label> کد اقتصادی </label>
                                                        <div class="col-md-12">
                                                            <input type="text" id="code"
                                                                   name="code"
                                                                   value="{{$customer_company->code_company}}"
                                                                   required="required" class="form-control"
                                                                   disabled>
                                                            <div class="help-block with-errors"></div>
                                                        </div>

                                                    </div>


                                                    <div class="col-md-6">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label>سال تاسیس</label>
                                                                <div class="col-md-12">
                                                                    <input type="text" id="name"
                                                                           name="name"
                                                                           value="{{$customer_company->Established_company}}"
                                                                           required="required"
                                                                           class="form-control" disabled>
                                                                    <div
                                                                        class="help-block with-errors"></div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label>تلفن دفتر مرکزی</label>
                                                                <div class="col-md-12">
                                                                    <input type="text" id="name"
                                                                           name="tel_company"
                                                                           value="{{$customer_company->tel_company}}"
                                                                           required="required"
                                                                           class="form-control" disabled>
                                                                    <div
                                                                        class="help-block with-errors"></div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label>فکس دفتر مرکزی</label>
                                                                <div class="col-md-12">
                                                                    <input type="text" id="name"
                                                                           name="name"
                                                                           value="{{$customer_company->fax_company}}"
                                                                           required="required"
                                                                           class="form-control" disabled>
                                                                    <div
                                                                        class="help-block with-errors"></div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label>کد پستی</label>
                                                                <div class="col-md-12">
                                                                    <input type="text" id="name"
                                                                           name="name"
                                                                           value="{{$customer_company->post_company}}"
                                                                           required="required"
                                                                           class="form-control" disabled>
                                                                    <div
                                                                        class="help-block with-errors"></div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label>ادرس دفتر مرکزی</label>
                                                                <div class="col-md-12">
                                            <textarea disabled name="description" id="description" class="form-control"
                                                      rows="2"
                                                      cols="50"
                                                      placeholder="توضیحات در مورد مشتری">
                                                   {!! $customer_company->adders_company !!}
                                                </textarea>
                                                                    <div
                                                                        class="help-block with-errors"></div>
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


            </div>
        </div>


    </div>
    @if(count($company_personal)!=0)
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
                                </tr>
                                </thead>
                                <tbody id="TextBoxContainer">
                                @if(!empty($company_personal))

                                    @foreach($company_personal as $company_persona)
                                        <tr>
                                            <td><input name="side_company[]"
                                                       type="text"
                                                       value="{{$company_persona->side_company}}"
                                                       class="form-control"
                                                       disabled/></td>
                                            <td>
                                                <select disabled class="form-control" name="sex_company[]">
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
                                            <td><input disabled name="title_company[]"
                                                       type="text"
                                                       value="{{$company_persona->title_company}}"
                                                       class="form-control"/></td>
                                            <td><input disabled name="name_company[]"
                                                       type="text"
                                                       value="{{$company_persona->name_company}}"
                                                       class="form-control"/></td>
                                            <td><input disabled name="phone_company[]"
                                                       type="text"
                                                       value="{{$company_persona->phone_company}}"
                                                       class="form-control"/></td>
                                            <td><input disabled name="inside_company[]"
                                                       type="text"
                                                       value="{{$company_persona->inside_company}}"
                                                       class="form-control"/></td>
                                            <td><input disabled name="email_company[]"
                                                       type="text"
                                                       value="{{$company_persona->email_company}}"
                                                       class="form-control"/></td>
                                            <td><input disabled name="tel_company_company[]"
                                                       type="text"
                                                       value="{{$company_persona->tel_company_company}}"
                                                       class="form-control"/></td>

                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    @endif
<script>
    $('#customer').addClass('active');

</script>
@endsection
