<!DOCTYPE html>
<html>
@include('dashboard.partial.header')
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

@include('dashboard.partial.nave')
<!-- Left side column. contains the logo and sidebar -->
@include('dashboard.partial.sideMenu')

<!-- Content Wrapper. Contains page content -->
@yield('content')
<!-- /.content-wrapper -->
    @include('dashboard.partial.footer')


    <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

@include('dashboard.partial.scripts')
</body>
</html>
