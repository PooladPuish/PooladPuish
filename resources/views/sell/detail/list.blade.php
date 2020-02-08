<!DOCTYPE html>
<html xml:lang="fa">
<head>
    <title>سیستم مدیریت پولاد صنعت</title>

    <style>
        @media print {
            .control-group {
                display: none;
            }
        }
    </style>
    <style type="text/css">
        @media print {
            #printbtn {
                display: none;
            }
        }
    </style>
    <link rel="shortcut icon" type="image/x-icon" href="{{url('/public/icon/logo.png')}}"/>
    <link
        rel="stylesheet"
        href="{{asset('/public/css/2.css')}}">
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: right;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
    <style>
        @font-face {
            font-family: 'Far.YagutBold';
            src: url('http://www.fontfarsi.ir/Content/Fonts/EOT/Far_YagutBold.eot');
            src: local('☺'),
            url('http://www.fontfarsi.ir/Content/Fonts/WOFF/Far_YagutBold.woff') format('woff'),
            url('http://www.fontfarsi.ir/Content/Fonts/TTF/Far_YagutBold.ttf') format('truetype'),
            url('http://www.fontfarsi.ir/Content/Fonts/SVG/Far_YagutBold.svg') format('svg');
            font-weight: normal;
            font-style: normal;
        }

        .myclass {
            font-family: 'Far.YagutBold', Tahoma, Sans-Serif;
            font-size: 14px;
        }


    </style>
    <style>
        th, td {
            border: 1px solid black;
            text-align: center;
        }

        hr {
            border-top: 1px solid black;
            margin-bottom: 0.4em;
            margin-top: 0.4em;
        }
    </style>

</head>
<body dir="rtl" class="myclass" style="font-family: 'B Yekan'">
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>

