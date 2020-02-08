@extends('layouts.master')
@section('content')
    <form autocomplete="off" id="productForm"
          name="productForm"
          enctype="multipart/form-data"
          method="post"
    >
        @csrf
        <input type="hidden" name="id" id="id">
        <input type="hidden" name="sum_selll" id="sum_selll">
        <input type="hidden" name="number_selll" id="number_selll">
        <input type="hidden" name="price_selll" id="price_selll">
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet box blue">
                    <div class="portlet-title">
                        <div class="caption">
                            ثبت مشخصات پیش فاکتور
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
                                            <option value="{{$user->id}}">{{$user->name}}</option>
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
                                            <option value="{{$customer->id}}">{{$customer->name}}</option>
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
                                        <option value="1">رسمی</option>
                                        <option value="2">غیر رسمی</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>نحوه پرداخت
                                    </label>
                                    <input type="text" id="paymentMethod" name="paymentMethod" class="form-control"
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
                                    <td id="color"></td>
                                    <td id="selll"></td>
                                    <td id="numberr"></td>
                                    <td id="Price_Selll"></td>
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
                <div class="col-md-12">
                    <input type="submit" class="btn btn-primary" id="saveBtn"
                           value="ثبت">
                </div>

            </div>


        </div>
    </form>




    <script src="{{asset('/public/js/2.js')}}"></script>
    <script type="text/javascript">
        $(function () {
            $('#sell').addClass('active');
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#saveBtn').click(function (e) {
                e.preventDefault();
                var form = $('#productForm').serialize();
                $.ajax({
                    url: "{{ route('admin.invoice.store') }}",
                    data: form,
                    type: 'POST',
                    success: function (data) {
                        if (data.errors) {
                            $('#ajaxModel').modal('hide');
                            jQuery.each(data.errors, function (key, value) {
                                Swal.fire({
                                    title: 'خطا!',
                                    text: value,
                                    icon: 'error',
                                    confirmButtonText: 'تایید'
                                })
                            });
                        }
                        if (data.success) {
                            Swal.fire({
                                title: 'موفق',
                                text: data.success,
                                icon: 'success',
                                confirmButtonText: 'تایید'
                            }).then((result) => {

                                location.reload();

                            });

                        }
                    }
                });
            });
        });

    </script>



    <script language="javascript">
        var all_modelProducts = [];
        var all_settings = [];
        @foreach($modelProducts as $modelProduct)
        all_modelProducts.push({'product_id': '{{$modelProduct->product_id}}', 'size': '{{$modelProduct->size}}'});
        @endforeach

        all_settings.push({'Tax': '{{$setting->Tax}}'});

        var all_modelProduct = all_modelProducts;
        var all_setting = all_settings;
        for (var i in all_setting)

            added_inputs2_array = [];
        if (added_inputs2_array.length >= 1)
            for (var a in added_inputs2_array)
                added_inputs_array_table2(added_inputs2_array[a], a);


        function added_inputs_array_table2(data, a) {


            var myNode = document.createElement('div');
            myNode.id = 'productt' + a;
            myNode.innerHTML += "<div class='form-group'>" +
                "<select id=\'product" + a + "\'  name=\"product[]\"\n" +
                "class=\"form-control\"/>" +
                "<option>انتخاب کنید</option>" +
                "+@foreach($products as $product)+" +
                "<option value=\"{{$product->id}}\">{{$product->label}}</option>" +
                "+@endforeach+" +
                "</select>" +
                "</div></div></div>";
            document.getElementById('productt').appendChild(myNode);


            var myNode = document.createElement('div');
            myNode.id = 'color' + a;
            myNode.innerHTML += "<div class='form-group'>" +
                "<select id=\'color" + a + "\'  name=\"color[]\"\n" +
                "class=\"form-control\"/>" +
                "+@foreach($colors as $color)+" +
                "<option value=\"{{$color->id}}\">{{$color->name}}</option>" +
                "+@endforeach+" +
                "</select>" +
                "</div></div></div>";
            document.getElementById('color').appendChild(myNode);

            var myNode = document.createElement('div');
            myNode.id = 'selll' + a;
            myNode.innerHTML += "<div class='form-group'>" +
                "<input type=\"text\" id=\'sell" + a + "\'  name=\"sell[]\"\n" +
                "class=\"form-control sell\"/>" +
                "</div></div></div>";
            document.getElementById('selll').appendChild(myNode);

            var myNode = document.createElement('div');
            myNode.id = 'numberr' + a;
            myNode.innerHTML += "<div class='form-group'>" +
                "<input type=\"text\" id=\'number" + a + "\'  name=\"number[]\"\n" +
                "class=\"form-control number\"/>" +
                "</div></div></div>";
            document.getElementById('numberr').appendChild(myNode);

            var myNode = document.createElement('div');
            myNode.id = 'Price_Selll' + a;
            myNode.innerHTML += "<div class='form-group'>" +
                "<input type=\"text\" id=\'Price_Sell" + a + "\' readonly  name=\"Price_Sell[]\"\n" +
                "class=\"form-control Price_Sell\"/>" +
                "</div></div></div>";
            document.getElementById('Price_Selll').appendChild(myNode);


            var myNode = document.createElement('div');
            myNode.id = 'Weightt' + a;
            myNode.innerHTML += "<div class='form-group'>" +
                "<input type=\"text\" id=\'Weight" + a + "\' readonly  name=\"Weight[]\"\n" +
                "class=\"form-control Weight\"/>" +
                "</div></div></div>";
            document.getElementById('Weightt').appendChild(myNode);


            var myNode = document.createElement('div');
            myNode.id = 'Taxx' + a;
            myNode.innerHTML += "<div class='form-group'>" +
                "<input type=\"text\" id=\'Tax" + a + "\' readonly  name=\"Tax[]\"\n" +
                "class=\"form-control tax\"/>" +
                "</div></div></div>";
            document.getElementById('Taxx').appendChild(myNode);


            var myNode = document.createElement('div');
            myNode.id = 'actiont' + a;
            myNode.innerHTML += "<div class='form-group'>" +
                "<button onclick='deleteService2(" + a + ", event)' class=\"form-control btn btn-danger\"><i class=\"fa fa-remove\"></button></div>";
            document.getElementById('actiont').appendChild(myNode);


            $('#number' + a + ',#sell' + a + '')
                .keyup(function () {
                    var selll = parseInt($('#sell' + a + '').val());
                    var number = parseInt($('#number' + a + '').val());
                    $('#Price_Sell' + a + '').val(selll * number);
                    if ($('#InvoiceType').val() == 1) {

                        var sum = parseFloat(($('#Price_Sell' + a + '').val() * all_setting[i].Tax / 100) + parseFloat($('#Price_Sell' + a + '').val()));
                        $('#Tax' + a + '').val(sum);
                        tax();
                    } else {
                        var sum = parseFloat($('#Price_Sell' + a + '').val());
                        $('#Tax' + a + '').val(sum);
                        tax();
                    }

                })
                .keyup();
            $('#sell' + a + '')
                .keyup(function () {
                    $(".sell").each(function () {
                        $(this).keyup(function () {
                            calculateSum();
                            numberSum();
                            Price_SellSum();
                            Wigt();
                        });
                    });
                })
                .keyup();
            $('#number' + a + '')
                .keyup(function () {
                    $(".number").each(function () {
                        $(this).keyup(function () {
                            numberSum();
                            Price_SellSum();
                            Wigt();
                        });
                    });

                    var id = $('#product' + a + '').val();
                    for (var i in all_modelProducts) {
                        if (all_modelProducts[i].product_id === id) {
                            var number = parseInt($('#number' + a + '').val());
                            $('#Weight' + a + '').val(all_modelProducts[i].size * number);
                        }
                    }
                })
                .keyup();


            $('#InvoiceType')
                .change(function () {
                    if ($('#InvoiceType').val() == 1) {
                        $('#Tax' + a + '').val(parseFloat($('#Price_Sell' + a + '').val() * all_setting[i].Tax / 100) + parseFloat($('#Price_Sell' + a + '').val()));
                        tax();
                    } else {
                        $('#Tax' + a + '').val(parseFloat($('#Price_Sell' + a + '').val()));
                        tax();
                    }

                })
                .change();

            $('#product' + a + '')
                .change(function () {
                    var id = $('#product' + a + '').val();
                    for (var i in all_modelProducts) {
                        if (all_modelProducts[i].product_id == id) {
                            var number = parseInt($('#number' + a + '').val());
                            $('#Weight' + a + '').val(all_modelProducts[i].size * number);
                            Wigt();


                        }


                    }


                })
                .change();

            $('#product' + a + '')
                .change(function () {
                    var id = $('#product' + a + '').val();
                    $.ajax({
                        type: "GET",
                        url: "{{route('admin.product.price')}}?id=" + id,
                        success: function (res) {
                            if (res) {
                                $('#sell' + a + '').val(res.price);
                                var selllll = parseInt($('#sell' + a + '').val());
                                var numberrr = parseInt($('#number' + a + '').val());
                                $('#Price_Sell' + a + '').val(selllll * numberrr);
                                $('#Tax' + a + '').val(parseFloat($('#Price_Sell' + a + '').val() * all_setting[i].Tax / 100) + parseFloat($('#Price_Sell' + a + '').val()));
                                tax();
                                calculateSum();
                                numberSum();
                                Price_SellSum();

                            } else {

                            }
                        }
                    });


                })
                .change();


        }

        function deleteService2(id, event) {
            event.preventDefault();
            $('#productt' + id).remove();
            $('#color' + id).remove();
            $('#selll' + id).remove();
            $('#numberr' + id).remove();
            $('#Taxx' + id).remove();
            $('#Price_Selll' + id).remove();
            $('#Weightt' + id).remove();
            $('#actiont' + id).remove();

            tax();
            calculateSum();
            numberSum();
            Price_SellSum();
            Wigt();

        }

        function formatNumber(num) {
            return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
        }

        function calculateSum() {

            var sum = 0;
            $(".sell").each(function () {
                if (!isNaN(this.value) && this.value.length != 0) {
                    sum += parseFloat(this.value);
                }
            });
            $("#sum_sell").text(formatNumber(sum) + 'ریال');
            $("#average_sell").text(formatNumber(sum / 2) + 'ریال');
            $('#sum_selll').val(sum);
        }

        function numberSum() {

            var sum = 0;
            $(".number").each(function () {
                if (!isNaN(this.value) && this.value.length != 0) {
                    sum += parseFloat(this.value);
                }
            });
            $("#number_sell").text(sum + 'عدد');
            $("#average_number").text(sum / 2 + 'عدد');
            $('#number_selll').val(sum);
        }

        function Price_SellSum() {

            var sum = 0;
            $(".Price_Sell").each(function () {
                if (!isNaN(this.value) && this.value.length != 0) {
                    sum += parseFloat(this.value);
                }
            });
            $("#price_sell").text(formatNumber(sum) + 'ریال');
            $("#average_price").text(formatNumber(sum / 2) + 'ریال');
            $('#price_selll').val(sum);
        }

        function Wigt() {

            var sum = 0;
            $(".Weight").each(function () {
                if (!isNaN(this.value) && this.value.length != 0) {
                    sum += parseFloat(this.value);
                }
            });
            $("#Weight").text(formatNumber(sum / 1000 + 'کیلوگرم'));
            $("#average_Weight").text(formatNumber((sum / 2) / 1000 + 'کیلوگرم'));
        }

        function tax() {

            var sum = 0;
            $(".tax").each(function () {
                if (!isNaN(this.value) && this.value.length != 0) {
                    sum += parseInt(this.value);
                }
            });
            $("#tax").text(formatNumber(sum) + 'ریال');
            $("#average_tax").text(formatNumber(sum / 2) + 'ریال');
        }


        function addInput10() {


            var data = {
                'title': '',
                'icon': '',


            };
            added_inputs2_array.push(data);
            added_inputs_array_table2(data, added_inputs2_array.length - 1);
        }


    </script>




@endsection
