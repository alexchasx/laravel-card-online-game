@extends('cardgame::layouts.admin_layout')

@section('inner_content')
    <table class="table">
    <thead>
    <tr style="background-color: #9696e4;color: #000;">
        <td>ID</td>
        <td style="width: 120px;">Аватар</td>
        <td style="min-width: 220px;">Наименование</td>
        <td>Видна?</td>
        <td style="min-width: 125px;">Особенности</td>
        <td style="min-width: 150px;">Описание</td>
        <td>Цена</td>
        <td></td>
        <td></td>
    </tr>
    </thead>

    <tbody>
    <tr>
        <form action="{{ route('raceStore') }}" method="post" role="form"
              enctype="multipart/form-data">
            <td></td>
            <td><input name="avatar" type="file" class="form-control" id="avatar"
                       value="{{ old('avatar') }}"></td>
            <td><input name="name" type="text" class="form-control"
                       id="name"
                       value="{{ old('name') }}" required></td>
            <td>
                <select name="seen" id="seen">
                    <option selected value="1">Да</option>
                    <option value="0">Нет</option>
                </select>
            </td>
            <td><input name="feature" type="text" class="form-control" id="feature"
                       value="{{ old('feature') }}"></td>
            <td><input name="description" type="text" class="form-control"
                       id="description"
                       value="{{ old('description') }}"></td>
            <td><input name="price" type="text" class="form-control" id="price"
                       value="{{ old('price') }}"></td>
            <td>
                <button type="submit" class="btn btn-xs btn-success">
                    <i class="fa fa-check"></i>
                </button>
            </td>
            <td>{{ csrf_field() }}</td>
        </form>
    </tr>

    @foreach($races as $race)

        <tr @if ($race->deleted_at)
            style="background-color: #e4b9b9;"
            @elseif (!$race->seen)
            style="background-color: #9B859D;"
                @endif>
            <td>{{ $race->id }}</td>
            <td><img width="50" src="{{ $race->avatar }}" alt=""></td>
            <td>{{ $race->name }}</td>
            <td>
                @if ($race->seen)
                    Да
                @else
                    Нет
                @endif
            </td>
            <td>{{ $race->feature }}</td>
            <td>{{ $race->description }}</td>
            <td>{{ $race->price }}</td>
            <td>
                <form action="{{ route('raceDelete', ['id'=>$race->id]) }}"
                      method="post">
                    <!-- <input type="hidden" name="_method" value="DELETE"> -->
                    {{method_field('DELETE')}}
                    {{csrf_field()}}
                    <button class="btn btn-xs btn-danger">
                        <i class="fa fa-times"></i>
                    </button>
                </form>
            </td>
            <td>
                @if ($race->deleted_at)
                    <span class="label label-danger">Уд.</span>
                @endif
            </td>
            <td><a href="{{ route('raceRestore',['card_set'=>$race->id]) }}"
                   role="button">
                    <button class="btn btn-xs btn-success">
                        <i class="fa fa-refresh"></i>
                    </button>
                </a>
            </td>
            <td>
                <form action="{{ route('raceForceDelete', ['id'=>$race->id]) }}"
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