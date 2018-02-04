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
    <!-- Main stylesheet -->
    <link href="{{ asset('macadmin/css/style.css') }}" rel="stylesheet">
    <!-- Widgets stylesheet -->
    <link href="{{ asset('macadmin/css/widgets.css') }}" rel="stylesheet">
    <link href="{{ asset('css/cards/profile.css') }}" rel="stylesheet" type="text/css"
          media="all"/>

    <script src="{{ asset('macadmin/js/respond.min.js') }}"></script>
    <!--[if lt IE 9]>
    <script src="{{ asset('macadmin/js/html5shiv.js') }}"></script>
    <![endif]-->

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('macadmin/img/favicon/favicon.png') }}">
</head>

<body class="profile-container">

{{--@include('layouts.sidebar')--}}

<!-- Main bar -->
    {{--<div class="mainbar widget">--}}
        <!-- Matter -->


            @yield('inner_content')

            {{--<div class="widget-foot">--}}

            <div class="clearfix"></div>

    {{--</div>--}}

{{--@include('layouts.footer')--}}

<!-- JS -->
    <script src="{{ asset('macadmin/js/jquery.js') }}"></script> <!-- jQuery -->
    <script src="{{ asset('macadmin/js/bootstrap.min.js') }}"></script> <!-- Bootstrap -->
    <script src="{{ asset('macadmin/js/jquery-ui.min.js') }}"></script> <!-- jQuery UI -->

</body>
</html>