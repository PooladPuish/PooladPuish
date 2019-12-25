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
                            <th>نقش</th>
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
                                        <img src="{{url('/public/icon/icons8-edit-144.png')}}"
                                             width="25" title="ویرایش">
                                    </a>
                                    @php
                                        $ro =DB::table('role_user')->where('role_id',$role->id)->first();
                                    @endphp
                                    @if(empty($ro))
                                        <a href="{{route('admin.role.delete',$role->id)}}">
                                            <img src="{{url('/public/icon/icons8-delete-bin-96.png')}}"
                                                 width="25" title="حذف دسترسی">
                                        </a>
                                    @endif
                                    @endforeach
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
