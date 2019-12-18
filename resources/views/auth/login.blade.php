<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <meta charset="utf-8"/>
    <title>ورود به پنل مدیریت پولاد</title>
    <link href="{{asset('/public/assets/global/plugins/bootstrap/css/bootstrap-rtl.min.css')}}" rel="stylesheet"
          type="text/css"/>
    <link href="{{asset('/public/assets/global/css/components-md-rtl.min.css')}}" rel="stylesheet" id="style_components"
          type="text/css"/>
    <link href="{{asset('/public/assets/pages/css/login-5-rtl.min.css')}}" rel="stylesheet" type="text/css"/>
</head>
<body class=" login">
<div class="user-login-5">
    <div class="row bs-reset">
        <div class="col-md-6 bs-reset mt-login-5-bsfix">
            <div class="login-bg">
                <img src="{{url('/public/assets/pages/img/login/bg1.jpg')}}" width="104.3%">
                <img class="login-logo" src="{{url('/public/assets/pages/img/login/logo.png')}}"/></div>
        </div>
        <div class="col-md-6 login-container bs-reset mt-login-5-bsfix">
            <div class="login-content">
                <h1>سیستم مدیریت پولاد</h1>
                <p>سیستم جامع مدیریت گروه صنعتی پولاد پویش</p>
                <form method="POST" action="{{ route('login') }}" class="login-form">
                    @csrf
                    <div class="alert alert-danger display-hide">
                        <button class="close" data-close="alert"></button>
                        <span>لطفا نام کاربری و کلمه عبور خود را وارد کنید.</span>
                    </div>
                    @if(session()->has('checkUser'))
                        <div id="alert" class="alert alert-danger alert-dismissible">
                            <button type="button" class="close pull-left" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h4><i class="icon fa fa-trash"></i>خطا!</h4>
                            کاربر عزیز دسترسی های شما غیر فعال شده است.
                        </div>

                    @endif
                    <div class="row">
                        <div class="col-xs-6">
                            <input class="form-control form-control-solid placeholder-no-fix form-group" type="text"
                                   autocomplete="off" placeholder="نام کاربری" name="email" required/>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong style="color: red">{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="col-xs-6">
                            <input class="form-control form-control-solid placeholder-no-fix form-group" type="password"
                                   autocomplete="off" placeholder="کلمه عبور" name="password" required/></div>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                        <strong style="color: red">{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="rem-password">
                                <label class="rememberme mt-checkbox mt-checkbox-outline">
                                    <input type="checkbox" name="remember" value="1"/> من را بخاطر بسپار
                                    <span></span>
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-8 text-right">
                            <div class="forgot-password">
                                <a href="javascript:;" id="forget-password" class="forget-password"><span
                                        style="color: blue">کلمه عبور را فراموش کرده ام؟</span></a>
                            </div>
                            <button class="btn green" type="submit">ورود به سیستم</button>
                        </div>
                    </div>
                </form>
                <form class="forget-form" action="javascript:;" method="post">
                    <h3 class="font-green">کلمه عبور خود را فراموش کرده ام؟</h3>
                    <p> لطفا شماره همراهی که در سیستم ثبت شده است را وارد کنید. </p>
                    <div class="form-group">
                        <input class="form-control placeholder-no-fix form-group" type="text" autocomplete="off"
                               placeholder="شماره همراه" name="email"/></div>
                    <div class="form-actions">
                        <button type="button" id="back-btn" class="btn green btn-outline">بازگشت</button>
                        <button type="submit" class="btn btn-success uppercase pull-right">ارسال</button>
                    </div>
                </form>
            </div>
            <div class="login-footer">
                <div class="row bs-reset">
                    <div class="col-xs-7 bs-reset">
                        <div class="login-copyright text-right">
                            <span>تمام حقوق این سیستم متعلق به <a>گروه صنعتی پولاد پویش</a> میباشد.</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('/public/assets/global/plugins/jquery.min.js')}}" type="text/javascript"></script>
<script src="{{asset('/public/assets/global/plugins/jquery-validation/js/jquery.validate.min.js')}}"
        type="text/javascript"></script>
<script src="{{asset('/public/assets/global/plugins/jquery-validation/js/additional-methods.min.js')}}"
        type="text/javascript"></script>
<script src="{{asset('/public/assets/global/plugins/backstretch/jquery.backstretch.min.js')}}"
        type="text/javascript"></script>
<script src="{{asset('/public//assets/pages/scripts/login-5.min.js')}}" type="text/javascript"></script>
</body>

</html>
