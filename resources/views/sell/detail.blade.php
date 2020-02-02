@extends('layouts.master')
@section('content')
    @include('message.msg')
    <div class="row">
        <div class="col-md-12">
            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption">
                        جزییات پیش فاکتور
                    </div>
                    <div class="tools"></div>
                </div>
                <div class="portlet-body">
                    <table class="table table-striped table-bordered data-table" id="data-table">
                        <thead>
                        <tr>
                            <th>شماره پیش<br/>فاکتور</th>
                            <th>تاریخ<br/>فروش</th>
                            <th>نام<br/>فروشنده</th>
                            <th>نام<br/>خریدار</th>
                            <th>نام<br/>محصول</th>
                            <th>رنگ</th>
                            <th>قیمت<br/>فروش</th>
                            <th>تعداد<br/>فروش</th>
                            <th>مبلغ<br/>کل فروش</th>
                            <th>وزن محصول<br/>فروخته شده</th>
                            <th>فاکتور<br/>نوع</th>
                            <th>مالیات<br/>مبلغ</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($details as $detail)
                            <tr>

                                <td>{{$id->invoiceNumber}}</td>
                                <td>{{\Morilog\Jalali\Jalalian::forge($id->created_at)->format('Y/m/d')}}</td>
                                <td>
                                    @foreach($users as $user)
                                        @if($user->id == $id->user_id)
                                            {{$user->name}}
                                        @endif
                                    @endforeach
                                </td>
                                <td>
                                    @foreach($customers as $customer)
                                        @if($customer->id == $id->customer_id)
                                            {{$customer->name}}
                                        @endif
                                    @endforeach
                                </td>
                                <td>
                                    @foreach($products as $product)
                                        @if($product->id == $detail->product_id)
                                            {{$product->label}}
                                        @endif
                                    @endforeach
                                </td>
                                <td>
                                    @foreach($colors as $color)
                                        @if($color->id == $detail->color_id)
                                            {{$color->name}}
                                        @endif
                                    @endforeach
                                </td>
                                <td>{{number_format($detail->salesPrice)}} </td>
                                <td>{{number_format($detail->salesNumber)}} </td>
                                <td>{{number_format($detail->sumTotal)}} </td>
                                <td>{{number_format($detail->weight)}} </td>
                                <td>
                                    @if($id->invoiceType == 1)
                                        رسمی
                                    @else
                                        غیر رسمی
                                    @endif
                                </td>
                                <td>{{number_format($detail->taxAmount)}} </td>
                                <td>
                                    <a href="#">
                                        <img src="{{url('/public/icon/icons8-delete-bin-96.png')}}" width="25"
                                             title="حذف">
                                    </a>
                                </td>

                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th colspan="6">
                                جمع
                                <hr/>
                                میانگین
                            </th>
                            <th>
                                {{number_format($id->sum_sell)}}
                                <hr/>
                                {{number_format($id->sum_sell/2)}}

                            </th>
                            <th>
                                {{number_format($id->number_sell)}}
                                <hr/>
                                {{number_format($id->number_sell/2)}}

                            </th>
                            <th>
                                {{number_format($id->price_sell)}}
                                <hr/>
                                {{number_format($id->price_sell/2)}}

                            </th>
                            <th>
                                {{number_format($weight)}}
                                <hr/>
                                {{number_format($weight/2)}}

                            </th>
                            <th></th>
                            <th>
                                {{number_format($taxAmount)}}
                                <hr/>
                                {{number_format($taxAmount/2)}}

                            </th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @include('sell.scripts.detail')

@endsection
