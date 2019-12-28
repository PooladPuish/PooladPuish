@extends('layouts.master')
@section('content')
    @include('message.msg')

    <div class="portlet box blue">
        <div class="portlet-title">
            <div class="caption">
                ثبت جابجایی
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
                                    <label>کاربر</label>
                                    <select dir="rtl" id="select2-examp" class="form-control"
                                            name="user_id"
                                            required>
                                        @foreach($users as $user)
                                            @if(!empty($user))
                                                <option value="{{$user->id}}">{{$user->name}}</option>
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
                                                <option value="{{$user->id}}">{{$user->name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>از تاریخ</label>
                                    <input type="text" name="from" class="form-control example1"/>

                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>تا تاریخ</label>
                                    <input type="text" name="ToDate" class="form-control example1"/>

                                </div>
                            </div>

                        </div>
                        <hr/>
                        <div class="form-group">
                            <input type="submit" value="ثبت عملیات" class="btn btn-primary">
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection
