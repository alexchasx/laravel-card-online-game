@extends('cardgame::layouts.admin_layout')

@section('inner_content')
    <table class="table">
    <thead>
    <tr style="background-color: #9696e4;color: #000;">
        <td>ID</td>
        <td style="min-width: 100px;">Наименование</td>
        <td style="min-width: 50px;">Видимость</td>
        <td style="min-width: 400px;">Описание</td>
        <td {{--style="min-width: 140px;"--}}>Аватар</td>
        <td style="min-width: 50px;">Сорт.</td>
        <td style="max-width: 20px;">Рейтинг</td>
        <td style="min-width: 120px;">Цена</td>
        <td></td>
        <td>Удалено</td>
        <td></td>
        <td></td>
    </tr>
    </thead>
    <tbody>
    <tr>
        <form action="{{ route('achievementStore') }}" method="post" role="form"
              enctype="multipart/form-data">
            <td></td>
            <td><input name="name" type="text" class="form-control"
                       id="name" value="{{ old('name') }}" required></td>
            <td>
                <select class="form-control" name="seen" id="seen">
                    <option selected value="1">Да</option>
                    <option value="0">Нет</option>
                </select>
            </td>
            <td><input name="description" type="text" class="form-control" id="description"
                       value="{{ old('description') }}"></td>
            <td><input name="avatar" type="file" class="form-control" id="avatar"
                       value="{{ old('avatar') }}"></td>
            <td><input name="sort" type="text" class="form-control"
                       id="sort" value="{{ old('sort') }}"></td>
            <td><input name="rating" type="text" class="form-control" id="rating"
                       value="{{ old('rating') }}"></td>
            <td><input name="price" type="text" class="form-control" id="price"
                       value="{{ old('price') }}"></td>
            <td></td>
            <td>
                <button type="submit" class="btn btn-xs btn-success">
                    <i class="fa fa-check"></i>
                </button>
            </td>
            <td></td>
            {{ csrf_field() }}
        </form>
    </tr>

    @foreach($entities as $entity)

        <tr @if ($entity->deleted_at)
            style="background-color: #e4b9b9;"
            @elseif (!$entity->seen)
            style="background-color: #9B859D;"
                @endif>
            <td>{{ $entity->id }}</td>
            <td>{{ $entity->name }}</td>
            <td>
                @if ($entity->seen)
                    Да
                @else
                    Нет
                @endif
            </td>
            <td>{{ $entity->description }}</td>
            <td><img width="50" src="{{ $entity->avatar }}" alt=""></td>
            <td>{{ $entity->sort }}</td>
            <td>{{ $entity->rating }}</td>
            <td>{{ $entity->price }}</td>

        @include('cardgame::layouts.table_end')

    @endforeach
    </tbody>
    </table>
@endsection