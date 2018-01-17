@extends('admin.admin_layout')

@section('inner_content')
    <br>
    <br>

    <table class="admin-panel">
        <thead>
        <tr>
            <td>ID</td>
            <td style="min-width: 70px;">Аватар</td>
            <td style="min-width: 100px;">Наименование</td>
            <td>Видна?</td>
            <td style="min-width: 50px;">Стоим.</td>
            <td style="min-width: 50px;">Атака</td>
            <td style="min-width: 50px;">ХП</td>
            <td style="min-width: 50px;">Броня</td>
            <td style="min-width: 120px;">Свойство 1</td>
            <td style="min-width: 120px;">Свойство 2</td>
            <td style="min-width: 120px;">Раса</td>
            <td style="min-width: 120px;">Набор</td>
            <td style="min-width: 125px;">Тип</td>
            <td style="min-width: 125px;">Редкость</td>
            <td>Платная?</td>
            <td></td>
            <td>Удалено</td>
        </tr>
        </thead>
        <tbody>
            <tr>
                <form action="{{ route('cardStore') }}" method="post" role="form">
                    <td></td>
                    <td><input name="avatar" type="file" class="form-control" id="avatar" value="{{ old('avatar') }}"></td>
                    <td><input name="card_name" type="text" class="form-control" id="card_name" value="{{ old('card_name') }}" required></td>
                    <td>
                        <select name="hidden" id="hidden">
                            <option selected value="0">Да</option>
                            <option value="1">Нет</option>
                        </select>
                    </td>
                    <td><input name="energy" type="text" class="form-control" id="energy" value="{{ old('energy') }}"></td>
                    <td><input name="attack" type="text" class="form-control" id="attack" value="{{ old('attack') }}"></td>
                    <td><input name="health_points" type="text" class="form-control" id="health_points" value="{{ old('health_points') }}"></td>
                    <td><input name="armor" type="text" class="form-control" id="armor" value="{{ old('armor') }}"></td>
                    <td>
                        <select name="ability1_id" size="3" class="form-control" id="ability1_id">
                            @foreach ($abilities as $ability)
                                <option value="{{$ability->id}}">{{$ability->name}}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <select name="ability2_id" size="3" class="form-control" id="ability2_id">
                            @foreach ($abilities as $ability)
                                <option value="{{$ability->id}}">{{$ability->name}}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <select name="race_id" size="3" class="form-control" id="race_id">
                            @foreach ($races as $race)
                                <option value="{{$race->id}}">{{$race->name}}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <select name="card_sets_id" size="3" class="form-control" id="card_sets_id">
                            @foreach ($cardSets as $cardSet)
                                <option value="{{$cardSet->id}}">{{$cardSet->set_name}}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <select name="card_type_id" size="3" class="form-control" id="card_type_id">
                            @foreach ($types as $type)
                                <option value="{{ $type->id }}">{{ $type->name }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <select name="rarity_id" size="3" class="form-control" id="rarity_id">
                            @foreach ($rarities as $rarity)
                                <option value="{{ $rarity->id }}">{{ $rarity->name }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <select name="pay" id="pay">
                            <option value="1">Да</option>
                            <option selected value="0">Нет</option>
                        </select>
                    </td>
                    <td>
                        <button type="submit" class="btn btn-primary">Создать</button>
                    </td>
                    <td></td>
                    {{ csrf_field() }}
                </form>
            </tr>

        @foreach($cards as $card)

            <tr @if ($card->deleted_at)
                style="background-color: #e4b9b9;"
                @elseif ($card->hidden)
                style="background-color: #9B859D;"
                    @endif>
                <td>{{ $card->id }}</td>
                <td></td>
                <td>{{ $card->card_name }}</td>
                <td>
                    @if ($card->hidden)
                        Нет
                    @else
                        Да
                    @endif
                </td>
                <td>{{ $card->energy }}</td>
                <td>{{ $card->attack }}</td>
                <td>{{ $card->health_points }}</td>
                <td>{{ $card->armor }}</td>
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
                <td>
                    @if ($card->race)
                        {{ $card->race->name }}
                    @endif
                </td>
                <td>
                    @if ($card->cardSet)
                        {{ $card->cardSet->set_name }}
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
                <td>
                    @if ($card->pay)
                        Да
                    @else
                        Нет
                    @endif
                </td>
                <td>
                    <form action="{{ route('cardDelete', ['id'=>$card->id]) }}"
                          method="post">
                        <!-- <input type="hidden" name="_method" value="DELETE"> -->
                        {{method_field('DELETE')}}
                        {{csrf_field()}}
                        <button type="submit" class="btn btn-danger">Удалить</button>
                    </form>
                </td>
                <td>{{ $card->deleted_at }}</td>
                <td><a class="btn btn-success"
                       href="{{ route('cardRestore',['comment'=>$card->id]) }}"
                       role="button">Восстановить</a>
                </td>
                {{--<form action="{{ route('cardUpdate') }}" method="post" role="form">--}}
                    {{--<td></td>--}}
                    {{--<td><input name="avatar" type="file" class="form-control" id="avatar" value="{{ $card->avatar }}"></td>--}}
                    {{--<td><input name="card_name" type="text" class="form-control" id="card_name" value="{{ $card->card_name }}" required></td>--}}
                    {{--<td>--}}
                        {{--<label for="hidden">Показывать?</label>--}}
                        {{--<select name="hidden" id="hidden">--}}
                            {{--<option selected value="0">Да</option>--}}
                            {{--<option value="1">Нет</option>--}}
                        {{--</select>--}}
                    {{--</td>--}}
                    {{--<td>--}}
                        {{--<select name="card_sets_id" size="3" class="form-control" id="card_sets_id">--}}
                            {{--@foreach ($cardSets as $cardSet)--}}
                                {{--<option--}}
                                        {{--@if ($card->card_sets_id === $cardSet->id)--}}
                                        {{--selected--}}
                                        {{--@endif--}}
                                        {{--value="{{$cardSet->id}}">{{$cardSet->set_name}}</option>--}}
                            {{--@endforeach--}}
                        {{--</select>--}}
                    {{--</td>--}}
                    {{--<td>--}}
                        {{--<select name="race_id" size="3" class="form-control" id="race_id">--}}
                            {{--@foreach ($races as $race)--}}
                                {{--<option--}}
                                        {{--@if ($card->race_id === $race->id)--}}
                                        {{--selected--}}
                                        {{--@endif--}}
                                        {{--value="{{$race->id}}">{{$race->name}}</option>--}}
                            {{--@endforeach--}}
                        {{--</select>--}}
                    {{--</td>--}}
                    {{--<td>--}}
                        {{--<select name="ability1_id" size="3" class="form-control" id="ability1_id">--}}
                            {{--@foreach ($abilities as $ability)--}}
                                {{--<option--}}
                                        {{--@if ($card->ability1_id === $ability->id)--}}
                                        {{--selected--}}
                                        {{--@endif--}}
                                        {{--value="{{$ability->id}}">{{$ability->name}}</option>--}}
                            {{--@endforeach--}}
                        {{--</select>--}}
                    {{--</td>--}}
                    {{--<td>--}}
                        {{--<select name="ability2_id" size="3" class="form-control" id="ability2_id">--}}
                            {{--@foreach ($abilities as $ability)--}}
                                {{--<option--}}
                                        {{--@if ($card->ability2_id === $ability->id)--}}
                                        {{--selected--}}
                                        {{--@endif--}}
                                        {{--value="{{$ability->id}}">{{$ability->name}}</option>--}}
                            {{--@endforeach--}}
                        {{--</select>--}}
                    {{--</td>--}}
                    {{--<td>--}}
                        {{--<select name="type" size="3" class="form-control" id="type">--}}
                            {{--@foreach ($types as $type)--}}
                                {{--<option--}}
                                        {{--@if ($card->type === $type)--}}
                                        {{--selected--}}
                                        {{--@endif--}}
                                        {{--value="{{ $type }}">{{ $type }}</option>--}}
                            {{--@endforeach--}}
                        {{--</select>--}}
                    {{--</td>--}}
                    {{--<td><input name="energy" type="number" class="form-control" id="energy" value="{{ $card->energy }}"></td>--}}
                    {{--<td><input name="attack" type="number" class="form-control" id="attack" value="{{ $card->attack }}"></td>--}}
                    {{--<td><input name="health_points" type="number" class="form-control" id="health_points" value="{{ $card->health_points }}"></td>--}}
                    {{--<td><input name="armor" type="number" class="form-control" id="armor" value="{{ $card->armor }}"></td>--}}
                    {{--<td>--}}
                        {{--<select name="rarity" size="3" class="form-control" id="rarity"--}}
                                {{--required>--}}
                            {{--@foreach ($rarities as $rarity)--}}
                                {{--<option--}}
                                        {{--@if ($card->rarity === $rarity)--}}
                                        {{--selected--}}
                                        {{--@endif--}}
                                        {{--value="{{ $rarity }}">{{ $rarity }}</option>--}}
                            {{--@endforeach--}}
                        {{--</select>--}}
                    {{--</td>--}}
                    {{--<td>--}}
                        {{--<select name="pay" id="pay">--}}
                            {{--<option value="1">Да</option>--}}
                            {{--<option selected value="0">Нет</option>--}}
                        {{--</select>--}}
                    {{--</td>--}}
                    {{--<td>--}}
                        {{--<button type="submit" class="btn btn-primary">Сохранить</button>--}}
                    {{--</td>--}}
                    {{--<td>{{ csrf_field() }}</td>--}}
                {{--</form>--}}
            </tr>

        @endforeach
        </tbody>


    </table>

@endsection