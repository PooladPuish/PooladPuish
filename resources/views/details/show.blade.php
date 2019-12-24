@extends('layouts.master')
@section('content')
    @include('message.msg')
    <div class="row">
        <div class="col-md-12">
            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption">
                        لیست دسترسی ها
                    </div>
                    <div class="tools"></div>
                </div>
                <div class="portlet-body">
                    <table class="table table-striped table-bordered table-hover" id="sample_2">
                        <thead>
                        <tr>
                            <th>عنوان</th>
                            <th>تاریخ ایجاد</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($roles as $role)
                            <tr>
                                <td>{{$role->name}}</td>
                                <td>{{\Morilog\Jalali\Jalalian::forge($role->created_at)->format('Y/m/d')}}</td>
                                <td>
                                    <a href="{{route('admin.role.edit',$role->id)}}">
                                        <img src="{{url('/public/icon/icons8-update-64.png')}}"
                                             width="25" title="ویرایش">
                                    </a>
                                    <a href="{{route('admin.role.delete',$role->id)}}">
                                        <img src="{{url('/public/icon/delete.png')}}"
                                             width="25" title="حذف دسترسی">
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
