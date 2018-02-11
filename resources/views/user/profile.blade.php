@extends('layouts.profile_layout')

@section('content')

    <div class="wrapper">

        <div class="header">
            <div class="tooltip">
                <img class="avatar" src="{{ $user->avatar->avatar }}" alt="аватар">
                <span class="custom info hidden">
                    Сменить аватар можно в магазине (платно!)
                </span>
            </div>

            @include('layouts.sub_nick')

            <div class="header-menu">
                <a  href="#" class="button width70px large round tooltip">
                    Отзыв
                    <span class="custom info hidden">
                        Здесь можно отправить письмо разработчику игры с предложением или отзывом
                    </span>
                </a>
                <a class="button width70px large round" href="{{ route('magazinIndex') }}">Магазин</a>

                @if (isAdmin())
                    <a class="button width70px large round" href="{{ route('cardIndex') }}">Админка</a>
                @endif

                <a class="button11" href="{{--{{ route('magazinIndex') }}--}}">Баланс:
                    <span class="pick">{{ $user->balance }} &#8381;</span>
                </a>
            </div>
        </div><!-- .header-->
        <br>

        <div class="tabs">
            <input type="radio" name="odin" id="vkl1"/>
            <label class="knopka01" for="vkl1">Профиль</label>

            <input type="radio" name="odin" checked="checked" id="vkl2"/>
            <label class="knopka01" for="vkl2">Игра</label>

            <input type="radio" name="odin" id="vkl3"/>
            <label class="knopka01" for="vkl3">Колоды</label>

            <input type="radio" name="odin" id="vkl4"/>
            <label class="knopka01" for="vkl4">Награды</label>

            <input type="radio" name="odin" id="vkl5"/>
            <label class="knopka01" for="vkl5">Кланы</label>

            <input type="radio" name="odin" id="vkl6"/>
            <label class="knopka01" for="vkl6">Рейтинги</label>

            <input type="radio" name="odin" id="vkl7"/>
            <label class="knopka01 tooltip" for="vkl7">
                ---
            </label>

            {{--1 (Профиль)--}}
            <div class="middle">
                <div class="right-sidebar sidebar">
                    <table>
                        <tr>
                            <td>Сыграно игр:</td>
                            <td><span class="pick">{{ $user->count_battles }}</span></td>
                        </tr>
                        <tr>
                            <td>Побед:</td>
                            <td><span class="pick">{{ $user->count_wins }}</span></td>
                        </tr>
                        <tr>
                            <td>Поражений:</td>
                            <td><span class="pick">{{--{{ $user->countDefeat() }}--}}</span></td>
                        </tr>
                    </table>
                </div> 
                <div class="left-sidebar sidebar">
                    <table>
                        <tr>
                            <td>
                                <a class="button width70px" href="{{ route('magazinIndex') }}">
                                    Сменить имя
                                </a>
                            </td>
                            <td><span class="pick">20 &#8381;</span></td>
                        </tr>
                        <tr>
                            <td>
                                <a class="button width70px" href="{{ route('magazinIndex') }}">
                                    Сменить аватар
                                </a>
                            </td>
                            <td><span class="pick">40 &#8381;</span></td>
                        </tr>
                    </table>
                </div>
            </div>

            {{--2 (Игра)--}}
            <div class="middle">

                <div class="left-sidebar sidebar">
                    <h3>Игры с ботами:</h3>
                    <hr>
                    <a class="button width200px" href="#">
                        Обычный бой
                    </a>
                    <a class="button width200px" href="#">
                        Абордаж крейсера
                    </a>
                    <a class="button width200px" href="#">
                        На выживание
                    </a>
                    <a class="button width200px" href="#">
                        Осада крепости
                    </a>
                    <a class="button width200px" href="#">
                        Оборона станции
                    </a>
                    <a class="button width200px" href="#">
                        Эскорт транспорта
                    </a>
                </div> 

                <div class="left-sidebar sidebar">
                    <h3>Создать вызов:</h3>
                    <hr>

                    <form action="#" method="post">
                        <table>
                            <tr>
                                <td>
                                    <label class="tooltip">
                                        <input class="checkbox" type="checkbox" name="checkbox-test">
                                        <span class="checkbox-custom"></span>
                                        <span class="label">Только игроки моего ранга</span>
                                        <span class="custom critical hidden">
                                            Не рекомендуется. Подбор будет долгим.
                                        </span>
                                    </label>
                                </td>
                            </tr>
                        </table>

                        <label class="tooltip">
                            <a type="submit" class="button">Создать вызов</a>
                            <span class="custom info hidden">
                                Создать запись в списке "Вызовы (реальных игроков)" (справа).
                                Эти записи видны всем игрокам.
                            </span>
                        </label>
                    {{ csrf_field() }}
                    </form>
                </div> 

                <div class="left-sidebar sidebar">
                    <h3>Вызовы (реальных игроков):</h3>
                    <hr>
                    <table>
                        <thead>
                        <tr>
                            <td>Имя</td>
                            <td>Ранг</td>
                            <td>Кнопка</td>
                        </tr>
                        </thead>

                        <tbody>
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->rank->name }}</td>
                            {{--@if (isOwner($user->id))--}}
                                {{--<td>--}}
                                    {{--<a href="#" class="button">Отмена</a>--}}
                                {{--</td>--}}
                            {{--@else--}}
                                <td>
                                    <a href="#" class="button">В бой</a>
                                </td>
                            {{--@endif--}}
                        </tr>
                        </tbody>
                    </table>
                </div> 
            </div> 

            {{--3--}}
            <div class="middle">
                <div class="right-sidebar sidebar">
                    <table>
                        @foreach($cards as $entity)
                            <tr>
                                <td>
                                    {{ $entity->name }}
                                    <br>
                                    <span class="label label-danger">{{ $entity->attack }}</span>
                                    <span class="label label-success">{{ $entity->health }}</span>
                                    <span class="label label-warning">{{ $entity->energy }}</span>
                                    <span class="label label-default">{{ $entity->armor }}</span>
                                </td>
                                <td>
                                    @if ($entity->ability1)
                                        {{ $entity->ability1->name }}
                                    @endif
                                </td>
                                <td>
                                    @if ($entity->ability2)
                                        {{ $entity->ability2->name }}
                                    @endif
                                </td>
                                <td><img width="30" src="{{ $entity->avatar }}" alt=""></td>
                                <td>
                                    @if ($entity->cardType)
                                        {{ $entity->cardType->name }}
                                    @endif
                                </td>
                        @endforeach
                    </table>
                </div> 

                <div class="left-sidebar sidebar">
                    <table>
                        @foreach($cardSets as $cardSet)
                            <tr>
                                <td><span class="pick">{{ $loop->iteration }}</span></td>
                                <td>{{ $cardSet->name }}</td>
                            </tr>
                        @endforeach
                    </table>
                </div> 
            </div> 

            {{--4--}}
            <div class="middle">
                <div class="right-sidebar sidebar">
                </div> 

                <div class="left-sidebar sidebar">
                </div> 
            </div> 

            {{--5--}}
            <div class="middle">
                <div class="right-sidebar sidebar">
                    За что даются очки рейтинга:
                    <hr>
                    <table>
                        <tr>
                            <td>За игру:</td>
                            <td><span class="pick">10</span></td>
                        </tr>
                        <tr>
                            <td>За победу:</td>
                            <td><span class="pick">5</span></td>
                        </tr>
                        <tr>
                            <td>За выполнение задания:</td>
                            <td><span class="pick">10</span></td>
                            <td>(недоступно)</td>
                        </tr>
                    </table>
                    <hr>
                    <span class="pick">Внимание: </span>
                    <p>Что бы получить ранг выше <span class="pick">сержанта</span>,
                        плюс к соответствующему рейтингу необходим <span class="pick">офицерский взнос</span>
                        (если на балансе есть соответствующая сумма - она <span class="pick">будет снята автоматически</span>)
                    </p>
                </div> 

                <div class="left-sidebar sidebar">
                    <table>
                        <thead>
                        <tr>
                            <td>Ранг</td>
                            <td>Рейтинг</td>
                            <td>Взнос</td>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($ranks as $rank)
                            <tr>
                                <td>{{ $rank->name }}:</td>
                                <td><span class="pick">{{ $rank->rating }}</span></td>
                                <td>
                                    @if($rank->price)
                                        <span class="pick">+{{ $rank->price }} &#8381;</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div> 
            </div> 

            {{--6--}}
            <div class="middle">
                <div class="right-sidebar sidebar">ыв
                </div> 

                <div class="left-sidebar sidebar">ыв
                </div> 
            </div> 

            {{--7--}}
            <div class="middle">
                <div class="right-sidebar sidebar">фыфы
                </div> 

                <div class="left-sidebar sidebar">фыфы
                </div> 
            </div> 

        </div>
    </div><!-- .wrapper -->

    {{--<footer class="footer sidebar">--}}
    {{--<strong>Footer:</strong> Mus elit Morbi mus enim lacus at quis Nam eget morbi. Et semper urna urna non at cursus dolor vestibulum neque enim. Tellus interdum at laoreet laoreet lacinia lacinia sed Quisque justo quis. Hendrerit scelerisque lorem elit orci tempor tincidunt enim Phasellus dignissim tincidunt. Nunc vel et Sed nisl Vestibulum odio montes Aliquam volutpat pellentesque. Ut pede sagittis et quis nunc gravida porttitor ligula.--}}
    {{--</footer><!-- .footer -->--}}

@endsection