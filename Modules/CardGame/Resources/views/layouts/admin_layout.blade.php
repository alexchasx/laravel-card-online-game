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

            <div class="navbar-header">
                <ul class="nav navbar-nav pull-right">
                    <li class="dropdown pull-right">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <i class="fa fa-user"></i> Список <b class="caret"></b>
                        </a>

                        <!-- Dropdown menu -->
                        <ul class="dropdown-menu">
                            <li><a class="link"
                                   @if ('cardIndex' == Route::current()->getName())
                                   style="color: #0b16d6;"
                                   @endif
                                   href="{{route('cardIndex')}}">Карты</a></li>
                            <li><a class="link"
                                   @if ('cardSetIndex' == Route::current()->getName())
                                   style="color: #0b16d6;"
                                   @endif
                                   href="{{route('cardSetIndex')}}">Наборы</a></li>
                            <li><a class="link active"
                                   @if ('raceIndex' == Route::current()->getName())
                                   style="color: #0b16d6;"
                                   @endif
                                   href="{{route('raceIndex')}}">Расы</a></li>
                            <li><a class="link"
                                   @if ('abilityIndex' == Route::current()->getName())
                                   style="color: #0b16d6;"
                                   @endif
                                   href="{{route('abilityIndex')}}">Способности</a></li>
                            <li><a class="link"
                                   @if ('achievement.index' == Route::current()->getName())
                                   style="color: #0b16d6;"
                                   @endif
                                   href="{{route('achievement.index')}}">Достижения</a></li>
                            <li class="divider"></li>
                            <li><a href="#">Separated link</a></li>
                        </ul>
                    </li>

                </ul>
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
                            <li><a href="{{ route('getProfile') }}"><i class="fa fa-user"></i>
                                    Профиль</a></li>
                            <li><a href="#"><i class="fa fa-cogs"></i> Настройки</a></li>
                            <li><a href="{{ route('logout') }}"><i class="fa fa-sign-out"></i> Выход</a>
                            </li>
                        </ul>
                    </li>

                </ul>
            </nav>

        </div>
    </div>

    <!-- Main content starts -->

    <div class="content">

{{--@include('layouts.sidebar')--}}

        <!-- Main bar -->
        <div class="mainbar widget wblack">
            <!-- Matter -->

            <div class="matter">
                <div class="container">

                    <!-- Table -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="widget wblack">
                                <div class="widget-content">

                                    @yield('inner_content')

                                    {{--<div class="widget-foot wblack">--}}

                                    <div class="clearfix"></div>

                                    </div>

                                </div>
                            </div>
                        </div>

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
    <footer class="widget wblack">
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