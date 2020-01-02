@php
    $users = DB::table('role_user')->where('user_id',auth()->user()->id)->get();
    foreach ($users as $user)
    $roles = \App\Role::where('id',$user->role_id)->get();
    foreach ($roles as $role)
        $users = \App\User::all();
        $alternatives = \App\Alternatives::where('alternate_id',auth()->user()->id)
        ->whereNull('status')
        ->whereNull('view')
        ->get();
              foreach ($alternatives as $alternative)
@endphp
    <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>سیستم مدیریت پولاد صنعت</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="{{asset('/public/dist/css/bootstrap-theme.css')}}">
    <link rel="stylesheet" href="{{asset('/public/dist/css/rtl.css')}}">
    <link rel="stylesheet" href="{{asset('/public/bower_components/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('/public/bower_components/Ionicons/css/ionicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('/public/dist/css/AdminLTE.css')}}">
    <link rel="stylesheet" href="{{asset('/public/dist/css/skins/_all-skins.min.css')}}">
    <link rel="stylesheet" href="{{asset('/public/bower_components/jvectormap/jquery-jvectormap.css')}}">
    <link rel="stylesheet" href="{{asset('/public/bower_components/bootstrap-daterangepicker/daterangepicker.css')}}">
    <link rel="stylesheet" href="{{asset('/public/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">
    <link rel="stylesheet" href="{{asset('/public/bower_components/select2/dist/css/select2.min.css')}}">
    <link href="{{asset('/public/assets/global/plugins/datatables/datatables.min.css')}}" rel="stylesheet"
          type="text/css"/>
    <link href="{{asset('/public/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap-rtl.css')}}"
          rel="stylesheet" type="text/css"/>
    <link href="{{asset('/public/assets/global/css/components-md-rtl.min.css')}}" rel="stylesheet" id="style_components"
          type="text/css"/>
    <link href="{{asset('/public/assets/global/css/plugins-md-rtl.min.css')}}" rel="stylesheet" type="text/css"/>
    <style>
        @font-face {
            font-family: 'Shahab';
            src: url('http://cdn.font-store.ir/fonts/shahab/Shahab-Regular.woff2') format('woff2'),
            url('http://cdn.font-store.ir/fonts/shahab/Shahab-Regular.woff') format('woff'),
            url('http://cdn.font-store.ir/fonts/shahab/Shahab-Regular.ttf') format('truetype'),
            url('http://cdn.font-store.ir/fonts/shahab/Shahab-Regular.otf') format('opentype');
            font-weight: normal;
            font-style: normal;
        }
    </style>
    <style>
        .example-modal .modal {
            position: relative;
            top: auto;
            bottom: auto;
            right: auto;
            left: auto;
            display: block;
            z-index: 1;
        }

        .example-modal .modal {
            background: transparent !important;
        }
    </style>
    <link rel="shortcut icon" type="image/x-icon" href="{{url('/public/icon/logo.png')}}"/>
    <link href="{{asset('/public/assets/persian-datepicker.css')}}" rel="stylesheet" type="text/css"/>
    <style>
        #loader {
            position: fixed;
            left: 0px;
            top: 0px;
            width: 100%;
            height: 100%;
            z-index: 9999;
            background: url({{url('/public/icon/Preloader_2.gif')}}) center no-repeat #fff;
        }
    </style>
    <style>
        /* Expand button to all of option */
        .select2-results__option.select2-results__message {
            padding: 0px;
        }

        button#no-results-btn {
            width: 100%;
            height: 100%;
            padding: 6px;
        }

        /* Make button look like other li elements */
        button#no-results-btn {
            border: 0;
            background-color: white;
            text-align: left;
        }

        /* Give button same hover effect */
        .select2-results__option.select2-results__message:hover {
            color: white;
        }

        button#no-results-btn:hover {
            background-color: #5897fb;
        }
    </style>
</head>
<body class="hold-transition skin-blue sidebar-mini" style="font-family: Shahab"
      onload="myFunction()">
