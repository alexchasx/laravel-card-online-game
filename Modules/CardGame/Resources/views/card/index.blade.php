@extends('cardgame::layouts.admin_layout')

@section('inner_content')

    <table class="table">
        <!-- Button to trigger modal -->
        <a href="#myModal" class="btn btn-info" data-toggle="modal">Создать новую карту</a>

        @foreach($counts as $key => $count)
            <span> </span>
            <span style="font-size: 14px; color: #000;" class="label label-warning">{{  $key }}:</span>
            {{ $count }}
        @endforeach

        @include('cardgame::card.create')

        <table class="table">
            <thead>
            <tr style="background-color: #9696e4;color: #000;">
                {{--<td>ID</td>--}}
                <td style="min-width: 100px;">Наименование</td>
                <td>Вид.</td>
                <td>Нация</td>
                <td>Свойство 1</td>
                <td>Свойство 2</td>
                <td>Аватар</td>
                <td>Набор</td>
                <td>Тип</td>
                <td>Редкость</td>
                <td>Цена</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            </thead>
            <tbody>

            @foreach($entities as $entity)

                <tr @if ($entity->deleted_at)
                    style="background-color: #816363;"
                    @elseif (!$entity->seen)
                    style="background-color: #9B859D;"
                        @endif>
                    {{--<td>{{ $entity->id }}</td>--}}
                    <td>
                        {{ $entity->name }}
                        <br>
                        <span class="label label-danger">{{ $entity->attack }}</span>
                        <span class="label label-success">{{ $entity->health }}</span>
                        <span class="label label-warning">{{ $entity->energy }}</span>
                        <span class="label label-default">{{ $entity->armor }}</span>
                    </td>
                    <td>
                        @if (!$entity->seen)
                            Нет
                        @else
                            Да
                        @endif
                    </td>
                    <td>
                        @if ($entity->race)
                            {{ $entity->race->name }}
                        @endif
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
                        @if ($entity->cardSet)
                            {{ $entity->cardSet->name }}
                        @endif
                    </td>
                    <td>
                        @if ($entity->cardType)
                            {{ $entity->cardType->name }}
                        @endif
                    </td>
                    <td>
                        @if ($entity->rarity)
                            {{ $entity->rarity->name }}
                        @endif
                    </td>
                    <td>{{ $entity->price }}</td>

                @include('cardgame::layouts.table_end')

            @endforeach
            </tbody>
        </table>
@endsection