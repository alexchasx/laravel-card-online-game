<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>{{ config('app.name') }}</title>
    <!-- bootstrap-css -->
{{--<!--    <link href="{{ asset('GoEasyOn/css/bootstrap.css') }}" rel="stylesheet" type="text/css"-->--}}
<!--          media="all"/>-->
    <!--// bootstrap-css -->
    <!-- font -->
    <link href='//fonts.googleapis.com/css?family=Great+Vibes' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Open+Sans:700,700italic,800,300,300italic,400italic,400,600,600italic'
          rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Playfair+Display:400,700,400italic'
          rel='stylesheet' type='text/css'>
    <!-- //font -->
    <!-- css -->
    {{--<link rel="stylesheet" href="{{ asset('GoEasyOn/css/style.css') }}" type="text/css"--}}
<!--          media="all"/>-->
<!--    <link rel="stylesheet" href="{{ asset('GoEasyOn/css/component.css') }}" type="text/css"-->
<!--          media="all"/>-->
    <!--// css -->
    <!-- font-awesome icons -->
    <link href="{{ asset('GoEasyOn/css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('css/cards/cards.css') }}" rel="stylesheet">
    <link href="{{ asset('css/cards/card_replace.css') }}" rel="stylesheet">
    <!-- //font-awesome icons -->
</head>
<body>

@yield('content')

<script src="{{ asset('GoEasyOn/js/jquery-2.1.4.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/cards/cards.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/cards/card-begin.js') }}"></script>
</body>
</html>