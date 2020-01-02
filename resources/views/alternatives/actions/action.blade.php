<a data-toggle="modal" role="button" data-target="#modal-edit-{{$alternative->id}}">
    <img src="{{url('/public/icon/icons8-edit-144.png')}}"
         width="25" title="ویرایش">
</a>


<div class="modal fade" id="modal-edit-{{$alternative->id}}" tabIndex="-1">
    <div class="modal-dialog col-md-12">
        <div class="modal-content">
            <div class="modal-body col-md-12">
                <div class="portlet box blue">
                    <div class="portlet-title">
                        <div class="caption">
                            ویرایش جابجایی
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <div class="form-body">
                            <div class="form-group">
                                <form method="post" action="{{route('admin.user.alternatives.store')}}"
                                      class="mt-repeater"
                                      enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>درخواست دهنده</label>
                                                <select dir="rtl" id="select2-examp" class="form-control"
                                                        name="user_id"
                                                        required>
                                                    @foreach($users as $user)
                                                        @if(!empty($user))
                                                            <option value="{{$user->id}}"
                                                                    @if($alternative->user_id == $user->id)
                                                                    selected
                                                                @endif
                                                            >{{$user->name}}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>جایگزین</label>
                                                <br/>
                                                <select dir="rtl" id="select2-exampl" class="form-control"
                                                        name="alternate_id"
                                                        required>
                                                    @foreach($users as $user)
                                                        @if(!empty($user))
                                                            <option value="{{$user->id}}"
                                                                    @if($alternative->alternate_id == $user->id)
                                                                    selected
                                                                @endif>{{$user->name}}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>


                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>از تاریخ</label>
                                                <input type="text" name="from" class="form-control"
                                                value="{{$alternative->from}}"
                                                />

                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>تا تاریخ</label>
                                                <input type="text" name="ToDate" class="form-control"
                                                       value="{{$alternative->ToDate}}"/>

                                            </div>
                                        </div>

                                    </div>
                                    <hr/>
                                    <div class="form-group">
                                        <input type="submit" value="تایید" class="btn btn-primary">
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


{{--<a data-toggle="modal" role="button" data-target="#modal-delete-{{$alternative->id}}">--}}
{{--    <img src="{{url('/public/icon/icons8-delete-bin-96.png')}}"--}}
{{--         width="25" title="ویرایش">--}}
{{--</a>--}}
{{--<div class="modal fade" id="modal-delete-{{$alternative->id}}" tabIndex="-1">--}}
{{--    <div class="modal-dialog">--}}
{{--        <div class="modal-content">--}}
{{--            <div class="modal-body">--}}
{{--                <p><span style="color: red">توجه!</span> اطلاعات حذف شده قابل--}}
{{--                    بازیابی نخواهند بود</p>--}}
{{--                ایا از حذف مشخصات این قالب مطمئن هستید؟--}}
{{--            </div>--}}
{{--            <div class="modal-footer">--}}
{{--                <button type="button" class="btn btn-danger pull-left"--}}
{{--                        data-dismiss="modal">--}}
{{--                    انصراف--}}
{{--                </button>--}}
{{--                <a href="{{route('admin.format.delete',$format->id)}}"--}}
{{--                   class="btn btn-primary">حذف</a>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
