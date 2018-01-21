@extends('layouts.layout_battle')

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

            <button class="my-btn enemy_end end_turn">Ход соперника</button>
            {{--<div class="my-btn player_end end_turn yellow" title="Софийский собор">Закончить ход</div>--}}
            <a href="" data-tooltip="Кнопка подсвечивается желтым, если остались незаконченные действия"
               class="player_end end_turn yellow">
              <span>
                <em>Закончить ход</em><i class="fa fa-hourglass-start"></i>
              </span>
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
                    @foreach ([1, 2, 3] as $number)
                        <div class="card card-{{ $number }}">
                            <div class="my-btn attack">5</div>
                            <div class="my-btn health_points">4</div>
                            <div class="my-btn armor">3</div>
                            <div class="my-btn energy">2</div>
                            <button class="my-btn card_name" title="Софийский собор">
                                Наименование
                            </button>
                            <button class="my-btn ability">
                                Маскировка
                            </button>
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


