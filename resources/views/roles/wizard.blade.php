@extends('layouts.master')
@section('content')
    <style>
        ul,
        li {
            list-style: none;
            margin: 2px;
            padding: 0
        }

        label {
            font-weight: normal
        }

        /*Tree*/

        .trees {
            margin-right: 15px;
        }

        .trees li {
            border-right: dotted 1px #bcbec0;
            padding: 1px 0 1px 25px;
            position: relative
        }

        .trees li > label {
            position: relative;
            right: 10px
        }

        .trees li:before {
            content: "";
            width: 13px;
            height: 1px;
            border-bottom: dotted 1px #bcbec0;
            position: absolute;
            top: 10px;
            right: 0
        }

        .trees li:last-child:after {
            content: "";
            position: absolute;
            width: 2px;
            height: 13px;
            background: #fff;
            right: -1px;
            bottom: 0px;
        }

        .trees li input {
            margin-right: 5px;
            margin-left: 5px
        }

        .trees li.has-child > ul {
            display: none
        }

        .trees li.has-child > input {
            opacity: 0;
            position: absolute;
            right: -14px;
            z-index: 9999;
            width: 22px;
            height: 22px;
            top: -5px
        }

        .trees li.has-child > input + .tree-control {
            position: absolute;
            right: -4px;
            top: 6px;
            width: 8px;
            height: 8px;
            line-height: 8px;
            z-index: 2;
            display: inline-block;
            color: #fff;
            border-radius: 3px;
        }

        .trees li.has-child > input + .tree-control:after {
            font-family: 'FontAwesome';
            content: "";
            font-size: 15px;
            color: #183955;
            position: absolute;
            right: 1px
        }

        .trees li.has-child > input:checked + .tree-control:after {
            font-family: 'FontAwesome';
            content: "";
            font-size: 15px;
            color: #183955;
            position: absolute;
            right: 1px
        }

        .trees li.has-child > input:checked ~ ul {
            display: block
        }

        .trees ul li.has-child:last-child {
            border-right: none
        }

        .trees ul li.has-child:nth-last-child(2):after {
            content: "";
            width: 1px;
            height: 5px;
            border-right: dotted 1px #bcbec0;
            position: absolute;
            bottom: -5px;
            right: -1px
        }

        .tree-alt li {
            padding: 4px 0
        }
    </style>
    @include('message.msg')
    <div class="portlet box blue">
        <div class="portlet-title">
            <div class="caption">
                افزودن بخش
            </div>
        </div>
        <div class="portlet-body form">
            <div class="form-body">
                <div class="form-group">
                    <form method="post" action="{{route('admin.role.store')}}" class="mt-repeater">
                        @csrf
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>عنوان بخش</label>
                                    <input type="text" id="name" name="name" class="form-control"
                                           required>
                                </div>
                            </div>
                        </div>
                        <div class="box box-default">
                            <div class="box-header with-border">
                                <h3 class="box-title">دسترسی</h3>
                            </div>
                            <div class="tree-box box-border">
                                <div class="row">
                                    <div class="col-md-4">
                                        <ul class="trees">
                                            <li class="has-child">
                                                <input id="tree-controll1" type="checkbox" class="custom-control-input"><span
                                                    class="tree-control"></span>
                                                <label>
                                                    &nbsp;
                                                    <i class="fa fa-user light-blue"></i> مدیریت
                                                </label>
                                                <ul>
                                                    @foreach($permissions as $permission)
                                                        @if(!empty($permission))
                                                            @if($permission->label == "admin")
                                                                <li>
                                                                    <label>
                                                                        <input type="checkbox" name="permission[]"
                                                                               value="{{$permission->id}}"/>
                                                                        {{$permission->name}}
                                                                    </label>
                                                                </li>
                                                            @endif
                                                        @endif
                                                    @endforeach
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr/>
                        <div class="form-group">
                            <input type="submit" value="ثبت بخش" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
