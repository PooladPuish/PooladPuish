@can('ویرایش')
    <a data-toggle="modal" role="button"
       data-target="#modal-edit-{{$user->id}}">
        <img src="{{url('/public/icon/icons8-edit-144.png')}}"
             width="25" title="ویرایش">
    </a>
    <?php
    $role = \DB::table('role_user')->where('user_id', $user->id)
        ->pluck('role_id')
        ->all();
    if (!empty($role)) {
        foreach ($user->roles as $role)
            $rol = $role->id;
    } else {
        $rol = null;
    }
    ?>
    <div class="modal fade" id="modal-edit-{{$user->id}}">
        <div class="modal-dialog col-md-12">
            <div class="modal-content">
                <div class="modal-body col-md-12">
                    <div class="portlet box blue">
                        <div class="portlet-title">
                            <div class="caption">
                                ویرایش کاربر
                            </div>
                        </div>
                        <div class="portlet-body form">
                            <div class="form-body">
                                <div class="form-group">
                                    <form method="post"
                                          action="{{route('admin.user.updates')}}"
                                          class="mt-repeater"
                                          enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="id"
                                               value="{{$user->id}}">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>نام و نام
                                                        خانوادگی</label>
                                                    <input type="text" id="name"
                                                           name="name"
                                                           class="form-control"
                                                           required
                                                           value="{{$user->name}}">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>نام کاربری</label>
                                                    <input type="text"
                                                           id="email"
                                                           name="email"
                                                           class="form-control"
                                                           required
                                                           value="{{$user->email}}">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>شماره تماس</label>
                                                    <input type="text"
                                                           id="phone"
                                                           name="phone"
                                                           class="form-control"
                                                           required
                                                           value="{{$user->phone}}">
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>تصویر پروفایل</label>
                                                    <input type="file"
                                                           name="avatar"
                                                           class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>امضا</label>
                                                    <input type="file"
                                                           name="sign"
                                                           class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>نقش</label>
                                                    <select dir="rtl"
                                                            id="select2-exampled"
                                                            class="form-control"
                                                            name="roles[]"
                                                            multiple
                                                            required>
                                                        @foreach($roles as $role)
                                                            @if(!empty($role))
                                                                <option
                                                                    value="{{$role->id}}"
                                                                    @if($rol == $role->id) selected @endif>{{$role->name}}</option>
                                                            @endif
                                                        @endforeach

                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>کلمه عبور</label>
                                                    <input type="password"
                                                           id="password"
                                                           name="password"
                                                           class="form-control">
                                                </div>
                                            </div>

                                        </div>
                                        <hr/>
                                        <div class="form-group">
                                            <input type="submit" value="تایید"
                                                   class="btn btn-primary">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">
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

@endcan
@can('حذف')
    <a href="{{route('admin.user.disable',$user->id)}}">
        <img src="{{url('/public/icon/icons8-key-144.png')}}"
             width="25" title="فعال و غیر فعال کردن کاربر">
    </a>
@endcan
