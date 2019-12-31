@extends('layouts.master')
@section('content')
    @include('message.msg')

    <div class="row">
        <div class="col-md-12">
            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption">
                        محصولات
                    </div>
                    <div class="tools"></div>
                </div>
                <div class="portlet-body">
                    <table class="table table-striped table-bordered table-hover" id="sample_2">
                        <thead>
                        <tr>
                            <th>کد</th>
                            <th>گروه کالایی</th>
                            <th>مشخصه محصول</th>
                            <th>نام محصول</th>
                            <th>تاریخ ایجاد</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td>{{$product->code}}</td>
                                <td>
                                    @foreach($commoditys as $commodity)
                                        @if($commodity->id == $product->commodity_id)
                                            {{$commodity->name}}
                                        @endif
                                    @endforeach
                                </td>
                                <td>
                                    @foreach($ProductCharacteristics as $ProductCharacteristic)
                                        @if($ProductCharacteristic->id == $product->characteristics_id)
                                            {{$ProductCharacteristic->name}}
                                        @endif
                                    @endforeach


                                </td>

                                <td>{{$product->name}}</td>
                                <td>{{\Morilog\Jalali\Jalalian::forge($product->created_at)->format('Y/m/d')}}</td>
                                <td>
                                    <a data-toggle="modal" role="button" data-target="#modal-edit-{{$product->id}}">
                                        <img src="{{url('/public/icon/icons8-edit-144.png')}}"
                                             width="25" title="ویرایش">
                                    </a>


                                    <div class="modal fade" id="modal-edit-{{$product->id}}">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <div class="portlet box blue">
                                                        <div class="portlet-title">
                                                            <div class="caption">
                                                                ویرایش محصول
                                                            </div>
                                                        </div>
                                                        <div class="portlet-body form">
                                                            <div class="form-body">
                                                                <div class="form-group">
                                                                    <form action="{{route('admin.Product.edit')}}"
                                                                          method="post">
                                                                        @csrf
                                                                        <input type="hidden" name="id"
                                                                               value="{{$product->id}}">
                                                                        <div class="col-md-12 form-group">
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <label>کد محصول</label>
                                                                                    <input type="text" name="code"
                                                                                           class="form-control"
                                                                                           placeholder="لطفا کد محصول را وارد کنید"
                                                                                           required
                                                                                           value="{{$product->code}}">
                                                                                </div>
                                                                            </div>


                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <label>گروه کالا</label>
                                                                                    <select class="form-control"
                                                                                            name="commodity_id"
                                                                                            id="commodity_i"
                                                                                            required>
                                                                                        <option>لطفا گروه کالا را انتخاب
                                                                                            کنید
                                                                                        </option>
                                                                                        @foreach($products as $produc)
                                                                                            @foreach($commoditys as $commodity)
                                                                                                @if($produc->id == $product->id)
                                                                                                    <option
                                                                                                        value="{{$commodity->id}}"
                                                                                                        @if($produc->commodity_id == $commodity->id)
                                                                                                        selected
                                                                                                        @endif>
                                                                                                        {{$commodity->name}}
                                                                                                    </option>
                                                                                                @endif
                                                                                            @endforeach
                                                                                        @endforeach
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            @php
                                                                                $states = \DB::table("product_characteristics")
                                                                                            ->where("commodity_id", $product->commodity_id)
                                                                                            ->get();

                                                                            @endphp
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <label for="title">مشخصه
                                                                                        محصول</label>
                                                                                    <select name="characteristic"
                                                                                            id="characteristic_i"
                                                                                            class="form-control">
                                                                                        @foreach ($states as $s)
                                                                                            <option
                                                                                                value="{{$s->id}}">{{$s->name}}</option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <label>نام محصول</label>
                                                                                    <input type="text" name="name"
                                                                                           class="form-control"
                                                                                           placeholder="لطفا نام محصول را وارد کنید"
                                                                                           required
                                                                                           value="{{$product->name}}">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button"
                                                                                    class="btn btn-danger pull-left"
                                                                                    data-dismiss="modal">
                                                                                انصراف
                                                                            </button>
                                                                            <input type="submit" class="btn btn-primary"
                                                                                   value="ثبت">
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


                                    <a href="{{route('admin.Product.delete',$product->id)}}">
                                        <img src="{{url('/public/icon/icons8-delete-bin-96.png')}}"
                                             width="25" title="حذف مشخصه">
                                    </a>

                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <a data-toggle="modal" data-target="#modal-default" class="btn btn-primary">تعریف محصول
                        جدید</a>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="portlet box blue">
                        <div class="portlet-title">
                            <div class="caption">
                                تعریف محصول
                            </div>
                        </div>
                        <div class="portlet-body form">
                            <div class="form-body">
                                <div class="form-group">
                                    <form action="{{route('admin.Product.store')}}" method="post">
                                        @csrf
                                        <div class="col-md-12 form-group">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>کد محصول</label>
                                                    <input type="text" name="code" class="form-control"
                                                           placeholder="لطفا کد محصول را وارد کنید"
                                                           required>
                                                </div>
                                            </div>


                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>گروه کالا</label>
                                                    <select class="form-control"
                                                            name="commodity_id"
                                                            id="commodity"
                                                            required>
                                                        <option>لطفا گروه کالا را انتخاب کنید</option>
                                                        @foreach($commoditys as $commodity)
                                                            @if(!empty($commodity))
                                                                <option
                                                                    value="{{$commodity->id}}">{{$commodity->name}}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="title">مشخصه محصول</label>
                                                    <select name="characteristic" id="characteristic"
                                                            class="form-control">
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>نام محصول</label>
                                                    <input type="text" name="name" class="form-control"
                                                           placeholder="لطفا نام محصول را وارد کنید"
                                                           required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">
                                                انصراف
                                            </button>
                                            <input type="submit" class="btn btn-primary" value="ثبت">
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
    <script src="{{asset('/public/bower_components/jquery/dist/jquery.min.js')}}"></script>
    <script type="text/javascript">
        $('#commodity').change(function () {
            var commodityID = $(this).val();
            if (commodityID) {
                $.ajax({
                    type: "GET",
                    url: "{{route('admin.list.product')}}?commodity_id=" + commodityID,
                    success: function (res) {
                        if (res) {
                            $("#characteristic").empty();
                            $("#characteristic").append('<option>مشخصه محصول را انتخاب کنید</option>');
                            $.each(res, function (key, value) {
                                $("#characteristic").append('<option value="' + key + '">' + value + '</option>');
                            });

                        } else {
                            $("#characteristic").empty();
                        }
                    }
                });
            } else {
                $("#characteristic").empty();
            }
        });
    </script>
    <script type="text/javascript">
        $('#commodity_i').change(function () {
            var commodityID = $(this).val();
            if (commodityID) {
                $.ajax({
                    type: "GET",
                    url: "{{route('admin.list.product')}}?commodity_id=" + commodityID,
                    success: function (res) {
                        if (res) {
                            $("#characteristic_i").empty();
                            $("#characteristic_i").append('<option>مشخصه محصول را انتخاب کنید</option>');
                            $.each(res, function (key, value) {
                                $("#characteristic_i").append('<option value="' + key + '">' + value + '</option>');
                            });

                        } else {
                            $("#characteristic_i").empty();
                        }
                    }
                });
            } else {
                $("#characteristic_i").empty();
            }
        });
    </script>
@endsection