<div id="loader"></div>
<div class="wrapper">
    <header class="main-header">
        <a href="#" class="logo">
            <span class="logo-mini">پولاد</span>
            <span class="logo-lg"><b>سیستم مدیریت</b></span>
        </a>
        <nav class="navbar navbar-static-top">
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <li class="dropdown messages-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-envelope-o"></i>
                            <span class="label label-success">1</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">1 پیام خوانده نشده</li>
                            <li>
                                <ul class="menu">
                                    <li>
                                        <a href="#">
                                            <div class="pull-right">
                                                <img src="{{url('/public/dist/img/user2-160x160.jpg')}}"
                                                     class="img-circle"
                                                     alt="User Image">
                                            </div>
                                            <h4>
                                                علیرضا
                                                <small><i class="fa fa-clock-o"></i> ۵ دقیقه پیش</small>
                                            </h4>
                                            <p>متن پیام</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="footer"><a href="#">نمایش تمام پیام ها</a></li>
                        </ul>
                    </li>
                    <li class="dropdown notifications-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-bell-o"></i>
                            @if(!empty($alternative))
                                @if(auth()->user()->id == $alternative->alternate_id)
                                    <span class="label label-warning">{{count($alternatives)}}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">{{count($alternatives)}} اعلان جدید</li>
                            <li>
                                <ul class="menu">
                                    <li>
                                        <a data-toggle="modal" data-target="#modal-default">
                                            <i class="fa fa-warning text-yellow"></i>{{count($alternatives)}}
                                            درخواست
                                            جابجایی برای شما
                                            ثبت شده است
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="footer"><a href="#">نمایش همه</a></li>
                        </ul>
                        @endif
                        @endif
                    </li>
                    <li class="dropdown notifications-menu">
                        <a href="{{route('admin.user.lock')}}" class="dropdown-toggle">
                            <i class="fa fa-lock"></i>
                        </a>
                    </li>
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            @if(!empty(auth()->user()->avatar))
                                <img src="{{url(auth()->user()->avatar)}}" class="user-image" alt="User Image">
                            @else
                                <img src="{{url('/public/icon/male-user.png')}}" class="user-image"
                                     alt="User Image">
                            @endif
                            <span class="hidden-xs">{{auth()->user()->name}}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="user-header">
                                @if(!empty(auth()->user()->avatar))
                                    <img src="{{url(auth()->user()->avatar)}}" class="img-circle" alt="User Image">
                                @else
                                    <img src="{{url('/public/icon/male-user.png')}}" class="img-circle"
                                         alt="User Image">
                                @endif
                                <p>
                                    {{auth()->user()->name}}
                                    <small>{{$role->name}}</small>
                                </p>
                            </li>
                            <li class="user-footer">
                                <div class="pull-right">
                                    <a href="{{route('admin.user.profile')}}"
                                       class="btn btn-default btn-flat">پروفایل</a>
                                </div>
                                <div class="pull-left">
                                    <a class="btn btn-default btn-flat" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                                        خروج
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                          style="display: none;">
                                        @csrf
                                    </form>

                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <aside class="main-sidebar">
        <section class="sidebar">
            <div class="user-panel">
                <div class="pull-right image">
                    @if(!empty(auth()->user()->avatar))
                        <img src="{{url(auth()->user()->avatar)}}" class="img-circle" alt="User Image">
                    @else
                        <img src="{{url('/public/icon/male-user.png')}}" class="img-circle" alt="User Image">
                    @endif
                </div>
                <div class="pull-right info">
                    <p>{{auth()->user()->name}}</p>
                </div>
            </div>
            <ul class="sidebar-menu" data-widget="tree">
                <li class="active">
                    <a href="{{route('home')}}">
                        <i class="fa fa-dashboard"></i> <span>داشبورد</span>
                        <span class="pull-left-container">
            </span>
                    </a>
                </li>
                @if(Gate::check('ثبت کاربر جدید') || Gate::check('لیست کاربران')
                    || Gate::check('ثبت دسترسی جدید') || Gate::check('لیست دسترسی ها')
                     ||Gate::check('تعیین جانشین'))
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-user"></i> <span>مدیریت کاربران</span>
                            <span class="pull-left-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                        </a>
                        <ul class="treeview-menu">
                            @if(Gate::check('نام و نام خانوادگی') || Gate::check('نقش')
                                || Gate::check('نام کاربری')
                                || Gate::check('شماره تماس')
                                ||Gate::check('انلاین')
                                ||Gate::check('تاریخ ایجاد')
                                ||Gate::check('وضعیت'))
                                <li><a href="{{route('admin.user.show')}}"><i class="fa fa-circle-o"></i>لیست
                                        کاربران</a>
                                </li>
                            @endif
                            @can('دسترسی ها')
                                <li><a href="{{route('admin.user.permission')}}"><i
                                            class="fa fa-circle-o"></i>تعریف دسترسی ها</a>
                                </li>
                            @endcan
                            @can('لیست دسترسی ها')
                                <li><a href="{{route('admin.role.show')}}"><i class="fa fa-circle-o"></i>تعریف نقش ها</a>
                                </li>
                            @endcan
                            @can('تعیین جانشین')
                                <li><a href="{{route('admin.user.alternatives')}}"><i
                                            class="fa fa-circle-o"></i>لیست جابجایی ها</a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endif


                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-star"></i> <span>تعاریف پایه</span>
                        <span class="pull-left-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{route('admin.commodity.list')}}"><i
                                    class="fa fa-circle-o"></i>گروه کالایی</a>
                        </li>

                        <li><a href="{{route('admin.ProductCharacteristic.list')}}"><i
                                    class="fa fa-circle-o"></i>مشخصه محصول</a>
                        </li>
                        <li><a href="{{route('admin.product.list')}}"><i
                                    class="fa fa-circle-o"></i>تعریف محصول</a>
                        </li>
                        <li><a href="{{route('admin.models.list')}}"><i
                                    class="fa fa-circle-o"></i>تعریف قالب سازها</a>
                        </li>
                        <li><a href="{{route('admin.format.list')}}"><i
                                    class="fa fa-circle-o"></i>تعریف قالب</a>
                        </li>
                        <li><a href="{{route('admin.device.list')}}"><i
                                    class="fa fa-circle-o"></i>تعریف دستگاه</a>
                        </li>
                        <li><a href="{{route('admin.color.list')}}"><i
                                    class="fa fa-circle-o"></i>تعریف رنگ</a>
                        </li>
                        <li><a href="{{route('admin.polymeric.list')}}"><i
                                    class="fa fa-circle-o"></i>مواد پلیمیری</a>
                        </li>
                        <li><a href="{{route('admin.seller.list')}}"><i
                                    class="fa fa-circle-o"></i>فروشنده</a>
                        </li>

                    </ul>
                </li>


                @if(Gate::check('بازسازی نرم افزار') || Gate::check('شروع به کار نرم افزار'))
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-hourglass-start"></i> <span>تنظیمات نرم افزار</span>
                            <span class="pull-left-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                        </a>
                        <ul class="treeview-menu">
                            @can('بازسازی نرم افزار')
                                <li><a href="{{route('admin.users.system.stop')}}"><i
                                            class="fa fa-circle-o"></i>بازسازی نرم افزار</a>
                                </li>
                            @endcan
                            @can('شروع به کار نرم افزار')
                                <li><a href="{{route('admin.users.system.start')}}"><i
                                            class="fa fa-circle-o"></i>شروع به کار نرم افزار</a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endif


            </ul>
        </section>
    </aside>
    <div class="content-wrapper animate-bottom" style="display:none;" id="myDiv">
        <section class="content">
            @yield('content')
        </section>
    </div>
    <footer class="main-footer text-right">
        <strong>تمام حقوق این سیستم متعلق به <a>پولاد صنعت</a> میباشد.</strong>
    </footer>
