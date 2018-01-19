@extends('admin.admin_layout')

@section('inner_content')

    <table class="admin-panel">
        <thead>
        <tr>
            <td>ID</td>
            <td style="min-width: 150px;">Аватар</td>
            <td style="min-width: 220px;">Наименование</td>
            <td>Видна?</td>
            <td style="min-width: 125px;">Особенности</td>
            <td style="min-width: 150px;">Описание</td>
            <td>Рамка</td>
            <td>Платный?</td>
        </tr>
        </thead>

        <tbody>
        <tr>
            <form action="{{ route('raceStore') }}" method="post" role="form">
                <td></td>
                <td><input name="avatar" type="file" class="form-control" id="avatar"
                           value="{{ old('avatar') }}"></td>
                <td><input name="set_name" type="text" class="form-control" id="set_name"
                           value="{{ old('name') }}" required></td>
                <td>
                    <select name="hidden" id="hidden">
                        <option selected value="0">Да</option>
                        <option value="1">Нет</option>
                    </select>
                </td>
                <td></td>
                <td></td>
                    <select name="pay" id="pay">
                        <option value="1">Да</option>
                        <option selected value="0">Нет</option>
                    </select>
                </td>
                <td>
                    <button type="submit" class="btn btn-primary">Создать</button>
                </td>
                <td>{{ csrf_field() }}</td>
            </form>
        </tr>

        @foreach($races as $race)

            <tr @if ($race->deleted_at)
                style="background-color: #e4b9b9;"
                @elseif ($race->hidden)
                style="background-color: #9B859D;"
                    @endif>
                <td>{{ $race->id }}</td>
                <td></td>
                <td>{{ $race->name }}</td>
                <td>
                    @if ($race->hidden)
                        Нет
                    @else
                        Да
                    @endif
                </td>
                <td>{{ $race->feature }}</td>
                <td>{{ $race->description }}</td>
                <td>{{ $race->pay }}</td>
                <td>
                    <form action="{{ route('raceDelete', ['id'=>$race->id]) }}"
                          method="post">
                        <!-- <input type="hidden" name="_method" value="DELETE"> -->
                        {{method_field('DELETE')}}
                        {{csrf_field()}}
                        <button type="submit" class="btn btn-danger">Удалить</button>
                    </form>
                </td>
                <td>{{ $race->deleted_at }}</td>
                <td><a class="btn btn-success"
                       href="{{ route('raceRestore',['card_set'=>$race->id]) }}"
                       role="button">Восстановить</a>
                </td>
            </tr>
        @endforeach
        </tbody>

    </table>

@endsection