@extends('admin.admin_layout')

@section('inner_content')

    <table class="admin-panel">
        <thead>
        <tr>
            <td>ID</td>
            <td style="min-width: 220px;">Наименование</td>
            <td style="min-width: 125px;">Тип</td>
            <td>Пользователь</td>
            <td style="min-width: 150px;">Раса</td>
            <td style="min-width: 150px;">Аватар</td>
            <td>Видна?</td>
            <td>Рубашка</td>
            <td>Фон</td>
            <td>Рамка</td>
            <td>Цена</td>
            <td></td>
            <td>Удалено</td>
        </tr>
        </thead>

        <tbody>
        <tr>
            <form action="{{ route('cardSetStore') }}" method="post" role="form">
                <td></td>
                <td><input name="name" type="text" class="form-control" id="name"
                           value="{{ old('name') }}" required></td>
                <td>
                    <select name="type" size="3" class="form-control" id="type"
                            required>
                        @foreach ($types as $type)
                            <option value="{{$type}}">{{$type}}</option>
                        @endforeach
                    </select>
                </td>
                <td><input name="user_id" type="number" class="form-control" id="user_id"
                           value="{{ old('user_id') }}"></td>
                <td>
                    <select name="race_id" size="3" class="form-control" id="race_id">
                        @foreach ($races as $race)
                            <option value="{{$race->id}}">{{$race->name}}</option>
                        @endforeach
                    </select>
                </td>
                <td><input name="avatar" type="file" class="form-control" id="avatar"
                           value="{{ old('avatar') }}"></td>
                <td>
                    <select name="seen" id="seen">
                        <option selected value="1">Да</option>
                        <option value="0">Нет</option>
                    </select>
                </td>
                <td>{{--<input name="shirt_id" type="file" class="form-control" id="shirt"
                           value="{{ old('shirt_id') }}">--}}</td>
                <td>{{--<input name="background" type="file" class="form-control" id="background"
                           value="{{ old('background') }}">--}}</td>
                <td>{{--<input name="border" type="file" class="form-control" id="border"
                           value="{{ old('border') }}">--}}</td>
                <td><input name="price" type="text" class="form-control" id="price"
                           value="{{ old('price') }}" required></td>
                <td>
                    <button type="submit" class="btn btn-primary">Создать</button>
                </td>
                <td>{{ csrf_field() }}</td>
            </form>
        </tr>

        @foreach($cardSets as $cardSet)

            <tr @if ($cardSet->deleted_at)
                style="background-color: #e4b9b9;"
                @elseif (!$cardSet->seen)
                style="background-color: #9B859D;"
                    @endif>
                <td>{{ $cardSet->id }}</td>
                <td></td>
                <td>{{ $cardSet->name }}</td>
                <td>{{ $cardSet->type }}</td>
                <td>
                    @if ($cardSet->user)
                        {{ $cardSet->user->name }}
                    @endif
                </td>
                <td>
                    @if ($cardSet->race)
                        {{ $cardSet->race->name }}
                    @endif
                </td>
                <td>{{ $cardSet->avatar }}</td>
                <td>
                    @if ($cardSet->seen)
                        Да
                    @else
                        Нет
                    @endif
                </td>
                <td>{{--{{ $cardSet->shirt }}--}}</td>
                <td>{{--{{ $cardSet->background }}--}}</td>
                <td>{{--{{ $cardSet->border }}--}}</td>
                <td>{{ $cardSet->price }}</td>
                <td>
                    <form action="{{ route('cardSetDelete', ['id'=>$cardSet->id]) }}"
                          method="post">
                        <!-- <input type="hidden" name="_method" value="DELETE"> -->
                        {{method_field('DELETE')}}
                        {{csrf_field()}}
                        <button type="submit" class="btn btn-danger">Удалить</button>
                    </form>
                </td>
                <td>{{ $cardSet->deleted_at }}</td>
                <td><a class="btn btn-success"
                       href="{{ route('cardSetRestore',['card_set'=>$cardSet->id]) }}"
                       role="button">Восстановить</a>
                </td>
            </tr>
        @endforeach
        </tbody>

    </table>

@endsection