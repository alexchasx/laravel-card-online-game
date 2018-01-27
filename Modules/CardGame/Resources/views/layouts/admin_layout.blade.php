@extends('cardgame::layouts.app')

@section('content')

<div class="navbar navbar-fixed-top bs-docs-nav" role="banner">

    <div class="conjtainer">
        <!-- Menu button for smallar screens -->
        <div class="navbar-header">
            <button class="navbar-toggle btn-navbar" type="button" data-toggle="collapse"
                    data-target=".bs-navbar-collapse">
                <span>Menu</span>
            </button>
            <!-- Site name for smallar screens -->
            <a href="/" class="navbar-brand lg">Главная</a>
        </div>

        <!-- Navigation starts -->
        <nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">
            <!-- Links -->
            <ul class="nav navbar-nav pull-right">
                <li class="dropdown pull-right">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <i class="fa fa-user"></i> Админ <b class="caret"></b>
                    </a>

                    <!-- Dropdown menu -->
                    <ul class="dropdown-menu">
                        <li><a href="#"><i class="fa fa-user"></i> Профиль</a></li>
                        <li><a href="#"><i class="fa fa-cogs"></i> Настройки</a></li>
                        <li><a href="{{ route('logout') }}"><i class="fa fa-sign-out"></i> Выход</a></li>
                    </ul>
                </li>

            </ul>
        </nav>

    </div>
</div>

<!-- Main content starts -->

<div class="content">

    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-dropdown"><a href="#">Navigation</a></div>

        <!--- Sidebar navigation -->
        <!-- If the main navigation has sub navigation, then add the class "has_sub" to "li" of main navigation. -->
        <ul id="nav">
            <!-- Main menu with font awesome icon -->
            <br>
            @if ('cardIndex' !== Route::current()->getName())
            <li><a class="link" href="{{route('cardIndex')}}">Карты</a></li>
            @endif
            @if ('cardSetIndex' !== Route::current()->getName())
                <li><a class="link" href="{{route('cardSetIndex')}}">Наборы</a></li>
            @endif
            @if ('raceIndex' !== Route::current()->getName())
                <li><a class="link" href="{{route('raceIndex')}}">Расы</a></li>
            @endif
            @if ('abilityIndex' !== Route::current()->getName())
                <li><a class="link" href="{{route('abilityIndex')}}">Способности</a></li>
            @endif
        </ul>
    </div>

    <!-- Sidebar ends -->

    <!-- Main bar -->
    <div class="mainbar">
        <!-- Matter -->

        <div class="matter">
            <div class="container">

                <!-- Table -->
                <div class="row">

                    @yield('inner_content')

                </div>
            </div>
        </div>

        <!-- Matter ends -->

    </div>

    <!-- Mainbar ends -->
    <div class="clearfix"></div>

</div>
<!-- Content ends -->

<!-- Footer starts -->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- Copyright info -->
                <p class="copy">Copyright &copy; 2012 | <a href="#">Your Site</a></p>
            </div>
        </div>
    </div>
</footer>

<!-- Footer ends -->

<!-- Scroll to top -->
<span class="totop"><a href="#"><i class="fa fa-chevron-up"></i></a></span>

@endsection