<!DOCTYPE html>
<html xml:lang="fa">
<head>

    <title>سیستم مدیریت پولاد صنعت</title>
    <link
        rel="stylesheet"
        href="{{asset('/public/css/2.css')}}">
    <link rel="stylesheet" href="{{asset('/public/dist/css/bootstrap-theme.css')}}">
    <link rel="stylesheet" href="{{asset('/public/dist/css/rtl.css')}}">
    <link rel="stylesheet" href="{{asset('/public/dist/css/AdminLTE.css')}}">
    <link href="{{asset('/public/assets/global/css/components-md-rtl.min.css')}}" rel="stylesheet" id="style_components"
          type="text/css"/>

    <style>
        .example-modal .modal {
            position: relative;
            top: auto;
            bottom: auto;
            right: auto;
            left: auto;
            display: block;
            z-index: 1;
        }

        .example-modal .modal {
            background: transparent !important;
        }
    </style>
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

            #successProduct {
                display: none;
            }

            #deleteProduct {
                display: none;
            }

            #back {
                display: none;
            }
        }
    </style>
    <link rel="shortcut icon" type="image/x-icon" href="{{url('/public/icon/logo.png')}}"/>
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
            src: url('{{asset('/public/font/Far_Yagut.eot')}}');
            src: local('☺'),
            url('{{asset('/public/font/Far_Yagut.woff')}}') format('woff'),
            url('{{asset('/public/font/Far_Yagut.ttf')}}') format('truetype'),
            url('{{asset('/public/font/Far_Yagut.svg')}}') format('svg');
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


<div class="col-md-12">
    <h4>برگه درخواست کالا و ارزیابی وضعیت اعتباری مشتری</h4>
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
                @if(!empty($id->state == 3 or $id->state == 4))
                    @if(!empty($users->sign))
                        <img src="{{url($users->sign)}}" width="100" class="user-image" alt="User Image">
                    @endif
                @endif
            </td>
        </tr>
        </tbody>
    </table>

    <br/>
    <br/>
    <br/>
    <label>نظر و امضا مدیر فروش:</label>
    <table height="130" style="font-family: 'B Yekan'">
        <thead>
        </thead>
        <tbody>
        <tr>
            <td>
                @if(!empty($admin_invoice->description))
                    {{$admin_invoice->description}}
                @endif
            </td>
            <td width="250">
                @if(!empty($id->state == 4))
                    @if(!empty($users_s->sign))
                        <img src="{{url($users_s->sign)}}" width="100" class="user-image" alt="User Image">
                    @endif
                @endif
            </td>
        </tr>
        </tbody>
    </table>
    <br/>
    <br/>
    <br/>
    <div class="row">
        <div class="col-sm-9">
            <input id="printbtn" class="btn btn-primary" type="button" value="تهیه نسخه چاپی" onclick="window.print();">
        </div>
        <div class="col-sm-3">

            <button type="submit" class="btn btn-success" id="successProduct" value="تایید">
                تایید
            </button>
            &nbsp;&nbsp;&nbsp;

            <button type="submit" class="btn btn-danger" id="deleteProduct" value="عدم تایید">
                عدم تایید
            </button>
            &nbsp;&nbsp;&nbsp;
            <button type="submit" class="btn btn-info" id="back" value="بازگشت به صفحه قبل">
                بازگشت به صفحه قبل
            </button>
        </div>

    </div>
    <br/>
</div>

</body>
@include('sell.detail.modal')

<script src="{{asset('/public/bower_components/jquery/dist/jquery.min.js')}}"></script>
<script src="{{asset('/public/bower_components/jquery-ui/jquery-ui.min.js')}}"></script>
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<script src="{{asset('/public/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<script src="{{asset('/public/assets/sweetalert.js')}}"></script>
<meta name="_token" content="{{ csrf_token() }}"/>


<script type="text/javascript">
    $(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var invoices_id = [];
        invoices_id.push({'id': '{{$id->id}}'});
        for (var i in invoices_id)
            var id = invoices_id[i].id;


        $('#successProduct').click(function (e) {
            e.preventDefault();

            $.get("{{ route('admin.invoice.check.success') }}" + '/' + id, function (data) {
                $('#Success').modal('show');
                $('#id_invoice').val(id);
                $('#description_invoice').val(data.description);
            });
            $('#saveSuccess').click(function (e) {
                e.preventDefault();
                var form = $('#CustomerSuccess').serialize();
                $('#Success').modal('hide');
                Swal.fire({
                    title: 'تایید پیش فاکتور؟',
                    text: "پیش فاکتورهای تایید شده تبدیل به فاکتور خواهند شد!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'تایید',
                    cancelButtonText: 'انصراف',
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            data: form,
                            url: "{{ route('admin.invoice.admin.success') }}",
                            type: "POST",
                            dataType: 'json',
                            success: function (data) {
                                Swal.fire({
                                    title: 'موفق',
                                    text: 'مشخصات پیش فاکتور با موفقیت در سیستم ثبت و تبدیل به فاکتور شد',
                                    icon: 'success',
                                    confirmButtonText: 'تایید'
                                }).then((result) => {
                                    window.location.replace('{{route('admin.invoice.index')}}');
                                });
                            }
                        });
                        $('#id_invoice').val('');
                        $('#description_invoice').val('');

                    }

                });


            });
        });


        $('#deleteProduct').click(function (e) {
            e.preventDefault();

            $.get("{{ route('admin.invoice.check.canceled') }}" + '/' + id, function (data) {
                $('#Delete').modal('show');
                $('#id_delete').val(id);
                $('#cancellation').val(data.cancellation);
                $('#description_c').val(data.description);
            });
            $('#saveCancel').click(function (e) {
                e.preventDefault();
                var form = $('#Customer_Canceled').serialize();
                $('#Delete').modal('hide');
                Swal.fire({
                    title: 'لغو پیش فاکتور؟',
                    text: "پیش فاکتورهای لغو شده توسط مدیریت قابل بازیابی خواهند بود!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'تایید',
                    cancelButtonText: 'انصراف',
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            data: form,
                            url: "{{ route('admin.invoice.delete') }}",
                            type: "POST",
                            dataType: 'json',
                            success: function (data) {
                                Swal.fire({
                                    title: 'موفق',
                                    text: 'پیش فاکتور با موفقیت لغو شد',
                                    icon: 'success',
                                    confirmButtonText: 'تایید'
                                }).then((result) => {
                                    window.location.replace('{{route('admin.invoice.index')}}');
                                });
                            }
                        });
                        $('#id_delete').val();
                        $('#cancellation').val();
                        $('#description_c').val();
                    }

                });


            });
        });

        $('#back').click(function (e) {
            e.preventDefault();
            window.location.replace('{{route('admin.invoice.index')}}');

        });


    });

</script>


</html>