</div>


<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">اطلاعات جانشینی</h4>
            </div>
            <div class="modal-body">
                @foreach($users as $user)
                    @if(!empty($alternative))
                        @if($user->id == $alternative->user_id)
                            <p>{{auth()->user()->name}} عزیز شما برای جایگزینی {{$user->name}} از
                                تاریخ {{$alternative->from}} تا تاریخ {{$alternative->ToDate}} انتخاب شده اید لطفا در
                                نظر
                                داشته باشید در این مدت تمام دسترسی های {{$user->name}} برای شما نیز قابل دسترس میباشد
                                .</p>
                        @endif
                    @endif
                @endforeach
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">خروج</button>
                <a type="button" class="btn btn-primary" href="{{route('admin.user.alternatives.view')}}">تایید</a>
            </div>
        </div>
    </div>
</div>




<script src="{{asset('/public/bower_components/jquery/dist/jquery.min.js')}}"></script>
<script src="{{asset('/public/bower_components/jquery-ui/jquery-ui.min.js')}}"></script>
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<script src="{{asset('/public/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<script src="{{asset('/public/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js')}}"></script>
<script src="{{asset('/public/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script src="{{asset('/public/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
<script src="{{asset('/public/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
<script src="{{asset('/public/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<script src="{{asset('/public/bower_components/fastclick/lib/fastclick.js')}}"></script>
<script src="{{asset('/public/dist/js/adminlte.min.js')}}"></script>
<script src="{{asset('/public/dist/js/pages/dashboard.js')}}"></script>
<script src="{{asset('/public/dist/js/demo.js')}}"></script>
<script src="{{asset('/public/assets/sweetalert.js')}}"></script>
<script src="{{asset('/public/assets/select2.js')}}"></script>
<script>
    $("#single").select2({
        language: {
            noResults: function () {
                return 'نقش با این نام یافت نشد';
            },
        },
        placeholder: " نقش کاربر را انتخاب کنین",
        allowClear: true

    });
    $("#multiple").select2({
        language: {
            noResults: function () {
                return 'نقش با این نام یافت نشد';
            },
        },
        placeholder: " نقش کاربر را انتخاب کنین",
        allowClear: true
    });
    $("#singl").select2({
        language: {
            noResults: function () {
                return 'کاربری با این نام یافت نشد';
            },
        },
        placeholder: "لطفا فرد جایگزین را انتخاب کنین",
    });
    $("#multipl").select2({
        language: {
            noResults: function () {
                return 'کاربری با این نام یافت نشد';
            },
        },
        placeholder: "لطفا کاربر را انتخاب کنین",
    });
</script>
<script src="{{asset('/public/assets/global/scripts/datatable.js')}}" type="text/javascript"></script>
<script src="{{asset('/public/assets/global/plugins/datatables/datatables.min.js')}}" type="text/javascript"></script>
<script src="{{asset('/public/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js')}}"
        type="text/javascript"></script>
<script src="{{asset('/public/assets/pages/scripts/table-datatables-colreorder.js')}}"
        type="text/javascript"></script>
<script src="{{asset('/public/assets/persian-date.js')}}"></script>
<script src="{{asset('/public/assets/persian-datepicker.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $(".example1").persianDatepicker({
            observer: true,
            format: 'YYYY/MM/DD',
            altField: '.example1-alt',
        });
    });