<div class="col-md-12">
    <h4>برگه درخواست کالا و ارزیابی وضعیت اعتباری مشتری</h4>
    <br/>
    <br/>
    <table style="font-family: 'B Yekan'">
        <thead>
        <tr>
            <th>کد پیش فاکتور</th>
            <th>خریدار</th>
            <th>اقدام کننده</th>
            <th>تاریخ اقدام</th>
            <th>نحوه پرداخت</th>
            <th>درصد سود فروش</th>
            <th>محل تحویل</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>{{$id->invoiceNumber}}</td>
            <td>{{$customer->name}}</td>
            <td>{{$user->name}}</td>
            <td>{{\Morilog\Jalali\Jalalian::forge($id->created_at)->format('Y/m/d')}}</td>
            <td>
                @if($id->paymentMethod == 0)
                    نقدی
                @else
                    {{$id->paymentMethod}} روزه
                @endif
            </td>

            <td>---</td>
            <td>
                @foreach($select_stores as $select_store)
                    @if($select_store->id == $id->selectstores)
                        {{$select_store->name}}
                    @endif
                @endforeach
            </td>
        </tr>
        </tbody>

    </table>
    <br/>
    <br/>
    <label>خلاصه پیش فاکتور:</label>
    <table style="font-family: 'B Yekan'">
        <thead>
        <tr>
            <th>محصول</th>
            <th>رنگ</th>
            <th>تعداد</th>
            <th>قیمت واحد(ریال)</th>
            <th>قیمت کل(ریال)</th>
            <th>کارمزد آخرین خرید</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $sum = 0;
        $tax = 0;
        ?>
        @foreach($invoice_products as $invoice_product)
            <?php
            $sum = $sum + $invoice_product->sumTotal;
            $tax = $tax + $invoice_product->taxAmount;
            ?>
            <tr>
                <td>
                    @foreach($products as $product)
                        @if($product->id == $invoice_product->product_id)
                            {{$product->label}}
                        @endif
                    @endforeach

                </td>
                <td>

                    @foreach($colors as $color)
                        @if($color->id == $invoice_product->color_id)
                            {{$color->name}}
                        @endif
                    @endforeach
                </td>
                <td>{{$invoice_product->salesNumber}}</td>
                <td>{{number_format($invoice_product->salesPrice)}}</td>
                <td>{{number_format($invoice_product->sumTotal)}}</td>
                <td>
                    @if($id->paymentMethod == 0)
                        نقدی
                    @else
                        0 در {{\Morilog\Jalali\Jalalian::forge($id->created_at)->format('Y/m/d')}}
                        ({{$id->paymentMethod}}روزه)

                    @endif
                </td>

            </tr>
        @endforeach
        </tbody>
        <tfoot>
        <tr>
            <th colspan="4">
                جمع کل
            </th>


            <th>
                {{number_format($tax)}}
            </th>
        </tr>
        </tfoot>
        <tfoot>
        <tr>
            <th colspan="4">
                مالیات بر ارزش افزوده
            </th>
            <?php
            $taxa = $tax - $sum;
            ?>

            <th>
                {{number_format($taxa)}}
            </th>
        </tr>
        </tfoot>

    </table>
    {{--    <br/>--}}
    {{--    <br/>--}}
    {{--    <label>نحوه محاسبه قیمت فروش:</label>--}}
    {{--    <table style="font-family: 'B Yekan'">--}}
    {{--        <thead>--}}
    {{--        <tr>--}}
    {{--            <th>گرید مواد</th>--}}
    {{--            <th>بهای پایه مواد</th>--}}
    {{--            <th>هزینه تامین مواد</th>--}}
    {{--            <th>نرخ کارمزد مصوب</th>--}}
    {{--            <th>کارمزد تولید</th>--}}
    {{--            <th>نسبت کارمزد</th>--}}
    {{--            <th>هزینه رنگ</th>--}}
    {{--            <th>کارمزد رنگی کردن</th>--}}
    {{--            <th>هزینه ضایعات رنگ</th>--}}
    {{--            <th>سایر هزینه ها</th>--}}
    {{--            <th>هزینه حمل</th>--}}
    {{--        </tr>--}}
    {{--        </thead>--}}
    {{--        <tbody>--}}
    {{--        <tr>--}}
    {{--            <td></td>--}}
    {{--            <td></td>--}}
    {{--            <td></td>--}}
    {{--            <td></td>--}}
    {{--            <td></td>--}}
    {{--            <td></td>--}}
    {{--            <td></td>--}}
    {{--            <td></td>--}}
    {{--            <td></td>--}}
    {{--            <td></td>--}}
    {{--            <td></td>--}}

    {{--        </tr>--}}
    {{--        </tbody>--}}


    {{--    </table>--}}
    <br/>
    <br/>
    <label>میزان اعتبار سنجی:</label>
    <table style="font-family: 'B Yekan'">
        <thead>
        <tr>
            <th>سقف اعتباری</th>
            <th>سقف حساب باز</th>
            <th>تعداد خرید سال جاری</th>
            <th>تعداد خرید سال قبل</th>
            <th>گردش حساب سال جاری</th>
            <th>گردش حساب سال قبل</th>

        </tr>
        </thead>
        <tbody>
        <tr>
            <td>
                @if($customer_validation_payment->Creditceiling == null)
                    0
                @else
                    {{number_format($customer_validation_payment->Creditceiling)}}
                @endif
            </td>
            <td>
                @if($customer_validation_payment->Openceiling == null)
                    0
                @else
                    {{number_format($customer_validation_payment->Openceiling)}}
                @endif

            </td>
            <td>
                @if($customer_validation_payment->Yearcount == null)
                    0
                @else
                    {{number_format($customer_validation_payment->Yearcount)}}
                @endif
            </td>
            <td>

                @if($customer_validation_payment->yearAgoCount == null)
                    0
                @else
                    {{number_format($customer_validation_payment->yearAgoCount)}}
                @endif
            </td>
            <td>
                @if($customer_validation_payment->Yearturnover == null)
                    0
                @else
                    {{number_format($customer_validation_payment->Yearturnover)}}
                @endif

            </td>
            <td>
                @if($customer_validation_payment->lastYearturnover == null)
                    0
                @else
                    {{number_format($customer_validation_payment->lastYearturnover)}}
                @endif
            </td>

        </tr>
        </tbody>
    </table>
    <br/>
    <br/>
    <label>سابقه پرداخت مشتری:</label>
    <table style="font-family: 'B Yekan'">
        <thead>
        <tr>
            <th>سابقه چک برگشتی</th>
            <th>چکهای برگشتی در جریان</th>
            <th>مانده حساب معوق</th>
            <th>میانگین زمان معوق</th>
            <th>فاکتورهای سررسید آتی</th>
            <th>اسناد دریافتنی</th>
            <th>مانده حساب باز</th>

        </tr>
        </thead>
        <tbody>
        <tr>
            <td>
                @if($customer_validation_payment->Checkback == null)
                    0
                @else
                    {{number_format($customer_validation_payment->Checkback)}}
                @endif


            </td>
            <td>
                @if($customer_validation_payment->Checkbackintheflow == null)
                    0
                @else
                    {{number_format($customer_validation_payment->Checkbackintheflow)}}
                @endif
            </td>
            <td>
                @if($customer_validation_payment->accountbalance == null)
                    0
                @else
                    {{number_format($customer_validation_payment->accountbalance)}}
                @endif
            </td>
            <td>
                @if($customer_validation_payment->Averagetimedelay == null)
                    0
                @else
                    {{number_format($customer_validation_payment->Averagetimedelay)}}
                @endif
            </td>
            <td>
                @if($customer_validation_payment->Futurefactors == null)
                    0
                @else
                    {{number_format($customer_validation_payment->Futurefactors)}}
                @endif
            </td>
            <td>
                @if($customer_validation_payment->Receiveddocuments == null)
                    0
                @else
                    {{number_format($customer_validation_payment->Receiveddocuments)}}
                @endif
            </td>
            <td>
                @if($customer_validation_payment->Openaccountbalance == null)
                    0
                @else
                    {{number_format($customer_validation_payment->Openaccountbalance)}}
                @endif
            </td>
        </tr>
        </tbody>
    </table>
    <table height="100" style="font-family: 'B Yekan'">
        <thead>
        </thead>
        <tbody>
        <tr>
            <td width="142">
                نحوه پرداختهای قبلی
                <hr/>
                توضیحات واحد مالی
            </td>
            <td>
                {{$customer_validation_payment->paymentmethod}}
                <hr/>
                {{$customer_validation_payment->description}}
            </td>
            <td width="121">
                @if(!empty($users->sign))
                    <img src="{{url($users->sign)}}" width="100" class="user-image" alt="User Image">
                @endif
            </td>
        </tr>
        </tbody>
    </table>

    <br/>
    <br/>
    <label>نظر و امضا مدیر فروش:</label>
    <table height="130" style="font-family: 'B Yekan'">
        <thead>
        </thead>
        <tbody>
        <tr>
            <td></td>
            <td width="250">امضا مدیر فروش</td>
        </tr>
        </tbody>
    </table>
    <br/>
    <input id="printbtn" class="btn btn-primary" type="button" value="تهیه نسخه چاپی" onclick="window.print();">
</div>

</body>
</html>


