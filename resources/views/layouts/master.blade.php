<!DOCTYPE html>
<html>
<head>
    @include('include.css')
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    <header class="main-header">
        @include('include.header')
    </header>
    <!-- right side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        @include('include.aside')
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
        @include('include.footer')
    </footer>
</div>
@include('include.js')
</body>
</html>
