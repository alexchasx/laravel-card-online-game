<!DOCTYPE html>
<html lang="ru">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">

    <!--[if lt IE 9]>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
    <![endif]-->

    <title>Tables - MacAdmin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <link href="{{ asset('css/profile.css') }}" rel="stylesheet">
    <link href="{{ asset('css/tooltips.css') }}" rel="stylesheet">
    <link href="{{ asset('css/cards/chat.css') }}" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
<div class="wrapper">

    <div class="header">
        <div class="tooltip">
            <img class="avatar" src="images/profile/avatar.jpg" alt="аватар">
            <span class="custom info hidden">
                    Сменить аватар можно в магазине (платно!)
                </span>
        </div>

        @include('user.profile.sub_nick')

        <div class="header-menu">
            <a class="button11" href="{{--{{ route('magazinIndex') }}--}}">Баланс:
                <span class="pick">{{ $user->balance }} &#8381;</span>
            </a>

            <a class="button width70px large round magazin"
               href="{{ route('magazinIndex') }}">Магазин</a>

            <a href="#" class="button width70px large round tooltip">
                Отзыв
                <span class="custom info hidden">
                        Здесь можно отправить письмо разработчику игры с предложением или отзывом
                    </span>
            </a>

            @if (isAdmin())
                <a class="button btn-admin" href="{{ route('cardIndex') }}">Админка</a>
            @endif

            <a class="button width70px large round bg" href="{{ route('logout') }}">Выйти</a>
        </div>
    </div><!-- .header-->
    <br>

@yield('content')

{{--<script src="https://js.pusher.com/4.1/pusher.min.js"></script>--}}
{{--<script src="https://unpkg.com/vue"></script>--}}
<script src="{{ asset('js/cards/chat.js') }}"></script>
</body>
</html>