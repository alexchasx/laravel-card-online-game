@extends('cardgame::layouts.admin_layout')

@section('inner_content')
<table class="table">
    <thead>
    <tr style="background-color: #9696e4;color: #000;">
        <td>ID</td>
        <td style="min-width: 140px;">Аватар</td>
        <td style="min-width: 100px;">Наименование</td>
        <td>Видна?</td>
        <td style="min-width: 50px;">Описание</td>
        <td style="min-width: 50px;">Полное описание</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    </thead>
    <tbody>
    <tr>
        <form action="{{ route('abilityStore') }}" method="post" role="form"
              enctype="multipart/form-data">
            <td></td>
            <td><input name="avatar" type="file" class="form-control" id="avatar"
                       value="{{ old('avatar') }}"></td>
            <td><input name="name" type="text" class="form-control" id="name"
                       value="{{ old('name') }}" required></td>
            <td>
                <select name="seen" id="seen">
                    <option selected value="1">Да</option>
                    <option value="0">Нет</option>
                </select>
            </td>
            <td><input name="description" type="text" class="form-control"
                       id="description" value="{{ old('description') }}"></td>
            <td><input name="full_description" type="text" class="form-control"
                       id="full_description" value="{{ old('full_description') }}">
            </td>
            <td>
                <button type="submit" class="btn btn-xs btn-success">
                    <i class="fa fa-check"></i>
                </button>
            </td>
            <td></td>
            {{ csrf_field() }}
        </form>
    </tr>

    @foreach($abilities as $ability)

        <tr {{--@if ($ability->deleted_at)
                            style="background-color: #e4b9b9;"
                            @elseif (!$ability->seen)--}}
            @if (!$ability->seen)
            style="background-color: #b39cb5;"
                @endif>
            <td>{{ $ability->id }}</td>
            <td><img width="50" src="{{ $ability->avatar }}" alt=""></td>
            <td>{{ $ability->name }}</td>
            <td>
                @if (!$ability->seen)
                    Нет
                @else
                    Да
                @endif
            </td>
            <td>{{ $ability->description }}</td>
            <td>{{ $ability->full_description }}</td>
            <td>
                <form action="{{ route('abilityDelete', ['id'=>$ability->id]) }}"
                      method="post">
                    {{method_field('DELETE')}}
                    {{csrf_field()}}
                    <button class="btn btn-xs btn-danger">
                        <i class="fa fa-times"></i>
                    </button>
                </form>
            </td>
            <td><a href="{{ route('abilityEdit',['id'=>$ability->id]) }}"
                   role="button">
                    <button class="btn btn-xs btn-warning">
                        <i class="fa fa-edit"></i>
                    </button>
                </a>
            </td>
            <td>
                @if ($ability->deleted_at)
                    <span class="label label-danger">Уд.</span>
                @endif
            </td>
            <td>
                <a href="{{ route('abilityRestore',['comment'=>$ability->id]) }}"
                   role="button">
                    <button class="btn btn-xs btn-success">
                        <i class="fa fa-refresh"></i>
                    </button>
                </a>
            </td>
            <td>
                <form action="{{ route('abilityForceDelete', ['id'=>$ability->id]) }}"
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