@php
    $users = DB::table('role_user')->where('user_id',auth()->user()->id)->get();
    foreach ($users as $user)
    $roles = \App\Role::where('id',$user->role_id)->get();
    foreach ($roles as $role)
@endphp
    <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>سیستم مدیریت پولاد</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{asset('/public/dist/css/bootstrap-theme.css')}}">
    <!-- Bootstrap rtl -->
    <link rel="stylesheet" href="{{asset('/public/dist/css/rtl.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('/public/bower_components/font-awesome/css/font-awesome.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{asset('/public/bower_components/Ionicons/css/ionicons.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('/public/dist/css/AdminLTE.css')}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{asset('/public/dist/css/skins/_all-skins.min.css')}}">
    <!-- jvectormap -->
    <link rel="stylesheet" href="{{asset('/public/bower_components/jvectormap/jquery-jvectormap.css')}}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{asset('/public/bower_components/bootstrap-daterangepicker/daterangepicker.css')}}">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="{{asset('/public/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">
    <!-- Google Font -->
    <link rel="stylesheet" href="{{asset('/public/bower_components/select2/dist/css/select2.min.css')}}">
    {{--<link rel="stylesheet" href="{{asset('/public/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">--}}
    {{--<link rel="stylesheet" href="{{asset('/public/dist/css/persian-datepicker-0.4.5.min.css')}}" />--}}
    <link href="{{asset('/public/assets/global/plugins/datatables/datatables.min.css')}}" rel="stylesheet"
          type="text/css"/>
    <link href="{{asset('/public/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap-rtl.css')}}"
          rel="stylesheet" type="text/css"/>
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN THEME GLOBAL STYLES -->
    <link href="{{asset('/public/assets/global/css/components-md-rtl.min.css')}}" rel="stylesheet" id="style_components"
          type="text/css"/>
    <link href="{{asset('/public/assets/global/css/plugins-md-rtl.min.css')}}" rel="stylesheet" type="text/css"/>
    <!-- END THEME GLOBAL STYLES -->
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
</head>
<body class="hold-transition skin-blue sidebar-mini" style="font-family: Shahab">
<div class="wrapper">
    <header class="main-header">
        <!-- Logo -->
        <a href="index2.html" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini">پولاد</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>سیستم مدیریت</b></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- Messages: style can be found in dropdown.less-->
                    <li class="dropdown messages-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-envelope-o"></i>
                            <span class="label label-success">1</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">1 پیام خوانده نشده</li>
                            <li>
                                <!-- inner menu: contains the actual data -->
                                <ul class="menu">
                                    <li><!-- start message -->
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
                    <!-- Notifications: style can be found in dropdown.less -->
                    <li class="dropdown notifications-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-bell-o"></i>
                            <span class="label label-warning">1</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">1 اعلان جدید</li>
                            <li>
                                <!-- inner menu: contains the actual data -->
                                <ul class="menu">
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-warning text-yellow"></i> اخطار دقت کنید
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="footer"><a href="#">نمایش همه</a></li>
                        </ul>
                    </li>
                    <li class="dropdown notifications-menu">
                        <a href="{{route('admin.user.lock')}}" class="dropdown-toggle">
                            <i class="fa fa-lock"></i>
                        </a>
                    </li>
                    <!-- Tasks: style can be found in dropdown.less -->
                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            @if(!empty(auth()->user()->avatar))
                                <img src="{{url(auth()->user()->avatar)}}" class="user-image" alt="User Image">
                            @else
                                <img src="{{url('/public/icon/male-user.png')}}" class="user-image" alt="User Image">
                            @endif


                            <span class="hidden-xs">{{auth()->user()->name}}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
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
                            <!-- Menu Footer-->
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
    <!-- right side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
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

            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu" data-widget="tree">
                <li class="active">
                    <a href="{{route('home')}}">
                        <i class="fa fa-dashboard"></i> <span>داشبورد</span>
                        <span class="pull-left-container">
            </span>
                    </a>
                </li>
                @if(Gate::check('ثبت کاربر جدید') || Gate::check('لیست کاربران'))
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-user"></i> <span>مدیریت کاربران</span>
                            <span class="pull-left-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                        </a>
                        <ul class="treeview-menu">
                            @can('ثبت کاربر جدید')
                                <li><a href="{{route('admin.user.wizard')}}"><i class="fa fa-circle-o"></i>ثبت کاربر
                                        جدید</a>
                                </li>
                            @endcan
                            @can('لیست کاربران')

                                <li><a href="{{route('admin.user.show')}}"><i class="fa fa-circle-o"></i>لیست
                                        کاربران</a></li>
                            @endcan
                        </ul>
                    </li>
                @endif
                @if(Gate::check('ثبت بخش جدید') || Gate::check('لیست بخش ها'))
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-edit"></i> <span>مدیریت بخش ها</span>
                            <span class="pull-left-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                        </a>
                        <ul class="treeview-menu">
                            @can('ثبت بخش جدید')

                                <li><a href="{{route('admin.role.wizard')}}"><i class="fa fa-circle-o"></i>ثبت بخش جدید</a>
                                </li>
                            @endcan
                            @can('لیست بخش ها')

                                <li><a href="{{route('admin.role.show')}}"><i class="fa fa-circle-o"></i>لیست بخش ها</a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endif
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            @yield('content')
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer text-right">
        <strong>تمام حقوق این سیستم متعلق به <a>گروه صنعتی پولاد پویش</a> میباشد.</strong>
    </footer>
</div>
<!-- ./wrapper -->
<!-- jQuery 3 -->
<script src="{{asset('/public/bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('/public/bower_components/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="{{asset('/public/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('/public/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js')}}"></script>
<!-- jvectormap -->
<script src="{{asset('/public/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script src="{{asset('/public/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{asset('/public/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
<!-- Slimscroll -->
<script src="{{asset('/public/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{asset('/public/bower_components/fastclick/lib/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('/public/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('/public/dist/js/pages/dashboard.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('/public/dist/js/demo.js')}}"></script>
<!--sweet Alert-->
<script src="{{asset('/public/assets/sweetalert.js')}}"></script>
<!-- Select2 -->
<script src="{{asset('/public/assets/select2.js')}}"></script>
<script>
    $("#single").select2({
        placeholder: "سطح دسترسی کاربر را انتخاب کنین",
        allowClear: true
    });
    $("#multiple").select2({
        placeholder: "سطح دسترسی کاربر را انتخاب کنین",
        allowClear: true
    });
</script>
{{--<script src="{{asset('/public/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>--}}
{{--<script src="{{asset('/public/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>--}}
<script src="{{asset('/public/assets/global/scripts/datatable.js')}}" type="text/javascript"></script>
<script src="{{asset('/public/assets/global/plugins/datatables/datatables.min.js')}}" type="text/javascript"></script>
<script src="{{asset('/public/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js')}}"
        type="text/javascript"></script>
<script src="{{asset('/public/assets/pages/scripts/table-datatables-colreorder.js')}}"
        type="text/javascript"></script>
</body>
</html>
