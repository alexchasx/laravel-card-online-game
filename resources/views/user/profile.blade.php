@extends('layouts.profile_layout')

@section('inner_content')
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-xs-6">
                <ul class="nav navbar-nav pull-right profile-list">
                    <li class="dropdown pull-right">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <i class="fa fa-user"></i> Список <b class="caret"></b>
                        </a>

                        <!-- Dropdown menu -->
                        <ul class="dropdown-menu profile-list">
                            <li><a class="link">Режим</a></li>
                            <li class="divider"></li>
                            <li><a href="#">Другое</a></li>
                        </ul>
                    </li>
                </ul>
                <br>

                <div class="avatar">
                    <img class="profile-avatar" src="images/banner.jpg" alt="аватар">
                    <div class="rank">
                        <ul class="nav navbar-nav pull-right profile-list">
                            <li class="dropdown pull-right">
                                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                    <i class="fa fa-user"></i> Капитан <b class="caret"></b>
                                </a>

                                <!-- Dropdown menu -->
                                <ul class="dropdown-menu profile-list">
                                    <li><a class="link">Рядовой - 100 очков</a></li>
                                    <li><a class="link">Сержант - 200 очков</a></li>
                                    <li><a class="link">Сержант - 200 очков</a></li>
                                    <li><a class="link">Сержант - 200 очков</a></li>
                                    <li><a class="link">Сержант - 200 очков</a></li>
                                    <li><a class="link">Сержант - 200 очков</a></li>
                                    <li><a class="link">Сержант - 200 очков</a></li>
                                    <li><a class="link">Сержант - 200 очков</a></li>
                                    <li><a class="link">Сержант - 200 очков</a></li>
                                    <li><a class="link">Сержант - 200 очков</a></li>
                                    <li><a class="link">Сержант - 200 очков</a></li>
                                    <li><a class="link">Сержант - 200 очков</a></li>
                                    <li><a class="link">Сержант - 200 очков</a></li>
                                    <li><a class="link">Сержант - 200 очков</a></li>
                                    <li><a class="link">Сержант - 200 очков</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#">Другое</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <br>
                    <br>

                    <button class="btn-primary btn-ava" href="">Сменить ник</button>
                    <br>
                    <button class="btn-default btn-ava" href="">Сменить пароль</button>
                </div>

            </div>

            <div class="col-sm-4 col-xs-6">

            @if(isAdmin())
                <a href="{{ route('cardIndex') }}">Админка</a>
            @endif

            <br>

            <table class="table table-striped table-bordered table-hover">
                <tbody>

                <tr>{{ $user->name }}</tr>
                <br>
                <tr>{{ $user->email }}</tr>
                <br>
                <tr>{{ $user->email }}</tr>

                </tbody>
            </table>

            </div>

            <div class="col-sm-4 col-xs-12">
                
            </div>

        </div>
    </div>
@endsection