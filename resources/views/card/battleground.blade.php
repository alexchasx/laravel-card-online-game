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

            <div class="places card_places">
                <div class="box enemy_hand">
                    <div class="place player">
                        @foreach ([1,2,3,4,5,6,7] as $number)
                            <div class="card_place place_{{ $number }}"></div>
                        @endforeach
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="box enemy_place">
                    <div class="place player">
                        @foreach ([1,2,3,4,5,6,7] as $number)
                            <div class="card_place place_{{ $number }}"></div>
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
                            <div class="btn attack">5</div>
                            <div class="btn health_points">4</div>
                            <div class="btn armor">3</div>
                            <div class="btn energy">2</div>
                            <button class="btn card_name">
                                Наименование
                            </button>
                            <button class="btn ability">
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


