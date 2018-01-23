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
            <p style="text-align: center;color: #e4b9b9;">
                Если хотите заменить карты - просто обновите страницу.
            </p>
            <a href="{{ route('battleGround') }}">
                <button class="btn2" style="top: 350px;z-index: 900;">
                    Бой
                </button>
            </a>
            <div class="places card_places">
                <form action="{{ route('replaceCardSubmit') }}" method="post">
                    <div class="box text-center">
                        @foreach ($cards as $card)
                            <div id="avatar{{ $loop->iteration }}" style="display: none;" data-avatar="{{ $card->avatar }}">hidden</div>
                            <label for="card-begin{{ $loop->iteration }}">
                                {{--<div class="card-begin" id="card-begin1" data-id="1">--}}
                                {{--<input id="card-begin1" type="checkbox" name="card-begin1">--}}
                                {{--</div>--}}
                                <div class="card" data-id="{{ $card->id }}" id="card-begin{{ $loop->iteration }}">
                                    <div class="my-btn energy">{{ $card->energy }}</div>
                                    <div class="my-btn health_points">{{ $card->health_points }}</div>
                                    <div class="my-btn armor">{{ $card->armor }}</div>
                                    <div class="my-btn attack">{{ $card->attack }}</div>
                                    <div class="my-btn card_name"
                                            title="Софийский собор">
                                        {{ $card->card_name }}
                                    </div>
                                    <div class="my-btn ability">
                                        {{ $card->ability1 ? $card->ability1->name : null}} <br>
                                        {{ $card->ability2 ? $card->ability2->name : null}}
                                    </div>
                                </div>
                            </label>
                            <input type="hidden" name="id[]" value="{{ $card->id }}">
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


