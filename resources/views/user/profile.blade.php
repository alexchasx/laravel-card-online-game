@extends('layouts.profile_layout')

@section('content')

    <div class="wrapper">

        <div class="tabs">
        <header class="header">
            <img class="avatar" src="images/profile/avatar.jpg" alt="аватар">
            <div class="header-menu">
                <a class="knopka01" href="{{--{{ route('magazinIndex') }}--}}">Магазин</a>
            </div>
            <div class="sub-nick">
                <table>
                    <tr>
                        <td>Имя: </td>
                        <td><span class="pick">{{ $user->name }}</span></td>
                    </tr>
                    <tr>
                        <td>Звание: </td>
                        <td><span class="pick">{{ $user->rank->name }}</span></td>
                    </tr>
                    <tr>
                        <td>Рейтинг: </td>
                        <td><span class="pick">{{ $user->rating }}</span></td>
                    </tr>
                </table>
            </div>
            <div class="sub-nick">
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
        </header><!-- .header-->

            <input type="radio" name="odin" checked="checked" id="vkl1"/><label class="knopka01" for="vkl1">Звания</label>
            <input type="radio" name="odin" id="vkl2"/><label class="knopka01" for="vkl2">Задания</label>
            <input type="radio" name="odin" id="vkl3"/><label class="knopka01" for="vkl3">Колоды</label>
            <input type="radio" name="odin" id="vkl4"/><label class="knopka01" for="vkl4">Арена</label>
            <input type="radio" name="odin" id="vkl5"/><label class="knopka01" for="vkl5">Рейтинги</label>

        <div class="middle">
            <main class="right-sidebar block">
                sdsds
            </main><!-- .content -->

            <aside class="left-sidebar block">
                Статистика:
                <hr>
                <ul>
                    <li>Сыграно игр: {{ $user->count_battles }}</li>
                    <li>Побед: {{ $user->count_wins }}</li>
                    <li>Поражений: {{--{{ $user->countDefeat() }}--}}</li>
                </ul>
            </aside><!-- .left-sidebar -->
        </div><!-- .middle-->

        <div class="middle">
            <main class="right-sidebar block">
                GGGGGGGGGGGGGGGGGGGG
            </main><!-- .content -->

            <aside class="left-sidebar block">
                GGGGGGGGGGGGGGGGGGG
            </aside><!-- .left-sidebar -->
        </div><!-- .middle-->

        <div class="middle">
            <main class="right-sidebar block">
                ZZZZZZZZZZZZZZZZ
            </main><!-- .content -->

            <aside class="left-sidebar block">
                ZZZZZZZZZZZZZZZZZZZ
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