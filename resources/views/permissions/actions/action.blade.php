<a data-toggle="modal" role="button"
   data-target="#modal-edit-{{$permission->id}}">
    <img src="{{url('/public/icon/icons8-edit-144.png')}}"
         width="25" title="ویرایش">
</a>


<div class="modal fade" id="modal-edit-{{$permission->id}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
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
                                    <input type="hidden" name="id" value="{{$permission->id}}">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>دسترسی</label>
                                                <input type="text" id="name" name="name" class="form-control"
                                                       required
                                                       value="{{$permission->name}}"
                                                >
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>قسمت</label>
                                                <input type="text" id="label" name="label" class="form-control"
                                                       required
                                                       value="{{$permission->label}}"
                                                >
                                            </div>
                                        </div>

                                    </div>
                                    <hr/>
                                    <div class="form-group">
                                        <input type="submit" value="ثبت"
                                               class="btn btn-primary">
                                        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">
                                            انصراف
                                        </button>
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


@php
    $pers =DB::table('permission_role')->where('permission_id',$permission->id)->first();
@endphp
@if(empty($pers))
    <a href="{{route('admin.permission.delete',$permission->id)}}">
        <img src="{{url('/public/icon/icons8-delete-bin-96.png')}}"
             width="25" title="حذف دسترسی">
    </a>
@endif
