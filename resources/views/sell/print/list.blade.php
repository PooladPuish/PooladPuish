<!DOCTYPE html>
<html xml:lang="fa">
<head>
    <style>
        @media print {
            .control-group {
                display: none;
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


</head>
<body dir="rtl" class="myclass" style="font-family: 'B Yekan'">


<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<div class="container-fluid">
    <div class="container-fluid">

        <!-- Control the column width, and how they should appear on different devices -->
        <div class="row">
            <div class="col-sm-8">
                <strong>بسمه تعالی</strong>
                <br/>
                <br/>
                <strong> به : {{$customer->name}}</strong>
                <br/>
                <br/>
                <strong>موضوع : پیش فاکتور</strong>
            </div>
            <div class="col-sm-4">
                <strong> تاریخ : {{\Morilog\Jalali\Jalalian::forge(date('Y/m/d'))->format('Y/m/d')}}</strong>
                <br/>
                <br/>
                <strong> شماره پیش فاکتور : {{$id->invoiceNumber}}</strong>
                <br/>
                <br/>
                <strong> تاریخ صدور پیش فاکتور
                    : {{\Morilog\Jalali\Jalalian::forge($id->created_at)->format('Y/m/d')}}</strong>
            </div>
        </div>
        <br/>
        <p>احتراما، بدینوسیله پیش فاکتور اقلام مورد نیاز آن شرکت جهت بررسی تقدیم حضور می گردد. خواهشمند است در صورت
            تایید ذیل این برگه را مهر و امضا نموده به شماره 77333337 داخلی 270 نمابر نمایید.</p>
        <table style="font-family: 'B Yekan'">
            <thead>
            <tr>
                <th>نوع محصول</th>
                <th>رنگ</th>
                <th>تعداد</th>
                <th>قیمت واحد(ریال)</th>
                <th>قیمت کل(ریال)</th>
            </tr>
            </thead>
            <tbody>
            @foreach($invoice_products as $invoice_product)
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
                </tr>
            @endforeach
            </tbody>
            <tfoot>
            <tr>
                <th colspan="4">
                    <strong>جمع کل</strong>
                </th>
                <th>
                    <strong> {{number_format($id->price_sell)}}</strong>
                </th>
            </tr>
            </tfoot>
        </table>
        <br/>
        <br/>
        @if($id->paymentMethod == 0)
            <p>نحوه پرداخت : نقدی</p>
        @else
            <p> نحوه پرداخت : {{$id->paymentMethod}} روز </p>
        @endif
        <p> شماره حساب {{$bank->AccountNumber}} و یا شماره کارت {{$bank->CardNumber}} و یا شماره
            شبا {{$bank->ShabaNumber}}
            {{$bank->NameBank}} به نام {{$bank->name}}</p>
        <p> محل تحویل : {{$selectstore->name}}</p>
        <p> تاریخ اعتبار پیش فاکتور : {{$date}}</p>
        <br/>
        <br/>

        <li>در صورت افزایش قیمت مواد اولیه در زمان تحویل کالا،قیمت های فوق بر اساس نرخ روز مواد اولیه مجددا محاسبه و
            نهایی خواهند شد.
        </li>
        <li>در صورت تایید پیش فاکتور، باید کلیه اسناد مالی حاصل فروش قبل از تاریخ صدور مجوز بارگیری به وتحد مالی شرکت
            پولاد صنعت تحویل گردد.
        </li>
        <li>با توجه به توافق فی مابین در این پیش فاکتور و تایید جنابعالی در خصوص مدت بازپرداخت آن، در صورت تاخیر در
            پرداخت، هزینه تاخیر تادیه آن به میزان 3% ماهیانه و به صورت روزشمار محاسبه گشته وبه حساب بدهی شما منظور می
            گردد.
        </li>
        <li>حمل هر نوبت کالا منوط به تحویل کلیه اسناد مالی به فاکتورهای صادرشده قبلی است.</li>


    </div>
    <br/>
    <br/>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <textarea rows="15" cols="70">
                    در صورت تایید با درج نام خود مهر و امضا نمایید
                </textarea>
            </div>
            <div class="col-md-3"></div>
            <div class="col-md-3">
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <p>با تشکر</p>
            </div>
        </div>
        <hr/>
        <footer>
            <p> نشانی : {{$selectstore->address}}</p>
        </footer>
    </div>

</div>


</body>
</html>
<script>
    window.print();
</script>
