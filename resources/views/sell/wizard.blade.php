@extends('layouts.master')
@section('content')
    <form autocomplete="off" id="productForm"
          name="productForm"
          enctype="multipart/form-data"
          method="post"
    >
        @csrf
        <input type="hidden" name="id" id="id">
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
                                    <select id="name" name="name" class="form-control"
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
                                    <select id="buyer" name="buyer" class="form-control"
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
                                    <input type="text" id="payment" name="payment" class="form-control"
                                           required>
                                </div>
                            </div>


                        </div>
                        <div class="portlet box blue">
                            <div class="portlet-title">
                                <div class="caption">
                                    جزییات پیش فاکتور
                                </div>
                            </div>
                            <div class="portlet-body">
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
        @foreach($modelProducts as $modelProduct)
        all_modelProducts.push({'product_id': '{{$modelProduct->product_id}}', 'size': '{{$modelProduct->size}}'});
            @endforeach
        var all_modelProduct = all_modelProducts;

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
                "<input type=\"text\" id=\'Price_Sell" + a + "\'  name=\"Price_Sell[]\"\n" +
                "class=\"form-control Price_Sell\" disabled/>" +
                "</div></div></div>";
            document.getElementById('Price_Selll').appendChild(myNode);


            var myNode = document.createElement('div');
            myNode.id = 'Weightt' + a;
            myNode.innerHTML += "<div class='form-group'>" +
                "<input type=\"text\" id=\'Weight" + a + "\'  name=\"Weight[]\"\n" +
                "class=\"form-control Weight\" disabled/>" +
                "</div></div></div>";
            document.getElementById('Weightt').appendChild(myNode);

            var myNode = document.createElement('div');
            myNode.id = 'Taxx' + a;
            myNode.innerHTML += "<div class='form-group'>" +
                "<input type=\"text\" id=\'Tax" + a + "\'  name=\"Tax[]\"\n" +
                "class=\"form-control tax\" disabled='disabled'/>" +
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
                    $('#Price_Sell' + a + '').val(selll + number);
                    if ($('#InvoiceType').val() == 1) {
                        $('#Tax' + a + '').val(parseInt($('#Price_Sell' + a + '').val() * 0.9));
                        tax();
                    } else {
                        $("#tax").text(0);
                        $("#average_tax").text(0);
                    }

                })
                .keyup();
            $('#sell' + a + '')
                .keyup(function () {
                    $(".sell").each(function () {
                        $(this).keyup(function () {
                            calculateSum();
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

            $('#InvoiceType')
                .change(function () {
                    if ($('#InvoiceType').val() == 1) {
                        $('#Tax' + a + '').val(parseInt($('#Price_Sell' + a + '').val() * 0.9));
                        tax();
                    } else{
                        $('#Tax' + a + '').val('');
                        $("#tax").text(0);
                        $("#average_tax").text(0);
                    }

                })
                .change();

        }

        function calculateSum() {

            var sum = 0;
            $(".sell").each(function () {
                if (!isNaN(this.value) && this.value.length != 0) {
                    sum += parseFloat(this.value);
                }
            });
            $("#sum_sell").text(sum);
            $("#average_sell").text(sum / 2);
        }

        function numberSum() {

            var sum = 0;
            $(".number").each(function () {
                if (!isNaN(this.value) && this.value.length != 0) {
                    sum += parseFloat(this.value);
                }
            });
            $("#number_sell").text(sum);
            $("#average_number").text(sum / 2);
        }

        function Price_SellSum() {

            var sum = 0;
            $(".Price_Sell").each(function () {
                if (!isNaN(this.value) && this.value.length != 0) {
                    sum += parseFloat(this.value);
                }
            });
            $("#price_sell").text(sum);
            $("#average_price").text(sum / 2);
        }

        function Wigt() {

            var sum = 0;
            $(".Weight").each(function () {
                if (!isNaN(this.value) && this.value.length != 0) {
                    sum += parseFloat(this.value);
                }
            });
            $("#Weight").text(sum);
            $("#average_Weight").text(sum / 2);
        }

        function tax() {

            var sum = 0;
            $(".tax").each(function () {
                if (!isNaN(this.value) && this.value.length != 0) {
                    sum += parseFloat(this.value);
                }
            });
            $("#tax").text(sum);
            $("#average_tax").text(sum / 2);
        }


        function addInput10() {


            var data = {
                'title': '',
                'icon': '',


            };
            added_inputs2_array.push(data);
            added_inputs_array_table2(data, added_inputs2_array.length - 1);
        }

        function deleteService2(id, event) {


            event.preventDefault();
            $('#productt' + id).remove();
            $('#color' + id).remove();
            $('#selll' + id).remove();
            $('#numberr' + id).remove();
            $('#Tax' + id).remove();
            $('#Price_Selll' + id).remove();
            $('#Weightt' + id).remove();
            $('#actiont' + id).remove();

        }
    </script>




@endsection
