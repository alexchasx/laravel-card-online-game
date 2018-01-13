<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'WEBAdept') }}</title>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/my.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/demo.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/icons.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/categories.css') }}"/>
    <link href="{{ asset('css/style.css') }}" media="screen, projection" rel="stylesheet"
          type="text/css"/>

</head>
<body>
<div id="app wrapper">
    <div class="row">
        <nav class="navbar navbar-default navbar-top h-header">
            <div class="container h-header">
                <!--                 <div class="navbar-header">
                                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                                        <span class="sr-only">Toggle Navigation</span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                </div> -->
                <!-- <div class="collapse navbar-collapse" id="app-navbar-collapse"> -->
                <a class="navbar-brand logo" href="{{ url('/') }}">
                    WEBAdeptus
                </a>
                <a class="navbar-brand logo" href="{{ route('contact') }}">
                    О проекте
                </a>
                <ul class="nav navbar-nav">

                    @if ( (Auth::check()) && (Auth::user()->role) == 'admin')

                        <li><a href="{{ route('adminIndex') }}">Панель администратора</a></li>

                    @endif

                </ul>

                <!-- </div> -->
            </div>
        </nav>
    </div>
    <nav id="bt-menu" class="bt-menu">
        <a href="#" class="bt-menu-trigger"><span>МЕНЮ</span></a>
        <ul>
            @if (Auth::guest())

                <li><a href="{{ route('loginX') }}">Войти</a></li>
                <li><a href="{{ route('registerX') }}">Регистрация</a></li>

            @else

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                       aria-expanded="false">
                        {{ Auth::user()->name }}
                    </a>
                </li>
                <li>
                    <a href="{{ route('logoutX') }}"
                       onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                        Выйти
                    </a>

                    <form id="logout-form" action="{{ route('logoutX') }}" method="POST"
                          style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>

            @endif
            <li><h2>Категории:</h2></li>

            @if (!empty($categories))

                @foreach($categories as $category)
                    <li>
                        <a href="{{ route('articleByCategory',['categoryId' => $category->id]) }}"
                           class="btn btn-menu">{{ $category->name_category }}</a>
                    </li>
                @endforeach

            @endif
        </ul>
        <ul>
            <li><a href="https://twitter.com/siteherelesson"
                   class="bt-icon icon-twitter">Twitter</a></li>
            <li><a href="https://plus.google.com/115094575201291193952/posts"
                   class="bt-icon icon-gplus">Google+</a></li>
            <li><a href="https://www.facebook.com" class="bt-icon icon-facebook">Facebook</a></li>
            <li><a href="https://github.com/" class="bt-icon icon-github">GitHub</a></li>
        </ul>

        </ul>
    </nav>

    @if(count($errors) > 0)

        <div class="alert alert-danger">
            <ul>

                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach

            </ul>
        </div>

    @endif

    @yield('content')

    <footer class="footer"><!-- FOOTER =============== -->
        <!--     <div class="footer__logo logo">
                <img src="" alt="logo" class="logo__img logo__img_small">
            </div> -->

        <div class="copy">
            <p class="copy text-center">&copy; 2017 WEBAdeptus</p>
            <br>
        </div>
    </footer><!-- FOOTER END =============== -->

    <!-- <a href="#" class="btn btn-default up-button" role="button" title="Кнопка вверх">&#8657;</a> -->
</div><!-- wrapper END -->


<!--[if lt IE 9]>
<script src="libs/html5shiv/es5-shim.min.js"></script>
<script src="libs/html5shiv/html5shiv.min.js"></script>
<script src="libs/html5shiv/html5shiv-printshiv.min.js"></script>
<script src="libs/respond/respond.min.js"></script>
<![endif]-->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!-- <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="{{ asset('js/my.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="{{ asset('js/ie10-viewport-bug-workaround.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/classie.js') }}"></script>
<script src="{{ asset('js/borderMenu.js') }}"></script>
<script>
    $(document).ready(function () {
        $(".add-to-cart").click(function () {
            var id = $(this).attr("data-id");
            $.post("/cart/addAjax/" + id, {}, function (data) {
                $("#cart-count").html(data);
            });
            return false;
        });
    });
</script>
</body>
</html>
