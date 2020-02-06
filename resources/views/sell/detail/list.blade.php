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
                display :  none;
            }
        }
    </style>
    <link rel="shortcut icon" type="image/x-icon" href="{{url('/public/icon/logo.png')}}"/>
    <link
        rel="stylesheet"
        href="https://cdn.rtlcss.com/bootstrap/v4.2.1/css/bootstrap.min.css"
        integrity="sha384-vus3nQHTD+5mpDiZ4rkEPlnkcyTP+49BhJ4wJeJunw06ZAp+wzzeBPUXr42fi8If"
        crossorigin="anonymous">
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
            <th>نحوه پرداخت محاسباتی</th>
            <th>نحوه پرداخت نمایشی</th>
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
            <td></td>
            <td>---</td>
            <td></td>
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
    <br/>
    <br/>
    <label>نحوه محاسبه قیمت فروش:</label>
    <table style="font-family: 'B Yekan'">
        <thead>
        <tr>
            <th>گرید مواد</th>
            <th>بهای پایه مواد</th>
            <th>هزینه تامین مواد</th>
            <th>نرخ کارمزد مصوب</th>
            <th>کارمزد تولید</th>
            <th>نسبت کارمزد</th>
            <th>هزینه رنگ</th>
            <th>کارمزد رنگی کردن</th>
            <th>هزینه ضایعات رنگ</th>
            <th>سایر هزینه ها</th>
            <th>هزینه حمل</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>

        </tr>
        </tbody>


    </table>
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
                @if($customer_validation->Creditceiling == null)
                    0
                @else
                    {{number_format($customer_validation->Creditceiling)}}
                @endif
            </td>
            <td>
                @if($customer_validation->Openceiling == null)
                    0
                @else
                    {{number_format($customer_validation->Openceiling)}}
                @endif

            </td>
            <td>
                @if($customer_validation->Yearcount == null)
                    0
                @else
                    {{number_format($customer_validation->Yearcount)}}
                @endif
            </td>
            <td>

                @if($customer_validation->yearAgoCount == null)
                    0
                @else
                    {{number_format($customer_validation->yearAgoCount)}}
                @endif
            </td>
            <td>
                @if($customer_validation->Yearturnover == null)
                    0
                @else
                    {{number_format($customer_validation->Yearturnover)}}
                @endif

            </td>
            <td>
                @if($customer_validation->lastYearturnover == null)
                    0
                @else
                    {{number_format($customer_validation->lastYearturnover)}}
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
                @if($customer_history_payment->Checkback == null)
                    0
                @else
                    {{number_format($customer_history_payment->Checkback)}}
                @endif


            </td>
            <td>
                @if($customer_history_payment->Checkbackintheflow == null)
                    0
                @else
                    {{number_format($customer_history_payment->Checkbackintheflow)}}
                @endif
            </td>
            <td>
                @if($customer_history_payment->accountbalance == null)
                    0
                @else
                    {{number_format($customer_history_payment->accountbalance)}}
                @endif
            </td>
            <td>
                @if($customer_history_payment->Averagetimedelay == null)
                    0
                @else
                    {{number_format($customer_history_payment->Averagetimedelay)}}
                @endif
            </td>
            <td>
                @if($customer_history_payment->Futurefactors == null)
                    0
                @else
                    {{number_format($customer_history_payment->Futurefactors)}}
                @endif
            </td>
            <td>
                @if($customer_history_payment->Receiveddocuments == null)
                    0
                @else
                    {{number_format($customer_history_payment->Receiveddocuments)}}
                @endif
            </td>
            <td>
                @if($customer_history_payment->Openaccountbalance == null)
                    0
                @else
                    {{number_format($customer_history_payment->Openaccountbalance)}}
                @endif
            </td>
        </tr>
        </tbody>
        <tfoot>
        <tr>

            <th height="130" colspan="7">
                امضا
            </th>

        </tr>

        </tfoot>

        <tfoot>
        <tr>
            <th>
                توضیحات واحد مالی
            </th>
            <th colspan="6">
                {{$customer_history_payment->description}}
            </th>
        </tr>

        </tfoot>

        <tfoot>
        <tr>
            <th>
                نحوه پرداخت فاکتورهای قبلی
            </th>
            <th colspan="6">
                {{$customer_history_payment->paymentmethod}}
            </th>
        </tr>

        </tfoot>


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
    <input id ="printbtn" class="btn btn-primary" type="button" value="تهیه نسخه چاپی" onclick="window.print();" >
</div>

</body>
</html>


