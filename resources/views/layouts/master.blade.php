@php
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
            src: url('{{asset('/public/f/Yekan.woff2')}}') format('woff2'),
            url('{{asset('/public/f/Yekan.woff')}}') format('woff'),
            url('{{asset('/public/f/Yekan.ttf')}}') format('truetype'),
            url('{{asset('/public/f/Yekan.otf')}}') format('opentype');
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
            <a href="{{route('admin.invoice.wizard')}}" class="btn btn-link">

                <img src="{{asset('public/icon/icons8-profit-growth-64.png')}}"
                     width="30" title="صدور پیش فاکتور">


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
                <li>
                    <a href="{{route('home')}}">
                        <i class="fa fa-dashboard"></i> <span>داشبورد</span>
                        <span class="pull-left-container">
            </span>
                    </a>
                </li>


                @if(Gate::check('ثبت کاربر جدید') || Gate::check('لیست کاربران')
                    || Gate::check('ثبت دسترسی جدید') || Gate::check('لیست دسترسی ها')
                     ||Gate::check('تعیین جانشین'))
                    <li class="treeview" id="admin-user">
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
                                ||Gate::check('وضعیت'))
                                <li><a href="{{route('admin.user.show')}}"><i class="fa fa-circle-o"></i>
                                        لیست کاربران
                                    </a>
                                </li>
                            @endif
                            @can('لیست دسترسی ها')
                                <li><a href="{{route('admin.user.permission')}}"><i
                                            class="fa fa-circle-o"></i>تعریف دسترسی ها</a>
                                </li>
                            @endcan
                            @can('تعریف نقش')
                                <li><a href="{{route('admin.role.show')}}"><i class="fa fa-circle-o"></i>تعریف نقش
                                        ها</a>
                                </li>
                            @endcan
                            @can('لیست جابجایی')
                                <li><a href="{{route('admin.user.alternatives')}}"><i
                                            class="fa fa-circle-o"></i>لیست جابجایی ها</a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endif

                @if(Gate::check('گروه کالایی')
                   || Gate::check('مشخصه محصول')
                   || Gate::check('تعریف محصول')
                   || Gate::check('تعریف قالب سازه')
                   || Gate::check('تعریف قالب')
                   || Gate::check('تعریف دستگاه')
                   || Gate::check('تعریف رنگ')
                   || Gate::check('مواد پلیمیری')
                   || Gate::check('فروشنده')
                   || Gate::check('BOM')
                   || Gate::check('Insert های قالب')
                   || Gate::check('انتصاب محصول به قالب'))
                    <li class="treeview" id="foundation">
                        <a href="#">
                            <i class="fa fa-star"></i> <span>تعاریف پایه</span>
                            <span class="pull-left-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                        </a>
                        <ul class="treeview-menu">

                            <li class="treeview" id="foundation_a">
                                <a href="#">
                                    <span>محصولات</span>
                                    <span class="pull-left-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                                </a>
                                <ul class="treeview-menu">
                                    @can('گروه کالایی')
                                        <li><a href="{{route('admin.commodity.list')}}"><i
                                                    class="fa fa-circle-o"></i>گروه کالایی</a>
                                        </li>
                                    @endcan
                                    @can('مشخصه محصول')
                                        <li><a href="{{route('admin.ProductCharacteristic.list')}}"><i
                                                    class="fa fa-circle-o"></i>مشخصه محصول</a>
                                        </li>
                                    @endcan
                                    @can('تعریف محصول')
                                        <li><a href="{{route('admin.product.list')}}"><i
                                                    class="fa fa-circle-o"></i>تعریف محصول</a>
                                        </li>
                                    @endcan
                                    @can('BOM')
                                        <li><a href="{{route('admin.bom.list')}}"><i
                                                    class="fa fa-circle-o"></i>BOM</a>
                                        </li>
                                    @endcan




                                </ul>
                            </li>

                            <li class="treeview" id="foundation_b">
                                <a href="#">
                                    <span>قالب ها</span>
                                    <span class="pull-left-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                                </a>
                                <ul class="treeview-menu">
                                    @can('تعریف قالب سازه')
                                        <li><a href="{{route('admin.models.list')}}"><i
                                                    class="fa fa-circle-o"></i>تعریف قالب سازها</a>
                                        </li>
                                    @endcan
                                    @can('تعریف قالب')
                                        <li><a href="{{route('admin.format.list')}}"><i
                                                    class="fa fa-circle-o"></i>تعریف قالب</a>
                                        </li>
                                    @endcan
                                    @can('Insert های قالب')
                                        <li><a href="{{route('admin.insert.list')}}"><i
                                                    class="fa fa-circle-o"></i>Insert های قالب </a>
                                        </li>
                                    @endcan
                                    @can('انتصاب محصول به قالب')
                                        <li><a href="{{route('admin.model.product.list')}}"><i
                                                    class="fa fa-circle-o"></i>انتصاب محصول به قالب</a>
                                        </li>
                                    @endcan
                                </ul>
                            </li>

                            <li class="treeview" id="foundation_c">
                                <a href="#">
                                    <span>تعاریف دیگر</span>
                                    <span class="pull-left-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                                </a>
                                <ul class="treeview-menu">
                                    @can('تعریف رنگ')
                                        <li><a href="{{route('admin.color.list')}}"><i
                                                    class="fa fa-circle-o"></i>تعریف رنگ</a>
                                        </li>
                                    @endcan
                                    @can('مواد پلیمیری')
                                        <li><a href="{{route('admin.polymeric.list')}}"><i
                                                    class="fa fa-circle-o"></i>مواد پلیمیری</a>
                                        </li>
                                    @endcan
                                    @can('فروشنده')
                                        <li><a href="{{route('admin.seller.list')}}"><i
                                                    class="fa fa-circle-o"></i>فروشندگان</a>
                                        </li>
                                    @endcan
                                    @can('تعریف دستگاه')
                                        <li><a href="{{route('admin.device.list')}}"><i
                                                    class="fa fa-circle-o"></i>تعریف دستگاه</a>
                                        </li>
                                    @endcan
                                        <li><a href="{{route('admin.colorscrap.list')}}"><i
                                                    class="fa fa-circle-o"></i>ضایعات رنگ</a>
                                        </li>
                                        <li><a href="{{route('admin.colorchange.list')}}"><i
                                                    class="fa fa-circle-o"></i>زملن تغیر رنگ</a>
                                        </li>
                                </ul>
                            </li>

                        </ul>
                    </li>
                @endif

                @if(Gate::check('انواع مشتریان') || Gate::check('مشتریان'))
                    <li class="treeview" id="customer">
                        <a href="#">
                            <i class="fa fa-user"></i> <span>تعریف مشتریان</span>
                            <span class="pull-left-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                        </a>
                        <ul class="treeview-menu">
                            @can('انواع مشتریان')
                                <li><a href="{{route('admin.customer.type')}}"><i
                                            class="fa fa-circle-o"></i>انواع مشتریان</a>
                                </li>
                            @endcan
                            @can('مشتریان')

                                <li><a href="{{route('admin.customers.index')}}"><i
                                            class="fa fa-circle-o"></i>مشتریان</a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endif


                <li class="treeview" id="barn">
                    <a href="#">
                        <i class="fa fa-archive"></i> <span>انبار</span>
                        <span class="pull-left-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">

                            <li><a href="{{route('admin.barncolor.list')}}"><i
                                        class="fa fa-circle-o"></i>انبار رنگ</a>
                            </li>
                        <li><a href="{{route('admin.barnmaterial.list')}}"><i
                                    class="fa fa-circle-o"></i>انبار مواد پلیمری</a>
                        </li>
                        <li><a href="{{route('admin.barnproduct.list')}}"><i
                                    class="fa fa-circle-o"></i>انبار کالاهای ساخته شده</a>
                        </li>
                        <li><a href="{{route('admin.barntemporary.list')}}"><i
                                    class="fa fa-circle-o"></i>انبار موقت</a>
                        </li>

                    </ul>
                </li>





                <li class="treeview" id="manufacturing">
                    <a href="#">
                        <i class="fa fa-pie-chart"></i> <span>تولید</span>
                        <span class="pull-left-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">

                        <li class="treeview" id="manufacturing_m">
                            <a href="#">
                                <i class="fa fa-circle-o"></i> <span>ثبت اتفاقات تولید</span>
                                <span class="pull-left-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                            </a>
                            <ul class="treeview-menu">

                                <li><a href="{{route('admin.eventsmachine.list')}}"><i
                                            class="fa fa-circle-o"></i>اتفاقات ماشین</a>
                                </li>
                                <li><a href="{{route('admin.eventsformat.list')}}"><i
                                            class="fa fa-circle-o"></i>اتفاقات قالب</a>
                                </li>

                            </ul>
                        </li>


                        <li class="treeview" id="manufacturing_n">
                            <a href="#">
                                <i class="fa fa-circle-o"></i> <span>PM</span>
                                <span class="pull-left-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                            </a>
                            <ul class="treeview-menu">

                                <li><a href="{{route('admin.pmmachine.list')}}"><i
                                            class="fa fa-circle-o"></i>PM ماشین</a>
                                </li>
                                <li><a href="{{route('admin.pmformat.list')}}"><i
                                            class="fa fa-circle-o"></i>PM قالب</a>
                                </li>
                            </ul>
                        </li>


                        <li><a href="{{route('admin.pPlanning.list')}}"><i
                                    class="fa fa-circle-o"></i>برنامه ریزی خطوط تولید</a>
                        </li>



                        <li><a href="{{route('admin.productionorder.list')}}"><i
                                    class="fa fa-circle-o"></i>سفارش تولید</a>
                        </li>
                        <li><a href="{{route('admin.viewproduct.list')}}"><i
                                    class="fa fa-circle-o"></i>برنامه ریزی تولید</a>
                        </li>
                        <li><a href="{{route('admin.Manufacturing.list')}}"><i
                                    class="fa fa-circle-o"></i>تولید</a>
                        </li>


                    </ul>
                </li>



                @if(Gate::check('صدور پیش فاکتور') || Gate::check('پیش فاکتورهای حذف شده'))
                    <li class="treeview" id="sell">
                        <a href="#">
                            <i class="fa fa-line-chart"></i> <span>فروش</span>
                            <span class="pull-left-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                        </a>
                        <ul class="treeview-menu">
                            @can('صدور پیش فاکتور')
                                <li><a href="{{route('admin.invoice.index')}}"><i
                                            class="fa fa-circle-o"></i>صدور پیش فاکتور</a>
                                </li>
                                @can('پیش فاکتورهای حذف شده')
                                    <li><a href="{{route('admin.invoice.trash')}}"><i
                                                class="fa fa-circle-o"></i>پیش فاکتور های حذف شده</a>
                                    </li>
                                @endcan
                                <li><a href="{{route('admin.invoice.success')}}"><i
                                            class="fa fa-circle-o"></i>پیش فاکتور های تایید شده</a>
                                </li>
                            @endif


                                <li><a href="{{route('admin.target.list')}}"><i
                                            class="fa fa-circle-o"></i>هدف گذاری فروش</a>
                                </li>

                        </ul>
                    </li>
                @endif

                @if(Gate::check('بازسازی نرم افزار') || Gate::check('شروع به کار نرم افزار'))
                    <li class="treeview" id="setting">
                        <a href="#">
                            <i class="fa fa-hourglass-start"></i> <span>تنظیمات نرم افزار</span>
                            <span class="pull-left-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                        </a>
                        <ul class="treeview-menu">



                            @can('بازسازی نرم افزار')
                                <li><a href="javascript:void(0)" id="stop"><i
                                            class="fa fa-circle-o"></i>بازسازی نرم افزار</a>
                                </li>
                            @endcan
                            @can('شروع به کار نرم افزار')
                                <li><a href="javascript:void(0)" id="start_s"><i
                                            class="fa fa-circle-o"></i>شروع به کار نرم افزار</a>
                                </li>
                            @endcan
                            @can('پشتیبان گیری از دیتابیس')
                                <li><a href="javascript:void(0)" id="backup"><i
                                            class="fa fa-circle-o"></i>پشتیبان گیری از دیتابیس</a>
                                </li>
                            @endcan
                            @can('مشخصات عمومی سیستم')
                                <li><a href="{{route('admin.setting.wizard')}}"><i
                                            class="fa fa-circle-o"></i>مشخصات عمومی سیستم</a>
                                </li>
                            @endcan
                            @can('لیست حسابهای بانکی')
                                <li><a href="{{route('admin.bank.list')}}"><i
                                            class="fa fa-circle-o"></i>لیست حسابهای بانکی</a>
                                </li>
                            @endcan
                            @can('لیست انبارها')
                                <li><a href="{{route('admin.selectstore.list')}}"><i
                                            class="fa fa-circle-o"></i>لیست انبارها</a>
                                </li>
                            @endcan

                        </ul>
                    </li>
                @endif


            </ul>
        </section>
    </aside>
    <div class="content-wrapper">
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
    function myFunction() {
        $(window).on("load", function () {
            $('#loader').hide();
        });
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
        $('#select2-exapl').select2({
            width: '100%',
            placeholder: 'استان/کشور',
            tags: true,
            language: {
                noResults: function () {
                    return 'کشور یا استان را انتخاب کنید';
                },
            },
        });
    });


    $(document).ready(function () {
        $('#select2-eapl').select2({
            width: '100%',
            placeholder: 'نحوه آشنایی',
            tags: true,
            language: {
                noResults: function () {
                    return 'نحوه آشنایی را وارد کنید';
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
</script>
<script src="{{asset('/public/assets/sweetalert.js')}}"></script>
<script type="text/javascript">
    $('#stop').click(function () {
        $.ajax({
            type: "GET",
            url: "{{route('admin.users.system.stop')}}",
            success: function (data) {
                if (data.errors) {
                    Swal.fire({
                        title: 'خطا!',
                        text: data.errors,
                        icon: 'error',
                        confirmButtonText: 'تایید'
                    })
                }
                if (data.success) {
                    Swal.fire({
                        title: 'موفق',
                        text: data.success,
                        icon: 'success',
                        confirmButtonText: 'تایید',
                    });

                }

            }
        });
    });
    $('#start_s').click(function () {
        $.ajax({
            type: "GET",
            url: "{{route('admin.users.system.start')}}",
            success: function (data) {
                if (data.errors) {
                    Swal.fire({
                        title: 'خطا!',
                        text: data.errors,
                        icon: 'error',
                        confirmButtonText: 'تایید'
                    })
                }
                if (data.success) {
                    Swal.fire({
                        title: 'موفق',
                        text: data.success,
                        icon: 'success',
                        confirmButtonText: 'تایید',
                    });

                }

            }
        });
    });

    $('#backup').click(function () {
        $.ajax({
            type: "GET",
            url: "{{route('admin.users.system.backup')}}",
            success: function (data) {
                if (data.errors) {
                    Swal.fire({
                        title: 'خطا!',
                        text: data.errors,
                        icon: 'error',
                        confirmButtonText: 'تایید'
                    })
                }
                if (data.success) {
                    Swal.fire({
                        title: 'موفق',
                        text: data.success,
                        icon: 'success',
                        confirmButtonText: 'تایید',
                    });

                }

            }
        });
    });

</script>
<script>
    $("#users").click(function () {
        $(".user").prop('checked', $(this).prop('checked'));
    });
    $("#user").click(function () {
        $(".users").prop('checked', $(this).prop('checked'));
    });
    $("#list_users").click(function () {
        $(".list_user").prop('checked', $(this).prop('checked'));
    });
    $("#sells").click(function () {
        $(".sell").prop('checked', $(this).prop('checked'));
    });
    $("#sell").click(function () {
        $(".sells").prop('checked', $(this).prop('checked'));
    });
    $("#list_sells").click(function () {
        $(".list_sell").prop('checked', $(this).prop('checked'));
    });
    $("#list_settings").click(function () {
        $(".list_setting").prop('checked', $(this).prop('checked'));
    });
    $("#foundations").click(function () {
        $(".foundation").prop('checked', $(this).prop('checked'));
    });
    $("#customers").click(function () {
        $(".customer").prop('checked', $(this).prop('checked'));
    });



</script>

</body>
</html>
