@extends('layouts.master')
@section('content')
    <form autocomplete="off" id="productForm"
          name="productForm"
          enctype="multipart/form-data"
          method="post"
    >
        @csrf
        <input type="hidden" name="id" id="id" value="{{$id->id}}">
        <input type="hidden" name="sum_selll" id="sum_selll">
        <input type="hidden" name="number_selll" id="number_selll">
        <input type="hidden" name="price_selll" id="price_selll">
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet box blue">
                    <div class="portlet-title">
                        <div class="caption">
                            ویرایش مشخصات پیش فاکتور
                        </div>
                    </div>

                    <div class="portlet-body">
                        <div class="row">


                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>نام فروشنده
                                    </label>
                                    <select id="user_id" name="user_id" class="form-control"
                                            required>
                                        @foreach($users as $user)
                                            <option value="{{$user->id}}"
                                                    @if($id->user_id == $user->id)
                                                    selected
                                                @endif
                                            >{{$user->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>نام خریدار
                                    </label>
                                    <select id="customer_id" name="customer_id" class="form-control"
                                            required>
                                        @foreach($customers as $customer)
                                            <option value="{{$customer->id}}"
                                                    @if($id->customer_id == $customer->id)
                                                    selected
                                                @endif
                                            >{{$customer->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>نوع فاکتور
                                    </label>
                                    <select id="InvoiceType" name="InvoiceType" class="form-control"
                                            required>
                                        <option value="1" @if($id->invoiceType == 1) selected @endif>رسمی</option>
                                        <option value="2" @if($id->invoiceType == 2) selected @endif>غیر رسمی</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>نحوه پرداخت
                                    </label>
                                    <input type="text" value="{{$id->paymentMethod}}" id="paymentMethod"
                                           name="paymentMethod" class="form-control"
                                           required>
                                </div>
                            </div>


                        </div>
                        <div class="table table-responsive">
                            <table
                                class="table table-responsive table-striped table-bordered">
                                <thead>
                                <tr>
                                    <td>نام محصول</td>
                                    <td>رنگ</td>
                                    <td>قیمت فروش</td>
                                    <td>تعداد فروش</td>
                                    <td>مبلغ فروش</td>
                                    <td>وزن محصول فروخته شده</td>
                                    <td>مالیات</td>
                                    <td>عملیات</td>
                                </tr>
                                </thead>
                                <tbody
                                    id="TextBoxContainerbank">
                                    <tr>
                                        <td id="productt"></td>
                                        <td id="colorr"></td>
                                        <td id="selll"></td>
                                        <td id="numberr">
                                        </td>
                                        <td id="Price_Selll">
                                        </td>

                                        <td id="Weightt"></td>
                                        <td id="Taxx"></td>
                                        <td id="actiont"></td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th colspan="1">
                                        <button id="btnAddbank"
                                                type="button"
                                                onclick="addInput10()"
                                                class="btn btn-primary"
                                                data-toggle="tooltip">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </th>
                                    <th>
                                        جمع
                                        <hr/>
                                        میانگین
                                    </th>
                                    <th>
                                        <label id="sum_sell">0</label>
                                        <hr/>
                                        <label id="average_sell">0</label>
                                    </th>
                                    <th>
                                        <label id="number_sell">0</label>
                                        <hr/>
                                        <label id="average_number">0</label>
                                    </th>
                                    <th>
                                        <label id="price_sell">0</label>
                                        <hr/>
                                        <label id="average_price">0</label>
                                    </th>
                                    <th>
                                        <label id="Weight">0</label>
                                        <hr/>
                                        <label id="average_Weight">0</label>
                                    </th>
                                    <th>
                                        <label id="tax">0</label>
                                        <hr/>
                                        <label id="average_tax">0</label>
                                    </th>
                                </tr>
                                </tfoot>
                            </table>

                        </div>
                    </div>

                </div>
                <div class="pull-left">
                    <button style="width: 130px" type="submit" class="btn btn-success" id="saveBtn" value="ثبت">
                        ثبت
                    </button>
                    &nbsp;&nbsp;
                    <a href="{{route('admin.invoice.index')}}" style="width: 130px" type="submit" class="btn btn-danger">
                        برگشت
                    </a>
                </div>


            </div>


        </div>
    </form>




    @include('sell.scripts.update')





@endsection
