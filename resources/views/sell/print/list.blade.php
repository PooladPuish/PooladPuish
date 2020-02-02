<!DOCTYPE html>
<html xml:lang="fa">
<head>
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
            font-family: 'Shahab';
            src: url('http://cdn.font-store.ir/fonts/shahab/Shahab-Regular.woff2') format('woff2'),
            url('http://cdn.font-store.ir/fonts/shahab/Shahab-Regular.woff') format('woff'),
            url('http://cdn.font-store.ir/fonts/shahab/Shahab-Regular.ttf') format('truetype'),
            url('http://cdn.font-store.ir/fonts/shahab/Shahab-Regular.otf') format('opentype');
            font-weight: normal;
            font-style: normal;
        }
    </style>

</head>
<body dir="rtl">
<div class="container-fluid">
    <div class="container-fluid">
        <br/>
        <br/>
        <br/>
        <!-- Control the column width, and how they should appear on different devices -->
        <div class="row">
            <div class="col-sm-8">
                <strong>بسمه تعالی</strong>
                <br/>
                <strong> به : {{$customer->name}}</strong>
                <br/>
                <strong>موضوع : پیش فاکتور</strong>
            </div>
            <div class="col-sm-4">
                <strong> تاریخ : {{\Morilog\Jalali\Jalalian::forge(date('Y/m/d'))->format('Y/m/d')}}</strong>
                <br/>
                <strong> شماره پیش فاکتور : {{$id->invoiceNumber}}</strong>
                <br/>
                <strong> تاریخ صدور پیش فاکتور
                    : {{\Morilog\Jalali\Jalalian::forge($id->created_at)->format('Y/m/d')}}</strong>
            </div>
        </div>
        <br/>
        <p>احتراما، بدینوسیله پیش فاکتور اقلام مورد نیاز آن شرکت جهت بررسی تقدیم حضور می گردد. خواهشمند است در صورت
            تایید ذیل این برگه را مهر و امضا نموده به شماره 77333337 داخلی 270 نمابر نمایید.</p>
        <table>
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
                    جمع
                </th>
                <th colspan="4">
                    {{number_format($id->price_sell)}}
                </th>
            </tr>
            </tfoot>
        </table>
        <br/>
        <br/>
        <p>نحوه پرداخت : نقدی</p>
        <p>شماره حساب 0110074921008 و یا شماره کارت 6037691636156531 و یا شماره شبا IR360190000000110074921008 بانک
            صادرات به نام امیر علی احمدی بختیاری</p>
        <p>محل تحویل : انبار فروشنده</p>
        <p>تاریخ اعتبار پیش فاکتور : تا پایان وقت اداری همان روز</p>
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
    <div class="row">

            <div class="col-md-5">
                <div class="card text-white">
                    <div class="card-header" style="color: black">در صورت تایید، با درج نام خود مهر و امضا نمایید</div>
                    <div class="card-body">
                        <h5 class="card-title"></h5>
                        <p class="card-text">
                            <br/>
                            <br/>
                            <br/>
                            <br/>
                            <br/>
                            <br/>
                            <br/>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-3"></div>
            <div class="col-md-4">
                <br/>
                <br/>
                <p>با تشکر</p>
            </div>
    </div>
</div>
</body>
</html>
<script>
    $(document).ready(function() {
        ConvertNumberToPersion();
    });

    function ConvertNumberToPersion() {
        persian = {
            0: '۰',
            1: '۱',
            2: '۲',
            3: '۳',
            4: '۴',
            5: '۵',
            6: '۶',
            7: '۷',
            8: '۸',
            9: '۹'
        };

        function traverse(el) {
            if (el.nodeType == 3) {
                var list = el.data.match(/[0-9]/g);
                if (list != null && list.length != 0) {
                    for (var i = 0; i < list.length; i++)
                        el.data = el.data.replace(list[i], persian[list[i]]);
                }
            }
            for (var i = 0; i < el.childNodes.length; i++) {
                traverse(el.childNodes[i]);
            }
        }
        traverse(document.body);
    }
</script>
<script>
    window.print();
</script>
