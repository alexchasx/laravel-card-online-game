@extends('user.profile.profile_layout')

@section('content')

        <div class="tabs">
            <input type="radio" name="odin" id="vkl1"/>
            <label class="knopka01" for="vkl1">Профиль</label>

            <input type="radio" name="odin" id="vkl2"/>
            <label class="knopka01" for="vkl2">Игра</label>

            <input type="radio" name="odin" checked="checked" id="vkl3"/>
            <label class="knopka01" for="vkl3">Колоды</label>

            <input type="radio" name="odin" id="vkl4"/>
            <label class="knopka01" for="vkl4">Награды</label>

            <input type="radio" name="odin" id="vkl5"/>
            <label class="knopka01 no" for="vkl5">Кланы</label>

            <input type="radio" name="odin" id="vkl6"/>
            <label class="knopka01 no" for="vkl6">Рейтинги</label>

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

            @include('user.profile.tab_game')

            {{--3 Колоды--}}

            @include('user.profile.tab_decks')

            {{--4--}}

            @include('user.profile.tab_honor')

            {{--5--}}
            <div class="middle">
                <div class="right-sidebar sidebar">
                </div>

                <div class="left-sidebar sidebar">
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