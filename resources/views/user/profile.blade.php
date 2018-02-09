@extends('layouts.profile_layout')

@section('content')

    <div class="wrapper">

        <div class="tabs">
        <header class="header">
            <img class="avatar" src="{{ $user->avatar->avatar }}" alt="аватар">
            <div class="header-menu">
                <a class="knopka01" href="{{ route('magazinIndex') }}">Магазин</a>
                @if (isAdmin())
                    <a class="knopka01" href="{{ route('cardIndex') }}">Админка</a>
                @endif
                <a class="button11" href="{{--{{ route('magazinIndex') }}--}}">Баланс:
                    <span class="pick">{{ $user->balance }} &#8381;</span>
                </a>
            </div>

            @include('layouts.sub_nick')

        </header><!-- .header-->

            <input type="radio" name="odin" checked="checked" id="vkl1"/><label class="knopka01" for="vkl1">Звания</label>
            <input type="radio" name="odin" id="vkl2"/><label class="knopka01" for="vkl2">Задания</label>
            <input type="radio" name="odin" id="vkl3"/><label class="knopka01" for="vkl3">Колоды</label>
            <input type="radio" name="odin" id="vkl4"/><label class="knopka01" for="vkl4">Арена</label>
            <input type="radio" name="odin" id="vkl5"/><label class="knopka01" for="vkl5">Рейтинги</label>
            <input type="radio" name="odin" id="vkl6"/><label class="knopka01" for="vkl6">Отзыв</label>

        <div class="middle">
            <main class="right-sidebar block">
                За что даются очки:
                <hr>
                <table>
                    <tr>
                        <td>За игру: </td>
                        <td><span class="pick">10</span></td>
                    </tr>
                    <tr>
                        <td>За победу: </td>
                        <td><span class="pick">5</span></td>
                    </tr>
                    <tr>
                        <td>За выполнение задания: </td>
                        <td><span class="pick">10</span></td>
                    </tr>
                </table>
                <hr>
                <span class="pick">Внимание: </span>
                <p>Что бы получить звание выше <span class="pick">сержанта</span>,
                    плюс к соответствующему рейтингу необходим <span class="pick">офицерский взнос</span>
                 (если на балансе есть соответствующая сумма - она <span class="pick">будет снята автоматически</span>)</p>
            </main><!-- .content -->

            <aside class="left-sidebar block">
                <table>
                    <thead>
                        <tr>
                            <td>Звание</td>
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
            </aside><!-- .left-sidebar -->
        </div><!-- .middle-->

        <div class="middle">
            <main class="right-sidebar block">

            </main><!-- .content -->
            <aside class="left-sidebar block">

            </aside><!-- .left-sidebar -->
        </div><!-- .middle-->

        <div class="middle">
            <main class="right-sidebar block">
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
            </main><!-- .content -->

            <aside class="left-sidebar block">
                <table>
                    @foreach($cardSets as $cardSet)
                        <tr>
                            <td><span class="pick">{{ $loop->iteration }}</span></td>
                            <td>{{ $cardSet->name }}</td>
                        </tr>
                    @endforeach
                </table>
            </aside><!-- .left-sidebar -->
        </div><!-- .middle-->

        <div class="middle">
            <main class="right-sidebar block">
                BBBBBBBBBBBBBBBBBB
            </main><!-- .content -->

            <aside class="left-sidebar block">
                BBBBBBBBBBBBBBB
            </aside><!-- .left-sidebar -->
        </div><!-- .middle-->

        <div class="middle">
            <main class="right-sidebar block">
                AAAAAAAAAAAAAAAAAAA
            </main><!-- .content -->

            <aside class="left-sidebar block">
                AAAAAAAAAAAAAAAAAAAA
            </aside><!-- .left-sidebar -->
        </div><!-- .middle-->

        </div>
    </div><!-- .wrapper -->

    {{--<footer class="footer block">--}}
    {{--<strong>Footer:</strong> Mus elit Morbi mus enim lacus at quis Nam eget morbi. Et semper urna urna non at cursus dolor vestibulum neque enim. Tellus interdum at laoreet laoreet lacinia lacinia sed Quisque justo quis. Hendrerit scelerisque lorem elit orci tempor tincidunt enim Phasellus dignissim tincidunt. Nunc vel et Sed nisl Vestibulum odio montes Aliquam volutpat pellentesque. Ut pede sagittis et quis nunc gravida porttitor ligula.--}}
    {{--</footer><!-- .footer -->--}}

@endsection