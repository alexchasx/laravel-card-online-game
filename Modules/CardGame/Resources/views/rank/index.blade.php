@extends('cardgame::layouts.admin_layout')

@section('inner_content')
        <table class="table">
            <thead>
            <tr style="background-color: #9696e4;color: #000;">
                <td></td>
                <td>ID</td>
                <td>Сорт.</td>
                <td>class_css</td>
                <td style="min-width: 100px;">Наименование</td>
                <td>Рейтинг</td>
                <td>Цена</td>
                <td>Видим.</td>
                <td></td>
            </tr>
            </thead>
            <tbody>
            <form action="{{ route('rankUpdate') }}" method="post">
                @php($rating = 0)
                @php($interval=0)
                @foreach($ranks as $rank)
                    <tr>
                        <td></td>
                        <td width="70">
                            <input name="id[{{ $rank->id }}]" type="text" class="form-control"
                                   id="sort" value="{{ $rank->id }}"></td>
                        <td width="70">
                            <input name="sort[{{ $rank->id }}]" type="text" class="form-control"
                                   id="sort" value="{{ $rank->sort }}">
                        </td>
                        <td width="100">
                            <input name="class_css[{{ $rank->id }}]" type="text" class="form-control"
                                   id="class_css" value="{{ $rank->class_css }}">
                        </td>
                        <td width="150">
                            <input name="name[{{ $rank->id }}]" type="text" class="form-control"
                                   id="name" value="{{ $rank->name }}" required>
                        </td>
                        <td width="100">
                            <input name="rating[{{ $rank->id }}]" type="text" class="form-control"
                                   id="rating" value="{{ $rating + $interval }}">
                        </td>
                        <td width="80">
                            <input name="price[{{ $rank->id }}]" type="text" class="form-control"
                                   id="price" value="{{ $rank->price }}">
                        </td>
                        <td width="80">
                            <select class="form-control" name="seen[{{ $rank->id }}]" id="seen">
                                <option selected value="1">Да</option>
                                <option value="0">Нет</option>
                            </select>
                        </td>
                        <td></td>
                    </tr>
                @php($interval += 50 * $loop->iteration)
                @endforeach
            </tbody>
        </table>
        <button type="submit" class="btn btn-primary">Изменить</button>
        {{ csrf_field() }}
        </form>
@endsection