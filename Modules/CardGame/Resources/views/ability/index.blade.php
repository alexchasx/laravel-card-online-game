@extends('admin_layout')

@section('inner_content')
    <br>
    <br>

    <table class="admin-panel">
        <thead>
            <tr>
                <td>ID</td>
                <td style="min-width: 140px;">Аватар</td>
                <td style="min-width: 100px;">Наименование</td>
                <td>Видна?</td>
                <td style="min-width: 50px;">Описание</td>
                <td style="min-width: 50px;">Полное описание</td>
                <td></td>
                <td>Удалено</td>
            </tr>
        </thead>
        <tbody>
        <tr>
            <form action="{{ route('abilityStore') }}" method="post" role="form" enctype="multipart/form-data">
                <td></td>
                <td><input name="avatar" type="file" class="form-control" id="avatar" value="{{ old('avatar') }}"></td>
                <td><input name="name" type="text" class="form-control" id="name" value="{{ old('name') }}" required></td>
                <td>
                    <select name="hidden" id="hidden">
                        <option selected value="0">Да</option>
                        <option value="1">Нет</option>
                    </select>
                </td>
                <td><input name="description" type="text" class="form-control" id="description" value="{{ old('description') }}"></td>
                <td><input name="full_description" type="text" class="form-control" id="full_description" value="{{ old('full_description') }}"></td>
                <td></td>
                <td>
                    <button type="submit" class="btn btn-primary">Создать</button>
                </td>
                <td></td>
                {{ csrf_field() }}
            </form>
        </tr>

        @foreach($abilities as $ability)

            <tr @if ($ability->deleted_at)
                style="background-color: #e4b9b9;"
                @elseif ($ability->hidden)
                style="background-color: #9B859D;"
                    @endif>
                <td>{{ $ability->id }}</td>
                <td style="min-width: 50px;">{{ $ability->avatar }}</td>
                <td>{{ $ability->name }}</td>
                <td>
                    @if ($ability->hidden)
                        Нет
                    @else
                        Да
                    @endif
                </td>
                <td>{{ $ability->description }}</td>
                <td>{{ $ability->full_description }}</td>
                <td></td>
                <td>
                    <form action="{{ route('abilityDelete', ['id'=>$ability->id]) }}"
                          method="post">
                        {{method_field('DELETE')}}
                        {{csrf_field()}}
                        <button type="submit" class="btn btn-danger">Удалить</button>
                    </form>
                </td>
                <td>{{ $ability->deleted_at }}</td>
                <td><a class="btn btn-success"
                       href="{{ route('abilityRestore',['comment'=>$ability->id]) }}"
                       role="button">Восстановить</a>
                </td>
                <td>
                    <form action="{{ route('abilityForceDelete', ['id'=>$ability->id]) }}"
                          method="post">
                        {{method_field('DELETE')}}
                        {{csrf_field()}}
                        <button type="submit" class="btn btn-danger">Полное удаление</button>
                    </form>
                </td>
            </tr>

        @endforeach
        </tbody>


    </table>

@endsection