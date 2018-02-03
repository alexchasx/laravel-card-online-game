@extends('cardgame::layouts.app')

@section('content')

    @include('layouts.style_profile')

    <div class="navbar navbar-fixed-top bs-docs-nav" role="banner">

        <div class="container-fluid">
            <!-- Menu button for smallar screens -->
            <div class="navbar-header">
                <button class="navbar-toggle btn-navbar" type="button" data-toggle="collapse"
                        data-target=".bs-navbar-collapse">
                    <span>Menu</span>
                </button>
                <!-- Site name for smallar screens -->
                <a href="/" class="navbar-brand lg">В бой!</a>
            </div>

            <!-- Navigation starts -->
            <nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">
                <!-- Links -->
                <ul class="nav navbar-nav pull-right">
                    <li class="dropdown pull-right">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <i class="fa fa-user"></i> {{ $user->name}} <b class="caret"></b>
                        </a>

                        <!-- Dropdown menu -->
                        <ul class="dropdown-menu">
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

    @include('layouts.footer')

@endsection