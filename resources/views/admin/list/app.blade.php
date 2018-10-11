<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link rel="stylesheet" href="{{ asset('AdminLTE-With-Iframe/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('AdminLTE-With-Iframe/dist/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('AdminLTE-With-Iframe/dist/css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('AdminLTE-With-Iframe/dist/css/AdminLTE.min.css') }}">
    <link rel="stylesheet" href="{{ asset('AdminLTE-With-Iframe/dist/css/skins/all-skins.min.css') }}">
    <script src="{{ asset('AdminLTE-With-Iframe/plugins/ie9/html5shiv.min.js') }}"></script>
    <script src="{{ asset('AdminLTE-With-Iframe/plugins/ie9/respond.min.js') }}"></script>
</head>
<body class="hold-transition skin-blue sidebar-mini">

@yield('content')

<script src="{{ asset('/AdminLTE-With-Iframe/plugins/jQuery/jquery-2.2.3.min.js') }}"></script>
<script src="{{ asset('/AdminLTE-With-Iframe/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('/AdminLTE-With-Iframe/plugins/fastclick/fastclick.js') }}"></script>
<script src="{{ asset('/AdminLTE-With-Iframe/dist/js/app.min.js') }}"></script>
<script src="{{ asset('/AdminLTE-With-Iframe/plugins/sparkline/jquery.sparkline.min.js') }}"></script>
<script src="{{ asset('/AdminLTE-With-Iframe/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script src="{{ asset('/AdminLTE-With-Iframe/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<script src="{{ asset('/AdminLTE-With-Iframe/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
<script src="{{ asset('/AdminLTE-With-Iframe/plugins/chartjs/Chart.min.js') }}"></script>
<script src="{{ asset('/AdminLTE-With-Iframe/dist/js/pages/dashboard2.js') }}"></script>
<script src="{{ asset('/AdminLTE-With-Iframe/dist/js/demo.js') }}"></script>
</body>
</html>
