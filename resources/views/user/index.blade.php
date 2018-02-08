@extends('admin.admin_layout')

@section('inner_content')

    <table class="admin-panel">
        <thead>
        <tr>
            <td>ID</td>
            <td>Имя</td>
            <td>Аватар</td>
            <td>E-mail</td>
            <td>Роль</td>
            <td>Набор</td>
            <td>Звание</td>
            <td>Подтвержден</td>
            <td>Рэйтинг</td>
            <td>Кол-во побед</td>
            <td>Кол-во игр</td>
            <td>Продвижение</td>
            <td>VIP</td>
            <td>Виден?</td>
            <td>Баланс</td>
            <td></td>
            <td>Удалено</td>
            <td></td>
        </tr>
        </thead>
        <tbody>

        @foreach($users as $user)

            <tr
                @if ($user->deleted_at)
                    style="background-color: #e4b9b9;"
                @endif
            >
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td style="max-width:70px;">
                    @unless (empty($avatar = $user->files->last()))
                        <img class="media-object"
                             src="{{ asset('storage/app/'. $avatar) }}"
                             alt="image">
                    @endunless
                </td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->role}}</td>
                <td>{{ $user->verified }}</td>
                <td>
                    <form action="{{ route('userDelete', ['id'=>$user->id]) }}"
                          method="post">
                        <!-- <input type="hidden" name="_method" value="DELETE"> -->
                        {{method_field('DELETE')}}
                        {{csrf_field()}}
                        <button type="submit" class="btn btn-danger">Удалить</button>
                    </form>
                </td>
                <td>{{ $user->deleted_at }}</td>
                <td><a class="btn btn-success"
                       href="{{ route('userRestore',['id'=>$user->id]) }}"
                       role="button">Восстановить</a></td>
            </tr>

        @endforeach
        </tbody>

    </table>

@endsection