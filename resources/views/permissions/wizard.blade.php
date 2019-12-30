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
                            <th>نام دسترسی</th>
                            <th>قسمت</th>
                            <th>تاریخ ایجاد</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($permissions as $permission)
                            <tr>
                                <td>
                                    @if(strpos($permission->label,"/"))
                                        --{{$permission->name}}
                                    @else
                                        {{$permission->name}}
                                    @endif
                                </td>
                                <td>{{$permission->label}}</td>
                                <td>{{\Morilog\Jalali\Jalalian::forge($permission->created_at)->format('Y/m/d')}}</td>
                                <td>
                                    <a href="{{route('admin.user.permission',$permission->id)}}">
                                        <img src="{{url('/public/icon/icons8-edit-144.png')}}"
                                             width="25" title="ویرایش">
                                    </a>

                                    @php
                                        $pers =DB::table('permission_role')->where('permission_id',$permission->id)->first();
                                    @endphp
                                    @if(empty($pers))
                                        <a href="{{route('admin.permission.delete',$permission->id)}}">
                                            <img src="{{url('/public/icon/icons8-delete-bin-96.png')}}"
                                                 width="25" title="حذف دسترسی">
                                        </a>
                                @endif


                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row col-md-6">
                <div class="portlet box blue">
                    <div class="portlet-title">
                        <div class="caption">
                            افزودن دسترسی
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <div class="form-body">
                            <div class="form-group">
                                <form method="post" action="{{route('admin.permission.store')}}"
                                      class="mt-repeater"
                                      enctype="multipart/form-data">
                                    @csrf
                                    @if($id)
                                        <input type="hidden" name="id" value="{{$id->id}}">
                                    @endif
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>دسترسی</label>
                                                <input type="text" id="name" name="name" class="form-control"
                                                       required
                                                       @if($id) value="{{$id->name}}" @endif>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>عنوان دسترسی</label>
                                                <input type="text" id="label" name="label" class="form-control"
                                                       required
                                                       @if($id) value="{{$id->label}}" @endif>
                                            </div>
                                        </div>

                                    </div>
                                    <hr/>
                                    <div class="form-group">
                                        <input type="submit" value="ثبت " class="btn btn-primary">
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>


            </div>

        </div>

    </div>
@endsection
