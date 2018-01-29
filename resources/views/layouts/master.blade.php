<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <!-- Title and other stuffs -->
    <title>{{ config('app.name') }}</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">

    <!-- Bootstrap -->
    <link href="{{ asset('my/css/font-awesome.css') }}" rel="stylesheet">
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
            crossorigin="anonymous"></script>
    <link href="{{ asset('my/css/main.css') }}" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
</head>

<body>

{{--@include('layouts.header')--}}

<div class="main">

    <!-- CONTENT -->
    <main class="content">
        <div class="wrapper">

            @yield('content')

        </div><!-- /.wrapper -->
    </main>
    <!-- CONTENT END-->

    {{--@include('cardgame::layouts.footer')--}}

</div><!-- /.main -->

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
<script src="js/my.js"></script>
<!-- Yandex.Metrika counter --><!-- /Yandex.Metrika counter -->
<!-- Google Analytics counter --><!-- /Google Analytics counter -->

</body>

</html>