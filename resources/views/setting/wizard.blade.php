@extends('layouts.master')
@section('content')
    <form autocomplete="off" id="productForm"
          name="productForm"
          method="post"
    >
        @csrf
        <input type="hidden" id="id" name="id" value="{{$setting->id}}">
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet box blue">
                    <div class="portlet-title">
                        <div class="caption">
                            مشخصات عمومی سیستم
                        </div>
                    </div>

                    <div class="portlet-body">
                        <div class="row">


                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>درصد مالیات
                                    </label>
                                    <input id="Tax" name="Tax" class="form-control"
                                           value="{{$setting->Tax}}">
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
    @include('setting.scripts.script')

@endsection
