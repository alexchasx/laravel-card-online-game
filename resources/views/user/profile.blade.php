@extends('layouts.profile_layout')

@section('inner_content')
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-xs-4">

                @if(isAdmin())
                    <a style="position: absolute;top:-25px;" href="{{ route('cardIndex') }}">Админка</a>
                @endif

                <div class="rank">
                    <ul class="nav navbar-nav pull-left profile-list">
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

                <div class="avatar">
                    <img class="profile-avatar" src="" alt="аватар">
                    <div class="prof-nik">{{ $user->name }}</div>

                    <br>
                    <a href="#myModal" data-toggle="modal">
                        <button class="btn-primary btn-ava">
                            Изменить свои данные
                        </button>
                    </a>
                    <br>
                    <br>
                    <button class="btn-warning btn-ava" href="">Поддержать игру</button>
                    <br>
                    <br>
                    <br>
                </div>

            </div>

            <div class="col-md-4 col-xs-6 text border">
                Статистика:
                <ul>
                    <li>Игр сыграно: 5</li>
                    <li>Побед: 5</li>
                    <li>Поражений: 5</li>
                </ul>
            </div>

            <div class="col-md-4 col-xs-12 text-center text">
                <button class="btn-primary btn-ava" href="">Создать колоду</button>
                <br>
                <br>
                <div class="border">
                    &nbsp;&nbsp;Доступные колоды:
                    <br>
                    <ol>
                        <li>&nbsp;&nbsp;<a href="">Стартовая колода</a></li>
                        <li>&nbsp;&nbsp;<a href="">Стартовая колода</a></li>
                    </ol>

                </div>
            </div>

        </div>
    </div>

    @include('user.update')
@endsection