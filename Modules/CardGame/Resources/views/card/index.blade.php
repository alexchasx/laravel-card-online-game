@extends('cardgame::layouts.admin_layout')

@section('inner_content')

    <table class="table">
    <!-- Button to trigger modal -->
    <a href="#myModal" class="btn btn-info" data-toggle="modal">Создать новую карту</a>

    @include('cardgame::card.create')

            <table class="table">
                <thead>
                <tr style="background-color: #9696e4;color: #000;">
                    <td>ID</td>
                    <td style="min-width: 100px;">Наименование</td>
                    <td>Вид.</td>
                    <td>Нация</td>
                    <td>Свойство 1</td>
                    <td>Свойство 2</td>
                    <td style="width: 100px;">Аватар</td>
                    <td>Набор</td>
                    <td>Тип</td>
                    <td>Редкость</td>
                    <td>Цена</td>
                    <td></td>
                    <td>Уд.</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                </thead>
                <tbody>

                @foreach($cards as $card)

                    <tr @if ($card->deleted_at)
                        style="background-color: #e4b9b9;"
                        @elseif (!$card->seen)
                        style="background-color: #9B859D;"
                            @endif>
                        <td>{{ $card->id }}</td>
                        <td>
                            {{ $card->name }}
                            <br>
                            <span class="label label-danger">{{ $card->attack }}</span>
                            <span class="label label-success">{{ $card->health }}</span>
                            <span class="label label-warning">{{ $card->energy }}</span>
                            <span class="label label-default">{{ $card->armor }}</span>
                        </td>
                        <td>
                            @if (!$card->seen)
                                Нет
                            @else
                                Да
                            @endif
                        </td>
                        <td>
                            @if ($card->race)
                                {{ $card->race->name }}
                            @endif
                        </td>
                        <td>
                            @if ($card->ability1)
                                {{ $card->ability1->name }}
                            @endif
                        </td>
                        <td>
                            @if ($card->ability2)
                                {{ $card->ability2->name }}
                            @endif
                        </td>
                        <td><img width="50" src="{{ $card->avatar }}" alt=""></td>
                        <td>
                            @if ($card->cardSet)
                                {{ $card->cardSet->name }}
                            @endif
                        </td>
                        <td>
                            @if ($card->cardType)
                                {{ $card->cardType->name }}
                            @endif
                        </td>
                        <td>
                            @if ($card->rarity)
                                {{ $card->rarity->name }}
                            @endif
                        </td>
                        <td>{{ $card->price }}</td>
                        <td>
                            <form action="{{ route('cardDelete', ['id'=>$card->id]) }}"
                                  method="post">
                                {{method_field('DELETE')}}
                                {{csrf_field()}}
                                <button class="btn btn-xs btn-danger">
                                    <i class="fa fa-times"></i>
                                </button>
                            </form>
                        </td>
                        <td>
                            @if ($card->deleted_at)
                                <span class="label label-danger">Уд.</span>
                            @endif
                        </td>
                        <td><a href="{{ route('cardRestore',['id'=>$card->id]) }}"
                               role="button">
                                <button class="btn btn-xs btn-success">
                                    <i class="fa fa-refresh"></i>
                                </button>
                            </a>
                        </td>
                        <td><a href="{{ route('cardEdit',['id'=>$card->id]) }}"
                               role="button">
                                <button class="btn btn-xs btn-warning">
                                    <i class="fa fa-edit"></i>
                                </button>
                            </a>
                        </td>
                        <td>
                            <form action="{{ route('cardForceDelete', ['id'=>$card->id]) }}"
                                  method="post">
                                {{method_field('DELETE')}}
                                {{csrf_field()}}
                                <button class="btn btn-xs btn-danger">
                                    <i class="fa fa-trash-o"></i>
                                </button>
                            </form>
                        </td>
                    </tr>

                @endforeach
                </tbody>
            </table>
@endsection