</script>
<script>
    var myVar;

    function myFunction() {
        myVar = setTimeout(showPage, 1000);
    }

    function showPage() {
        document.getElementById("loader").style.display = "none";
        document.getElementById("myDiv").style.display = "block";
    }
</script>
<script>
    $(document).ready(function () {
        $('#select2-example').select2({
            width: '100%',
            placeholder: 'نقش پرسنل',
            language: {
                noResults: function () {
                    return 'نقش با این نام یافت نشد';
                },
            },
        });
    });
    $(document).ready(function () {
        $('#select2-exampled').select2({
            width: '100%',
            placeholder: 'نقش پرسنل',
            language: {
                noResults: function () {
                    return 'نقش با این نام یافت نشد';
                },
            },
        });
    });
    $(document).ready(function () {
        $('#select2-exampl').select2({
            width: '100%',
            placeholder: 'لطفا پرسنل را انتخاب کنید',
            language: {
                noResults: function () {
                    return 'پرسنلی با این نام یافت نشد';
                },
            },
        });
    });
    $(document).ready(function () {
        $('#select2-examp').select2({
            width: '100%',
            placeholder: 'لطفا پرسنل را انتخاب کنید',
            language: {
                noResults: function () {
                    return 'پرسنلی با این نام یافت نشد';
                },
            },
        });
    });

    $(document).ready(function () {
        $('#select2-pro').select2({
            width: '100%',
            placeholder: 'لطفا گروه کالا را انتخاب کنید',
            language: {
                noResults: function () {
                    return 'گروه کالا با این نام یافت نشد';
                },
            },
        });
    });
    $(document).ready(function () {
        $('#select2-prod').select2({
            width: '100%',
            placeholder: 'لطفا گروه کالا را انتخاب کنید',
            language: {
                noResults: function () {
                    return 'گروه کالا با این نام یافت نشد';
                },
            },
        });
    });

    $(document).ready(function () {
        $('#select2-prodd').select2({
            width: '100%',
            placeholder: 'لطفا گروه کالا را انتخاب کنید',
            language: {
                noResults: function () {
                    return 'گروه کالا با این نام یافت نشد';
                },
            },
        });
    });











    $(document).ready(function () {
        $('#select2-a').select2({
            width: '100%',
            placeholder: 'لطفا قالب ساز را انتخاب کنید',
            language: {
                noResults: function () {
                    return 'قالب ساز با این نام یافت نشد';
                },
            },
        });
    });
    $(document).ready(function () {
        $('#select2-aa').select2({
            width: '100%',
            placeholder: 'لطفا قالب ساز را انتخاب کنید',
            language: {
                noResults: function () {
                    return 'قالب ساز با این نام یافت نشد';
                },
            },
        });
    });
    $(document).ready(function () {
        $('#select2-b').select2({
            width: '100%',
            placeholder: 'لطفا مشخصه محصول را انتخاب کنید',
            language: {
                noResults: function () {
                    return 'مشخصه محصول با این نام یافت نشد';
                },
            },
        });
    });
    $(document).ready(function () {
        $('#select2-bb').select2({
            width: '100%',
            placeholder: 'لطفا مشخصه محصول را انتخاب کنید',
            language: {
                noResults: function () {
                    return 'مشخصه محصول با این نام یافت نشد';
                },
            },
        });
    });
    $(document).ready(function () {
        $('#select2-c').select2({
            width: '100%',
            placeholder: 'لطفا محصول را انتخاب کنید',
            language: {
                noResults: function () {
                    return 'محصول با این نام یافت نشد';
                },
            },
        });
    });
    $(document).ready(function () {
        $('#select2-cc').select2({
            width: '100%',
            placeholder: 'لطفا محصول را انتخاب کنید',
            language: {
                noResults: function () {
                    return 'محصول با این نام یافت نشد';
                },
            },
        });
    });

</script>

</body>
</html>
