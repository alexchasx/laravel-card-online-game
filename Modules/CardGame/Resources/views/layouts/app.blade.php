<!DOCTYPE html>
<html lang="ru">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <!-- Title and other stuffs -->
    <title>Tables - MacAdmin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">


    <!-- Stylesheets -->
    <link href="{{ asset('macadmin/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font awesome icon -->
    <link rel="stylesheet" href="{{ asset('macadmin/css/font-awesome.min.css') }}">
    <!-- jQuery UI -->
    <link rel="stylesheet" href="{{ asset('macadmin/css/jquery-ui.css') }}">
    <!-- Calendar -->
    <link rel="stylesheet" href="{{ asset('macadmin/css/fullcalendar.css') }}">
    <!-- prettyPhoto -->
    <link rel="stylesheet" href="{{ asset('macadmin/css/prettyPhoto.css') }}">
    <!-- Star rating -->
    <link rel="stylesheet" href="{{ asset('macadmin/css/rateit.css') }}">
    <!-- Date picker -->
    <link rel="stylesheet" href="{{ asset('macadmin/css/bootstrap-datetimepicker.min.css') }}">
    <!-- CLEditor -->
    <link rel="stylesheet" href="{{ asset('macadmin/css/jquery.cleditor.css') }}">
    <!-- Data tables -->
    <link rel="stylesheet" href="{{ asset('macadmin/css/jquery.dataTables.css') }}">
    <!-- Bootstrap toggle -->
    <link rel="stylesheet" href="{{ asset('macadmin/css/jquery.onoff.css') }}">
    <!-- Main stylesheet -->
    <link href="{{ asset('macadmin/css/style.css') }}" rel="stylesheet">
    <!-- Widgets stylesheet -->
    <link href="{{ asset('macadmin/css/widgets.css') }}" rel="stylesheet">

    <script src="{{ asset('macadmin/js/respond.min.js') }}"></script>
    <!--[if lt IE 9]>
    <script src="{{ asset('macadmin/js/html5shiv.js') }}"></script>
    <![endif]-->

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('macadmin/img/favicon/favicon.png') }}">
</head>

<body>

@yield('content')

<!-- JS -->
<script src="{{ asset('macadmin/js/jquery.js') }}"></script> <!-- jQuery -->
<script src="{{ asset('macadmin/js/bootstrap.min.js') }}"></script> <!-- Bootstrap -->
<script src="{{ asset('macadmin/js/jquery-ui.min.js') }}"></script> <!-- jQuery UI -->
<script src="{{ asset('macadmin/js/fullcalendar.min.js') }}"></script>
<!-- Full Google Calendar - Calendar -->
<script src="{{ asset('macadmin/js/jquery.rateit.min.js') }}"></script> <!-- RateIt - Star rating -->
<script src="{{ asset('macadmin/js/jquery.prettyPhoto.js') }}"></script> <!-- prettyPhoto -->
<script src="{{ asset('macadmin/js/jquery.slimscroll.min.js') }}"></script> <!-- jQuery Slim Scroll -->
<script src="{{ asset('macadmin/js/jquery.dataTables.min.js') }}"></script> <!-- Data tables -->

<!-- jQuery Flot -->
<script src="{{ asset('macadmin/js/excanvas.min.js') }}"></script>
<script src="{{ asset('macadmin/js/jquery.flot.js') }}"></script>
<script src="{{ asset('macadmin/js/jquery.flot.resize.js') }}"></script>
<script src="{{ asset('macadmin/js/jquery.flot.pie.js') }}"></script>
<script src="{{ asset('macadmin/js/jquery.flot.stack.js') }}"></script>

<!-- jQuery Notification - Noty -->
<script src="{{ asset('macadmin/js/themes/default.js') }}"></script> <!-- jQuery Notify -->
<script src="{{ asset('macadmin/js/layouts/bottom.js') }}"></script> <!-- jQuery Notify -->
<script src="{{ asset('macadmin/js/layouts/topRight.js') }}"></script> <!-- jQuery Notify -->
<script src="{{ asset('macadmin/js/layouts/top.js') }}"></script> <!-- jQuery Notify -->
<!-- jQuery Notification ends -->

<script src="{{ asset('macadmin/js/sparklines.js') }}"></script> <!-- Sparklines -->
<script src="{{ asset('macadmin/js/jquery.cleditor.min.js') }}"></script> <!-- CLEditor -->
<script src="{{ asset('macadmin/js/bootstrap-datetimepicker.min.js') }}"></script> <!-- Date picker -->
<script src="{{ asset('macadmin/js/jquery.onoff.min.js') }}"></script> <!-- Bootstrap Toggle -->
<script src="{{ asset('macadmin/js/filter.js') }}"></script> <!-- Filter for support page -->
<script src="{{ asset('macadmin/js/custom.js') }}"></script> <!-- Custom codes -->
<script src="{{ asset('macadmin/js/charts.js') }}"></script> <!-- Charts & Graphs -->

</body>
</html>