@extends('layouts.layout_battle')

@section('content')

    <!--/start-inner-content-->
        <!-- container -->
        <div class="wrapper">
            <a href="{{ url('/') }}">
                <button class="btn2" style="top: -100px;z-index: 900;">
                    Главная
                </button>
            </a>
            <a href="{{ route('battleGround') }}">
                <button class="btn2" style="top: 350px;z-index: 900;">
                    Бой
                </button>
            </a>
            <div class="places card_places">
                <form action="{{ route('replaceCardSubmit') }}" method="post">
                    <div class="box text-center">
                        @foreach ([1,2,3,4,5] as $number)
                            <label for="card-begin{{ $number }}">
                                {{--<div class="card-begin" id="card-begin1" data-id="1">--}}
                                {{--<input id="card-begin1" type="checkbox" name="card-begin1">--}}
                                {{--</div>--}}
                                <div class="card" data-id="{{ $number }}" id="card-begin{{ $number }}">
                                    <div class="my-btn energy">1</div>
                                    <div class="my-btn health_points">2</div>
                                    <div class="my-btn armor">3</div>
                                    <div class="my-btn attack">4</div>
                                    <div class="my-btn card_name"
                                            title="Софийский собор">
                                        Наименование
                                    </div>
                                    <div class="my-btn ability">
                                        Маскировка
                                    </div>
                                </div>
                            </label>
                        @endforeach
                    </div>

                    <button type="submit" data-tooltip="Вперед, и с песней!"
                            class="btn2">Принять</button>
                    {{ csrf_field() }}
                </form>
            </div>

            <div class="clearfix"></div>

        </div>
        <!-- //container -->
    <!--//end-inner-content-->

@endsection


