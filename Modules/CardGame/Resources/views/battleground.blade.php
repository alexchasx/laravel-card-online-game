@extends('resources.views.layouts.layout_battle')

@section('content')

    <!--/start-inner-content-->
    <!-- blog -->
    <div class="blog">
        <!-- container -->
        <div class="wrapper">
            <div class="enemy-avatar user-avatar">enemy-avatar</div>
            <div class="player-avatar user-avatar">player-avatar</div>
            <div class="enemy-deck card-deck">enemy-deck</div>
            <div class="player-deck card-deck">player-deck</div>

            {{--<button class="my-btn enemy_end end_turn">Ход соперника</button>--}}
            <a href="" class="btn2 player_end end_turn yellow"
               data-tooltip="Кнопка подсвечивается желтым, если остались незаконченные действия">
                Закончить ход
            </a>
            <div class="places card_places">
                <div class="box enemy_hand">
                    <div class="place player">
                        @foreach ([1,2,3,4,5,6,7] as $number)
                            <div class="card_place place_enemy place_{{ $number }}"></div>
                        @endforeach
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="box enemy_place">
                    <div class="place player">
                        @foreach ([1,2,3,4,5,6,7] as $number)
                            <div class="card_place place_enemy place_{{ $number }}"></div>
                        @endforeach
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="box player_place">
                    <div class="place player">
                        @foreach ([1,2,3,4,5,6,7] as $number)
                            <div class="card_place place_{{ $number }}"></div>
                        @endforeach
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="player_hand">
                    @foreach ($playerStartCards as $playerStartCard)
                        <div id="avatar{{ $loop->iteration }}" style="display: none;"
                             data-avatar="{{ $playerStartCard->avatar }}">hidden
                        </div>
                        <div class="card card-{{ $loop->iteration }}"
                             id="card-begin{{ $loop->iteration }}">
                            <div class="energy">{{ $playerStartCard->energy }}</div>
                            <div class="health_points">{{ $playerStartCard->health_points }}</div>
                            <div class="armor">{{ $playerStartCard->armor }}</div>
                            <div class="attack">{{ $playerStartCard->attack }}</div>
                            <div class="my-btn card_name"
                                 title="Софийский собор">
                                {{ $playerStartCard->card_name }}
                            </div>
                            <div class="my-btn ability">
                                {{ $playerStartCard->ability1 ? $playerStartCard->ability1->name : null}}
                                <br>
                                {{ $playerStartCard->ability2 ? $playerStartCard->ability2->name : null}}
                            </div>
                        </div>
                    @endforeach
                    <div class="clearfix"></div>
                </div>
            </div>

            {{--<div class="place enemy">--}}
            {{--@foreach ([1,2,3,4] as $number)--}}
            {{--<div class="card_place place_{{ $number }}"></div>--}}
            {{--@endforeach--}}
            {{--<div class="clearfix"></div>--}}
            {{--</div>--}}

        </div>
        <!-- //container -->
    </div>
    <!-- //blog -->
    <!--//end-inner-content-->

@endsection


