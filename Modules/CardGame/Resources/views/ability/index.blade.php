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
                <select name="seen" class="form-control" id="seen">
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
            <td></td>
            <td></td>
            {{ csrf_field() }}
        </form>
    </tr>

    @foreach($entities as $entity)

        <tr {{--@if ($entity->deleted_at)
                            style="background-color: #e4b9b9;"
                            @elseif (!$entity->seen)--}}
            @if (!$entity->seen)
            style="background-color: #b39cb5;"
                @endif>
            <td>{{ $entity->id }}</td>
            <td><img width="50" src="{{ $entity->avatar }}" alt=""></td>
            <td>{{ $entity->name }}</td>
            <td>
                @if (!$entity->seen)
                    Нет
                @else
                    Да
                @endif
            </td>
            <td>{{ $entity->description }}</td>
            <td>{{ $entity->full_description }}</td>

        @include('cardgame::layouts.table_end')

    @endforeach
    </tbody>
    </table>
@endsection